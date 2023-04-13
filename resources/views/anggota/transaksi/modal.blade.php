@inject('carbon', 'Carbon\Carbon')
@if ($get == 'delete')
<div class="modal-header bg-danger">
    <h5 class="modal-title white" id="myModalLabel120">
        <i class="fas fa-exclamation-triangle"></i> Peringatan!
    </h5>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <h5>Apakah Anda yakin untuk Membatalkan Peminjaman Buku {{ $dataTransaksi->buku->judul }}?</h5>
</div>
<div class="modal-footer">
    <form method="POST" action="{{ route('destroyTransaksi', $dataTransaksi->buku->id) }}" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Cancel</span>
        </button>
    </form>
</div>

@elseif ($get == 'detail')
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Buku "{{ $dataTransaksi->buku->judul }}"</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid mx-auto" src="{{ asset('public/storage/' . $dataTransaksi->buku->cover) }}"
                alt="Cover {{ $dataTransaksi->buku->judul }}">
        </div>
        <div class="col-md-8">
            <table cellpadding="5" cellspacing="0" id="detailTable" data-id="{{ $dataTransaksi->buku->id }}">
                <tr>
                    <td>Kode</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->kode }}</td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->judul }}</td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->tahun }}</td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->kategori->nm_kategori }}</td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->penerbit->nm_penerbit }}</td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->pengarang->nm_pengarang }}</td>
                </tr>
                <tr>
                    <td>Like</td>
                    <td> : </td>
                    <td id="likeVal">{{ $dataTransaksi->buku->like }}</td>
                </tr>
                <tr>
                    <td>Dislike</td>
                    <td> : </td>
                    <td id="dislikeVal">{{ $dataTransaksi->buku->dislike }}</td>
                </tr>
                <tr>
                    <td>Sinopsis</td>
                    <td> : </td>
                    <td>{{ $dataTransaksi->buku->sinopsis }}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td> : </td>
                    <td>{{ Str::ucfirst($dataTransaksi->status) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pinjam</td>
                    <td> : </td>
                    <td>{{ $carbon::parse($dataTransaksi->tgl_pinjam)->translatedFormat('l, d F Y') }}</td>
                </tr>
                <tr>
                    <td>Tanggal Kembali</td>
                    <td> : </td>
                    <td>{{ $carbon::parse($dataTransaksi->tgl_kembali)->translatedFormat('l, d F Y') }}</td>
                </tr>
                @if ($dataTransaksi->status == 'accepted')
                <tr>
                    <td>Denda</td>
                    <td> : </td>
                    <td>{{ $carbon::parse($dataTransaksi->tgl_kembali) < now() ? $carbon::parse($dataTransaksi->tgl_kembali)->diffInDays(now()) * 5000 : '0' }}</td>
                </tr>
                @endif
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
</div>

@endif