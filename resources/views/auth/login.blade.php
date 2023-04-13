@extends('auth.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <h3 class="text-center mt-3 mb-5">E-LIBRARY | Login</h3>
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('loginAct') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="username">Username/Email</label>
                            <input type="text" class="form-control" name="username" id="username" required
                                value="{{ Session::get('username') ? Session::get('username') : '' }}">
                            <span class="invalid-feedback">Harap Masukkan Username/Email!</span>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" pattern=".{8,}" class="form-control" name="password" id="password"
                                required>
                            <span class="invalid-feedback">Password Minimum 8 Karakter!</span>
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('register') }}">Belum memiliki akun? Daftar Disini</a>
                        </div>
                        <div class="mb-0">
                            <a href="{{ route('home') }}"><i class="bi-arrow-left"></i> Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection