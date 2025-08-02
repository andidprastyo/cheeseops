@extends('layouts.app')

@section('title', 'Proses Pembuatan Keju')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="text-center mb-12" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-primary mb-4">Proses Pembuatan Keju</h1>
        <p class="text-lg text-secondary max-w-3xl mx-auto">
            Berikut adalah tahapan proses pembuatan keju berdasarkan data persiapan produksi.
        </p>
    </div>

    <!-- Production Data Card -->
    <div class="bg-white rounded-xl shadow-lg border border-primary/10 mb-10 overflow-hidden" data-aos="fade-up">
        <div class="bg-primary p-6 text-white">
            <h2 class="text-xl font-semibold">Data Persiapan Produksi</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="bg-secondary/20 p-4 rounded-lg">
                    <p class="text-sm font-medium text-primary/70">Tanggal Produksi</p>
                    <p class="text-primary font-semibold">{{ $preparation->production_date->translatedFormat('d F Y') }}
                    </p>
                </div>
                <div class="bg-secondary/20 p-4 rounded-lg">
                    <p class="text-sm font-medium text-primary/70">Susu</p>
                    <p class="text-primary font-semibold">{{ number_format($preparation->milk_qty, 0, ',', '.') }} L</p>
                </div>
                <div class="bg-secondary/20 p-4 rounded-lg">
                    <p class="text-sm font-medium text-primary/70">Rennet</p>
                    <p class="text-primary font-semibold">{{ number_format($preparation->rennet_qty, 0, ',', '.') }} ml
                    </p>
                </div>
                <div class="bg-secondary/20 p-4 rounded-lg">
                    <p class="text-sm font-medium text-primary/70">Asam Sitrat</p>
                    <p class="text-primary font-semibold">{{ number_format($preparation->citric_acid_qty, 0, ',', '.')
                        }} ml</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Process Steps -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
        <!-- Step 1 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up">
            <div class="bg-primary p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">1</span>
                <h3 class="text-lg font-semibold">Persiapan Awal</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Masukkan susu segar sebanyak {{ number_format($preparation->milk_qty,
                            0, ',', '.') }} liter ke dalam tangki penampung (Tangki A)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Sambungkan kabel alat ke stop kontak untuk menyalakan panel
                            kontrol</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up" data-aos-delay="100">
            <div class="bg-green-600 p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">2</span>
                <h3 class="text-lg font-semibold">Pasteurisasi</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Menyalakan panel dengan mengubah posisi tombol dari OFF ke ON</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Periksa apakah terjadi kejutan listrik pada sistem</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Jika tidak ada kejutan, matikan dan ulangi proses dari awal</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Tekan tombol warna hijau pada panel untuk membuka Valve</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Pastikan lampu warna merah menyala sebagai indikator bahwa sistem
                            berjalan baik</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Tunggu hingga susu memenuhi Chamber Kejut</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Buka keran bawah sedikit (bukaan 1/4) untuk mengalirkan susu</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Tunggu hingga seluruh susu selesai dipasteurisasi</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up" data-aos-delay="200">
            <div class="bg-blue-500 p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">3</span>
                <h3 class="text-lg font-semibold">Pengadukan & Pemanasan</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Hidupkan pengaduk dengan menekan tombol ON, lalu atur kecepatan
                            putaran</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Atur suhu pada panel ke rentang 39–42°C</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Matikan kompor ketika suhu mencapai 39°C</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Matikan pengaduk dengan menekan tombol OFF</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Step 4 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up">
            <div class="bg-yellow-500 p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">4</span>
                <h3 class="text-lg font-semibold">Penambahan Bahan</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Masukkan asam sitrat ({{ number_format($preparation->citric_acid_qty,
                            0, ',', '.') }} ml) dan rennet ({{ number_format($preparation->rennet_qty, 0, ',', '.') }}
                            ml)</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Hidupkan pengaduk hingga bahan tercampur rata</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Matikan pengaduk dan tunggu hingga terbentuk curd (dadih)</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Step 5 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up" data-aos-delay="100">
            <div class="bg-red-600 p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">5</span>
                <h3 class="text-lg font-semibold">Pemotongan Curd</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Hidupkan pengaduk untuk memotong curd</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Setelah selesai, buka Valve 2 untuk mengalirkan campuran ke Tangki
                            C</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Step 6 -->
        <div class="bg-white rounded-xl shadow-lg border border-primary/10 overflow-hidden transition-all duration-300 hover:shadow-xl hover:-translate-y-1"
            data-aos="fade-up" data-aos-delay="200">
            <div class="bg-gray-600 p-4 text-white flex items-center">
                <span
                    class="bg-accent text-primary font-bold rounded-full w-8 h-8 flex items-center justify-center mr-3">6</span>
                <h3 class="text-lg font-semibold">Pemisahan Curd dan Whey</h3>
            </div>
            <div class="p-5">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Di Tangki C, pisahkan curd dan whey</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 bg-accent/20 text-accent rounded-full p-1 mr-3">
                            <i class="fas fa-check text-xs"></i>
                        </span>
                        <span class="text-primary">Lakukan pencetakan curd dan taburi garam ({{
                            number_format($preparation->salt_qty, 0, ',', '.') }} g)</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center mt-8" data-aos="fade-up">
        <a href="{{ route('preparation.index') }}"
            class="text-primary bg-white border border-primary hover:bg-secondary hover:text-primary focus:ring-4 focus:ring-accent font-medium rounded-lg px-6 py-3 inline-flex items-center transition-colors duration-300">
            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Persiapan
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-out-quad',
            once: true
        });
    });
</script>
@endpush
