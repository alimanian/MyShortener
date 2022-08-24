<x-box name="dashboard-content" :title="__('heading.Edit Category')">
    <x-form wire:submit.prevent="update" class="w-full">
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'title'" type="text" maxlength="255" autofocus>
                {{ __('label.title') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'slug'" type="text" maxlength="255">
                {{ __('label.slug') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'description'" type="textarea" rows="3">
                {{ __('label.description') }}
            </x-input>
        </section>
        <div class="flex justify-between items-center">
            <x-button class="form-button-primary form-button-small !mb-0 !w-24 max-w-full" type="submit" form="update">
                {{ __('button.Update') }}
            </x-button>
            <a class="button-link button-link-secondary" href="{{ route('dashboard.categories') }}">
                {{ __('link.back') }}
            </a>
        </div>
    </x-form>
</x-box>
