<aside class="w-64 bg-white border-r">
    <div class="p-4 font-bold text-lg">
        Sistem Surat
    </div>

    <nav class="p-4 space-y-2 text-sm">

        @if (auth()->user()->role === 'pegawai')
            <x-sidebar.link href="pegawai/dashboard">
                Dashboard
            </x-sidebar.link>
            <x-sidebar.link href="/surat">
                Surat Saya
            </x-sidebar.link>
            <x-sidebar.link href="/surat/create">
                Buat Surat
            </x-sidebar.link>
        @endif

        @if (auth()->user()->role === 'pejabat')
            <x-sidebar.link href="pejabat/dashboard">
                Dashboard
            </x-sidebar.link>
            <x-sidebar.link href="/surat/masuk">
                Surat Masuk
            </x-sidebar.link>
        @endif

    </nav>
</aside>
