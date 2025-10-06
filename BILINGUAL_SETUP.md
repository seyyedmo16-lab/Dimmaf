# راهنمای راه‌اندازی قابلیت دوزبانه (Bilingual Setup Guide)

## نحوه کار

پروژه از **Session** برای مدیریت زبان استفاده می‌کند.

### تغییر زبان

**URL:** `/lang/{lang}`  
**زبان‌های پشتیبانی شده:** `fa` (فارسی), `en` (انگلیسی)

**مثال:**
```
http://localhost:8000/lang/fa  // تغییر به فارسی
http://localhost:8000/lang/en  // تغییر به انگلیسی
```

### استفاده در Views

```php
@if (session('lang') == 'fa')
    <!-- محتوای فارسی -->
@elseif (session('lang') == 'en' || session('lang') == null)
    <!-- محتوای انگلیسی (پیش‌فرض) -->
@endif
```

### استفاده در Controllers

```php
$lang = session('lang', 'en'); // پیش‌فرض: انگلیسی

if($lang == 'fa') {
    // منطق فارسی
} else {
    // منطق انگلیسی
}
```

## تست در مرورگر

1. باز کردن صفحه اصلی: `http://localhost:8000`
2. کلیک روی دکمه تغییر زبان در header
3. بررسی تغییر محتوا

## نکات مهم

- زبان پیش‌فرض: **انگلیسی**
- زبان در Session ذخیره می‌شود و تا پایان Session حفظ می‌ماند
- برای تست در مرورگر، باید از یک session واقعی استفاده کنید (نه `Invoke-WebRequest`)

## فایل‌های مرتبط

- Controller: `app/Http/Controllers/General/cookieLanguageController.php`
- Route: `routes/web.php` (خط 66)
- Views: `resources/views/**/*.blade.php`

