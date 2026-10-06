{{-- حذف محور: أسئلته تفضل في المقياس من غير محور، أو تتحذف معاه --}}
<div class="dropdown">
    <button class="btn btn-sm btn-outline-danger" data-bs-toggle="dropdown" aria-expanded="false" title="حذف"><i class="bi bi-trash"></i></button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <form method="POST" action="{{ route('admin.dimensions.destroy', $dimension->id) }}" data-confirm="هيتحذف المحور «{{ $dimension->name_ar }}» ومحاوره الفرعية ومستوياته، وأسئلته هتفضل من غير محور. تكمل؟">
                @csrf @method('DELETE')
                <button class="dropdown-item">حذف المحور (الأسئلة تفضل)</button>
            </form>
        </li>
        <li>
            <form method="POST" action="{{ route('admin.dimensions.destroy', $dimension->id) }}" data-confirm="هيتحذف المحور «{{ $dimension->name_ar }}» بكل أسئلته ومحاوره الفرعية ومستوياته. تكمل؟">
                @csrf @method('DELETE')
                <input type="hidden" name="delete_questions" value="1">
                <button class="dropdown-item text-danger">حذف المحور وأسئلته</button>
            </form>
        </li>
    </ul>
</div>
