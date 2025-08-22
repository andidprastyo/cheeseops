@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center justify-between min-h-[80vh] py-8">
        <div class="justify-center ml-[100px] w-full md:w-1/2 mt-8 md:mt-0">
            <h1 class="text-4xl md:text-5xl font-bold text-primary mb-6" data-aos="fade-right" data-aos-delay="100">
                Selamat Datang di <span id="typing-text" class="text-accent"></span>
            </h1>
            <p class="text-lg text-secondary mb-4" data-aos="fade-right" data-aos-delay="200">
                Sistem manajemen produksi keju yang membantu Anda melacak dan mengoptimalkan proses pembuatan keju
                dengan lebih efisien.
            </p>
            <p class="text-lg text-secondary mb-8" data-aos="fade-right" data-aos-delay="300">
                Mulai dengan mencatat persiapan bahan baku dan ikuti proses produksi keju Anda dari awal hingga akhir.
            </p>
            <a href="{{ route('preparation.index') }}"
                class="text-white bg-accent hover:bg-secondary focus:ring-4 focus:ring-accent font-medium rounded-lg text-lg px-6 py-3.5 me-2 mb-2 inline-flex items-center transition-colors duration-300"
                data-aos="fade-up" data-aos-delay="400">
                Mulai Persiapan
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        <div class="w-full md:w-1/2 flex justify-center mt-10 md:mt-0" data-aos="fade-left" data-aos-delay="500">
            <div class="relative cheese-float">
                <img src="{{ asset('cheese.png') }}" alt="Cheese Icon"
                    class="max-h-[400px] object-contain transform hover:scale-105 transition-transform duration-500">
                <div
                    class="absolute inset-0 bg-accent opacity-10 rounded-full mix-blend-multiply filter blur-md animate-pulse">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .min-h-\[80vh\] {
        min-height: 80vh;
    }

    /* Animasi untuk gambar keju */
    @keyframes cheeseFloat {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-15px);
        }
    }

    .cheese-float {
        animation: cheeseFloat 6s ease-in-out infinite;
    }

    /* Typing animation cursor */
    #typing-text::after {
        content: "|";
        animation: blink 0.7s infinite;
        opacity: 1;
    }

    @keyframes blink {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0;
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

        // Typing animation for CheeseOps
        const text = "CheeseOps";
        const typingElement = document.getElementById('typing-text');
        let i = 0;

        function typeWriter() {
            if (i < text.length) {
                typingElement.innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, 150);
            } else {
                // Remove cursor after typing completes
                typingElement.style.borderRight = 'none';
            }
        }

        // Start typing animation after a short delay
        setTimeout(typeWriter, 500);
    });
</script>
@endpush
