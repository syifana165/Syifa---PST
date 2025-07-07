@extends('layout.v_template')

@section('title', 'Edit Penugasan')

@section('content')
<style>
    body {
        background: linear-gradient(135deg, #f1f8e9, #e3f2fd);
    }

    .glass-card {
        backdrop-filter: blur(12px);
        background: rgba(255, 255, 255, 0.75);
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        max-width: 600px;
        margin: 3rem auto;
        transition: all 0.3s ease-in-out;
    }

    .glass-card:hover {
        transform: scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-size: 2rem;
        font-weight: 700;
        color: #0277bd;
        text-align: center;
        margin-bottom: 2rem;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }

    label {
        font-weight: 600;
        color: #37474f;
        display: block;
        margin-bottom: 0.5rem;
    }

    select.form-control,
    input.form-control {
        border-radius: 12px;
        border: 1px solid #90caf9;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        transition: 0.3s ease;
    }

    select.form-control:focus,
    input.form-control:focus {
        border-color: #0277bd;
        box-shadow: 0 0 8px #64b5f6;
        outline: none;
    }

    .btn-submit {
        background-color: #0288d1;
        color: white;
        padding: 12px 30px;
        border-radius: 30px;
        font-weight: 700;
        border: none;
        transition: 0.3s ease;
        box-shadow: 0 8px 20px rgba(2, 136, 209, 0.4);
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #01579b;
        box-shadow: 0 12px 25px rgba(1, 87, 155, 0.6);
    }

    .btn-back {
        background-color: #b0bec5;
        color: #263238;
        padding: 12px 25px;
        border-radius: 30px;
        font-weight: 600;
        border: none;
        text-decoration: none;
        display: inline-block;
        margin-left: 1rem;
        transition: 0.3s ease;
    }

    .btn-back:hover {
        background-color: #90a4ae;
        color: #263238;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    small.text-danger {
        display: block;
        margin-top: 0.25rem;
    }
</style>

<div class="glass-card">
    <div class="card-title"><i class="fas fa-edit me-2"></i>Edit Penugasan</div>

    <form action="{{ route('penugasan.update', $penugasan->id_penugasan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="id_pengaduan">Pengaduan</label>
            <select name="id_pengaduan" id="id_pengaduan" class="form-control" required>
                <option value="{{ $penugasan->id_pengaduan }}" selected>
                    {{ $penugasan->pengaduan->Nama ?? 'Pengaduan tidak ditemukan' }}
                </option>
                @foreach($pengaduanList as $p)
                    @if($p->id_pengaduan != $penugasan->id_pengaduan)
                        <option value="{{ $p->id_pengaduan }}">{{ $p->Nama }}</option>
                    @endif
                @endforeach
            </select>
            @error('id_pengaduan')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="id_petugas">Petugas</label>
            <select name="id_petugas" id="id_petugas" class="form-control" required>
                <option value="{{ $penugasan->id_petugas }}" selected data-kelompok="{{ $penugasan->kelompok_petugas }}">
                    {{ $penugasan->petugas->Nama ?? 'Petugas tidak ditemukan' }}
                </option>
                @foreach($petugasList as $pt)
                    @if($pt->id_petugas != $penugasan->id_petugas)
                        <option value="{{ $pt->id_petugas }}" data-kelompok="{{ $pt->tim->Kelompok_Petugas ?? '' }}">
                            {{ $pt->Nama }}
                        </option>
                    @endif
                @endforeach
            </select>
            @error('id_petugas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kelompok_petugas">Kelompok Petugas</label>
            <input type="text" name="kelompok_petugas" id="kelompok_petugas" class="form-control" 
                value="{{ old('kelompok_petugas', $penugasan->kelompok_petugas) }}" readonly required>
            @error('kelompok_petugas')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn-submit">Simpan Perubahan</button>
            <a href="{{ route('penugasan.index') }}" class="btn-back">Batal</a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const petugasSelect = document.getElementById('id_petugas');
    const kelompokInput = document.getElementById('kelompok_petugas');

    function updateKelompok() {
        const selectedOption = petugasSelect.options[petugasSelect.selectedIndex];
        const kelompok = selectedOption.getAttribute('data-kelompok') || '';
        kelompokInput.value = kelompok;
    }

    updateKelompok();

    petugasSelect.addEventListener('change', updateKelompok);
});
</script>
@endsection
