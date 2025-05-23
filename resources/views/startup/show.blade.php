@extends('layouts.app')

@section('title', 'Proses Pembuatan Keju')

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row mb-4 justify-content-center text-center">
        <div class="col-md-10">
            <h1 class="display-6 fw-bold">Proses Pembuatan Keju</h1>
            <p class="text-muted">Berikut adalah tahapan proses pembuatan keju berdasarkan data persiapan produksi.</p>
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

    <!-- Startup Data Form -->
    <div class="row mb-5">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white rounded-top d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Proses Start-Up</h5>
                    @if(!$startup)
                        <a href="{{ route('startup.create', $preparation) }}" class="btn btn-light btn-sm">Tambah Data</a>
                    @else
                        <a href="{{ route('startup.edit', $preparation) }}" class="btn btn-light btn-sm">Edit Data</a>
                    @endif
                </div>
                <div class="card-body">
                    @if($startup)
                        <div class="row">
                            <div class="col-md-6">
                                <p class="mb-1"><strong>Suhu:</strong></p>
                                <p>{{ number_format($startup->temperature, 1) }}°C</p>
                            </div>
                            <div class="col-md-6">
                                <p class="mb-1"><strong>Analisa:</strong></p>
                                <p>{{ $startup->analysis }}</p>
                            </div>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-muted mb-0">Belum ada data startup. Silakan tambahkan data.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Process Steps -->
    <div class="row g-4">
        <!-- Step 1 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">1</span>
                    <h5 class="mb-0">Persiapan Awal</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Masukkan susu segar sebanyak {{ number_format($preparation->milk_qty, 0, ',', '.') }} liter ke dalam tangki penampung (Tangki A)</li>
                        <li class="list-group-item px-0 py-2">Sambungkan kabel alat ke stop kontak untuk menyalakan panel kontrol</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">2</span>
                    <h5 class="mb-0">Pasteurisasi</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Menyalakan panel dengan mengubah posisi tombol dari OFF ke ON</li>
                        <li class="list-group-item px-0 py-2">Periksa apakah terjadi kejutan listrik pada sistem</li>
                        <li class="list-group-item px-0 py-2">Jika tidak ada kejutan, matikan dan ulangi proses dari awal</li>
                        <li class="list-group-item px-0 py-2">Tekan tombol warna hijau pada panel untuk membuka Valve</li>
                        <li class="list-group-item px-0 py-2">Pastikan lampu warna merah menyala sebagai indikator bahwa sistem berjalan baik</li>
                        <li class="list-group-item px-0 py-2">Tunggu hingga susu memenuhi Chamber Kejut</li>
                        <li class="list-group-item px-0 py-2">Buka keran bawah sedikit (bukaan 1/4) untuk mengalirkan susu</li>
                        <li class="list-group-item px-0 py-2">Tunggu hingga seluruh susu selesai dipasteurisasi</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-info text-white d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">3</span>
                    <h5 class="mb-0">Pengadukan & Pemanasan</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Hidupkan pengaduk dengan menekan tombol ON, lalu atur kecepatan putaran</li>
                        <li class="list-group-item px-0 py-2">Atur suhu pada panel ke rentang 39–42°C</li>
                        <li class="list-group-item px-0 py-2">Matikan kompor ketika suhu mencapai 39°C</li>
                        <li class="list-group-item px-0 py-2">Matikan pengaduk dengan menekan tombol OFF</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-warning text-dark d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">4</span>
                    <h5 class="mb-0">Penambahan Bahan</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Masukkan asam sitrat ({{ number_format($preparation->citric_acid_qty, 0, ',', '.') }} ml) dan rennet ({{ number_format($preparation->rennet_qty, 0, ',', '.') }} ml)</li>
                        <li class="list-group-item px-0 py-2">Hidupkan pengaduk hingga bahan tercampur rata</li>
                        <li class="list-group-item px-0 py-2">Matikan pengaduk dan tunggu hingga terbentuk curd (dadih)</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Step 5 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-danger text-white d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">5</span>
                    <h5 class="mb-0">Pemotongan Curd</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Hidupkan pengaduk untuk memotong curd</li>
                        <li class="list-group-item px-0 py-2">Setelah selesai, buka Valve 2 untuk mengalirkan campuran ke Tangki C</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Step 6 -->
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 shadow-sm border-0 rounded-3">
                <div class="card-header bg-secondary text-white d-flex align-items-center">
                    <span class="badge bg-light text-dark me-2">6</span>
                    <h5 class="mb-0">Pemisahan Curd dan Whey</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-0 py-2">Di Tangki C, pisahkan curd dan whey</li>
                        <li class="list-group-item px-0 py-2">Lakukan pencetakan curd dan taburi garam ({{ number_format($preparation->salt_qty, 0, ',', '.') }} g)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-5">
        <a href="{{ route('preparation.index') }}" class="btn btn-outline-secondary btn-lg px-4">
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
</style>
@endsection 