<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "page title" }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/lottie.js'])
    @fluxAppearance
</head>
@php
    $user = auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && auth()->user()->hasVerifiedEmail() ? auth()->user() : false;
@endphp
<body class="min-h-screen bg-white dark:bg-zinc-800 antialiased">

<x-layouts.app.header :$user/>

<flux:main :container="$container ?? false">
    {{ $slot }}
</flux:main>

<x-layouts.app.footer/>
@fluxScripts
</body>
</html>
