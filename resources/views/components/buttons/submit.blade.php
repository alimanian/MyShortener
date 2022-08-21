<section class="form-control">
    <x-error name="rateLimiting" />
    <button {{ $attributes->merge([
    'class' => 'form-button',
    'wire:target' => $attributes->get('form'),
    'wire:loading.class' => 'loading',
    'type' => $type,
    'wire:loading.attr' => 'disabled'
    ]) }}>
        <section wire:loading.remove>
            {!! $slot !!}
        </section>
        <section wire:loading>
            <svg class="animate-spin h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </section>
    </button>
</section>
