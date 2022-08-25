<x-box name="dashboard-content" :title="__('heading.Statistics')">
    <section class="mb-3">
        <h2 class="h5 mb-3">تعداد کلیک در</h2>
        <div class="flex flex-row items-center space-x-reverse space-x-2 text-white">
            <div class="bg-primary-600 w-full rounded-md p-2">
                <h3 class="h5">یک روز گذشته</h3>
                <div class="text-left">
                    <span>{{ $link->statistics()->where('created_at', '>', now()->subDay()->toDateTimeString())->get()->count() }}</span>
                    <span>کلیک</span>
                </div>
            </div>
            <div class="bg-primary-600 w-full rounded-md p-2">
                <h3 class="h5">هفت روز گذشته</h3>
                <div class="text-left">
                    <span>{{ $link->statistics()->where('created_at', '>', now()->subDays(7)->toDateTimeString())->get()->count() }}</span>
                    <span>کلیک</span>
                </div>
            </div>
            <div class="bg-primary-600 w-full rounded-md p-2">
                <h3 class="h5">یک ماه گذشته</h3>
                <div class="text-left">
                    <span>{{ $link->statistics()->where('created_at', '>', now()->subMonth()->toDateTimeString())->get()->count() }}</span>
                    <span>کلیک</span>
                </div>
            </div>
            <div class="bg-primary-600 w-full rounded-md p-2">
                <h3 class="h5">یک سال گذشته</h3>
                <div class="text-left">
                    <span>{{ $link->statistics()->where('created_at', '>', now()->subYear()->toDateTimeString())->get()->count() }}</span>
                    <span>کلیک</span>
                </div>
            </div>
        </div>
    </section>

    <h2 class="h5 mb-3">نمایش نمودار بر اساس</h2>
    <x-form wire:submit.prevent="update" class="flex flex-col sm:flex-row sm:space-x-reverse sm:space-x-3 items-center max-w-3xl">
        <div class="w-full">
            <select class="form-select" aria-label="{{ __('label.link_code') }}"
                    wire:model.defer="statistics">
                @foreach(trans('statistics') as $value => $text)
                    <option value="{{ $value }}">{{ $text }}</option>
                @endforeach
            </select>
            <x-error name="statistics"/>
        </div>
        <div class="w-full">
            <select class="form-select" aria-label="{{ __('label.link_code') }}"
                    wire:model.defer="period">
                @foreach(trans('period') as $value => $text)
                    <option value="{{ $value }}">{{ $text }}</option>
                @endforeach
            </select>
            <x-error name="period"/>
        </div>
        <x-button class="form-button-primary !w-24 max-w-full" type="submit" form="update">
            {{ __('button.Update') }}
        </x-button>
    </x-form>

    <section>
        <canvas id="statisticsChart" class="w-full h-96"></canvas>
    </section>
</x-box>
