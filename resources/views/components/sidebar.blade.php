<aside class="w-64 bg-white border-r">
    <div class="p-4 font-bold text-lg">
        Sistem Surat
    </div>

    <nav class="p-4 space-y-2 text-sm">

        @if (auth()->user()->role === 'pegawai')
            <x-sidebar.link route="pegawai.dashboard">
                Dashboard
            </x-sidebar.link>
            <x-sidebar.link route="surat.riwayat">
                Surat Saya
            </x-sidebar.link>
            <x-sidebar.link route="surat.pengajuan">
                Buat Surat
            </x-sidebar.link>
        @endif

        @if (auth()->user()->role === 'pejabat')
            <x-sidebar.link route="pejabat.dashboard">
                Dashboard
            </x-sidebar.link>
            <x-sidebar.link route="pejabat.surat.masuk">
                Surat Masuk
            </x-sidebar.link>
        @endif

    </nav>
</aside>
