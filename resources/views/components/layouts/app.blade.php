<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
    <body style="background-image: url('{{asset('storage/backs/auth_bg.png')}}')" class="w-full h-screen flex flex-row items-center justify-center">
        {{ $slot }}
    </body>
</html>
