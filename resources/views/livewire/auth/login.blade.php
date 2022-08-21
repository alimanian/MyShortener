@section('second-icon')
    <a href="{{ route('register') }}">
        <svg class="icon"><use xlink:href="#addUser"/></svg>
    </a>
@endsection
<main class="flex-1 flex flex-col px-4">
    <header class="flex-none">
        <x-title type="auth" :title="__('heading.Login')"
                 :description="__('text.Enter your account information:')"
                 class="flex flex-col items-center mb-3" />
    </header>
    <main class="flex-1 flex items-center">
        <x-form wire:submit.prevent="signin" class="w-full">
            <x-input class="ltr text-left" :name="$prefix.'phone_number'" type="tel" maxlength="11" autofocus>
                {{ __('label.phone_number') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'password'" type="password">
                {{ __('label.password') }}
            </x-input>
            <section class="mb-3 flex justify-end">
                {{-- TODO add Remember me! --}}
                <a class="select-none" href="{{ route('forget') }}">
                    {{ __('link.forget password') }}
                </a>
            </section>
        </x-form>
    </main>
    <footer class="flex-none">
        <x-button class="form-button-primary !mb-4" type="submit" form="signin">
            {{ __('button.Login') }}
        </x-button>
    </footer>
</main>
