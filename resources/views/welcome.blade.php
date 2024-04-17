<!DOCTYPE html>
<html lang="ru">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приложение для Бронирования Отелей</title>
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
<body>
    <div id="app">
    </div>
</body>
</html>
