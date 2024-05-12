<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Pegawai</x-nav-link>
                        <x-nav-link href="/menu" :active="request()->is('menu')">Menu</x-nav-link>
                        <x-nav-link href="/meja" :active="request()->is('meja')">Meja</x-nav-link>
                        <x-nav-link href="/order" :active="request()->is('order')">Order</x-nav-link>

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
