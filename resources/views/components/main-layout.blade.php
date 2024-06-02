<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://api-maps.yandex.ru/v3/?apikey=2433104e-1b8a-4d46-95a4-40303942fe61&lang=ru_RU"></script>
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body>
    {{$slot}}
</body>
</html>
