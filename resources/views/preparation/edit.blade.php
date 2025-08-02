@extends('layouts.app')

@section('title', 'Edit Persiapan')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-center">
        <div class="w-full max-w-4xl">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <!-- Card Header -->
                <div class="bg-primary px-6 py-4 text-white">
                    <h2 class="text-xl font-semibold">Edit Persiapan</h2>
                </div>

                <!-- Card Body -->
                <div class="p-6">
                    <form action="{{ route('preparation.update', $preparation->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- Production Date -->
                            <div>
                                <label for="production_date"
                                    class="block mb-2 text-sm font-medium text-gray-900">Tanggal Produksi</label>
                                <input type="date" id="production_date" name="production_date"
                                    value="{{ old('production_date', $preparation->production_date->format('Y-m-d')) }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>

                            <!-- Milk Quantity -->
                            <div>
                                <label for="milk_qty" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Susu
                                    (liter)</label>
                                <input type="number" id="milk_qty" name="milk_qty"
                                    value="{{ old('milk_qty', $preparation->milk_qty) }}" step="0.01" min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>

                            <!-- Rennet Quantity -->
                            <div>
                                <label for="rennet_qty" class="block mb-2 text-sm font-medium text-gray-900">Jumlah
                                    Rennet (ml)</label>
                                <input type="number" id="rennet_qty" name="rennet_qty"
                                    value="{{ old('rennet_qty', $preparation->rennet_qty) }}" step="0.01" min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>

                            <!-- Citric Acid Quantity -->
                            <div>
                                <label for="citric_acid_qty" class="block mb-2 text-sm font-medium text-gray-900">Jumlah
                                    Asam Sitrat (L)</label>
                                <input type="number" id="citric_acid_qty" name="citric_acid_qty"
                                    value="{{ old('citric_acid_qty', $preparation->citric_acid_qty) }}" step="0.01"
                                    min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>

                            <!-- Salt Quantity -->
                            <div>
                                <label for="salt_qty" class="block mb-2 text-sm font-medium text-gray-900">Jumlah Garam
                                    (g)</label>
                                <input type="number" id="salt_qty" name="salt_qty"
                                    value="{{ old('salt_qty', $preparation->salt_qty) }}" step="0.01" min="0"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-6">
                            <label for="notes" class="block mb-2 text-sm font-medium text-gray-900">Catatan</label>
                            <textarea id="notes" name="notes" rows="3"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ old('notes', $preparation->notes) }}</textarea>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-between items-center">
                            <a href="{{ route('preparation.index') }}"
                                class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                </svg>
                                Kembali
                            </a>
                            <button type="submit"
                                class="text-white bg-accent hover:bg-primary focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center transition-colors duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Persiapan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
