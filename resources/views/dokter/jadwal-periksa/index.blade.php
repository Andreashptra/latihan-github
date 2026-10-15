<x-layouts.app title="Jadwal Periksa">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-slate-800">Jadwal Periksa</h1>
        <a href="{{ route('jadwal-periksa.create') }}" class="btn bg-[#2d4499] text-white hover:bg-[#1e2d6b]">
            <i class="fas fa-plus"></i>
            Tambah Jadwal
        </a>
    </div>

    <div class="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="table table-zebra w-full">
            <thead class="bg-slate-100 text-xs uppercase text-slate-500">
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Status</th>
                    <th class="text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwals as $jadwal)
                    <tr>
                        <td class="font-semibold">{{ $jadwal->hari }}</td>
                        <td>{{ substr($jadwal->jam_mulai, 0, 5) }}</td>
                        <td>{{ substr($jadwal->jam_selesai, 0, 5) }}</td>
                        <td>
                            <span class="badge {{ $jadwal->status === 'aktif' ? 'badge-success' : 'badge-ghost' }}">
                                {{ ucfirst($jadwal->status) }}
                            </span>
                        </td>
                        <td>
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('jadwal-periksa.edit', $jadwal) }}" class="btn btn-sm bg-amber-500 text-white hover:bg-amber-600">Edit</a>
                                <form method="POST" action="{{ route('jadwal-periksa.destroy', $jadwal) }}"
                                    onsubmit="return confirm('Hapus jadwal ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm bg-red-600 text-white hover:bg-red-700">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-slate-500">Belum ada jadwal periksa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.app>