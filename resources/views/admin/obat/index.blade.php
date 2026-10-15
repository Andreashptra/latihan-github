<x-layouts.app title="Manajemen Obat">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-slate-800">Data Obat</h1>
        <a href="{{ route('obat.create') }}" class="btn bg-[#2d4499] text-white hover:bg-[#1e2d6b]">
            <i class="fas fa-plus"></i>
            Tambah Obat
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="table table-zebra w-full">
            <thead class="bg-slate-100 text-xs uppercase text-slate-500">
                <tr>
                    <th>Nama Obat</th>
                    <th>Kemasan</th>
                    <th>Harga</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($obats as $obat)
                    <tr>
                        <td class="font-semibold">{{ $obat->nama_obat }}</td>
                        <td>{{ $obat->kemasan }}</td>
                        <td>Rp {{ number_format((float) $obat->harga, 0, ',', '.') }}</td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('obat.edit', $obat) }}" class="btn btn-sm bg-amber-500 text-white hover:bg-amber-600">Edit</a>
                                <form method="POST" action="{{ route('obat.destroy', $obat) }}"
                                    onsubmit="return confirm('Hapus data obat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-red-600 text-white hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-10 text-center text-slate-500">Belum ada data obat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>