<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Navigáció teszt</title>
</head>
<body>
    <h1>Második oldal</h1>

    <a href="{{ route('elso')}}">Vissza</a>
    <a href="{{ route('harmadik')}}">Tovább</a>
</body>
</html>
