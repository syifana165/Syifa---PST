@extends('layout.v_template')

@section('content')

<!-- Import Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f7fafc;
        color: #2d3748;
        margin: 0;
        padding: 0;
    }

    .dashboard-wrapper {
        display: flex;
        gap: 24px;
        padding: 24px;
        background-color: #edf2f7;
        border-radius: 16px;
        flex-wrap: wrap;
        min-height: 85vh;
        box-sizing: border-box;
    }

    .sidebar {
        flex: 1 1 220px;
        max-width: 240px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 30px 20px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        text-align: center;
        transition: box-shadow 0.3s ease;
    }
    .sidebar:hover {
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.5);
    }

    .sidebar img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
        object-fit: cover;
        border: 4px solid rgba(255,255,255,0.7);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 16px;
    }

    .sidebar .info {
        font-weight: 600;
        font-size: 1.15rem;
        margin-bottom: 6px;
        letter-spacing: 0.05em;
    }

    .sidebar .phone {
        font-size: 0.9rem;
        font-weight: 400;
        opacity: 0.8;
        letter-spacing: 0.03em;
    }

    .main-panel {
        flex: 3 1 700px;
        display: flex;
        flex-direction: column;
        gap: 24px;
    }

    .stats-boxes {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .card {
        flex: 1 1 220px;
        background-color: white;
        padding: 24px 18px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(100, 100, 150, 0.08);
        text-align: center;
        border-bottom: 4px solid transparent;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        cursor: default;
    }
    .card:hover {
        border-bottom-color: #667eea;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.15);
    }

    .card h5 {
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 8px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        font-size: 0.9rem;
    }
    .card h2 {
        font-weight: 700;
        font-size: 2.8rem;
        color: #2d3748;
        margin: 0;
        line-height: 1.1;
    }

    .filter-box {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding-top: 10px;
    }
    .filter-box label {
        font-weight: 600;
        margin-bottom: 6px;
        color: #4a5568;
        font-size: 0.95rem;
        letter-spacing: 0.03em;
    }
    .filter-box select {
        padding: 8px 12px;
        font-size: 1rem;
        border-radius: 12px;
        border: 1.8px solid #cbd5e0;
        outline: none;
        width: 180px;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }
    .filter-box select:hover,
    .filter-box select:focus {
        border-color: #667eea;
        box-shadow: 0 0 8px rgba(102, 126, 234, 0.4);
    }

    .charts {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
        justify-content: center;
    }

    .chart-box {
        flex: 1 1 320px;
        background-color: white;
        padding: 24px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(100, 100, 150, 0.08);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .chart-box h6 {
        font-weight: 600;
        margin-bottom: 14px;
        color: #4a5568;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .dashboard-wrapper {
            flex-direction: column;
            padding: 16px;
        }
        .sidebar, .main-panel {
            max-width: 100%;
            flex: none;
        }
        .stats-boxes, .charts {
            justify-content: center;
        }
    }
</style>

<div class="dashboard-wrapper">
    <aside class="sidebar">
        <img src="{{ asset('assets/img/admin.jpg') }}" alt="Admin Foto">
        <div class="info">Admin DLH</div>
        <div class="phone">0857-9876-6534</div>
    </aside>

    <section class="main-panel">
        <div class="stats-boxes">
            <div class="card">
                <h5>Total PJ</h5>
                <h2>{{ $countPJ }}</h2>
            </div>
            <div class="card">
                <h5>Total Petugas</h5>
                <h2>{{ $countPetugas }}</h2>
            </div>
            <div class="card filter-box">
                <form method="GET" action="{{ route('data.pj_petugas') }}">
                    <label for="jenis">Tampilkan Data:</label>
                    <select name="jenis" id="jenis" onchange="this.form.submit()">
                        <option value="" {{ request('jenis') == '' ? 'selected' : '' }}>Tampilkan</option>
                        <option value="pj" {{ request('jenis') == 'pj' ? 'selected' : '' }}>Penanggung Jawab</option>
                        <option value="petugas" {{ request('jenis') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="charts">
            <div class="chart-box">
                <h6>Distribusi Data</h6>
                <canvas id="chartPie" aria-label="Pie chart distribution" role="img"></canvas>
            </div>
            <div class="chart-box">
                <h6>Perbandingan</h6>
                <canvas id="chartBar" aria-label="Bar chart comparison" role="img"></canvas>
            </div>
        </div>

        <div class="card" style="min-height: 300px;">
            @if ($jenis == 'pj')
                @include('v_pj', ['dataPJ' => $dataPJ])
            @elseif ($jenis == 'petugas')
                @include('v_petugas', ['dataPetugas' => $dataPetugas])
            @else
                <p style="text-align: center; font-style: italic; color: #718096; margin-top: 80px;">
                    Silakan pilih jenis data untuk ditampilkan.
                </p>
            @endif
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const pieCtx = document.getElementById('chartPie').getContext('2d');
    const barCtx = document.getElementById('chartBar').getContext('2d');

    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: ['PJ', 'Petugas'],
            datasets: [{
                data: [{{ $countPJ }}, {{ $countPetugas }}],
                backgroundColor: ['#667eea', '#1cc88a'],
                hoverOffset: 30,
                borderColor: '#fff',
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: { family: 'Inter' },
                        color: '#4a5568',
                        padding: 20,
                    }
                }
            }
        }
    });

    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: ['PJ', 'Petugas'],
            datasets: [{
                label: 'Jumlah',
                data: [{{ $countPJ }}, {{ $countPetugas }}],
                backgroundColor: ['#667eea', '#1cc88a'],
                borderRadius: 6,
                maxBarThickness: 60,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: { family: 'Inter' },
                        color: '#4a5568',
                        stepSize: 1,
                    },
                    grid: {
                        color: '#e2e8f0'
                    }
                },
                x: {
                    ticks: {
                        font: { family: 'Inter' },
                        color: '#4a5568',
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
            }
        }
    });
</script>

@endsection
