<section class="form-control">
    <section class="form-input">
        <textarea placeholder=" " {{ $attributes->merge([
            'id' => $attributes->get('name'),
            $attributes->has('model') ? 'wire:model.'.$attributes->get('model') : 'wire:model.defer' => $attributes->get('name')
        ])->except(['model']) }}></textarea>

        <label for="{{ $attributes->get('id') ?? $attributes->get('name') }}">{{ $slot }}</label>
    </section>
    <x-error :name="$attributes->get('name')" />
</section>
