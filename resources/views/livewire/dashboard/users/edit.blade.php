<x-box name="dashboard-content" :title="__('heading.Edit User')">
    <x-form wire:submit.prevent="update" class="w-full">
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'first_name'" type="text" maxlength="40" autofocus>
                {{ __('label.first_name') }}
            </x-input>
            <x-input :name="$prefix.'last_name'" type="text" maxlength="60">
                {{ __('label.last_name') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input class="ltr text-left" :name="$prefix.'phone_number'" type="tel" maxlength="11">
                {{ __('label.phone_number') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'email'" type="email" maxlength="255">
                {{ __('label.email') }}
            </x-input>
            <div class="w-full">
                <select class="form-select" aria-label="{{ __('label.role') }}" wire:model.defer="{{ $prefix.'role_id' }}">
                    <option value="" selected>{{ __('label.no_role') }}</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                <x-error :name="$prefix.'role_id'" />
            </div>
        </section>
        <div class="flex justify-between items-center">
            <x-button class="form-button-primary form-button-small !mb-0 !w-24 max-w-full" type="submit" form="update">
                {{ __('button.Update') }}
            </x-button>
            <a class="button-link button-link-secondary" href="{{ route('dashboard.users') }}">
                {{ __('link.back') }}
            </a>
        </div>
    </x-form>
</x-box>
