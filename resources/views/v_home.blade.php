@extends('layout.v_template')

@section('content')

{{-- Styles --}}
<style>
    body {
        background: #f4f8f4;
        font-family: 'Segoe UI', sans-serif;
    }
    .dashboard-title {
        color: #2f684e;
        font-weight: bold;
    }
    .eco-card {
        background: linear-gradient(to bottom right, #eafaf1, #c7eacb);
        border-left: 5px solid #4caf50;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        color: #2d4739;
        transition: 0.3s ease;
    }
    .eco-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    .eco-icon {
        font-size: 2rem;
        color: #388e3c;
    }
    .eco-value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #1b4332;
    }
    .eco-label {
        font-size: 1rem;
        color: #3a5a40;
    }
    .card-header {
        background-color: #4caf50;
        color: white;
        font-weight: bold;
        border-radius: 12px 12px 0 0;
        padding: 10px 15px;
    }
</style>

<div class="container-fluid mt-4">
    <h2 class="text-center dashboard-title mb-5">🌱 Dashboard Dinas Lingkungan Hidup</h2>

    <div class="row">
        @php
            $cards = [
                ['title' => 'Total Pengaduan', 'value' => $totalPengaduan, 'icon' => 'fas fa-bullhorn'],
                ['title' => 'Total Feedback', 'value' => $totalFeedback, 'icon' => 'fas fa-comments'],
                ['title' => 'Jumlah PJ', 'value' => $totalPJ, 'icon' => 'fas fa-user-shield'],
                ['title' => 'Jumlah Petugas', 'value' => $totalPetugas, 'icon' => 'fas fa-users-cog'],
                ['title' => 'Total Penugasan', 'value' => $totalPenugasan, 'icon' => 'fas fa-tasks'],
                ['title' => 'Laporan Petugas', 'value' => $totalLaporan, 'icon' => 'fas fa-clipboard-check'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-md-4 mb-4">
            <div class="eco-card p-4 d-flex justify-content-between align-items-center">
                <div>
                    <div class="eco-label">{{ $card['title'] }}</div>
                    <div class="eco-value">{{ $card['value'] }}</div>
                </div>
                <i class="{{ $card['icon'] }} eco-icon"></i>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="card shadow rounded-3">
                <div class="card-header">📈 Grafik Data Statistik</div>
                <div class="card-body bg-light">
                    <canvas id="totalChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('totalChart').getContext('2d');
    const totalChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pengaduan', 'Feedback', 'PJ', 'Petugas', 'Penugasan', 'Laporan'],
            datasets: [{
                label: 'Jumlah Data',
                data: [
                    {{ $totalPengaduan }},
                    {{ $totalFeedback }},
                    {{ $totalPJ }},
                    {{ $totalPetugas }},
                    {{ $totalPenugasan }},
                    {{ $totalLaporan }}
                ],
                backgroundColor: [
                    '#81c784', '#aed581', '#66bb6a', '#9ccc65', '#dce775', '#c5e1a5'
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: { color: '#2e7d32' },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#2e7d32' },
                    grid: { color: 'rgba(0,0,0,0.05)' }
                }
            }
        }
    });
</script>

@endsection
