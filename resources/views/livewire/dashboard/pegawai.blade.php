<div class="space-y-6">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white rounded-lg shadow p-5 border-b-5 border-yellow-400">
            <p class="text-sm text-gray-500">Pending</p>
            <p class="text-2xl font-bold text-gray-800">{{ $pending }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5 border-b-5 border-green-500">
            <p class="text-sm text-gray-500">Disetujui</p>
            <p class="text-2xl font-bold text-gray-800">{{ $approved }}</p>
        </div>
        <div class="bg-white rounded-lg shadow p-5 border-b-5 border-red-500">
            <p class="text-sm text-gray-500">Ditolak</p>
            <p class="text-2xl font-bold text-gray-800">{{ $rejected }}</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 border-b-2 border-gray-300">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-lg">Riwayat Pengajuan Terakhir</h3>
            <button>
                <a href="{{ route('pegawai.surat.riwayat') }}"
                    class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-medium text-sm">
                    Lihat Semua
                </a>
            </button>
        </div>

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b-2 text-gray-600 border-gray-400">
                    <th class="text-left py-2">Nomor</th>
                    <th class="text-left">Jenis</th>
                    <th class="text-left">Tanggal</th>
                    <th class="text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($riwayatSurat as $item)
                    <tr class="border-b border-gray-300">
                        <td class="py-3">{{ $item->nomor_surat }}</td>
                        <td>{{ $item->jenisSurat->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal_surat }}</td>
                        <td>
                            <x-status_badge :status="$item->status" />
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            Belum ada pengajuan surat
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
