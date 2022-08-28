<x-box name="dashboard-content" :title="__('heading.Users')">
    @can('create-users')
        <x-slot:header-icon>
            <a href="{{ route('dashboard.users.create') }}">
                <svg class="icon w-6 h-6 !stroke-primary-500">
                    <use xlink:href="#add"/>
                </svg>
            </a>
        </x-slot:header-icon>
    @endcan
    <x-slot:header-search class="test">
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
                {{ __('table.First Name') }}
            </th>
            <th scope="col" class="px-6 py-3">
                {{ __('table.Last Name') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Phone Number') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Role') }}
            </th>
            <th scope="col" class="px-6 py-3 text-center">
                {{ __('table.Actions') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <livewire:dashboard.users.user-box :user="$user" :index="$users->firstItem() + $index" :wire:key="$user['id']">
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
</x-box>
{{--<div>

</div>--}}
