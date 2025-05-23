@extends('layouts.app')

@section('title', 'History')

@section('content')
<div class="container">
    <h2 class="mb-4">Process History</h2>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Production Date</th>
                    <th>Process Data</th>
                    <th>Progress</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $history)
                <tr>
                    <td>{{ $history->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        @if(isset($history->input_data['preparation']['production_date']))
                            {{ \Carbon\Carbon::parse($history->input_data['preparation']['production_date'])->format('Y-m-d') }}
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#data-{{ $history->id }}">
                            View Data
                        </button>
                        <div class="collapse mt-2" id="data-{{ $history->id }}">
                            <div class="card">
                                <div class="card-body">
                                    @if(isset($history->input_data['preparation']))
                                    <h6 class="card-title">Preparation Data</h6>
                                    <ul class="list-unstyled">
                                        <li>Milk: {{ number_format($history->input_data['preparation']['milk_qty'], 0, ',', '.') }} L</li>
                                        <li>Rennet: {{ number_format($history->input_data['preparation']['rennet_qty'], 0, ',', '.') }} ml</li>
                                        <li>Citric Acid: {{ number_format($history->input_data['preparation']['citric_acid_qty'], 0, ',', '.') }} ml</li>
                                        <li>Salt: {{ number_format($history->input_data['preparation']['salt_qty'], 0, ',', '.') }} g</li>
                                    </ul>
                                    @endif

                                    @if(isset($history->input_data['startup']))
                                    <h6 class="card-title mt-3">Startup Data</h6>
                                    <ul class="list-unstyled">
                                        <li>Temperature: {{ number_format($history->input_data['startup']['temperature'], 1) }}°C</li>
                                        <li>Analysis: {{ $history->input_data['startup']['analysis'] }}</li>
                                    </ul>
                                    @endif

                                    @if(isset($history->input_data['shutdown']))
                                    <h6 class="card-title mt-3">Shutdown Data</h6>
                                    <ul class="list-unstyled">
                                        <li>Cheese Weight: {{ number_format($history->input_data['shutdown']['cheese_weight'], 0, ',', '.') }} g</li>
                                        <li>Whey Volume: {{ number_format($history->input_data['shutdown']['whey_volume'], 0, ',', '.') }} L</li>
                                        <li>Final Analysis: {{ $history->input_data['shutdown']['final_analysis'] }}</li>
                                    </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="progress" style="height: 20px;">
                            @php
                                $steps = 3;
                                $completed = 0;
                                if (isset($history->input_data['preparation'])) $completed++;
                                if (isset($history->input_data['startup'])) $completed++;
                                if (isset($history->input_data['shutdown'])) $completed++;
                                $percentage = ($completed / $steps) * 100;
                            @endphp
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $percentage }}%" 
                                 aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                {{ $completed }}/{{ $steps }}
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-{{ $history->status === 'completed' ? 'success' : 'warning' }}">
                            {{ ucfirst($history->status) }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 