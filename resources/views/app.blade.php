<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="{{ asset('logo.png') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Bazary</title>
        @vite(['resources/css/app.css'])
    </head>
    <body>
        <div id="app">

        </div>
        @vite('resources/js/app.js')
    </body>
</html>
