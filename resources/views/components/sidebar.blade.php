<aside class="w-64 min-h-screen bg-white border-r-2 border-gray-300">
    <div class="p-4 flex flex-col items-center">
        <img src="{{ asset('assets/LOGO_PJT.png') }}" class="h-14 mx-auto mb-3 drop-shadow-md" alt="Logo">
    </div>

    <nav class="p-4 space-y-2 text-sm">

        @if (auth()->user()->role === 'pegawai')
            <x-sidebar.link route="pegawai.dashboard" icon="ri-dashboard-line">
                Dashboard
            </x-sidebar.link>

            <x-sidebar.link route="pegawai.surat.riwayat" icon="ri-file-list-3-line">
                Riwayat Pengajuan
            </x-sidebar.link>

            <x-sidebar.link route="pegawai.surat.pengajuan" icon="ri-add-circle-line">
                Ajukan Surat
            </x-sidebar.link>
        @endif

        @if (auth()->user()->role === 'pejabat')
            <x-sidebar.link route="pejabat.dashboard" icon="ri-dashboard-line">
                Dashboard
            </x-sidebar.link>

            <x-sidebar.link route="pejabat.surat.masuk" icon="ri-inbox-line">
                Surat Masuk
            </x-sidebar.link>
        @endif

    </nav>

    <div class="px-4 py-4 border-t border-white/10">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                class="w-full flex items-center gap-3 px-4 py-2 rounded-lg
                       text-red-700 hover:text-red-300 transition font-semibold">
                <i class="ri-logout-box-r-line text-lg"></i>
                Logout
            </button>
        </form>
    </div>

</aside>
