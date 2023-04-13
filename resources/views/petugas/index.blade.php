@include('petugas.layout.header')
<div class="preload-wrapper">
    <div class="spinner-border preload text-primary">
    </div>
    <h4 class="text-muted">Harap Tunggu...</h4>
</div>
@include('petugas.layout.sidebar')
@include('petugas.layout.navbar')
@yield('content')
@include('petugas.layout.footer')