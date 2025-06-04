@extends('layout.v_template')

@section('title', 'Dashboard Feedback')

@section('content')

<style>
    /* Print Styling */
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
        .btn, .modal, .alert, .card-header, .search-form {
            display: none !important;
        }
    }

    /* Card Statistik kecil di bawah tabel */
    .stat-card-small {
        background: linear-gradient(135deg, #8B0000, #B22222);
        color: white;
        border-radius: 8px;
        padding: 10px 20px;
        box-shadow: 0 5px 10px rgba(139,0,0,0.3);
        display: inline-block;
        font-weight: 600;
        font-size: 1.1rem;
        margin-top: 15px;
    }

    /* Table Styling */
    table#example1 {
        border-collapse: separate !important;
        border-spacing: 0 10px;
        font-size: 0.95rem;
    }
    table#example1 thead th {
        border-bottom: none;
        border-radius: 8px !important;
        padding: 12px 15px;
    }
    table#example1 tbody tr {
        background-color: #f8d7da;
        transition: background-color 0.3s ease;
        border-radius: 8px;
    }
    table#example1 tbody tr:hover {
        background-color: #b22222;
        color: white;
        cursor: pointer;
    }
    table#example1 tbody td {
        vertical-align: middle !important;
        padding: 12px 15px;
        border: none;
    }
</style>

<div class="container-fluid pt-4">

    <!-- Tabel Feedback -->
    <div class="card shadow mb-4" id="print-area">

        <div class="card-header py-3 d-flex justify-content-between align-items-center" style="background-color: #8B0000; color: white;">
            <h3 class="card-title m-0">Data Feedback</h3>
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
            <div class="table-responsive">
                <table id="example1" class="table table-bordered text-center">
                    <thead style="background-color: #8B0000; color: white; border-radius: 10px;">
                        <tr>
                            <th>No</th>
                            <th class="text-start ps-3">Nama</th>
                            <th class="text-start ps-3">Email</th>
                            <th class="text-start ps-3">Feedback</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feedback as $key => $data)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td class="text-start ps-3">{{ $data->Nama }}</td>
                            <td class="text-start ps-3">{{ $data->Email }}</td>
                            <td class="text-start ps-3">{{ $data->Feedback }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">Data feedback tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Total Feedback di bawah tabel -->
            <div class="text-end">
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

@endsection
