<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    @routes
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="antialiased">
    @inertia
</body>
</html>
