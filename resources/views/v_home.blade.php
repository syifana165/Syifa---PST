@extends('layout.v_template')

@section('content')

<style>
    body {
        background: #0B2447;
        font-family: 'Segoe UI', sans-serif;
    }
    .dashboard-title {
        color: #ffffff;
        font-weight: bold;
    }
    .eco-card {
        background: #112B3C;
        border-left: 5px solid #19376D;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        color: #ffffff;
        transition: 0.3s ease;
    }
    .eco-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    }
    .eco-icon {
        font-size: 2rem;
        color: #64CCC5;
    }
    .eco-value {
        font-size: 1.8rem;
        font-weight: bold;
        color: #F5F7FA;
    }
    .eco-label {
        font-size: 1rem;
        color: #A5C9CA;
    }
    .card-header {
        background-color: #19376D;
        color: white;
        font-weight: bold;
        border-radius: 12px 12px 0 0;
        padding: 10px 15px;
    }
    .card-body.bg-light {
        background-color: #1D2D50;
    }
</style>

<h2 class="text-center dashboard-title mb-5" style="color: #06224e;">
    📊 Dashboard Dinas Lingkungan Hidup
</h2>


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
                    '#102C57', '#19376D', '#1D2D50', '#2D4263', '#112B3C', '#435585'
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
                    ticks: { color: '#B4D4FF' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: '#B4D4FF' },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                }
            }
        }
    });
</script>

@endsection
