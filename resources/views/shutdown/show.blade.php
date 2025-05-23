@extends('layouts.app')

@section('title', 'Proses Shutdown')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row mb-4 justify-content-center text-center">
        <div class="col-md-10">
            <h1 class="display-6 fw-bold">Proses Shutdown</h1>
            <p class="text-muted">Berikut adalah tahapan proses shutdown dan data produk akhir.</p>
        </div>
    </div>

    <!-- Production Data Card -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white rounded-top">
                    <h5 class="mb-0">Data Persiapan Produksi</h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3">
                            <p class="mb-1"><strong>Tanggal Produksi:</strong></p>
                            <p>{{ $preparation->production_date->translatedFormat('d F Y') }}</p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-1"><strong>Susu:</strong></p>
                            <p>{{ number_format($preparation->milk_qty, 0, ',', '.') }} L</p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-1"><strong>Rennet:</strong></p>
                            <p>{{ number_format($preparation->rennet_qty, 0, ',', '.') }} ml</p>
                        </div>
                        <div class="col-md-3">
                            <p class="mb-1"><strong>Asam Sitrat:</strong></p>
                            <p>{{ number_format($preparation->citric_acid_qty, 0, ',', '.') }} ml</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shutdown Steps -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-danger text-white rounded-top">
                    <h5 class="mb-0">Tahapan Shutdown</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Angkat curd yang telah selesai diproses.</li>
                        <li class="list-group-item px-0 py-2">Pastikan semua panel kontrol dalam kondisi OFF.</li>
                        <li class="list-group-item px-0 py-2">Cabut kabel alat dari stop kontak.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Final Product Data -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white rounded-top d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Produk Akhir</h5>
                    @if(!$shutdown)
                        <a href="{{ route('shutdown.create', $preparation) }}" class="btn btn-light btn-sm" aria-label="Tambah data produk akhir">
                            Tambah Data
                        </a>
                    @else
                        <a href="{{ route('shutdown.edit', $preparation) }}" class="btn btn-light btn-sm" aria-label="Edit data produk akhir">
                            Edit Data
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    @if($shutdown)
                        <div class="row g-4">
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Berat Keju:</strong></p>
                                <p>{{ number_format($shutdown->cheese_weight, 0, ',', '.') }} <small class="text-muted">gram</small></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Volume Whey:</strong></p>
                                <p>{{ number_format($shutdown->whey_volume, 1, ',', '.') }} <small class="text-muted">Liter</small></p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-1"><strong>Analisa Akhir:</strong></p>
                                <p>{{ $shutdown->final_analysis }}</p>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4 bg-light rounded">
                            <p class="text-muted mb-0">Belum ada data produk akhir. Silakan tambahkan data untuk melanjutkan.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="text-center mt-5">
        <a href="{{ route('startup.show', $preparation) }}" class="btn btn-outline-secondary btn-lg px-4 me-2" aria-label="Kembali ke halaman startup">
            Kembali ke Startup
        </a>
        <a href="{{ route('preparation.index') }}" class="btn btn-outline-secondary btn-lg px-4" aria-label="Kembali ke daftar persiapan produksi">
            Kembali ke Daftar Persiapan
        </a>
    </div>
</div>

<style>
.card {
    transition: transform 0.3s ease;
    border-radius: 0.5rem;
}

.card:hover {
    transform: translateY(-5px);
}

.card-header {
    font-weight: 600;
    display: flex;
    align-items: center;
}

.list-group-item {
    font-size: 0.875rem;
    padding: 0.5rem 1rem;
    border: none;
}

.badge {
    font-size: 0.8rem;
    padding: 0.35rem 0.6rem;
}

/* Optional Print Styles */
@media print {
    body * {
        visibility: hidden;
    }
    .container, .container * {
        visibility: visible;
    }
    .container {
        position: absolute;
        left: 0;
        top: 0;
    }
    .btn {
        display: none;
    }
}
</style>
@endsection