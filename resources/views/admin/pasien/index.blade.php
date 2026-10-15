<x-layouts.app title="Manajemen Pasien">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-slate-800">Data Pasien</h1>
        <a href="{{ route('pasien.create') }}" class="btn bg-[#2d4499] text-white hover:bg-[#1e2d6b]">
            <i class="fas fa-plus"></i>
            Tambah Pasien
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="table table-zebra w-full">
            <thead class="bg-slate-100 text-xs uppercase text-slate-500">
                <tr>
                    <th>Nama Pasien</th>
                    <th>Email</th>
                    <th>No. KTP</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pasiens as $pasien)
                    <tr>
                        <td class="font-semibold">{{ $pasien->nama }}</td>
                        <td>{{ $pasien->email }}</td>
                        <td>{{ $pasien->no_ktp ?? '-' }}</td>
                        <td>{{ $pasien->no_hp ?? '-' }}</td>
                        <td>{{ $pasien->alamat ?? '-' }}</td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('pasien.edit', $pasien) }}" class="btn btn-sm bg-amber-500 text-white hover:bg-amber-600">Edit</a>
                                <form method="POST" action="{{ route('pasien.destroy', $pasien) }}"
                                    onsubmit="return confirm('Hapus data pasien ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-red-600 text-white hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-10 text-center text-slate-500">Belum ada data pasien.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>