@error($attributes->get('name'))
    <section {{ $attributes->merge(['class' => 'form-error']) }}>
        {{ $message }}
    </section>
@enderror
