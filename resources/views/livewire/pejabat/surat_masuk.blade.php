<div class="bg-white rounded shadow p-6">

    <h2 class="text-lg font-semibold mb-4">Surat Masuk</h2>

    <table class="w-full text-sm">
        <thead>
            <tr class="border-b">
                <th class="text-left p-3">Nomor</th>
                <th class="text-left">Judul</th>
                <th class="text-left">Tanggal</th>
                <th class="text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suratMasuk as $item)
                <tr class="border-b">
                    <td class="p-3">{{ $item->nomor_surat }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->tanggal_surat }}</td>
                    <td>
                        <button wire:click="openReview({{ $item->id_surat }})"
                            class="px-2 py-1 bg-blue-600 text-white rounded text-xs">
                            Tinjau
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-6 text-gray-500">
                        Tidak ada surat menunggu persetujuan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if ($showModal && $tinjauSurat)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-6xl h-[90vh] rounded shadow flex flex-col">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h3 class="font-semibold text-lg">Tinjau Surat</h3>
                    <button wire:click="$set('showModal', false)" class="text-red-600">✕</button>
                </div>

                <div class="flex-1 grid grid-cols-1 md:grid-cols-3 gap-4 p-6 overflow-hidden">
                    <div class="space-y-4">
                        <div>
                            <label class="text-sm font-medium">Keputusan</label>
                            <select wire:model="status" class="w-full border rounded p-2">
                                <option value="approved">Terima</option>
                                <option value="rejected">Tolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium">Catatan</label>
                            <textarea wire:model="catatan" rows="5" class="w-full border rounded p-2" placeholder="Wajib jika ditolak">
                    </textarea>
                        </div>
                        <button wire:click="submitReview" class="w-full py-2 bg-blue-600 text-white rounded">
                            Simpan Keputusan
                        </button>
                    </div>
                    <div class="md:col-span-2 border rounded overflow-hidden">
                        <iframe src="{{ route('pejabat.surat.preview', $tinjauSurat->id_surat) }}"
                            class="w-full h-full">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
