@extends('layouts.app')

@section('title', 'Persiapan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-center mb-8" data-aos="fade-down">
        <h1 class="text-3xl font-bold text-primary mb-4 sm:mb-0">Record Persiapan</h1>
        <a href="{{ route('preparation.create') }}"
            class="text-white bg-accent hover:bg-primary focus:ring-4 focus:ring-accent font-medium rounded-lg px-5 py-2.5 transition-colors duration-300 inline-flex items-center">
            <i class="fas fa-plus-circle mr-2"></i> Buat Persiapan
        </a>
    </div>

    <!-- Ingredients Cards -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10" data-aos="fade-up">
        <!-- Milk Card -->
        <div
            class="bg-white rounded-xl shadow-md border border-primary/20 hover:shadow-lg transition-shadow duration-300 p-4 text-center">
            <div class="bg-secondary/20 rounded-full p-4 inline-block mb-3">
                <img src="{{ asset('milk.png') }}" alt="Susu" class="w-20 h-20 object-contain mx-auto">
            </div>
            <h3 class="text-lg font-semibold text-primary">Susu Segar</h3>
        </div>

        <!-- Rennet Card -->
        <div
            class="bg-white rounded-xl shadow-md border border-primary/20 hover:shadow-lg transition-shadow duration-300 p-4 text-center">
            <div class="bg-secondary/20 rounded-full p-4 inline-block mb-3">
                <img src="{{ asset('renet.png') }}" alt="Rennet" class="w-20 h-20 object-contain mx-auto">
            </div>
            <h3 class="text-lg font-semibold text-primary">Rennet</h3>
        </div>

        <!-- Citric Acid Card -->
        <div
            class="bg-white rounded-xl shadow-md border border-primary/20 hover:shadow-lg transition-shadow duration-300 p-4 text-center">
            <div class="bg-secondary/20 rounded-full p-4 inline-block mb-3">
                <img src="{{ asset('citric-acid.png') }}" alt="Asam Sitrat" class="w-20 h-20 object-contain mx-auto">
            </div>
            <h3 class="text-lg font-semibold text-primary">Asam Sitrat</h3>
        </div>

        <!-- Salt Card -->
        <div
            class="bg-white rounded-xl shadow-md border border-primary/20 hover:shadow-lg transition-shadow duration-300 p-4 text-center">
            <div class="bg-secondary/20 rounded-full p-4 inline-block mb-3">
                <img src="{{ asset('salt.png') }}" alt="Garam" class="w-20 h-20 object-contain mx-auto">
            </div>
            <h3 class="text-lg font-semibold text-primary">Garam</h3>
        </div>
    </div>

    <!-- Preparation Table -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-primary/20" data-aos="fade-up">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-primary">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3">Tanggal Produksi</th>
                        <th scope="col" class="px-6 py-3">Susu (L)</th>
                        <th scope="col" class="px-6 py-3">Rennet (ml)</th>
                        <th scope="col" class="px-6 py-3">Asam Sitrat (ml)</th>
                        <th scope="col" class="px-6 py-3">Garam (g)</th>
                        <th scope="col" class="px-6 py-3">Catatan</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($preparations as $preparation)
                    <tr class="bg-white border-b border-primary/10 hover:bg-secondary/20">
                        <td class="px-6 py-4">{{ $preparation->production_date->translatedFormat('d F Y') }}</td>
                        <td class="px-6 py-4">{{ number_format($preparation->milk_qty, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ number_format($preparation->rennet_qty, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ number_format($preparation->citric_acid_qty, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ number_format($preparation->salt_qty, 0, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $preparation->notes ?: '-' }}</td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('process.startup.show', $preparation) }}"
                                    class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 inline-flex items-center">
                                    <i class="fas fa-play mr-1"></i> Mulai
                                </a>

                                <!-- Info Button -->
                                <button type="button"
                                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 inline-flex items-center transition-all duration-300"
                                    data-modal-target="infoModal{{ $preparation->id }}"
                                    data-modal-toggle="infoModal{{ $preparation->id }}">
                                    <i class="fas fa-info-circle mr-1"></i> Info
                                </button>

                                <!-- Edit Button -->
                                <a href="{{ route('preparation.edit', $preparation) }}"
                                    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 inline-flex items-center">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>

                                <!-- Delete Button -->
                                <button type="button"
                                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-1.5 inline-flex items-center"
                                    data-modal-target="deleteModal{{ $preparation->id }}"
                                    data-modal-toggle="deleteModal{{ $preparation->id }}">
                                    <i class="fas fa-trash-alt mr-1"></i> Hapus
                                </button>
                            </div>

                            <!-- Info Modal -->
                            <div id="infoModal{{ $preparation->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <div
                                        class="relative bg-white rounded-lg shadow-xl border border-primary/20 overflow-hidden">
                                        <!-- Modal Header -->
                                        <div
                                            class="flex items-start justify-between p-5 bg-primary border-b border-primary/10">
                                            <div>
                                                <h3 class="text-xl font-semibold text-white">
                                                    <i class="fas fa-info-circle mr-2"></i> Detail Persiapan
                                                </h3>
                                                <p class="text-sm text-white/80 mt-1">
                                                    Dibuat pada: {{ $preparation->created_at->translatedFormat('d F Y
                                                    H:i') }}
                                                </p>
                                            </div>
                                            <button type="button"
                                                class="text-white hover:bg-primary/50 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center transition-all duration-300"
                                                data-modal-hide="infoModal{{ $preparation->id }}">
                                                <i class="fas fa-times text-lg"></i>
                                            </button>
                                        </div>

                                        <!-- Modal Body -->
                                        <div class="p-6">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                <!-- Left Column -->
                                                <div class="space-y-4">
                                                    <!-- Production Date -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-calendar-day text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Tanggal
                                                                Produksi</h4>
                                                            <p class="text-primary font-medium">{{
                                                                $preparation->production_date->translatedFormat('d F Y')
                                                                }}</p>
                                                        </div>
                                                    </div>

                                                    <!-- Milk -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-wine-bottle text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Susu Segar
                                                            </h4>
                                                            <p class="text-primary font-medium">{{
                                                                number_format($preparation->milk_qty, 0, ',', '.') }}
                                                                Liter</p>
                                                        </div>
                                                    </div>

                                                    <!-- Rennet -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-flask text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Rennet</h4>
                                                            <p class="text-primary font-medium">{{
                                                                number_format($preparation->rennet_qty, 0, ',', '.') }}
                                                                ml</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Right Column -->
                                                <div class="space-y-4">
                                                    <!-- Citric Acid -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-atom text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Asam Sitrat
                                                            </h4>
                                                            <p class="text-primary font-medium">{{
                                                                number_format($preparation->citric_acid_qty, 0, ',',
                                                                '.') }} ml</p>
                                                        </div>
                                                    </div>

                                                    <!-- Salt -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-mortar-pestle text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Garam</h4>
                                                            <p class="text-primary font-medium">{{
                                                                number_format($preparation->salt_qty, 0, ',', '.') }} g
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Status -->
                                                    <div class="flex items-start">
                                                        <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                            <i class="fas fa-tasks text-accent"></i>
                                                        </div>
                                                        <div>
                                                            <h4 class="text-sm font-medium text-primary/70">Status</h4>
                                                            <p class="text-primary font-medium">
                                                                @if($preparation->process_started)
                                                                <span class="text-green-600">Proses Dimulai</span>
                                                                @else
                                                                <span class="text-yellow-600">Menunggu Proses</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Notes Section -->
                                            <div class="mt-6 pt-6 border-t border-primary/10">
                                                <div class="flex items-start">
                                                    <div class="bg-accent/20 p-2 rounded-full mr-3">
                                                        <i class="fas fa-sticky-note text-accent"></i>
                                                    </div>
                                                    <div>
                                                        <h4 class="text-sm font-medium text-primary/70 mb-2">Catatan
                                                        </h4>
                                                        <div class="bg-secondary/30 rounded-lg p-4">
                                                            <p class="text-primary">
                                                                @if($preparation->notes)
                                                                {{ $preparation->notes }}
                                                                @else
                                                                <span class="text-primary/50">Tidak ada catatan</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Footer -->
                                        <div
                                            class="flex items-center justify-end p-6 border-t border-primary/10 bg-secondary/10">
                                            <button type="button"
                                                class="text-red-500 bg-white hover:bg-red-900 border border-red-400 focus:ring-4 focus:outline-none focus:ring-primary/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all duration-300 inline-flex items-center"
                                                data-modal-hide="infoModal{{ $preparation->id }}">
                                                <i class="fas fa-times mr-1"></i> Tutup
                                            </button>
                                            @if(!$preparation->process_started)
                                            <a href="{{ route('process.startup.show', $preparation) }}"
                                                class="text-white bg-accent hover:bg-primary focus:ring-4 focus:outline-none focus:ring-accent/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition-all duration-300 ml-3 inline-flex items-center">
                                                <i class="fas fa-play mr-1"></i> Mulai Proses
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Delete Modal -->
                            <div id="deleteModal{{ $preparation->id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow border border-primary/10">
                                        <div class="p-6 text-center">
                                            <i class="fas fa-exclamation-triangle text-4xl text-red-500 mb-4"></i>
                                            <h3 class="mb-5 text-lg font-normal text-primary">Apakah Anda yakin ingin
                                                menghapus data persiapan tanggal {{
                                                $preparation->production_date->translatedFormat('d F Y') }}?</h3>
                                            <div class="flex justify-center space-x-4">
                                                <button data-modal-hide="deleteModal{{ $preparation->id }}"
                                                    type="button"
                                                    class="text-primary bg-white hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-primary/50 font-medium rounded-lg text-sm px-5 py-2.5">
                                                    Batal
                                                </button>
                                                <form action="{{ route('preparation.destroy', $preparation) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                                        Ya, Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr class="bg-white border-b border-primary/10">
                        <td colspan="7" class="px-6 py-4 text-center text-primary">Tidak ada data persiapan ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
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
