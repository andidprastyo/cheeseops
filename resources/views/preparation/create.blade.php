@extends('layouts.app')

@section('title', 'Buat Persiapan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Animated Header Section -->
    <div class="text-center mb-12" data-aos="fade-down">
        <h1 class="text-4xl font-bold text-primary mb-3">Persiapan Produksi Keju</h1>
        <div class="w-24 h-1 bg-accent mx-auto mb-4"></div>
        <p class="text-lg text-secondary max-w-2xl mx-auto">
            Isi form berikut untuk memulai proses produksi keju sesuai standar kualitas kami
        </p>
    </div>

    <!-- Form Card with Floating Animation -->
    <div class="max-w-4xl mx-auto" data-aos="fade-up">
        <div
            class="bg-white rounded-xl shadow-xl overflow-hidden border border-primary/20 hover:shadow-2xl transition-shadow duration-500">
            <!-- Card Header with Icon -->
            <div class="bg-primary p-6 text-white flex items-center">
                <div class="bg-accent/20 p-3 rounded-full mr-4">
                    <i class="fas fa-cheese text-2xl text-accent"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Fase Persiapan</h2>
                    <p class="opacity-90 mt-1">Menurut SOP: Siapkan 50L susu segar, rennet, asam sitrat, dan garam</p>
                </div>
            </div>

            <!-- Card Body -->
            <div class="p-8">
                <form action="{{ route('preparation.store') }}" method="POST">
                    @csrf

                    <!-- Grid Layout -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <!-- Production Date -->
                            <div class="group">
                                <label for="production_date"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-calendar-day mr-2"></i>Tanggal Produksi
                                </label>
                                <div class="relative">
                                    <input type="date"
                                        class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 pl-10 transition-all duration-300 hover:border-primary/40"
                                        id="production_date" name="production_date"
                                        value="{{ old('production_date', date('Y-m-d')) }}" required>
                                    <i class="fas fa-calendar absolute left-3 top-3.5 text-primary/50"></i>
                                </div>
                            </div>

                            <!-- Milk Quantity -->
                            <div class="group">
                                <label for="milk_qty"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-wine-bottle mr-2"></i>Jumlah Susu (Liter)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 pl-10 transition-all duration-300 hover:border-primary/40"
                                        id="milk_qty" name="milk_qty" value="{{ old('milk_qty', 50) }}" step="0.01"
                                        min="0" required>
                                    <i class="fas fa-tint absolute left-3 top-3.5 text-primary/50"></i>
                                </div>
                            </div>

                            <!-- Rennet Quantity -->
                            <div class="group">
                                <label for="rennet_qty"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-flask mr-2"></i>Jumlah Rennet (ml)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 pl-10 transition-all duration-300 hover:border-primary/40"
                                        id="rennet_qty" name="rennet_qty" value="{{ old('rennet_qty') }}" step="0.01"
                                        min="0" placeholder="Masukkan jumlah rennet" required>
                                    <i class="fas fa-vial absolute left-3 top-3.5 text-primary/50"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <!-- Citric Acid Quantity -->
                            <div class="group">
                                <label for="citric_acid_qty"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-atom mr-2"></i>Jumlah Asam Sitrat (ml)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 pl-10 transition-all duration-300 hover:border-primary/40"
                                        id="citric_acid_qty" name="citric_acid_qty" value="{{ old('citric_acid_qty') }}"
                                        step="0.01" min="0" placeholder="Masukkan jumlah asam sitrat" required>
                                    <i
                                        class="fas fa-prescription-bottle-alt absolute left-3 top-3.5 text-primary/50"></i>
                                </div>
                            </div>

                            <!-- Salt Quantity -->
                            <div class="group">
                                <label for="salt_qty"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-mortar-pestle mr-2"></i>Jumlah Garam (g)
                                </label>
                                <div class="relative">
                                    <input type="number"
                                        class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 pl-10 transition-all duration-300 hover:border-primary/40"
                                        id="salt_qty" name="salt_qty" value="{{ old('salt_qty') }}" step="0.01" min="0"
                                        placeholder="Masukkan jumlah garam" required>
                                    <i class="fas fa-shapes absolute left-3 top-3.5 text-primary/50"></i>
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="group md:col-span-2">
                                <label for="notes"
                                    class="block mb-2 text-sm font-medium text-primary transition-all duration-300 group-hover:text-accent">
                                    <i class="fas fa-sticky-note mr-2"></i>Catatan Tambahan
                                </label>
                                <textarea
                                    class="bg-secondary/50 border border-primary/20 text-primary text-sm rounded-lg focus:ring-2 focus:ring-accent focus:border-accent block w-full p-3 transition-all duration-300 hover:border-primary/40 min-h-[120px]"
                                    id="notes" name="notes" placeholder="Masukkan catatan tambahan"
                                    rows="3">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-between gap-4 mt-10 pt-6 border-t border-primary/20">
                        <a href="{{ route('preparation.index') }}"
                            class="text-white bg-red-500 hover:bg-red-900 focus:ring-4 focus:ring-accent/50 font-medium rounded-lg text-sm px-6 py-3 text-center transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                        </a>
                        <button type="submit"
                            class="text-white bg-accent hover:bg-primary focus:ring-4 focus:ring-accent/50 font-medium rounded-lg text-sm px-6 py-3 transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i> Simpan Persiapan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Custom input focus effect */
    input:focus,
    textarea:focus {
        box-shadow: 0 0 0 2px;
    }

    /* Smooth transitions for all interactive elements */
    * {
        transition-property: color, background-color, border-color, transform, box-shadow;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 300ms;
    }

    /* Gradient animation for submit button */
    button[type="submit"]:hover {
        background-size: 150% 150%;
    }
</style>
@endpush

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
