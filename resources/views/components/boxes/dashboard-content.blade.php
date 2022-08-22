<div class="dashboard-content-box">
    <div class="flex justify-between items-center">
        <div class="flex items-center mb-3 space-x-reverse space-x-2">
            <h1 class="title">{{ $attributes->get('title') }}</h1>
            @isset($headerIcon) {!! $headerIcon !!} @endisset
        </div>
        @isset($headerSearch)
            <div>
                {!! $headerSearch !!}
            </div>
        @endisset
    </div>
    <hr class="mb-4">
    {!! $slot !!}
</div>
