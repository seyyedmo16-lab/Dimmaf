<!DOCTYPE html>
<html>
<head>
    <title>Debug Language</title>
</head>
<body>
    <h1>Debug Language Test</h1>
    <p>Current language: {{ $lang }}</p>
    
    @if (session('lang') == 'en' || session('lang') == null)
        <p>English content is showing</p>
    @elseif (session('lang') == 'fa')
        <p>فارسی content is showing</p>
    @else
        <p>Unknown language: {{ session('lang') }}</p>
    @endif
    
    <p>Session lang: {{ session('lang') }}</p>
    <p>Variable lang: {{ $lang }}</p>
</body>
</html>
