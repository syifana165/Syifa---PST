<ul class="navbar-nav sidebar sidebar-dark bg-gradient-primary accordion" id="accordionSidebar"
    style="min-height: 100vh; font-family: 'Poppins', sans-serif; background: linear-gradient(180deg, #0a1d44 0%, #062144 100%);">

    <!-- Logo DLH -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center mt-4 mb-3">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo DLH" style="height: 60px; width: 60px; border-radius: 50%;">
        </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0" style="border-color: rgba(255,255,255,0.2);">

    <!-- Menu Utama -->
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="/home">
            <i class="fas fa-home me-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('pengaduan*') ? 'active' : '' }}">
        <a class="nav-link" href="/pengaduan">
            <i class="fas fa-bullhorn me-2"></i>
            <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('feedback*') ? 'active' : '' }}">
        <a class="nav-link" href="/feedback">
            <i class="fas fa-comment-dots me-2"></i>
            <span>Feedback</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('tim*') ? 'active' : '' }}">
        <a class="nav-link" href="/tim">
            <i class="fas fa-users me-2"></i>
            <span>TIM</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('penugasan*') ? 'active' : '' }}">
        <a class="nav-link" href="/penugasan">
            <i class="fas fa-tasks me-2"></i>
            <span>Penugasan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('laporan*') ? 'active' : '' }}">
        <a class="nav-link" href="/laporan">
            <i class="fas fa-file-alt me-2"></i>
            <span>Bukti Tugas</span>
        </a>
    </li>

    <!-- Dropdown Data -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData"
            aria-expanded="true" aria-controls="collapseData">
            <i class="fas fa-database me-2"></i>
            <span>Data</span>
        </a>
        <div id="collapseData" class="collapse {{ Request::is('data/pj*') || Request::is('data/petugas*') ? 'show' : '' }}"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('data/pj*') ? 'active' : '' }}" href="{{ route('pj.index') }}">
                    <i class="fas fa-user-tie me-2"></i> Data PJ
                </a>
                <a class="collapse-item {{ Request::is('data/petugas*') ? 'active' : '' }}" href="{{ route('petugas.index') }}">
                    <i class="fas fa-user-friends me-2"></i> Data Petugas
                </a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-2" style="border-color: rgba(255,255,255,0.2);">

    <!-- Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" onclick="logoutConfirm(event)">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>

<!-- Logout Script -->
<script>
    function logoutConfirm(event) {
        event.preventDefault();
        if (confirm('Yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>

<!-- Tambahan Styling -->
<style>
    .nav-link:hover {
        background: rgba(255, 255, 255, 0.1);
        color: #00d4ff !important;
        transform: translateX(5px);
    }
    .nav-link.active {
        background-color: rgba(255, 255, 255, 0.15);
        color: #00d4ff !important;
        border-left: 4px solid #00d4ff;
    }
    .collapse-inner .collapse-item.active {
        font-weight: bold;
        color: #0a1d44 !important;
    }
</style>
