@inject('carbon', 'Carbon\Carbon')
@if ($get == 'add')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data User</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('storeAdminUser') }}"
            method="post">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Nama</label>
                <input type="text" class="form-control" required id="nama" name="nama" value="{{ Session::get('nama') ? Session::get('nama') : '' }}">
                <div class="invalid-feedback">
                    Kolom nama Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">email</label>
                <input type="email" class="form-control" required id="email" name="email">
                <div class="invalid-feedback">
                    Kolom Email Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis">Username</label>
                <input type="text" class="form-control" required id="username" name="username">
                <div class="invalid-feedback">
                    Kolom username Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis">Password</label>
                <input type="password" class="form-control" required id="username" name="password">
                <div class="invalid-feedback">
                    Kolom password Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="choices form-select" required id="role" name="role">
                    <option value="">Pilih Salah Satu role</option>                 
                    <option value="admin">Admin</option>                 
                    <option value="pustakawan">Pustakawan</option>                 
                    <option value="anggota">Anggota</option>                 
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu role!
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="L" required value="L">
                    <label class="form-check-label" for="L">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="P" required value="P">
                    <label class="form-check-label" for="P">Perempuan</label>
                </div>
                <div class="invalid-feedback">
                    Pilih Salah Satu Gender!
                </div>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir">
                <div class="invalid-feedback">
                    Kolom Tanggal Lahir Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="agama">Agama</label>
                <select class="form-control  choices" name="agama" id="agama" required>
                    <option value="">Pilih Salah Satu Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                </select>
                <span class="invalid-feedback">Harap Pilih Salah Satu Agama!</span>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="4" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Kolom Alamat Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">Telpon</label>
                <input type="text" class="form-control" required id="tlp" name="tlp">
                <div class="invalid-feedback">
                    Kolom No Telpon Pengarang Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Aktivasi</label>
                <div class="form-check">
                    <input class="form-check-input" checked type="radio" name="is_active" id="aktif" required value="aktif">
                    <label class="form-check-label" for="aktif">Aktif</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="nonaktif" required value="nonaktif">
                    <label class="form-check-label" for="nonaktif">Nonaktif</label>
                </div>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">foto</label>
                <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg"
                    id="foto" name="foto">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
    {{-- ---edit-- --}}
    @elseif ($get == 'edit')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data User</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <form class="needs-validation" enctype="multipart/form-data" novalidate
            action="{{ route('adminUpdateUser', $dataUser->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" required id="nama" name="nama"
                    value="{{ $dataUser->nama }}">
                <div class="invalid-feedback">
                    Kolom Nama Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" required id="email" name="email"
                    value="{{ $dataUser->email }}">
                <div class="invalid-feedback">
                    Kolom email Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis">Username</label>
                <input type="text" class="form-control" required id="username" name="username"
                value="{{ $dataUser->username}}">
                <div class="invalid-feedback">
                    Kolom username Wajib Diisi!
                </div>
            </div>
    
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="choices form-select" required id="role" name="role">
                    <option value="">Pilih Salah Satu role</option>                 
                    <option {{ $dataUser->role == 'admin' ? 'selected' : '' }} value="admin">Admin</option>                 
                    <option {{ $dataUser->role == 'pustakawan' ? 'selected' : '' }} value="pustakawan">Pustakawan</option>                 
                    <option {{ $dataUser->role == 'anggota' ? 'selected' : '' }} value="anggota">Anggota</option>                 
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu role!
                </div>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="L" required {{ $dataUser->gender == 'L' ? 'checked' : '' }} value="L">
                    <label class="form-check-label" for="L">Laki-Laki</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="P" required {{ $dataUser->gender == 'P' ? 'checked' : '' }} value="P">
                    <label class="form-check-label" for="P">Perempuan</label>
                </div>
                <div class="invalid-feedback">
                    Pilih Salah Satu Gender!
                </div>
            </div>
            <div class="mb-3">
                <label for="tgllahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" name="tgl_lahir" value="{{ $dataUser->tgl_lahir }}">
                <div class="invalid-feedback">
                    Kolom Tanggal Lahir Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="agama">Agama</label>
                <select class="form-control choices" name="agama" id="agama" required>
                    <option value="">Pilih Salah Satu Agama</option>
                    <option {{ $dataUser->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam</option>
                    <option {{ $dataUser->agama == 'Kristen' ? 'selected' : '' }} value="Kristen">Kristen</option>
                    <option {{ $dataUser->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu</option>
                    <option {{ $dataUser->agama == 'Budha' ? 'selected' : '' }} value="Budha">Budha</option>
                    <option {{ $dataUser->agama == 'Kong Hu Chu' ? 'selected' : '' }} value="Kong Hu Chu">Kong Hu Chu</option>
                </select>
                <span class="invalid-feedback">Harap Pilih Salah Satu Agama!</span>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="4" class="form-control" required>{{ $dataUser->alamat }}</textarea>
                <div class="invalid-feedback">
                    Kolom Alamat Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="tlp" class="form-label">Telpon</label>
                <input type="text" class="form-control" required id="tlp" name="tlp" value="{{ $dataUser->tlp }}">
                <div class="invalid-feedback">
                    Kolom No Telpon Pengarang Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Aktivasi</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="aktif" required value="aktif" {{ $dataUser->is_active == 'aktif' ? 'checked' : '' }}>
                    <label class="form-check-label" for="aktif">Aktif</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_active" id="nonaktif" required value="nonaktif" {{ $dataUser->is_active == 'nonaktif' ? 'checked' : '' }}>
                    <label class="form-check-label" for="nonaktif">Nonaktif</label>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('public/storage/' . $dataUser->foto) }}" class="img-fluid"
                            alt="Cover {{ $dataUser->nama }}">
                    </div>
                    <div class="col-8 my-auto">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control"
                            accept="image/png, image/gif, image/jpeg, image/jpg" id="foto" name="foto">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
 @elseif ($get == 'detail')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail User "{{ $dataUser->nama }}"</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <img class="img-fluid mx-auto" src="{{ asset('public/storage/' . $dataUser->foto) }}"
                    alt="Cover {{ $dataUser->nama }}">
            </div>
            <div class="col-6">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>nama</td>
                        <td> : </td>
                        <td>{{ $dataUser->nama }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>{{ $dataUser->email }}</td>
                    </tr>
                    <tr>
                        <td>username</td>
                        <td> : </td>
                        <td>{{ $dataUser->username }}</td>
                    </tr>
                    <tr>
                        <td>gender</td>
                        <td> : </td>
                        <td>{{ $dataUser->gender}}</td>
                    </tr>
                    <tr>
                        <td>tgl lahir</td>
                        <td> : </td>
                        <td>{{ $carbon::parse($dataUser->tgl_lahir)->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <td>agama</td>
                        <td> : </td>
                        <td>{{ $dataUser->agama }}</td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td> : </td>
                        <td>{{ $dataUser->alamat }}</td>
                    </tr>
                    <tr>
                        <td>telpon</td>
                        <td> : </td>
                        <td>{{ $dataUser->tlp }}</td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td> : </td>
                        <td>{{ $dataUser->role }}</td>
                    </tr>
                    <tr>
                        <td>Aktivasi</td>
                        <td> : </td>
                        <td>{{ $dataUser->is_active }}</td>
                    </tr>
                   
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
    @elseif ($get == 'delete')
    <div class="modal-header bg-danger">
        <h5 class="modal-title white" id="myModalLabel120">
            <i class="fas fa-exclamation-triangle"></i> Peringatan!
        </h5>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <h5>Apakah Anda yakin untuk menghapus data user {{ $dataUser->nama }}?</h5>
    </div>
    <div class="modal-footer">
        <form method="POST" action="{{ route('adminDestroyUser', $dataUser->id) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Cancel</span>
            </button>
        </form>
    </div>
@elseif ($get == 'export')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Export Data User</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered table-hover" id="example1">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">username</th>
                    <th class="text-center">role</th>
                    <th class="text-center">gender</th>
                    <th class="text-center">tgl lahir</th>
                    <th class="text-center">Agama</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Telpon</th>
                    <th class="text-center">Aktivasi</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @php $no= 1; @endphp
                @foreach ($dataUser as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->role}}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->tgl_lahir }}</td>
                        <td>{{ $row->agama }}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->tlp }}</td>
                        <td>{{ $row->is_active }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
