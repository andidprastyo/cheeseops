@extends('layouts.app')

@section('title', 'Edit Data Shutdown')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-success text-white rounded-top">
                    <h5 class="mb-0">Edit Data Produk Akhir</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('process.shutdown.update', $preparation) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="cheese_weight" class="form-label">Berat Keju (g)</label>
                            <input type="number" 
                                   class="form-control @error('cheese_weight') is-invalid @enderror" 
                                   id="cheese_weight" 
                                   name="cheese_weight" 
                                   step="0.1" 
                                   min="0" 
                                   value="{{ old('cheese_weight', $shutdown->cheese_weight) }}" 
                                   required>
                            @error('cheese_weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="whey_volume" class="form-label">Volume Whey (L)</label>
                            <input type="number" 
                                   class="form-control @error('whey_volume') is-invalid @enderror" 
                                   id="whey_volume" 
                                   name="whey_volume" 
                                   step="0.1" 
                                   min="0" 
                                   value="{{ old('whey_volume', $shutdown->whey_volume) }}" 
                                   required>
                            @error('whey_volume')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="final_analysis" class="form-label">Analisa Akhir</label>
                            <textarea class="form-control @error('final_analysis') is-invalid @enderror" 
                                      id="final_analysis" 
                                      name="final_analysis" 
                                      rows="4" 
                                      required>{{ old('final_analysis', $shutdown->final_analysis) }}</textarea>
                            @error('final_analysis')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('process.shutdown.show', $preparation) }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 