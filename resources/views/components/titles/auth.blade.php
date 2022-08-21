<section {{ $attributes->except(['type', 'title', 'description']) }}>
    @if($attributes->has('title'))
        <h1 class="text-indigo-500 mb-3">{{ $attributes->get('title') }}</h1>
    @endif
    @if($attributes->has('description'))
        <p class="text-slate-400">{{ $attributes->get('description') }}</p>
    @endif
</section>
