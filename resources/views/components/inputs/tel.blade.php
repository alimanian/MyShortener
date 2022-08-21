<section class="form-control">
    <section class="form-input">
        <input placeholder=" " {{ $attributes->merge([
            'type' => $type,
            'id' => $attributes->get('name'),
            $attributes->has('model') ? 'wire:model.'.$attributes->get('model') : 'wire:model.defer' => $attributes->get('name')
        ])->except(['model']) }}>

        <label for="{{ $attributes->get('id') ?? $attributes->get('name') }}">{{ $slot }}</label>
    </section>
    <x-error :name="$attributes->get('name')" />
</section>
