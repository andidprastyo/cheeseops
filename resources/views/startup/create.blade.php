@extends('layouts.app')

@section('title', 'Tambah Data Startup')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white rounded-top">
                    <h5 class="mb-0">Tambah Data Startup</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('startup.store', $preparation) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="temperature" class="form-label">Suhu (°C)</label>
                            <input type="number" 
                                   class="form-control @error('temperature') is-invalid @enderror" 
                                   id="temperature" 
                                   name="temperature" 
                                   step="0.1" 
                                   min="0" 
                                   max="100" 
                                   value="{{ old('temperature') }}" 
                                   required>
                            @error('temperature')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="analysis" class="form-label">Analisa</label>
                            <textarea class="form-control @error('analysis') is-invalid @enderror" 
                                      id="analysis" 
                                      name="analysis" 
                                      rows="4" 
                                      required>{{ old('analysis') }}</textarea>
                            @error('analysis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('startup.show', $preparation) }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 