@extends('layouts.app')

@section('title', 'History')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex justify-center text-center mb-8">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-down" data-aos-delay="100">
                Process History
            </h1>
            <p class="text-lg text-secondary" data-aos="fade-down" data-aos-delay="200">
                Riwayat lengkap proses produksi keju yang telah dilakukan
            </p>
        </div>
    </div>

    <!-- History Cards -->
    <div class="space-y-6">
        @forelse($histories as $index => $history)
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover-lift" 
             data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}">
            
            <!-- Card Header -->
            <div class="bg-accent text-white px-6 py-4">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div>
                        <h3 class="text-xl font-semibold mb-2 md:mb-0">
                            Record #{{ $history->id }}
                        </h3>
                        <p class="text-sm opacity-90">
                            Dibuat: {{ $history->created_at->format('d M Y, H:i:s') }}
                        </p>
                    </div>
                    <div class="mt-3 md:mt-0">
                        @php
                            $steps = 3;
                            $completed = 0;
                            if (isset($history->input_data['preparation'])) $completed++;
                            if (isset($history->input_data['startup'])) $completed++;
                            if (isset($history->input_data['shutdown'])) $completed++;
                            $percentage = ($completed / $steps) * 100;
                        @endphp
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium 
                                   {{ $history->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ ucfirst($history->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Card Content -->
            <div class="p-6">
                <!-- Production Date & Progress -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div class="mb-4 md:mb-0">
                        <h4 class="text-lg font-semibold text-primary mb-2">Tanggal Produksi</h4>
                        <p class="text-secondary">
                            @if(isset($history->input_data['preparation']['production_date']))
                                {{ \Carbon\Carbon::parse($history->input_data['preparation']['production_date'])->translatedFormat('d F Y') }}
                            @else
                                <span class="text-gray-400">Tidak tersedia</span>
                            @endif
                        </p>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div class="w-full md:w-1/3">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-medium text-secondary">Progress</span>
                            <span class="text-sm font-medium text-accent">{{ $completed }}/{{ $steps }}</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="bg-gradient-to-r from-green-400 to-green-600 h-3 rounded-full transition-all duration-500 ease-out" 
                                 style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                </div>

                <!-- Toggle Button -->
                <div class="mb-4">
                    <button onclick="toggleData('{{ $history->id }}')" 
                            class="text-white bg-accent hover:bg-secondary focus:ring-4 focus:ring-accent font-medium rounded-lg text-sm px-4 py-2 inline-flex items-center transition-colors duration-300">
                        <svg class="w-4 h-4 mr-2 transform transition-transform duration-300" id="icon-{{ $history->id }}" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                        <span id="text-{{ $history->id }}">Lihat Detail</span>
                    </button>
                </div>

                <!-- Collapsible Content -->
                <div class="hidden transition-all duration-300 ease-in-out" id="data-{{ $history->id }}">
                    <div class="border-t border-gray-200 pt-6">
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            
                            <!-- Preparation Data -->
                            @if(isset($history->input_data['preparation']))
                            <div class="data-section">
                                <div class="bg-blue-50 rounded-lg p-4 border-l-4 border-blue-500">
                                    <h6 class="text-lg font-semibold text-blue-800 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                                        </svg>
                                        Preparation Data
                                    </h6>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Susu:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['preparation']['milk_qty'], 0, ',', '.') }} L</span>
                                        </li>
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Rennet:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['preparation']['rennet_qty'], 0, ',', '.') }} ml</span>
                                        </li>
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Asam Sitrat:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['preparation']['citric_acid_qty'], 0, ',', '.') }} ml</span>
                                        </li>
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Garam:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['preparation']['salt_qty'], 0, ',', '.') }} g</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <!-- Startup Data -->
                            @if(isset($history->input_data['startup']))
                            <div class="data-section">
                                <div class="bg-green-50 rounded-lg p-4 border-l-4 border-green-500">
                                    <h6 class="text-lg font-semibold text-green-800 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                                        </svg>
                                        Startup Data
                                    </h6>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Suhu:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['startup']['temperature'], 1) }}°C</span>
                                        </li>
                                        <li class="flex flex-col">
                                            <span class="text-gray-600 mb-1">Analisis Akhir:</span>
                                            <span class="font-medium text-gray-900 text-xs bg-gray-100 px-2 py-1 rounded">{{ $history->input_data['startup']['analysis'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <!-- Shutdown Data -->
                            @if(isset($history->input_data['shutdown']))
                            <div class="data-section">
                                <div class="bg-red-50 rounded-lg p-4 border-l-4 border-red-500">
                                    <h6 class="text-lg font-semibold text-red-800 mb-3 flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 012 0v4a1 1 0 11-2 0V7zM9 13a1 1 0 112 0 1 1 0 01-2 0z" clip-rule="evenodd"/>
                                        </svg>
                                        Shutdown Data
                                    </h6>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Berat Keju:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['shutdown']['cheese_weight'], 0, ',', '.') }} g</span>
                                        </li>
                                        <li class="flex justify-between">
                                            <span class="text-gray-600">Volume Whey:</span>
                                            <span class="font-medium text-gray-900">{{ number_format($history->input_data['shutdown']['whey_volume'], 0, ',', '.') }} L</span>
                                        </li>
                                        <li class="flex flex-col">
                                            <span class="text-gray-600 mb-1">Analisis Akhir:</span>
                                            <span class="font-medium text-gray-900 text-xs bg-gray-100 px-2 py-1 rounded">{{ $history->input_data['shutdown']['final_analysis'] }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                            <!-- Missing Data Info -->
                            @if($completed < $steps)
                            <div class="data-section lg:col-span-{{ 4 - $completed }}">
                                <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-gray-400 text-center">
                                    <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L4.082 20.5c-.77.833.192 2.5 1.732 2.5z" />
                                    </svg>
                                    <p class="text-sm text-gray-600">
                                        {{ $steps - $completed }} tahap proses belum lengkap
                                    </p>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="bg-white rounded-lg shadow-lg border border-gray-200 p-12 text-center" data-aos="fade-up">
            <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <h3 class="text-lg font-semibold text-gray-900 mb-2">Belum Ada Riwayat</h3>
            <p class="text-gray-600 mb-6">Belum ada proses produksi yang tercatat dalam sistem.</p>
            <a href="{{ route('preparation.index') }}" 
               class="text-white bg-accent hover:bg-secondary focus:ring-4 focus:ring-accent font-medium rounded-lg text-lg px-6 py-3 inline-flex items-center transition-colors duration-300">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                </svg>
                Mulai Produksi Baru
            </a>
        </div>
        @endforelse
    </div>

    <!-- Back Button -->
    @if($histories->count() > 0)
    <div class="text-center mt-12" data-aos="fade-up" data-aos-delay="400">
        <a href="{{ route('preparation.index') }}" 
           class="text-primary bg-white hover:bg-gray-50 border-2 border-primary focus:ring-4 focus:ring-primary-light font-medium rounded-lg text-lg px-6 py-3.5 inline-flex items-center transition-colors duration-300">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
            </svg>
            Kembali ke Daftar Persiapan
        </a>
    </div>
    @endif
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

    /* Animation untuk data sections */
    .data-section {
        transition: all 0.3s ease;
    }

    .data-section:hover {
        transform: translateY(-2px);
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

    /* Smooth slide animation */
    .slide-down {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .slide-down.open {
        max-height: 1000px;
        transition: max-height 0.5s ease-in;
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
        button, a[href*="route"] {
            display: none;
        }
        .hidden {
            display: block !important;
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

    // Toggle function for collapsible content
    function toggleData(historyId) {
        const content = document.getElementById(`data-${historyId}`);
        const icon = document.getElementById(`icon-${historyId}`);
        const text = document.getElementById(`text-${historyId}`);
        
        if (content.classList.contains('hidden')) {
            // Show content
            content.classList.remove('hidden');
            icon.classList.add('rotate-180');
            text.textContent = 'Sembunyikan Detail';
        } else {
            // Hide content
            content.classList.add('hidden');
            icon.classList.remove('rotate-180');
            text.textContent = 'Lihat Detail';
        }
    }
</script>
@endpush