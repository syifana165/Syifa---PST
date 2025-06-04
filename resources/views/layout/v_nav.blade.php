<ul class="navbar-nav sidebar accordion" id="accordionSidebar" 
    style="background-color: #003366; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; border-radius: 12px; padding: 12px;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-4 mb-3" href="/home" 
       style="border-bottom: 1px solid rgba(255,255,255,0.15); border-radius: 12px;">
        <div class="sidebar-brand-icon rotate-n-15" 
             style="color: #f0ad4e; font-size: 1.8rem; transition: transform 0.3s;">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-white fw-bold" 
             style="font-size: 1.3rem; letter-spacing: 2px;">Project2</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-3" style="border-color: rgba(255,255,255,0.15);">

    <!-- Nav Items -->
    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center px-3 py-2" href="/pengaduan" 
           style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;">
            <i class="fas fa-chalkboard-teacher me-3" 
               style="color: #f0ad4e; font-size: 1.2rem;"></i>
            <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center px-3 py-2" href="/feedback" 
           style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;">
            <i class="fas fa-comments me-3" 
               style="color: #5bc0de; font-size: 1.2rem;"></i>
            <span>Feedback</span>
        </a>
    </li>
    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center px-3 py-2" href="/penugasan" 
           style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;">
            <i class="fas fa-clipboard me-3" 
               style="color: #0275d8; font-size: 1.2rem;"></i>
            <span>Data Penugasan</span>
        </a>
    </li>

    <li class="nav-item mb-2">
        <a class="nav-link d-flex align-items-center px-3 py-2" href="/laporan" 
           style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;">
            <i class="fas fa-clipboard me-3" 
               style="color: #0275d8; font-size: 1.2rem;"></i>
            <span>Bukti Penugasan</span>
        </a>
    </li>

    @auth
        @if (auth()->user()->level == 1)
            <li class="nav-item mb-2">
                <a class="nav-link d-flex align-items-center px-3 py-2" href="{{ route('data.pj_petugas') }}" 
                   style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;">
                    <i class="fas fa-user-shield me-3" 
                       style="color: #5cb85c; font-size: 1.2rem;"></i>
                    <span>Data PJ dan Petugas</span>
                </a>
            </li>
        @endif
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider my-4" style="border-color: rgba(255,255,255,0.15);">

    <li class="nav-item">
        <a class="nav-link d-flex align-items-center px-3 py-2" href="#" 
           style="color: white; font-weight: 600; border-radius: 12px; transition: background-color 0.3s, color 0.3s;" 
           onclick="logoutConfirm(event)">
            <i class="fas fa-sign-out-alt me-3" style="color: #d9534f; font-size: 1.2rem;"></i>
            <span>Logout</span>
        </a>
    </li>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        function logoutConfirm(event) {
            event.preventDefault();
            if (confirm('Apakah Anda yakin ingin logout?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>

    <style>
        /* Hover effect untuk semua link sidebar */
        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15) !important;
            color: #f0ad4e !important;
            text-decoration: none;
        }
        /* Rotasi ikon brand saat hover */
        .sidebar-brand-icon:hover {
            transform: rotate(15deg);
            color: #ffc107 !important;
            cursor: pointer;
        }
    </style>
</ul>
