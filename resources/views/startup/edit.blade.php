@extends('layouts.app')

@section('title', 'Edit Data Startup')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white rounded-top">
                    <h5 class="mb-0">Edit Data Startup</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('process.startup.update', $preparation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="temperature" class="form-label">Suhu (°C)</label>
                            <input type="number" 
                                   class="form-control @error('temperature') is-invalid @enderror" 
                                   id="temperature" 
                                   name="temperature" 
                                   step="0.1" 
                                   min="0" 
                                   max="100" 
                                   value="{{ old('temperature', $startup->temperature) }}" 
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
                                      required>{{ old('analysis', $startup->analysis) }}</textarea>
                            @error('analysis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('process.startup.show', $preparation) }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 