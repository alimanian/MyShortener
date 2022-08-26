<x-box name="dashboard-content" :title="__('heading.Add Role')">
    <x-form wire:submit.prevent="create" class="w-full">
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'name'" type="text" maxlength="255" autofocus>
                {{ __('label.name') }}
            </x-input>
            <x-input :name="$prefix.'label'" type="text" maxlength="255">
                {{ __('label.label') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <fieldset class="grid grid-cols-4 w-full mb-3">
                <legend class="mb-2 text-neutral-700">{{ __('label.permissions') }}</legend>
                @foreach($permissions as $index => $permission)
                    <x-input :name="$prefix.'permissions.'.$permission->id" type="checkbox">
                        {{ $permission->label }}
                    </x-input>
                @endforeach
            </fieldset>
        </section>
        <div class="flex justify-between items-center">
            <x-button class="form-button-primary form-button-small !mb-0 !w-24 max-w-full" type="submit" form="create">
                {{ __('button.Add') }}
            </x-button>
            <a class="button-link button-link-secondary" href="{{ route('dashboard.roles') }}">
                {{ __('link.back') }}
            </a>
        </div>
    </x-form>
</x-box>
