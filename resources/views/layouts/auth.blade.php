<!doctype html>
<html class="flex items-center justify-center min-h-screen w-full bg-slate-50" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-white min-h-screen flex flex-col w-full sm:w-[26rem] sm:border sm:min-h-[36rem] sm:rounded-2xl">
    <header>
        @include('layouts.includes.svgs')
        <section class="flex flex-row justify-between items-center px-4 py-5 mb-12 sm:mb-6">
            <svg class="icon"><use xlink:href="#home"/></svg>
            <svg class="fill-indigo-500"><use xlink:href="#logo"/></svg>
            @yield('second-icon')
        </section>
    </header>
    {!! $slot !!}
    <footer>
        @livewireScripts
        @vite('resources/js/app.js')
    </footer>
</body>
</html>
