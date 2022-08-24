<x-box name="dashboard-content" :title="__('heading.Categories')">
    @can('create-categories')
        <x-slot:header-icon>
            <a href="{{ route('dashboard.categories.create') }}">
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
            <th scope="col" class="px-6 py-3">
                {{ __('table.Slug') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('table.Description') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Actions') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $index => $category)
            <livewire:dashboard.categories.category-box :category="$category" :index="$categories->firstItem() + $index" :wire:key="$category->id">
        @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
</x-box>
