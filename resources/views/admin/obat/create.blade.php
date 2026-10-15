<x-layouts.app title="Tambah Obat">
    <h1 class="mb-6 text-2xl font-bold text-slate-800">Tambah Obat</h1>

    <form method="POST" action="{{ route('obat.store') }}" class="max-w-2xl space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf
        <div>
            <label for="nama_obat" class="mb-1 block text-sm font-semibold">Nama Obat</label>
            <input id="nama_obat" name="nama_obat" value="{{ old('nama_obat') }}" required class="input input-bordered w-full">
            @error('nama_obat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="kemasan" class="mb-1 block text-sm font-semibold">Kemasan</label>
            <input id="kemasan" name="kemasan" value="{{ old('kemasan') }}" placeholder="Contoh: strip, botol, tablet" required class="input input-bordered w-full">
            @error('kemasan') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="harga" class="mb-1 block text-sm font-semibold">Harga</label>
            <input id="harga" name="harga" type="number" min="0" step="0.01" value="{{ old('harga') }}" required class="input input-bordered w-full">
            @error('harga') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn bg-[#2d4499] text-white hover:bg-[#1e2d6b]">Simpan</button>
            <a href="{{ route('obat.index') }}" class="btn btn-ghost">Batal</a>
        </div>
    </form>
</x-layouts.app>