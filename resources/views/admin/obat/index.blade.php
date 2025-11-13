
<x-layouts.app title="Data Obat">
    <div class="container-fluid px-4 mt-4">
        <div class="row">
            <div class="col-lg-12">

                {{-- ALERT FLASH MESSAGE --}}
                @if (session('message'))
                    <div class="alert alert-{{ session('type', 'success') }} alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="mb-4">Data Obat</h1>

                <a href="{{ route('obat.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Tambah Obat
                </a>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Nama Obat</th>
                                <th>Kemasan</th>
                                <th>Harga</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($obats as $obat)
                                <tr>
                                    <td>{{ $obat->id }}</td>
                                    <td>{{ $obat->nama_obat }}</td>
                                    <td>{{ $obat->kemasan }}</td>
                                    <td>{{ number_format($obat->harga, 0, ',', '.') }}</td>
                                    <td>
                                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit">Edit</i>
                                        </a>
                                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">
                                                <i class="fas fa-trash">Hapus</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada data obat.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                setTimeout(() => alert.remove(), 500);
            }
        }, 2000);
    </script>
</x-layouts.app>