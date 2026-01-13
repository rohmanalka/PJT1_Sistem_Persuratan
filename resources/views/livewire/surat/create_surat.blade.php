<div class="max-w-5xl bg-white p-6 rounded shadow border-b-2 border-gray-300">
    <h2 class="text-lg font-semibold mb-6">
        Pengajuan Surat
    </h2>
    <form wire:submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Jenis Surat</label>
                <select wire:model="id_jenis_surat" class="w-full border rounded p-2">
                    <option value="">-- Pilih Jenis Surat --</option>
                    @foreach ($jenisSurat as $jenis)
                        <option value="{{ $jenis->id_jenis_surat }}">
                            {{ $jenis->nama }}
                        </option>
                    @endforeach
                </select>
                @error('id_jenis_surat')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="text-sm font-medium">Judul Surat</label>
                <input type="text" wire:model="judul" class="w-full border rounded p-2"
                    placeholder="Contoh: Permohonan Izin Cuti">
                @error('judul')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="text-sm font-medium">Tanggal Surat</label>
                <input type="date" wire:model="tanggal_surat" class="w-full border rounded p-2">
                @error('tanggal_surat')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <input type="text" value="Otomatis setelah disimpan" disabled
                    class="w-full border rounded p-2 bg-gray-100 text-gray-500" hidden>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Isi Surat</label>
                <textarea wire:model="isi" rows="10" class="w-full border rounded p-2"
                    placeholder="Tuliskan isi surat secara lengkap dan formal..."></textarea>
                @error('isi')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="md:col-span-2 flex justify-end gap-2 pt-4">
            <a wire:navigate href="{{ route('pegawai.surat.riwayat') }}" class="px-4 py-2 rounded border">
                Batal
            </a>
            <button type="button" wire:click="simpan"
                class="bg-blue-600 text-white text-sm font-medium px-2.5 py-1.5 rounded">
                Simpan
            </button>
            <button type="submit" class="bg-blue-600 text-white text-sm font-medium px-2.5 py-1.5 rounded">
                Kirim Surat
            </button>
        </div>
    </form>
</div>
