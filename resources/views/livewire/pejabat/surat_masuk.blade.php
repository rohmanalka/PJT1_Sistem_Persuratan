<div>
    <div class="bg-white rounded-lg shadow p-6 border-b-2 border-gray-300">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-lg">Surat Masuk</h3>
            <div class="flex items-center gap-3">
                <input type="text" wire:model.live="search" placeholder="Pencarian..."
                    class="border rounded px-3 py-2 text-sm" />
            </div>
        </div>

        @if (session()->has('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full text-sm">
            <thead>
                <tr class="border-b-2 text-gray-600 border-gray-400">
                    <th class="text-left py-2">Nomor Surat</th>
                    <th class="text-left">Judul</th>
                    <th class="text-left">Tanggal</th>
                    <th class="text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suratMasuk as $item)
                    <tr class="border-b border-gray-300">
                        <td class="py-3">{{ $item->nomor_surat }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->tanggal_surat }}</td>
                        <td class="space-x-2">
                            <button wire:click="openReview({{ $item->id_surat }})"
                                class="px-2 py-1 rounded bg-blue-500 text-white hover:bg-blue-600 transition duration-200">
                                <i class="ri-eye-line text-lg"></i> Tinjau
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">
                            Tidak ada surat menunggu persetujuan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $suratMasuk->links() }}
        </div>
    </div>

    @if ($showModal && $tinjauSurat)
        <div class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-4xl h-[90vh] rounded shadow flex flex-col overflow-hidden">
                <div class="flex justify-between items-center px-6 py-4 border-b">
                    <h3 class="font-semibold text-lg">Tinjau Surat</h3>
                    <button wire:click="$set('showModal', false)"
                        class="p-2 rounded-full hover:bg-gray-100 text-red-600">✕</button>
                </div>

                <div class="px-6 py-4 grid grid-cols-1 md:grid-cols-2 gap-6 text-sm border-b">
                    <div class="space-y-2">
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Nomor Surat</span>
                            <span class="text-gray-800 font-semibold">{{ $tinjauSurat->nomor_surat }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Judul</span>
                            <span class="text-gray-800 font-semibold">{{ $tinjauSurat->judul }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Tanggal</span>
                            <span class="text-gray-800 font-semibold">{{ $tinjauSurat->tanggal_surat }}</span>
                        </div>
                        <div class="flex gap-2">
                            <span class="text-gray-600 font-bold w-32">Status</span>
                            <x-status_badge :status="$tinjauSurat->status" />
                        </div>
                    </div>
                    <div class="space-y-2">
                        <div>
                            <label class="text-sm font-medium">Keputusan</label>
                            <select wire:model="status" class="w-full border rounded p-2">
                                <option value="approved">Terima</option>
                                <option value="rejected">Tolak</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm font-medium">Catatan</label>
                            <textarea wire:model="catatan" rows="3" class="w-full border rounded p-2" placeholder="Wajib jika ditolak"></textarea>
                        </div>
                        <button wire:click="submitReview" class="w-full py-2 bg-blue-600 text-white rounded">
                            Simpan Keputusan
                        </button>
                    </div>
                </div>

                <div class="px-6 py-4 flex-1 overflow-hidden">
                    <div class="w-full h-full border rounded overflow-hidden">
                        <iframe src="{{ route('pejabat.surat.preview', $tinjauSurat->id_surat) }}"
                            class="w-full h-full border-none"></iframe>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
