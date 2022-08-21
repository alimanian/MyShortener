@section('second-icon')
    <a href="{{ route('login') }}">
        <svg class="icon scale-x-[-1]"><use xlink:href="#login"/></svg>
    </a>
@endsection
<main class="flex-1 flex flex-col px-4">
    <header class="flex-none">
        <x-title type="auth" :title="__('heading.Forget')"
                 :description="__('text.Enter your account information:')"
                 class="flex flex-col items-center mb-3" />
    </header>
    <main class="flex-1 flex items-center">
        <x-form wire:submit.prevent="forget" class="w-full">
            <x-input class="ltr text-left" :name="$prefix.'phone_number'" type="tel" maxlength="11" autofocus>
                {{ __('label.phone_number') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'password'" type="password">
                {{ __('label.new_password') }}
            </x-input>
        </x-form>
    </main>
    <footer class="flex-none">
        <x-button class="form-button-primary !mb-4" type="submit" form="forget">
            {{ __('button.Send verification code') }}
        </x-button>
    </footer>
</main>
