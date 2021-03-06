<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GHS GPA Calculator</title>

    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}"/>
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}"/>
</head>
<body>
    @include('partials._header')

    @if (isset($grades))
        @include('partials._classes')
    @endif

    @if (isset($classLengths))
        @include('partials._classesPopup')
    @endif
</body>
</html>
