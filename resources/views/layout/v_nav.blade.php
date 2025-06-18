<ul id="accordionSidebar" class="navbar-nav sidebar shadow"
    style="
        backdrop-filter: blur(10px);
        background: rgba(0, 34, 68, 0.75);
        border-radius: 20px;
        padding: 20px;
        font-family: 'Poppins', sans-serif;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        border: 1px solid rgba(255, 255, 255, 0.18);
    ">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4" href="/home"
        style="border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 1rem;">
        <div class="sidebar-brand-icon rotate-n-15" style="font-size: 2rem; color: #ffc107;">
            <i class="fas fa-recycle"></i>
        </div>
        <div class="sidebar-brand-text mx-2 text-white fw-bold"
            style="font-size: 1.3rem; letter-spacing: 1px;">Project2</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider" style="border-color: rgba(255,255,255,0.1);">

    @php
        $navItems = [
            ['url' => '/home', 'icon' => 'tachometer-alt', 'label' => 'Dashboard'],
            ['url' => '/pengaduan', 'icon' => 'chalkboard-teacher', 'label' => 'Pengaduan'],
            ['url' => '/feedback', 'icon' => 'comments', 'label' => 'Feedback'],
            ['url' => '/penugasan', 'icon' => 'clipboard-list', 'label' => 'Penugasan'],
            ['url' => '/laporan', 'icon' => 'clipboard-check', 'label' => 'Bukti Tugas'],
        ];
    @endphp

    @foreach ($navItems as $item)
        <li class="nav-item my-1">
            <a href="{{ $item['url'] }}"
                class="nav-link d-flex align-items-center px-3 py-2 {{ Request::is(ltrim($item['url'], '/').'*') ? 'active' : '' }}"
                style="
                    color: #ffffff;
                    border-radius: 12px;
                    font-weight: 500;
                    transition: all 0.3s ease;
                ">
                <i class="fas fa-{{ $item['icon'] }} me-3" style="font-size: 1.2rem;"></i>
                <span>{{ $item['label'] }}</span>
            </a>
        </li>
    @endforeach

    @auth
        @if (auth()->user()->level == 1)
            <li class="nav-item my-1">
                <a href="{{ route('data.pj_petugas') }}" class="nav-link d-flex align-items-center px-3 py-2"
                    style="color: #ffffff; font-weight: 500; border-radius: 12px; transition: all 0.3s ease;">
                    <i class="fas fa-user-shield me-3" style="font-size: 1.2rem;"></i>
                    <span>PJ & Petugas</span>
                </a>
            </li>
        @endif
    @endauth

    <hr class="sidebar-divider" style="border-color: rgba(255,255,255,0.1); margin-top: 1rem;">

    <!-- Logout -->
    <li class="nav-item">
        <a href="#" onclick="logoutConfirm(event)" class="nav-link d-flex align-items-center px-3 py-2"
            style="color: #ffffff; font-weight: 500; border-radius: 12px; transition: all 0.3s ease;">
            <i class="fas fa-sign-out-alt me-3" style="font-size: 1.2rem;"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <style>
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #ffc107 !important;
            transform: translateX(5px);
        }
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffc107 !important;
        }
        .sidebar-brand-icon:hover {
            transform: scale(1.2) rotate(10deg);
            transition: 0.3s ease-in-out;
            color: #ffdd57 !important;
        }
    </style>

    <script>
        function logoutConfirm(event) {
            event.preventDefault();
            if (confirm('Yakin mau logout?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</ul>
