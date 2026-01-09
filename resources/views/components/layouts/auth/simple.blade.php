<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "title" }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', "resources/js/lottie.js"])
    @fluxAppearance
</head>
<body>
<div class="w-full flex bg-accent-foreground dark:bg-gray-900 h-screen justify-center items-center relative">
<div class="w-1/2 bg-gradient-to-br from-red-400 via-rose-600 to-red-500 bg-[length:200%_200%] animate-gradient h-full flex-col justify-center items-center gap-4 hidden lg:flex p-8">
        <x-lottie class="lg:max-w-lg" id="welcome" src="{{ asset('lotties/welcome.lottie') }}"/>
        <div>
            <h1 class="text-2xl font-semibold text-accent-foreground text-center">
                Plan. Focus. Finish.
            </h1>
            <p class="text-center font-medium text-lg text-gray-200">
                Nexdo helps you manage tasks clearly, so you can focus on what matters most.
            </p>
        </div>
    </div>
    {{ $slot }}

    <div class="absolute z-9999 top-4 right-4">
        <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" variant="primary" aria-label="Toggle dark mode" class="aspect-square! size-10!">
            <flux:icon.moon x-show="$flux.appearance === 'dark'" variant="solid"/>
            <flux:icon.sun x-show="$flux.appearance === 'light'" variant="solid"/>
            <flux:icon.moon x-show="$flux.appearance === 'system' && $flux.dark" variant="solid" />
            <flux:icon.sun x-show="$flux.appearance === 'system' && ! $flux.dark" variant="solid" />
        </flux:button>
    </div>
</div>
@fluxScripts
</body>
</html>
