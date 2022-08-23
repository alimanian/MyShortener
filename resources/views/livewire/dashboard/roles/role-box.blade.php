<tr class="bg-white">
    <th scope="row" class="px-6 py-4 text-center">
        {{ $index }}
    </th>
    <td class="px-6 py-4">
        {{ $role->name }}
    </td>
    <td class="px-6 py-4">
        {{ $role->label }}
    </td>
    <td class="px-6 py-4 flex justify-center items-center space-x-reverse space-x-1">
        @can('update-roles')
            <a href="{{ route('dashboard.roles.edit', ['role' => $role->id]) }}">
                <svg class="icon w-6 h-6">
                    <use xlink:href="#edit"/>
                </svg>
            </a>
        @endcan
        @can('delete-roles')
            <button type="button" wire:click="delete">
                <svg class="icon w-6 h-6 hover:stroke-red-500">
                    <use xlink:href="#delete"/>
                </svg>
            </button>
        @endcan
    </td>
</tr>
