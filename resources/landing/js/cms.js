// محتوى الموقع اللي بيتحكم فيه الأدمن (لوحة الإدارة ← محتوى الصفحات).
// الاستخدام: cms(<المفتاح>, <النص الأصلي>) بترجع تعديل الأدمن لو موجود (window.CMS من
// resources/views/landing/partials/cms-script.blade.php) وإلا النص الأصلي.
// المفتاح والنص الأصلي لازم يتكتبوا بين علامتي ' ' عشان لوحة الإدارة تقراهم من الملف.
export function cms(key, fallback) {
  const value = typeof window !== 'undefined' && window.CMS ? window.CMS[key] : undefined;
  return value === undefined || value === null || value === '' ? fallback : value;
}
