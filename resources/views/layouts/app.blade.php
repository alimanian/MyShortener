<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body class="bg-neutral-50 min-h-screen w-full">
<header>
    @include('layouts.includes.svgs')
    <aside class="fixed top-6 right-6 bg-white border border-neutral-200 w-[16rem] h-[calc(100vh-3rem)] rounded-xl">
        <figure class="flex flex-col items-center my-5 space-y-2">
            <img class="w-20 h-20 rounded-full" src="{{ gravatar_image(auth()->user()->email, 128) }}" alt="">
            <figcaption class="body-1">علی مانیان</figcaption>
            <span class="body-2">مدیر در کوتاه کننده لینک من</span>
        </figure>
        <nav class="h-[calc(100vh-14.45rem)] overflow-y-auto py-2">
            <ul class="dashboard-menu">
                <li class="menu-item @if(request()->routeIs('dashboard')) menu-item-active @endif">
                    <a href="{{ route('dashboard') }}">
                        <svg class="icon"><use xlink:href="#home"/></svg>
                        <span class="text">{{ __('menu.counter') }}</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <svg class="icon"><use xlink:href="#link"/></svg>
                        <span class="text">{{ __('menu.links') }}</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="">
                        <svg class="icon"><use xlink:href="#scan"/></svg>
                        <span class="text">{{ __('menu.barcodes') }}</span>
                    </a>
                </li>
                <li class="menu-item @if(request()->routeIs('dashboard.users')) menu-item-active @endif">
                    <a href="{{ route('dashboard.users') }}">
                        <svg class="icon"><use xlink:href="#users"/></svg>
                        <span class="text">{{ __('menu.users') }}</span>
                    </a>
                </li>
                <li class="menu-item @if(request()->routeIs('dashboard.categories')) menu-item-active @endif">
                    <a href="{{ route('dashboard.categories') }}">
                        <svg class="icon"><use xlink:href="#menu"/></svg>
                        <span class="text">{{ __('menu.categories') }}</span>
                    </a>
                </li>
                @can('show-roles')
                    <li class="menu-item @if(request()->routeIs('dashboard.roles')) menu-item-active @endif">
                        <a href="{{ route('dashboard.roles') }}">
                            <svg class="icon"><use xlink:href="#lock"/></svg>
                            <span class="text">{{ __('menu.roles') }}</span>
                        </a>
                    </li>
                @endcan
                <li class="menu-item">
                    <a href="">
                        <svg class="icon"><use xlink:href="#setting"/></svg>
                        <span class="text">{{ __('menu.settings') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
</header>
<main class="mr-[18.5rem] ml-6 my-6">
    <div class="bg-white border border-neutral-200 rounded-lg px-2 py-3 flex justify-between mb-3">
        <div class="flex items-center space-x-reverse space-x-1.5 text-neutral-500">
            <svg class="icon w-6 h-6"><use xlink:href="#location"/></svg>
            <span class="body-2">پنل کاربری</span>
            <svg class="icon w-4 h-4"><use xlink:href="#arrowLeft"/></svg>
            <span class="body-2">پیشخان</span>
        </div>
        <div>
            <svg class="icon w-6 h-6"><use xlink:href="#logout"/></svg>
        </div>
    </div>
    {!! $slot !!}
</main>
<footer>
    @livewireScripts
    @vite('resources/js/app.js')
    <x-sweet-alert />
</footer>
</body>
</html>
