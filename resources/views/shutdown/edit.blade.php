@extends('layouts.app')

@section('title', 'Edit Data Shutdown')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex justify-center text-center mb-8">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-down" data-aos-delay="100">
                Edit Data Produk Akhir
            </h1>
            <p class="text-lg text-secondary" data-aos="fade-down" data-aos-delay="200">
                Perbarui data hasil akhir proses produksi keju
            </p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="bg-white rounded-lg shadow-lg border border-gray-200 overflow-hidden hover-lift" data-aos="fade-up" data-aos-delay="300">
                
                <!-- Card Header -->
                <div class="bg-green-500 text-white px-6 py-4">
                    <h5 class="text-xl font-semibold mb-0 flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Edit Data Produk Akhir
                    </h5>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <form action="{{ route('process.shutdown.update', $preparation) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Cheese Weight -->
                        <div class="form-group" data-aos="fade-right" data-aos-delay="400">
                            <label for="cheese_weight" class="form-label">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"/>
                                    </svg>
                                    Berat Keju (gram)
                                </span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       class="form-input @error('cheese_weight') border-red-500 @enderror" 
                                       id="cheese_weight" 
                                       name="cheese_weight" 
                                       step="0.1" 
                                       min="0" 
                                       value="{{ old('cheese_weight', $shutdown->cheese_weight) }}" 
                                       placeholder="Masukkan berat keju dalam gram"
                                       required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">gram</span>
                                </div>
                            </div>
                            @error('cheese_weight')
                                <div class="form-error">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Whey Volume -->
                        <div class="form-group" data-aos="fade-left" data-aos-delay="500">
                            <label for="whey_volume" class="form-label">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 010 2h-1v1a1 1 0 01-2 0V4H8a1 1 0 010-2h1V1a1 1 0 112 0v1h1z" clip-rule="evenodd"/>
                                    </svg>
                                    Volume Whey (Liter)
                                </span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       class="form-input @error('whey_volume') border-red-500 @enderror" 
                                       id="whey_volume" 
                                       name="whey_volume" 
                                       step="0.1" 
                                       min="0" 
                                       value="{{ old('whey_volume', $shutdown->whey_volume) }}" 
                                       placeholder="Masukkan volume whey dalam liter"
                                       required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">Liter</span>
                                </div>
                            </div>
                            @error('whey_volume')
                                <div class="form-error">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Final Analysis -->
                        <div class="form-group" data-aos="fade-right" data-aos-delay="600">
                            <label for="final_analysis" class="form-label">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Analisa Akhir
                                </span>
                            </label>
                            <textarea class="form-textarea @error('final_analysis') border-red-500 @enderror" 
                                      id="final_analysis" 
                                      name="final_analysis" 
                                      rows="5" 
                                      placeholder="Masukkan hasil analisa akhir produksi keju..."
                                      required>{{ old('final_analysis', $shutdown->final_analysis) }}</textarea>
                            @error('final_analysis')
                                <div class="form-error">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-between pt-6 border-t border-gray-200" data-aos="fade-up" data-aos-delay="700">
                            <a href="{{ route('process.shutdown.show', $preparation) }}" 
                               class="text-secondary bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-lg px-6 py-3 inline-flex items-center justify-center transition-colors duration-300">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit" 
                                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg px-6 py-3 inline-flex items-center justify-center transition-colors duration-300">
                                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Update Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info Card -->
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-2xl">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4" data-aos="fade-up" data-aos-delay="800">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium text-blue-800 mb-2">Informasi Penting</h3>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• Pastikan data yang dimasukkan sudah akurat dan sesuai hasil pengukuran</li>
                            <li>• Berat keju dalam satuan gram (g)</li>
                            <li>• Volume whey dalam satuan liter (L)</li>
                            <li>• Analisa akhir harus mencakup hasil evaluasi kualitas produk</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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

    /* Form styling */
    .form-group {
        transition: all 0.3s ease;
    }

    .form-label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .form-input, .form-textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 0.5rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #ffffff;
    }

    .form-input:focus, .form-textarea:focus {
        outline: none;
        border-color: var(--accent-color, #3b82f6);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        background-color: #fefefe;
    }

    .form-input:hover, .form-textarea:hover {
        border-color: #d1d5db;
    }

    .form-error {
        display: flex;
        align-items: center;
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        padding: 0.5rem;
        background-color: #fef2f2;
        border-radius: 0.375rem;
        border-left: 4px solid #dc2626;
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

    /* Animation for form elements */
    .form-group:hover {
        transform: translateY(-2px);
    }

    /* Responsive adjustments */
    @media (max-width: 640px) {
        .form-input, .form-textarea {
            padding: 0.625rem 0.875rem;
        }
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

        // Enhanced form validation feedback
        const inputs = document.querySelectorAll('.form-input, .form-textarea');
        
        inputs.forEach(input => {
            // Add success styling when valid
            input.addEventListener('input', function() {
                if (this.validity.valid && this.value.length > 0) {
                    this.classList.remove('border-red-500');
                    this.classList.add('border-green-500');
                } else if (!this.validity.valid) {
                    this.classList.remove('border-green-500');
                    this.classList.add('border-red-500');
                } else {
                    this.classList.remove('border-green-500', 'border-red-500');
                }
            });

            // Add focus animations
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-102');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-102');
            });
        });

        // Form submission animation
        const form = document.querySelector('form');
        const submitButton = document.querySelector('button[type="submit"]');
        
        form.addEventListener('submit', function(e) {
            submitButton.innerHTML = `
                <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Menyimpan...
            `;
            submitButton.disabled = true;
        });
    });
</script>
@endpush