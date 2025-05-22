@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Record Persiapan</h5>
                    <a href="{{ route('preparation.create') }}" class="btn btn-primary">Add New Preparation</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Produksi</th>
                                    <th>Susu (L)</th>
                                    <th>Rennet (g)</th>
                                    <th>Asam Sitrat (ml)</th>
                                    <th>Garam (g)</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($preparations as $preparation)
                                    <tr>
                                        <td>{{ $preparation->production_date->translatedFormat('d F Y') }}</td>
                                        <td>{{ number_format($preparation->milk_qty, 2, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->rennet_qty, 2, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->citric_acid_qty, 2, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->salt_qty, 2, ',', '.') }}</td>
                                        <td>{{ $preparation->notes }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('preparation.edit', $preparation) }}" 
                                                   class="btn btn-sm btn-warning">Edit</a>
                                                
                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal{{ $preparation->id }}">
                                                    Hapus
                                                </button>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $preparation->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $preparation->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $preparation->id }}">Konfirmasi Hapus</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus data persiapan tanggal {{ $preparation->production_date->translatedFormat('d F Y') }}?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <form action="{{ route('preparation.destroy', $preparation) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Tidak ada data persiapan ditemukan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 