<?php

namespace App\Services;

use App\Models\User;
use App\Services\Website\Assessments\AttemptService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function __construct(private readonly AttemptService $attempts) {}

    public function register(array $data): User
    {
        if (empty($data['name'])) {
            $firstName = $data['first_name'] ?? '';
            $fatherName = $data['father_name'] ?? '';
            $grandfatherName = $data['grandfather_name'] ?? '';
            $lastName = $data['last_name'] ?? '';
            $data['name'] = trim("{$firstName} {$fatherName} {$grandfatherName} {$lastName}");
        }
        // كل حقول الاسم ممكن تتقفل من لوحة الإدارة: الاسم وقتها يبقى أول جزء من البريد
        if ($data['name'] === '') {
            $data['name'] = strstr($data['email'], '@', true) ?: $data['email'];
        }

        return User::create($data);
    }

    /** المستخدمين مع عدد محاولاتهم وآخر محاولة (join + group by) */
    public function paginate(?string $search, int $perPage = 20): LengthAwarePaginator
    {
        $attempts = DB::table('attempts')
            ->select('user_id', DB::raw('count(*) as attempts_count'), DB::raw('max(completed_at) as last_attempt_at'))
            ->groupBy('user_id');

        return DB::table('users as u')
            ->leftJoinSub($attempts, 'a', 'a.user_id', '=', 'u.id')
            ->when($search, fn ($q) => $q->where(fn ($q) => $q
                ->where('u.name', 'like', "%{$search}%")
                ->orWhere('u.email', 'like', "%{$search}%")
                ->orWhere('u.phone_number', 'like', "%{$search}%")
                ->orWhere('u.id_number', 'like', "%{$search}%")))
            ->orderByDesc('u.id')
            ->select('u.id', 'u.name', 'u.email', 'u.phone_number as phone', 'u.created_at', DB::raw('coalesce(a.attempts_count, 0) as attempts_count'), 'a.last_attempt_at')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function delete(User $user): void
    {
        DB::transaction(function () use ($user) {
            $this->attempts->deleteForUser($user->id);
            DB::table('sessions')->where('user_id', $user->id)->delete();
            $user->delete();
        });
    }
}
