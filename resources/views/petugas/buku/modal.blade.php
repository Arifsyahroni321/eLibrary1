@if ($get == 'add')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Buku</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('petugasStoreBuku') }}"
            method="post">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" required id="judul" name="judul">
                <div class="invalid-feedback">
                    Kolom Judul Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" required id="tahun" name="tahun">
                <div class="invalid-feedback">
                    Kolom Tahun Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" rows="4" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Kolom Sinopsis Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="choices form-select" required id="kategori" name="kategori">
                    <option value="">Pilih Salah Satu Kategori</option>
                    @foreach ($dataKategori as $row)
                        <option value="{{ $row->id }}">{{ $row->nm_kategori }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Kategori!
                </div>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>

                <select class="choices form-select" required id="penerbit" name="penerbit">
                    <option value="">Pilih Salah Satu Penerbit</option>
                    @foreach ($dataPenerbit as $row)
                        <option value="{{ $row->id }}">{{ $row->nm_penerbit }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Penerbit!
                </div>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <select class="choices form-select" required id="pengarang" name="pengarang">
                    <option value="">Pilih Salah Satu Pengarang</option>
                    @foreach ($dataPengarang as $row)
                        <option value="{{ $row->id }}">{{ $row->nm_pengarang }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Pengarang!
                </div>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <input type="text" name="stok" class="form-control" id="stok" required>
                <div class="invalid-feedback">
                    Kolom Stok Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="harga">Harga Buku</label>
                <input type="text" name="harga" class="form-control" id="harga" required>
                <div class="invalid-feedback">
                    Kolom Harga Buku Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg, image/jpg"
                    id="cover" name="cover">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            </div>
        </form>
    </div>
@elseif ($get == 'edit')
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data Buku</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <form class="needs-validation" enctype="multipart/form-data" novalidate
            action="{{ route('petugasUpdateBuku', $dataBuku->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" required id="judul" name="judul"
                    value="{{ $dataBuku->judul }}">
                <div class="invalid-feedback">
                    Kolom Judul Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="tahun" class="form-label">Tahun</label>
                <input type="text" class="form-control" required id="tahun" name="tahun"
                    value="{{ $dataBuku->tahun }}">
                <div class="invalid-feedback">
                    Kolom Tahun Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="sinopsis">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" rows="4" class="form-control" required>{{ $dataBuku->sinopsis }}</textarea>
                <div class="invalid-feedback">
                    Kolom Sinopsis Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="choices form-select" required id="kategori" name="kategori">
                    <option value="">Pilih Salah Satu Kategori</option>
                    @foreach ($dataKategori as $row)
                        <option <?= $dataBuku->kategori_id == $row->id ? 'selected' : '' ?>
                            value="{{ $row->id }}">{{ $row->nm_kategori }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Kategori!
                </div>
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>

                <select class="choices form-select" required id="penerbit" name="penerbit">
                    <option value="">Pilih Salah Satu Penerbit</option>
                    @foreach ($dataPenerbit as $row)
                        <option <?= $dataBuku->penerbit_id == $row->id ? 'selected' : '' ?>
                            value="{{ $row->id }}">{{ $row->nm_penerbit }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Penerbit!
                </div>
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <select class="choices form-select" required id="pengarang" name="pengarang">
                    <option value="">Pilih Salah Satu Pengarang</option>
                    @foreach ($dataPengarang as $row)
                        <option <?= $dataBuku->pengarang_id == $row->id ? 'selected' : '' ?>
                            value="{{ $row->id }}">{{ $row->nm_pengarang }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih Salah Satu Pengarang!
                </div>
            </div>
            <div class="mb-3">
                <label for="stok">Stok</label>
                <input type="text" name="stok" class="form-control" id="stok" required
                    value="{{ $dataBuku->stok }}">
                <div class="invalid-feedback">
                    Kolom Stok Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <label for="harga">Harga Buku</label>
                <input type="text" name="harga" class="form-control" id="harga" required
                    value="{{ $dataBuku->harga }}">
                <div class="invalid-feedback">
                    Kolom Harga Buku Wajib Diisi!
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-4">
                        <img src="{{ asset('public/storage/' . $dataBuku->cover) }}" class="img-fluid"
                            alt="Cover {{ $dataBuku->judul }}">
                    </div>
                    <div class="col-8 my-auto">
                        <label for="cover" class="form-label">Cover</label>
                        <input type="file" class="form-control"
                            accept="image/png, image/gif, image/jpeg, image/jpg" id="cover" name="cover">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Buku "{{ $dataBuku->judul }}"</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <img class="img-fluid mx-auto" src="{{ asset('public/storage/' . $dataBuku->cover) }}"
                    alt="Cover {{ $dataBuku->judul }}">
            </div>
            <div class="col-6">
                <table cellpadding="5" cellspacing="0">
                    <tr>
                        <td>Kode</td>
                        <td> : </td>
                        <td>{{ $dataBuku->kode }}</td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td> : </td>
                        <td>{{ $dataBuku->judul }}</td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td> : </td>
                        <td>{{ $dataBuku->tahun }}</td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td> : </td>
                        <td>{{ $dataBuku->kategori->nm_kategori }}</td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td> : </td>
                        <td>{{ $dataBuku->penerbit->nm_penerbit }}</td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td> : </td>
                        <td>{{ $dataBuku->pengarang->nm_pengarang }}</td>
                    </tr>
                    <tr>
                        <td>Harga Buku</td>
                        <td> : </td>
                        <td>{{ $dataBuku->harga }}</td>
                    </tr>
                    <tr>
                        <td>Like</td>
                        <td> : </td>
                        <td>{{ $dataBuku->like }}</td>
                    </tr>
                    <tr>
                        <td>Dislike</td>
                        <td> : </td>
                        <td>{{ $dataBuku->dislike }}</td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td> : </td>
                        <td>{{ $dataBuku->stok }}</td>
                    </tr>
                    <tr>
                        <td>Sinopsis</td>
                        <td> : </td>
                        <td>{{ $dataBuku->sinopsis }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
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
        <h5>Apakah Anda yakin untuk menghapus data buku {{ $dataBuku->judul }}?</h5>
    </div>
    <div class="modal-footer">
        <form method="POST" action="{{ route('petugasDestroyBuku', $dataBuku->id) }}" class="d-inline">
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
        <h1 class="modal-title fs-5" id="exampleModalLabel">Export Data Buku</h1>
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <div class="modal-body">
        <table class="table table-striped table-bordered table-hover" id="example1">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Buku</th>
                    <th class="text-center">Judul Buku</th>
                    <th class="text-center">Tahun</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Penerbit</th>
                    <th class="text-center">Pengarang</th>
                    <th class="text-center">Sinopsis</th>
                    <th class="text-center">Stok</th>

                </tr>
            </thead>
            <tbody class="text-center">
                @php $no= 1; @endphp
                @foreach ($dataBuku as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->kode }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->tahun }}</td>
                        <td>{{ $row->kategori->nm_kategori }}</td>
                        <td>{{ $row->penerbit->nm_penerbit }}</td>
                        <td>{{ $row->pengarang->nm_pengarang }}</td>
                        <td>{{ $row->sinopsis }}</td>
                        <td>{{ $row->stok }}</td>
                    </tr>
                @endforeach
                {{-- <tr>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                    <td>gg</td>
                </tr> --}}
            </tbody>
        </table>
    </div>
@endif
