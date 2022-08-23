<tr class="bg-white">
    <th scope="row" class="px-6 py-4 text-center">
        {{ $index }}
    </th>
    <td class="px-6 py-4">
        {{ $user->first_name }}
    </td>
    <td class="px-6 py-4">
        {{ $user->last_name }}
    </td>
    <td class="px-6 py-4 text-center">
        {{ $user->phone_number }}
    </td>
    <td class="px-6 py-4 text-left">
        {{ $user->email }}
    </td>
    <td class="px-6 py-4 flex justify-center items-center space-x-reverse space-x-1">
        <a href="{{ route('dashboard.users.edit', ['user' => $user->id]) }}">
            <svg class="icon w-6 h-6"><use xlink:href="#edit"/></svg>
        </a>
        <button type="button" wire:click="delete">
            <svg class="icon w-6 h-6 hover:stroke-red-500"><use xlink:href="#delete"/></svg>
        </button>
    </td>
</tr>
