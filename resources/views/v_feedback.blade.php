@extends('layout.v_template')

@section('title', 'Dashboard Feedback')

@section('content')

<style>
    .dark-mode {
        background-color: #121212;
        color: #e0e0e0;
    }

    .dark-mode .card {
        background-color: #1e1e1e;
        color: #fff;
    }

    .dark-mode .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: #fff;
    }

    .mode-toggle {
        cursor: pointer;
        font-size: 1.3rem;
        color: #333;
        transition: color 0.3s;
    }

    .dark-mode .mode-toggle {
        color: #fff;
    }

    .mode-toggle:hover {
        color: #666;
    }

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

    table#example1 thead th,
    table#example1 tbody td {
        padding: 12px 16px;
        font-size: 0.95rem;
    }

    table#example1 {
        border-collapse: collapse !important;
    }

    table#example1 tbody tr:hover {
        background-color: #f0f0f0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('mode-toggle')?.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
        });
    });

    function filterFeedback() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#feedbackTable tbody tr');

        rows.forEach(row => {
            const nama = row.cells[1]?.innerText.toLowerCase() || '';
            const email = row.cells[2]?.innerText.toLowerCase() || '';
            const feedback = row.cells[3]?.innerText.toLowerCase() || '';

            const cocok = nama.includes(input) || email.includes(input) || feedback.includes(input);
            row.style.display = cocok ? '' : 'none';
        });
    }
</script>

<div class="container-fluid pt-4">
    <div class="card shadow-sm border rounded-4" id="print-area">

        <div class="card-header bg-white text-dark border-bottom d-flex justify-content-between align-items-center flex-wrap">
            <h2 class="m-0 fw-semibold">Data Kritik & Saran</h2>
            <div style="width: 300px;">
                <input 
                    type="text" 
                    id="searchInput" 
                    class="form-control form-control-sm" 
                    placeholder="Cari Nama, Email, atau Feedback..." 
                    onkeyup="filterFeedback()"
                >
            </div>
        </div>

        <div class="card-body pt-0">
            <div class="table-responsive mt-3">
                <table id="feedbackTable" class="table table-bordered text-center align-middle">
                    <thead class="table-light">
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
                            <td colspan="4" class="text-muted">Data feedback tidak ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="text-end mt-3">
                <span class="badge bg-secondary px-3 py-2 rounded-pill" style="color: #000;">
                    Total Kritik & Saran: {{ $feedback->count() }}
                </span>
            </div>

            <div class="d-flex justify-content-end mt-3 no-print">
                <a href="javascript:window.print()" class="btn btn-outline-dark btn-sm">
                    <i class="fas fa-print"></i> Print
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    function filterFeedback() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const rows = document.querySelectorAll('#feedbackTable tbody tr');

        rows.forEach(row => {
            const nama = row.cells[1]?.innerText.toLowerCase() || '';
            const email = row.cells[2]?.innerText.toLowerCase() || '';
            const feedback = row.cells[3]?.innerText.toLowerCase() || '';

            const cocok = nama.includes(input) || email.includes(input) || feedback.includes(input);
            row.style.display = cocok ? '' : 'none';
        });
    }
</script>

@endsection
