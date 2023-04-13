@include('admin.layout.header')
<div class="preload-wrapper">
    <div class="spinner-border preload text-primary">
    </div>
    <h4 class="text-muted">Harap Tunggu...</h4>
</div>
@include('admin.layout.sidebar')
@include('admin.layout.navbar')
@yield('content')
@include('admin.layout.footer')