<nav class="sidebar-nav">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="nav-icon icon-speedometer"></i> Dashboard
            </a>
        </li>

        <li class="nav-title">KELOLA PAKET</li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-rocket"></i> PENDAFTARAN
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.order')}}">
                        <i class="nav-icon icon-pencil"></i> Pemesanan
                    </a>
                </li>
            </ul>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.jamaah')}}">
                        <i class="nav-icon icon-user"></i> Jamaah
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item nav-dropdown">
            <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon icon-settings"></i> KELOLA PAKET
            </a>
            <ul class="nav-dropdown-items">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.categories')}}">
                        <i class="nav-icon icon-diamond"></i> Kategori Paket
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.departures')}}">
                        <i class="nav-icon icon-briefcase"></i> Group Keberangkatan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.programs')}}">
                        <i class="nav-icon icon-trophy"></i> Program
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('paket.rooms')}}">
                        <i class="nav-icon icon-check"></i> Kamar
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>