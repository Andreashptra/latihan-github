<x-layouts.app title="Tambah Jadwal Periksa">
    <h1 class="mb-6 text-2xl font-bold text-slate-800">Tambah Jadwal Periksa</h1>

    <form method="POST" action="{{ route('jadwal-periksa.store') }}" class="max-w-2xl space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf
        <div>
            <label for="hari" class="mb-1 block text-sm font-semibold">Hari</label>
            <select id="hari" name="hari" required class="select select-bordered w-full">
                <option value="">Pilih hari</option>
                @foreach ($hariOptions as $hari)
                    <option value="{{ $hari }}" @selected(old('hari') === $hari)>{{ $hari }}</option>
                @endforeach
            </select>
            @error('hari') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="jam_mulai" class="mb-1 block text-sm font-semibold">Jam Mulai</label>
                <input id="jam_mulai" name="jam_mulai" type="time" value="{{ old('jam_mulai') }}" required class="input input-bordered w-full">
                @error('jam_mulai') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="jam_selesai" class="mb-1 block text-sm font-semibold">Jam Selesai</label>
                <input id="jam_selesai" name="jam_selesai" type="time" value="{{ old('jam_selesai') }}" required class="input input-bordered w-full">
                @error('jam_selesai') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <label for="status" class="mb-1 block text-sm font-semibold">Status</label>
            <select id="status" name="status" class="select select-bordered w-full">
                <option value="aktif" @selected(old('status', 'aktif') === 'aktif')>Aktif</option>
                <option value="nonaktif" @selected(old('status') === 'nonaktif')>Nonaktif</option>
            </select>
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn bg-[#2d4499] text-white hover:bg-[#1e2d6b]">Simpan</button>
            <a href="{{ route('jadwal-periksa.index') }}" class="btn btn-ghost">Batal</a>
        </div>
    </form>
</x-layouts.app>