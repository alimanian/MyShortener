<x-box name="dashboard-content" :title="__('heading.Edit Link')">
    <x-form wire:submit.prevent="update" class="w-full">
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input class="ltr text-left" :name="$prefix.'destination'" type="text" maxlength="255" autofocus>
                {{ __('label.destination') }}
            </x-input>
            <x-input class="ltr text-left" :name="$prefix.'slug'" type="text" maxlength="255">
                {{ __('label.link_slug') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'title'" type="text" maxlength="255" autofocus>
                {{ __('label.link_title') }}
            </x-input>
            <div class="w-full">
                <select class="form-select" aria-label="{{ __('label.link_category') }}" wire:model.defer="{{ $prefix.'category_id' }}">
                    <option value="" selected>{{ __('label.uncategorized') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
                <x-error :name="$prefix.'category_id'" />
            </div>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3 items-center">
            <div class="w-full">
                <select class="form-select" aria-label="{{ __('label.link_code') }}" wire:model.defer="{{ $prefix.'code' }}">
                    @foreach(trans('code') as $code => $text)
                        <option value="{{ $code }}">{{ $text }}</option>
                    @endforeach
                </select>
                <x-error :name="$prefix.'code'" />
            </div>
            <x-input :name="$prefix.'is_active'" type="checkbox">
                {{ __('label.link_is_active') }}
            </x-input>
        </section>
        <section class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3">
            <x-input :name="$prefix.'description'" type="textarea" rows="3">
                {{ __('label.link_description') }}
            </x-input>
        </section>
        <div class="flex justify-between items-center">
            <x-button class="form-button-primary form-button-small !mb-0 !w-24 max-w-full" type="submit" form="update">
                {{ __('button.Update') }}
            </x-button>
            <a class="button-link button-link-secondary" href="{{ route('dashboard.links') }}">
                {{ __('link.back') }}
            </a>
        </div>
    </x-form>
</x-box>
