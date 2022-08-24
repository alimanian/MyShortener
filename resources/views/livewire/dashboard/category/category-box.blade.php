<tr class="bg-white">
    <th scope="row" class="px-6 py-4 text-center">
        {{ $index }}
    </th>
    <td class="px-6 py-4">
        {{ $category->title }}
    </td>
    <td class="px-6 py-4">
        {{ $category->slug }}
    </td>
    <td class="px-6 py-4">
        {{ $category->description }}
    </td>
    <td class="px-6 py-4 flex justify-center items-center space-x-reverse space-x-1">
        @can('update-categories')
            <a href="{{ route('dashboard.categories.edit', ['category' => $category->id]) }}">
                <svg class="icon w-6 h-6">
                    <use xlink:href="#edit"/>
                </svg>
            </a>
        @endcan
        @can('delete-categories')
            <button type="button" wire:click="delete">
                <svg class="icon w-6 h-6 hover:stroke-red-500">
                    <use xlink:href="#delete"/>
                </svg>
            </button>
        @endcan
    </td>
</tr>
