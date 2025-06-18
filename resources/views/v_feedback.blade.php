@extends('layout.v_template')

@section('title', 'Dashboard Feedback')

@section('content')

<!-- Dark/Light Mode Toggle -->
<style>
    .dark-mode {
        background-color: #121212;
        color: #e0e0e0;
    }
    .dark-mode .card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(10px);
        color: #fff;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .dark-mode .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: #fff;
    }
    .mode-toggle {
        cursor: pointer;
        font-size: 1.3rem;
        color: #fff;
        transition: color 0.3s;
    }
    .mode-toggle:hover {
        color: #ffd700;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('mode-toggle');
        toggle.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });
    });
</script>

<div class="container-fluid pt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-danger">📢 Dashboard Feedback</h2>
        <i id="mode-toggle" class="fas fa-moon mode-toggle" title="Toggle Dark/Light Mode"></i>
    </div>

    <!-- Card Tabel -->
    <div class="card shadow mb-4" id="print-area" style="border-radius: 16px; overflow: hidden;">

        <div class="card-header d-flex justify-content-between align-items-center" style="background: linear-gradient(135deg, #8B0000, #B22222); color: white;">
            <h5 class="m-0 fw-semibold">Data Feedback</h5>
            <form action="{{ route('feedback.index') }}" method="GET" class="d-flex" style="width: 350px;">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Cari Nama..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-light ms-2">
                    <i class="fas fa-search"></i>
                </button>
                @if(request('search'))
                <a href="{{ route('feedback.index') }}" class="btn btn-sm btn-secondary ms-2">
                    <i class="fas fa-times"></i>
                </a>
                @endif
            </form>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive mt-3">
                <table id="example1" class="table table-bordered text-center align-middle">
                    <thead style="background-color: #8B0000; color: white;">
                        <tr>
                            <th>No</th>
                            <th class="text-start ps-3">Nama</th>
                            <th class="text-start ps-3">Email</th>
                            <th class="text-start ps-3">Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feedback as $key => $data)
                        <tr class="bg-light-subtle">
                            <td>{{ $key + 1 }}</td>
                            <td class="text-start ps-3">{{ $data->Nama }}</td>
                            <td class="text-start ps-3">{{ $data->Email }}</td>
                            <td class="text-start ps-3">{{ $data->Feedback }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-danger fw-semibold">Data feedback tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Statistik -->
            <div class="text-end mt-3">
                <div class="stat-card-small">
                    Total Feedback: {{ $feedback->count() }}
                </div>
            </div>

            <!-- Tombol Print -->
            <div class="d-flex justify-content-end mt-3 no-print">
                <a href="javascript:window.print()" class="btn btn-info btn-sm">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Styling Khusus -->
<style>
    @media print {
        body * {
            visibility: hidden;
        }
        #print-area, #print-area * {
            visibility: visible;
        }
        #print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .no-print {
            display: none !important;
        }
    }

    .stat-card-small {
        background: rgba(255, 0, 0, 0.75);
        color: white;
        border-radius: 12px;
        padding: 10px 20px;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.5);
        display: inline-block;
        font-weight: 600;
        font-size: 1rem;
    }

    table#example1 tbody tr:hover {
        background-color: #b22222;
        color: white;
        cursor: pointer;
        box-shadow: 0 0 10px rgba(178, 34, 34, 0.8);
    }

    table#example1 thead th, table#example1 tbody td {
        border: none;
        padding: 12px 16px;
    }

    table#example1 {
        border-collapse: separate !important;
        border-spacing: 0 10px;
        font-size: 0.95rem;
    }
</style>

@endsection
