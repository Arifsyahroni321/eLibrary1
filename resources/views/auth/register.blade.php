@extends('auth.index')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
            <h3 class="text-center mt-3 mb-5">E-LIBRARY | Register</h3>
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate action="{{ route('registerAct') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" id="nama" required
                                value="{{ Session::get('nama') ? Session::get('nama') : '' }}">
                            <span class="invalid-feedback">Harap Masukkan Nama Lengkap Anda!</span>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Gender</label>
                            <div class="form-check">
                                <input {{ Session::get('gender') ? Session::get('gender') == 'L' ? 'checked' : '' : null }} class="form-check-input" type="radio" name="gender" id="L" required value="L">
                                <label class="form-check-label" for="L">Laki-Laki</label>
                            </div>
                            <div class="form-check">
                                <input {{ Session::get('gender') ? Session::get('gender') == 'P' ? 'checked' : '' : null }} class="form-check-input" type="radio" name="gender" id="P" required value="P">
                                <label class="form-check-label" for="P">Perempuan</label>
                            </div>
                            <div class="invalid-feedback">
                                Pilih Salah Satu Gender!
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" required name="tgl_lahir" id="tgl_lahir" cols="4" value="{{ Session::get('tgl_lahir') ? Session::get('alamat') : null }}">
                            <span class="invalid-feedback">Harap Masukkan Tanggal Lahir Anda!</span>
                        </div>
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" required name="alamat" id="alamat" cols="4">{{ Session::get('alamat') ? Session::get('alamat') : null }}</textarea>
                            <span class="invalid-feedback">Harap Masukkan Alamat Lengkap Anda!</span>
                        </div>
                        <div class="mb-3">
                            <label for="agama">Agama</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value=""></option>
                                <option {{ Session::get('agama') ? Session::get('agama') == 'Islam' ? 'selected' : '' : null }} value="Islam">Islam</option>
                                <option {{ Session::get('agama') ? Session::get('agama') == 'Kristen' ? 'selected' : '' : null }} value="Kristen">Kristen</option>
                                <option {{ Session::get('agama') ? Session::get('agama') == 'Hindu' ? 'selected' : '' : null }} value="Hindu">Hindu</option>
                                <option {{ Session::get('agama') ? Session::get('agama') == 'Budha' ? 'selected' : '' : null }} value="Budha">Budha</option>
                                <option {{ Session::get('agama') ? Session::get('agama') == 'Kong Hu Chu' ? 'selected' : '' : null }} value="Kong Hu Chu">Kong Hu Chu</option>
                            </select>
                            <span class="invalid-feedback">Harap Pilih Salah Satu Agama!</span>
                        </div>
                        <div class="mb-3">
                            <label for="tlp">Telpon</label>
                            <input type="text" class="form-control" pattern="[0-9]{10,13}" name="tlp" id="tlp" required
                                value="{{ Session::get('tlp') ? Session::get('tlp') : '' }}">
                            <span class="invalid-feedback">Harap Masukkan Nomor Telpon yang Valid!</span>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required
                                value="{{ Session::get('email') ? Session::get('email') : '' }}">
                            <span class="invalid-feedback">Harap Masukkan Email yang Valid!</span>
                        </div>
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required
                                value="{{ Session::get('username') ? Session::get('username') : '' }}">
                            <span class="invalid-feedback">Harap Masukkan Username Anda!</span>
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" pattern=".{8,}" class="form-control" name="password" id="password"
                                required>
                            <span class="invalid-feedback">Password Minimum 8 Karakter!</span>
                        </div>
                        <div class="mb-3">
                            <label for="reupass" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" required id="reupass" name="reupass">
                            <div class="invalid-feedback">
                                Password Tidak Cocok!
                            </div>
                        </div>
                        <div class="mb-3 d-grid">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('login') }}">Sudah memiliki akun? Login Disini</a>
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