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
                                class="px-2 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200">
                                <i class="ri-eye-line text-lg"></i>
                            </button>

                            @if ($item->status === 'draft')
                                <a wire:navigate href="{{ route('pegawai.surat.edit', $item->id_surat) }}"
                                    class="px-2 py-2 rounded bg-orange-500 text-white hover:bg-orange-600 transition duration-200">
                                    <i class="ri-edit-line text-lg"></i>
                                </a>
                                <button wire:click="delete({{ $item->id_surat }})"
                                    wire:confirm="Yakin ingin menghapus surat ini?"
                                    class="px-2 py-1 rounded bg-red-500 text-white hover:bg-red-600 transition duration-200">
                                    <i class="ri-delete-bin-line text-lg"></i>
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
            <div class="bg-white w-full max-w-4xl h-[90vh] rounded shadow flex flex-col">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h3 class="font-semibold text-lg">Detail Surat</h3>
                    <button wire:click="closeModal" class="p-2 rounded-full hover:bg-gray-100 text-red-600">✕</button>
                </div>
                <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm border-b">
                    <div class="space-y-2">
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Nomor Surat</span>
                            <span class="text-gray-800 font-semibold">{{ $detailSurat->nomor_surat }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Jenis Surat</span>
                            <span class="text-gray-800 font-semibold">{{ $detailSurat->jenisSurat->nama ?? '-' }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Tanggal</span>
                            <span class="text-gray-800 font-semibold">{{ $detailSurat->tanggal_surat }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Status</span>
                            <x-status_badge :status="$detailSurat->status" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Catatan Penolakan</span>
                            <span class="text-gray-800 font-semibold">
                                {{ $detailSurat->catatan ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 flex-1 min-h-0">
                    <div class="w-full h-full border rounded">
                        <iframe src="{{ route('pegawai.surat.pdf.preview', $detailSurat->id_surat) }}"
                            class="w-full h-full border-none">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
