<x-layouts.app title="Edit Pasien">
    <h1 class="mb-6 text-2xl font-bold text-slate-800">Edit Pasien</h1>

    <form method="POST" action="{{ route('pasien.update', $pasien) }}" class="max-w-2xl space-y-5 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
        @csrf
        @method('PUT')
        <div>
            <label for="nama" class="mb-1 block text-sm font-semibold">Nama</label>
            <input id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required class="input input-bordered w-full">
            @error('nama') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="alamat" class="mb-1 block text-sm font-semibold">Alamat</label>
            <textarea id="alamat" name="alamat" required class="textarea textarea-bordered w-full">{{ old('alamat', $pasien->alamat) }}</textarea>
            @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="grid gap-5 sm:grid-cols-2">
            <div>
                <label for="no_ktp" class="mb-1 block text-sm font-semibold">No. KTP</label>
                <input id="no_ktp" name="no_ktp" value="{{ old('no_ktp', $pasien->no_ktp) }}" required class="input input-bordered w-full">
                @error('no_ktp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <div>
                <label for="no_hp" class="mb-1 block text-sm font-semibold">No. HP</label>
                <input id="no_hp" name="no_hp" value="{{ old('no_hp', $pasien->no_hp) }}" required class="input input-bordered w-full">
                @error('no_hp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>
        <div>
            <label for="email" class="mb-1 block text-sm font-semibold">Email</label>
            <input id="email" name="email" type="email" value="{{ old('email', $pasien->email) }}" required class="input input-bordered w-full">
            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div>
            <label for="password" class="mb-1 block text-sm font-semibold">Password</label>
            <input id="password" name="password" type="password" required class="input input-bordered w-full">
            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
        <div class="flex gap-3">
            <button type="submit" class="btn bg-indigo-700 text-white hover:bg-indigo-800">Simpan Perubahan</button>
            <a href="{{ route('pasien.index') }}" class="btn btn-ghost">Batal</a>
        </div>
    </form>
</x-layouts.app>