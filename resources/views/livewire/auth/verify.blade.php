@section('second-icon')
    {{-- TODO Show icon base Register or Forget Password --}}
    <a href="{{ route('register') }}">
        <svg class="icon"><use xlink:href="#addUser"/></svg>
    </a>
@endsection
<main class="flex-1 flex flex-col px-4">
    <header class="flex-none">
        <x-title type="auth" :title="__('heading.Validation')"
                 :description="__('text.Enter the verification code sent:')"
                 class="flex flex-col items-center mb-3" />
    </header>
    <main class="flex-1 flex items-center">
        <x-form wire:submit.prevent="verify" class="w-full">
            <x-input class="ltr text-left" :name="$prefix.'verify_code'" type="tel" maxlength="6" autofocus>
                {{ __('label.verify_code') }}
            </x-input>
        </x-form>
    </main>
    <footer class="flex-none">
        <x-button class="form-button-primary !mb-4" type="submit" form="verify">
            {{ __('button.Check verification code') }}
        </x-button>
    </footer>
</main>
