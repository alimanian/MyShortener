<tr class="bg-white">
    <th scope="row" class="px-6 py-4 text-center">
        {{ $index }}
    </th>
    <td class="px-6 py-4">
        {{ $link->title }}
    </td>
    <td class="px-6 py-4 text-left ltr">
        <a href="{{ url($link->slug) }}">
            {{ Str::limit($link->slug, 25) }}
        </a>
    </td>
    <td class="px-6 py-4 text-left ltr">
        <a href="{{ $link->destination }}">
            {{ Str::limit($link->destination, 25) }}
        </a>
    </td>
    <td class="px-6 py-4">
        {{ $link->category->title ?? 'بدون دسته‌بندی' }}
    </td>
    <td class="px-6 py-4">
        {{ $link->statistics()->count() }}
    </td>
    <td class="px-6 py-4 flex justify-center items-center space-x-reverse space-x-1">
        @can('statistics-links')
            <a href="{{ route('dashboard.links.statistics', ['link' => $link->id]) }}">
                <svg class="icon w-6 h-6">
                    <use xlink:href="#chart"/>
                </svg>
            </a>
        @endcan
        @can('qrcode-links')
            <div x-data="{show:false}">
                <div class="cursor-pointer">
                    <svg class="icon w-6 h-6 hover:stroke-green-600"
                         @click="generateQrCode('{{url($link->slug)}}','qr-code-{{$link->id}}');show = !show">
                        <use xlink:href="#scan"/>
                    </svg>
                    <div x-show="show"
                         class="cursor-default rounded-md fixed bg-white z-50 left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 border border-neutral-200 p-2">
                        <div id="qr-code-{{$link->id}}"></div>
                        <a id="qr-download-{{$link->id}}" @click="downloadQrCode('{{$link->id}}')"
                           download="{{ $link->slug }}"
                           class="block bg-primary-500 text-sm py-2 w-full text-center text-white rounded cursor-pointer">
                            دانلود
                        </a>
                    </div>
                </div>
                <div x-show="show" @click="show = !show"
                     class="fixed w-full inset-0 min-h-screen h-full bg-black/20 z-40 cursor-pointer"></div>
            </div>
        @endcan
        @can('update-links')
            <a href="{{ route('dashboard.links.edit', ['link' => $link->id]) }}">
                <svg class="icon w-6 h-6">
                    <use xlink:href="#edit"/>
                </svg>
            </a>
        @endcan
        @can('delete-links')
            <button type="button" wire:click="delete">
                <svg class="icon w-6 h-6 hover:stroke-red-500">
                    <use xlink:href="#delete"/>
                </svg>
            </button>
        @endcan
    </td>
</tr>
