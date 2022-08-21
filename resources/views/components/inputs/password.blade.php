<section class="form-control">
    <section class="form-input" x-data="{isHide: true}">
        <input placeholder=" " {{ $attributes->merge([
            'type' => $type,
            'id' => $attributes->get('name'),
            'class' => '!pl-12',
            ':type' => "isHide ? 'password': 'text'",
            $attributes->has('model') ? 'wire:model.'.$attributes->get('model') : 'wire:model.defer' => $attributes->get('name')
        ])->except(['model']) }}>
        <label for="{{ $attributes->get('id') ?? $attributes->get('name') }}">{{ $slot }}</label>
        <svg @click="isHide = !isHide" class="form-input-password-icon">
            <use x-show="isHide" xlink:href="#hide" />
            <use x-show="!isHide" xlink:href="#show" />
        </svg>
    </section>
    <x-error :name="$attributes->get('name')" />
</section>
