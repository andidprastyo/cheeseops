@extends('layouts.app')

@section('title', 'Proses Shutdown')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex justify-center text-center mb-8">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-down" data-aos-delay="100">
                Proses Shutdown
            </h1>
            <p class="text-lg text-secondary" data-aos="fade-down" data-aos-delay="200">
                Berikut adalah tahapan proses shutdown dan data produk akhir.
            </p>
        </div>
    </div>

    <!-- Production Data Card -->
    <div class="mb-8" data-aos="fade-up" data-aos-delay="100">
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover-lift">
            <div class="bg-accent text-white px-6 py-4">
                <h5 class="text-xl font-semibold mb-0">Data Persiapan Produksi</h5>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
                    <div class="production-stat">
                        <p class="text-sm font-medium text-secondary mb-2">Tanggal Produksi:</p>
                        <p class="text-lg font-bold text-primary">{{ $preparation->production_date->translatedFormat('d F Y') }}</p>
                    </div>
                    <div class="production-stat">
                        <p class="text-sm font-medium text-secondary mb-2">Susu:</p>
                        <p class="text-lg font-bold text-primary">{{ number_format($preparation->milk_qty, 0, ',', '.') }} L</p>
                    </div>
                    <div class="production-stat">
                        <p class="text-sm font-medium text-secondary mb-2">Rennet:</p>
                        <p class="text-lg font-bold text-primary">{{ number_format($preparation->rennet_qty, 0, ',', '.') }} ml</p>
                    </div>
                    <div class="production-stat">
                        <p class="text-sm font-medium text-secondary mb-2">Asam Sitrat:</p>
                        <p class="text-lg font-bold text-primary">{{ number_format($preparation->citric_acid_qty, 0, ',', '.') }} ml</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Shutdown Steps -->
    <div class="mb-8" data-aos="fade-up" data-aos-delay="200">
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover-lift">
            <div class="bg-red-500 text-white px-6 py-4">
                <h5 class="text-xl font-semibold mb-0">Tahapan Shutdown</h5>
            </div>
            <div class="p-6">
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-6 h-6 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-sm font-medium mr-3 mt-0.5">1</span>
                        <span class="text-secondary">Angkat curd yang telah selesai diproses.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-6 h-6 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-sm font-medium mr-3 mt-0.5">2</span>
                        <span class="text-secondary">Pastikan semua panel kontrol dalam kondisi OFF.</span>
                    </li>
                    <li class="flex items-start">
                        <span class="flex-shrink-0 w-6 h-6 bg-red-100 text-red-500 rounded-full flex items-center justify-center text-sm font-medium mr-3 mt-0.5">3</span>
                        <span class="text-secondary">Cabut kabel alat dari stop kontak.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Final Product Data -->
    <div class="mb-8" data-aos="fade-up" data-aos-delay="300">
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover-lift">
            <div class="bg-green-500 text-white px-6 py-4 flex justify-between items-center">
                <h5 class="text-xl font-semibold mb-0">Data Produk Akhir</h5>
                @if(!$shutdown)
                    <a href="{{ route('process.shutdown.create', $preparation) }}" 
                       class="bg-white text-green-500 hover:bg-gray-100 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-4 py-2 transition-colors duration-300">
                        Tambah Data
                    </a>
                @else
                    <a href="{{ route('process.shutdown.edit', $preparation) }}" 
                       class="bg-white text-green-500 hover:bg-gray-100 focus:ring-4 focus:ring-green-200 font-medium rounded-lg text-sm px-4 py-2 transition-colors duration-300">
                        Edit Data
                    </a>
                @endif
            </div>
            <div class="p-6">
                @if($shutdown)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="final-product-stat">
                            <p class="text-sm font-medium text-secondary mb-2">Berat Keju:</p>
                            <p class="text-2xl font-bold text-primary">{{ number_format($shutdown->cheese_weight, 0, ',', '.') }} <span class="text-sm text-secondary font-normal">gram</span></p>
                        </div>
                        <div class="final-product-stat">
                            <p class="text-sm font-medium text-secondary mb-2">Volume Whey:</p>
                            <p class="text-2xl font-bold text-primary">{{ number_format($shutdown->whey_volume, 1, ',', '.') }} <span class="text-sm text-secondary font-normal">Liter</span></p>
                        </div>
                        <div class="final-product-stat">
                            <p class="text-sm font-medium text-secondary mb-2">Analisa Akhir:</p>
                            <p class="text-lg font-semibold text-primary">{{ $shutdown->final_analysis }}</p>
                        </div>
                    </div>
                @else
                    <div class="text-center py-8 bg-gray-50 rounded-lg">
                        <div class="max-w-md mx-auto">
                            <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-secondary">Belum ada data produk akhir. Silakan tambahkan data untuk melanjutkan.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Navigation Buttons -->
    <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400">
        <a href="{{ route('process.startup.show', $preparation) }}" 
           class="text-white bg-accent hover:bg-secondary focus:ring-4 focus:ring-accent font-medium rounded-lg text-lg px-6 py-3.5 me-4 mb-4 inline-flex items-center transition-colors duration-300">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
            </svg>
            Kembali ke Startup
        </a>
        <a href="{{ route('preparation.index') }}" 
           class="text-primary bg-white hover:bg-gray-50 border-2 border-primary focus:ring-4 focus:ring-primary-light font-medium rounded-lg text-lg px-6 py-3.5 mb-4 inline-flex items-center transition-colors duration-300">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
            Kembali ke Daftar Persiapan
        </a>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Hover effects untuk cards */
    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Animation untuk production stats */
    .production-stat {
        padding: 1rem;
        border-radius: 0.5rem;
        background: linear-gradient(135deg, rgba(249, 250, 251, 0.8) 0%, rgba(243, 244, 246, 0.8) 100%);
        transition: all 0.3s ease;
    }

    .production-stat:hover {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(37, 99, 235, 0.05) 100%);
        transform: translateY(-2px);
    }

    /* Animation untuk final product stats */
    .final-product-stat {
        padding: 1.5rem;
        border-radius: 0.75rem;
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.05) 0%, rgba(21, 128, 61, 0.05) 100%);
        border: 1px solid rgba(34, 197, 94, 0.1);
        transition: all 0.3s ease;
    }

    .final-product-stat:hover {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.1) 0%, rgba(21, 128, 61, 0.1) 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    /* Custom colors to match your theme */
    .text-primary {
        color: var(--primary-color, #1e40af);
    }

    .text-secondary {
        color: var(--secondary-color, #64748b);
    }

    .text-accent {
        color: var(--accent-color, #3b82f6);
    }

    .bg-accent {
        background-color: var(--accent-color, #3b82f6);
    }

    .bg-secondary {
        background-color: var(--secondary-color, #64748b);
    }

    .border-primary {
        border-color: var(--primary-color, #1e40af);
    }

    .focus\:ring-accent:focus {
        --tw-ring-color: var(--accent-color, #3b82f6);
    }

    .focus\:ring-primary-light:focus {
        --tw-ring-color: rgba(30, 64, 175, 0.3);
    }

    /* Print styles */
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
        .hover-lift:hover {
            transform: none;
            box-shadow: none;
        }
        a[href*="route"] {
            display: none;
        }
    }
</style>
@endpush

@push('scripts')
<!-- AOS Animation Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    });
</script>
@endpush