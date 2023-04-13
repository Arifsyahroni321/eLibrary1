@php
    $page = Route::currentRouteName();
@endphp
<div class="sidebar-menu">
    <ul class="menu" style="margin-top: -5px">
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item {{ $page == 'petugasDashboard' ? 'active' : '' }}">
            <a href="{{ route('petugasDashboard') }}" class="sidebar-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="sidebar-item has-sub {{ $page == 'petugasKategori' || $page == 'petugasPenerbit' || $page == 'petugasPengarang' || $page == 'petugasJenisDenda' ? 'active' : '' }}">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-archive"></i>
                <span>Master Data</span>
            </a>
            <ul class="submenu {{ $page == 'petugasKategori' || $page == 'petugasPenerbit' || $page == 'petugasPengarang' || $page == 'petugasJenisDenda' ? 'active' : '' }}">
                <li class="submenu-item {{ $page == 'petugasKategori' ? 'active' : '' }}">
                    <a href="{{ route('petugasKategori') }}">Kategori</a>
                </li>
                <li class="submenu-item {{ $page == 'petugasPenerbit' ? 'active' : '' }}">
                    <a href="{{ route('petugasPenerbit') }}">Penerbit</a>
                </li>
                <li class="submenu-item {{ $page == 'petugasPengarang' ? 'active' : '' }}">
                    <a href="{{ route('petugasPengarang') }}">Pengarang</a>
                </li>
                <li class="submenu-item {{ $page == 'petugasJenisDenda' ? 'active' : '' }}">
                    <a href="{{ route('petugasJenisDenda') }}">Jenis Denda</a>
                </li>
            </ul>
        </li>

        <li class="sidebar-item  has-sub">
            <a href="#" class='sidebar-link'>
                <i class="fas fa-chart-area"></i>
                <span>Transaksi</span>
            </a>
            <ul class="submenu ">
                <li class="submenu-item ">
                    <a href="{{ route('petugasPeminjaman') }}">Peminjaman</a>
                </li>
                <li class="submenu-item ">
                    <a href="{{ route('petugasPengembalian') }}">Pengembalian</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item  {{ $page == 'petugasBuku' ? 'active' : '' }}">
            <a href="{{ route('petugasBuku') }}" class='sidebar-link'>
                <i class="fas fa-book"></i>
                <span>Data Buku</span>
            </a>
        </li>
    </ul>
</div>
</div>
</div>
