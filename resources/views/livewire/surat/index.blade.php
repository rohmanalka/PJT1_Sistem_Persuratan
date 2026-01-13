<div>
    <div class="bg-white rounded-lg shadow p-6 border-b-2 border-gray-300">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-lg">Riwayat Pengajuan Terakhir</h3>

            <div class="flex items-center gap-3">
                <input type="text" wire:model.live="search" placeholder="Pencarian..."
                    class="border rounded px-3 py-2 text-sm" />

                <a wire:navigate href="{{ route('pegawai.surat.pengajuan') }}"
                    class="px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 font-semibold text-sm">
                    Ajukan Surat
                </a>
            </div>
        </div>


        <table class="w-full text-sm">
            <thead>
                <tr class="border-b-2 text-gray-600 border-gray-400">
                    <th class="text-left py-2">Judul</th>
                    <th class="text-left">Jenis</th>
                    <th class="text-left">Tanggal</th>
                    <th class="text-left">Status</th>
                    <th class="text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surat as $item)
                    <tr class="border-b border-gray-300">
                        <td class="py-3">{{ $item->nomor_surat }}</td>
                        <td>{{ $item->jenisSurat->nama ?? '-' }}</td>
                        <td>{{ $item->tanggal_surat }}</td>
                        <td>
                            <x-status_badge :status="$item->status" />
                        </td>
                        <td class="space-x-2">
                            <button wire:click="openModal({{ $item->id_surat }})"
                                class="px-2 py-1 rounded text-sm bg-blue-500 text-white">
                                Detail
                            </button>

                            @if ($item->status === 'draft')
                                <a wire:navigate href="{{ route('pegawai.surat.edit', $item->id_surat) }}"
                                    class="px-2 py-1 rounded text-sm bg-orange-500 text-white">
                                    Edit
                                </a>
                                <button wire:click="delete({{ $item->id_surat }})"
                                    wire:confirm="Yakin ingin menghapus surat ini?"
                                    class="px-2 py-1 rounded text-sm bg-red-500 text-white">
                                    Hapus
                                </button>
                            @endif
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
        <div class="mt-4">
            {{ $surat->links() }}
        </div>
    </div>

    @if ($detailSurat)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-6xl h-[90vh] rounded shadow flex flex-col">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h3 class="font-semibold text-lg">Detail Surat</h3>
                    <button wire:click="closeModal" class="p-2 rounded-full hover:bg-gray-100 text-red-600">✕</button>
                </div>
                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 p-6 overflow-hidden">
                    <div class="space-y-3 text-sm">
                        <div>
                            <p class="font-medium">Nomor Surat</p>
                            <p>{{ $detailSurat->nomor_surat }}</p>
                        </div>

                        <div>
                            <p class="font-medium">Jenis Surat</p>
                            <p>{{ $detailSurat->jenisSurat->nama ?? '-' }}</p>
                        </div>

                        <div>
                            <p class="font-medium">Tanggal</p>
                            <p>{{ $detailSurat->tanggal_surat }}</p>
                        </div>

                        <div>
                            <p class="font-medium">Status</p>
                            <x-status_badge :status="$detailSurat->status" />
                        </div>
                    </div>
                    <div class="md:col-span-2 border rounded overflow-hidden">
                        <iframe src="{{ route('pegawai.surat.pdf.preview', $detailSurat->id_surat) }}"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
