<x-box name="dashboard-content" :title="__('heading.Links')">
    @can('create-links')
        <x-slot:header-icon>
            <a href="{{ route('dashboard.links.create') }}">
                <svg class="icon w-6 h-6 !stroke-primary-500">
                    <use xlink:href="#add"/>
                </svg>
            </a>
        </x-slot:header-icon>
    @endcan
    <x-slot:header-search>
        <x-input name="search" model="debounce.250ms" type="text" maxlength="255">
            {{ __('label.search') }}
        </x-input>
    </x-slot:header-search>
    <table class="w-full">
        <thead class="text-primary-500 bg-primary-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.#') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('table.Title') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Slug') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Destination') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('table.Category') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('table.Number of clicks') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Actions') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($links as $index => $link)
            <livewire:dashboard.links.link-box :link="$link" :index="$links->firstItem() + $index" :wire:key="$link->id">
        @endforeach
        </tbody>
    </table>
    {{ $links->links() }}
</x-box>
