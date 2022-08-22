<div class="bg-white rounded-lg border border-neutral-200 px-3 py-4">
    <h1 class="h3 text-neutral-700 mb-3">افزودن کاربر</h1>
    <hr class="mb-5">
    <x-form wire:submit.prevent="create" class="w-full">
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'first_name'" type="text" maxlength="40" autofocus>
                {{ __('label.first_name') }}
            </x-input>
            <x-input :name="$prefix.'last_name'" type="text" maxlength="60">
                {{ __('label.last_name') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'email'" type="email" maxlength="255">
                {{ __('label.email') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input class="ltr text-left" :name="$prefix.'phone_number'" type="tel" maxlength="11">
                {{ __('label.phone_number') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'password'" type="password">
                {{ __('label.password') }}
            </x-input>
        </section>
    </x-form>
    <x-button class="form-button-primary !mb-0 !w-24 max-w-full" type="submit" form="create">
        {{ __('button.Add') }}
    </x-button>
</div>
