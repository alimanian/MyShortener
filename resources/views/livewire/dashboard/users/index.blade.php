<div>
    <div>
        <div class="relative overflow-x-auto rounded-lg border border-neutral-200">
            <div class="p-4 flex justify-between items-center bg-white">
                <div class="flex items-center space-x-reverse space-x-2">
                    <h1 class="h3 text-neutral-700">کاربران</h1>
                    <a href="{{ route('dashboard.users.create') }}">
                        <svg class="icon w-6 h-6 !stroke-primary-500"><use xlink:href="#add"/></svg>
                    </a>
                </div>
                <div>
                    Search Input
                </div>
            </div>
            <table class="w-full">
                <thead class="text-primary-500 bg-primary-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام
                    </th>
                    <th scope="col" class="px-6 py-3">
                        نام خانوادگی
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        شماره موبایل
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        ایمیل
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        اقدامات
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $index => $user)
                    <livewire:dashboard.users.user-box :user="$user" :index="$index" :wire:key="$user['id']">
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
