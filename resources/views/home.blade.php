@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container">
    <div class="row align-items-center" style="min-height: 80vh;">
        <div class="col-md-6 mt-5">
            <h1 class="display-4 mb-4">Selamat Datang di CheeseOps</h1>
            <p class="lead mb-4">
                Sistem manajemen produksi keju yang membantu Anda melacak dan mengoptimalkan proses pembuatan keju dengan lebih efisien.
            </p>
            <p class="mb-5">
                Mulai dengan mencatat persiapan bahan baku dan ikuti proses produksi keju Anda dari awal hingga akhir.
            </p>
            <a href="{{ route('preparation.index') }}" class="btn btn-primary btn-lg">
                Mulai Persiapan <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        <div class="col-md-6 text-center">
            <img src="{{ asset('cheese.png') }}" alt="Cheese Icon" class="img-fluid" style="max-height: 400px;">
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush 