@extends('layouts.app')

@section('title', 'Persiapan')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Record Persiapan</h5>
                    <a href="{{ route('preparation.create') }}" class="btn btn-primary">Buat Persiapan</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('milk.png') }}" alt="Susu" class="img-fluid mb-2" style="max-height: 150px;">
                            <h5>Susu Segar</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('renet.png') }}" alt="Rennet" class="img-fluid mb-2" style="max-height: 150px;">
                            <h5>Rennet</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('citric-acid.png') }}" alt="Asam Sitrat" class="img-fluid mb-2" style="max-height: 150px;">
                            <h5>Asam Sitrat</h5>
                        </div>
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('salt.png') }}" alt="Garam" class="img-fluid mb-2" style="max-height: 150px;">
                            <h5>Garam</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Tanggal Produksi</th>
                                    <th>Susu (L)</th>
                                    <th>Rennet (ml)</th>
                                    <th>Asam Sitrat (ml)</th>
                                    <th>Garam (g)</th>
                                    <th>Catatan</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($preparations as $preparation)
                                    <tr>
                                        <td>{{ $preparation->production_date->translatedFormat('d F Y') }}</td>
                                        <td>{{ number_format($preparation->milk_qty, 0, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->rennet_qty, 0, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->citric_acid_qty, 0, ',', '.') }}</td>
                                        <td>{{ number_format($preparation->salt_qty, 0, ',', '.') }}</td>
                                        <td>{{ $preparation->notes }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('process.startup.show', $preparation) }}" 
                                                   class="btn btn-sm btn-success">
                                                    Mulai Proses
                                                </a>
                                                <button type="button" 
                                                        class="btn btn-sm btn-info" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#infoModal{{ $preparation->id }}">
                                                    Info
                                                </button>
                                                <a href="{{ route('preparation.edit', $preparation) }}" 
                                                   class="btn btn-sm btn-warning">Edit</a>
                                                
                                                <button type="button" 
                                                        class="btn btn-sm btn-danger" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#deleteModal{{ $preparation->id }}">
                                                    Hapus
                                                </button>
                                            </div>

                                            <!-- Info Modal -->
                                            <div class="modal fade" id="infoModal{{ $preparation->id }}" tabindex="-1" aria-labelledby="infoModalLabel{{ $preparation->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="infoModalLabel{{ $preparation->id }}">Detail Persiapan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>Tanggal Produksi</th>
                                                                    <td>{{ $preparation->production_date->translatedFormat('d F Y') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Susu (L)</th>
                                                                    <td>{{ number_format($preparation->milk_qty, 0, ',', '.') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Rennet (ml)</th>
                                                                    <td>{{ number_format($preparation->rennet_qty, 0, ',', '.') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Asam Sitrat (ml)</th>
                                                                    <td>{{ number_format($preparation->citric_acid_qty, 0, ',', '.') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Garam (g)</th>
                                                                    <td>{{ number_format($preparation->salt_qty, 0, ',', '.') }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Catatan</th>
                                                                    <td>{{ $preparation->notes ?: '-' }}</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
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