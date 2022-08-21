@section('second-icon')
    <a href="{{ route('login') }}">
        <svg class="icon scale-x-[-1]"><use xlink:href="#login"/></svg>
    </a>
@endsection
<main class="flex-1 flex flex-col px-4">
    <header class="flex-none">
        <x-title type="auth" :title="__('heading.Register')"
                 :description="__('text.Enter your account information:')"
                 class="flex flex-col items-center mb-3" />
    </header>
    <main class="flex-1 flex items-center">
        <x-form wire:submit.prevent="signup" class="w-full">
            <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
                <x-input :name="$prefix.'first_name'" type="text" maxlength="40" autofocus>
                    {{ __('label.first_name') }}
                </x-input>
                <x-input :name="$prefix.'last_name'" type="text" maxlength="60">
                    {{ __('label.last_name') }}
                </x-input>
            </section>
            <x-input class="ltr text-left" :name="$prefix.'phone_number'" type="tel" maxlength="11">
                {{ __('label.phone_number') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'password'" type="password">
                {{ __('label.password') }}
            </x-input>
            <p class="text-slate-400 body-2 text-center mb-3">
                {!! __('text.Signing up in MyShortener means accepting the rules.', ['link' => '/', 'class' => 'font-bold']) !!}
            </p>
        </x-form>
    </main>
    <footer class="flex-none">
        <x-button class="form-button-primary !mb-4" type="submit" form="signup">
            {{ __('button.Send verification code') }}
        </x-button>
    </footer>
</main>
