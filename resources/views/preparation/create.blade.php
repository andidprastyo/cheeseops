@extends('layouts.app')

@section('title', 'Buat Persiapan')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Fase Persiapan</h2>
            <p class="mb-0">Menurut SOP: Siapkan 50L susu segar, rennet, asam sitrat, dan garam</p>
        </div>
        <div class="card-body">
            <form action="{{ route('preparation.store') }}" method="POST">
                @csrf
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="production_date" class="form-label">Tanggal Produksi</label>
                        <input type="date" class="form-control" id="production_date" name="production_date" 
                               value="{{ old('production_date', date('Y-m-d')) }}" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="milk_qty" class="form-label">Jumlah Susu (Liter)</label>
                        <input type="number" class="form-control" id="milk_qty" name="milk_qty" 
                               value="{{ old('milk_qty', 50) }}" step="0.01" min="0" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="rennet_qty" class="form-label">Jumlah Rennet (g)</label>
                        <input type="number" class="form-control" id="rennet_qty" name="rennet_qty" 
                               value="{{ old('rennet_qty') }}" step="0.01" min="0" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="citric_acid_qty" class="form-label">Jumlah Asam Sitrat (ml)</label>
                        <input type="number" class="form-control" id="citric_acid_qty" name="citric_acid_qty" 
                               value="{{ old('citric_acid_qty') }}" step="0.01" min="0" required>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="salt_qty" class="form-label">Jumlah Garam (g)</label>
                        <input type="number" class="form-control" id="salt_qty" name="salt_qty" 
                               value="{{ old('salt_qty') }}" step="0.01" min="0" required>
                    </div>
                    
                    <div class="col-12">
                        <label for="notes" class="form-label">Catatan</label>
                        <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                    </div>
                    
                    <div class="col-12 d-flex justify-content-between">
                        <a href="{{ route('preparation.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Persiapan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection