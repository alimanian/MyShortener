<form {{ $attributes->merge([
        'id' => $attributes->get('wire:submit.prevent')
    ]) }}>

    {!! $slot !!}
</form>
