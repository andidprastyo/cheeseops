@extends('layouts.app')

@section('title', 'Edit Data Startup')

@section('content')
<div class="container mx-auto px-4">
    <!-- Header Section -->
    <div class="flex justify-center text-center mb-8">
        <div class="w-full max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-down" data-aos-delay="100">
                Edit Data Startup
            </h1>
            <p class="text-lg text-secondary" data-aos="fade-down" data-aos-delay="200">
                Perbarui data proses startup produksi keju
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
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                        Edit Data Startup
                    </h5>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <form action="{{ route('process.startup.update', $preparation) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Temperature -->
                        <div class="form-group" data-aos="fade-right" data-aos-delay="400">
                            <label for="temperature" class="form-label">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v6.586l2.707 2.707a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L9 9.586V3a1 1 0 011-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Suhu (°C)
                                </span>
                            </label>
                            <div class="relative">
                                <input type="number" 
                                       class="form-input @error('temperature') border-red-500 @enderror" 
                                       id="temperature" 
                                       name="temperature" 
                                       step="0.1" 
                                       min="0" 
                                       max="100" 
                                       value="{{ old('temperature', $startup->temperature) }}" 
                                       placeholder="Masukkan suhu dalam celsius"
                                       required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 text-sm">°C</span>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span>Min: 0°C</span>
                                    <span>Max: 100°C</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-1 mt-1">
                                    <div class="bg-gradient-to-r from-blue-400 via-yellow-400 to-red-500 h-1 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            @error('temperature')
                                <div class="form-error">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Analysis -->
                        <div class="form-group" data-aos="fade-left" data-aos-delay="500">
                            <label for="analysis" class="form-label">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-purple-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    Analisa Startup
                                </span>
                            </label>
                            <textarea class="form-textarea @error('analysis') border-red-500 @enderror" 
                                      id="analysis" 
                                      name="analysis" 
                                      rows="5" 
                                      placeholder="Masukkan hasil analisa proses startup..."
                                      required>{{ old('analysis', $startup->analysis) }}</textarea>
                            <div class="mt-2 text-xs text-gray-500">
                                <span id="charCount">0</span> karakter
                            </div>
                            @error('analysis')
                                <div class="form-error">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 justify-between pt-6 border-t border-gray-200" data-aos="fade-up" data-aos-delay="600">
                            <a href="{{ route('process.startup.show', $preparation) }}" 
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

    <!-- Additional Info Cards -->
    <div class="flex justify-center mt-8">
        <div class="w-full max-w-2xl space-y-4">
            
            <!-- Temperature Guidelines Card -->
            <div class="bg-orange-50 border border-orange-200 rounded-lg p-4" data-aos="fade-up" data-aos-delay="700">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-orange-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v6.586l2.707 2.707a1 1 0 01-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 01-1.414-1.414L9 9.586V3a1 1 0 011-1z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium text-orange-800 mb-2">Panduan Suhu Startup</h3>
                        <ul class="text-sm text-orange-700 space-y-1">
                            <li>• <strong>30-35°C:</strong> Suhu optimal untuk aktivasi starter</li>
                            <li>• <strong>35-40°C:</strong> Range suhu untuk penambahan rennet</li>
                            <li>• <strong>40-45°C:</strong> Suhu proses koagulasi</li>
                            <li>• <strong>45-50°C:</strong> Suhu untuk cutting curd</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Analysis Guidelines Card -->
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4" data-aos="fade-up" data-aos-delay="800">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-500 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h3 class="text-lg font-medium text-blue-800 mb-2">Panduan Analisa Startup</h3>
                        <p class="text-sm text-blue-700 mb-2">Pastikan untuk mencatat hal-hal berikut:</p>
                        <ul class="text-sm text-blue-700 space-y-1">
                            <li>• Kondisi susu sebelum proses</li>
                            <li>• Waktu aktivasi starter culture</li>
                            <li>• Hasil pengukuran pH awal</li>
                            <li>• Kualitas koagulasi yang terbentuk</li>
                            <li>• Catatan masalah atau kendala yang ditemui</li>
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

    /* Temperature input special styling */
    #temperature {
        background: linear-gradient(90deg, 
            rgba(59, 130, 246, 0.05) 0%, 
            rgba(245, 158, 11, 0.05) 50%, 
            rgba(239, 68, 68, 0.05) 100%);
    }

    #temperature:focus {
        background: linear-gradient(90deg, 
            rgba(59, 130, 246, 0.1) 0%, 
            rgba(245, 158, 11, 0.1) 50%, 
            rgba(239, 68, 68, 0.1) 100%);
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

    /* Character counter animation */
    #charCount {
        transition: color 0.3s ease;
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

        // Character counter for analysis textarea
        const analysisTextarea = document.getElementById('analysis');
        const charCount = document.getElementById('charCount');
        
        function updateCharCount() {
            const count = analysisTextarea.value.length;
            charCount.textContent = count;
            
            if (count < 50) {
                charCount.className = 'text-red-500';
            } else if (count < 100) {
                charCount.className = 'text-yellow-500';
            } else {
                charCount.className = 'text-green-500';
            }
        }
        
        // Initialize character count
        updateCharCount();
        
        analysisTextarea.addEventListener('input', updateCharCount);

        // Temperature input special handling
        const temperatureInput = document.getElementById('temperature');
        
        temperatureInput.addEventListener('input', function() {
            const temp = parseFloat(this.value);
            const tempIndicator = this.parentElement.querySelector('.bg-gradient-to-r');
            
            if (temp >= 30 && temp <= 50) {
                this.style.borderColor = '#10b981'; // green
            } else if (temp > 50 && temp <= 70) {
                this.style.borderColor = '#f59e0b'; // yellow
            } else if (temp > 70) {
                this.style.borderColor = '#ef4444'; // red
            } else {
                this.style.borderColor = '#6b7280'; // gray
            }
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

        // Auto-resize textarea
        analysisTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    });
</script>
@endpush