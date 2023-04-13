<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Buku "{{ $dataBuku->judul }}"</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-4">
            <img class="img-fluid mx-auto" src="{{ asset('public/storage/' . $dataBuku->cover) }}"
                alt="Cover {{ $dataBuku->judul }}">
        </div>
        <div class="col-md-8">
            <table cellpadding="5" cellspacing="0" id="detailTable" data-id="{{ $dataBuku->id }}">
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
                    <td>Like</td>
                    <td> : </td>
                    <td id="likeVal">{{ $dataBuku->like }}</td>
                </tr>
                <tr>
                    <td>Dislike</td>
                    <td> : </td>
                    <td id="dislikeVal">{{ $dataBuku->dislike }}</td>
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
    @php
        if ($dataTransaksiPending) {
            $formAction = 'destroyTransaksi';
            $btnClass = 'btn-danger';
            $btnText = 'Batal Pinjam';
        } elseif ($dataTransaksiAcc) {
            $formAction = 'destroyTransaksi';
            $btnClass = 'btn-default disabled';
            $btnText = 'Sedang Dipinjam';
        } else {
            $formAction = 'addTransaksi';
            $btnClass = 'btn-success';
            $btnText = 'Pinjam';
        }
    @endphp
    @if (Auth::check())
        <form method="POST" action="{{ route($formAction, $dataBuku->id) }}" class="d-inline">
            @if ($dataTransaksiPending)
                @method('DELETE')
            @endif
            @csrf
            <button class="btn btn-default" type="button" onclick="wishlist(this)" data-id="{{ $dataBuku->id }}"
                title="Tambah ke Wishlist"><i class="bi-heart{{ $dataWishlist ? '-fill text-danger' : '' }}"></i>
                Wishlist</button>
            <button class="btn btn-default" type="button" onclick="like(this)" value="like"
                id="like{{ $dataBuku->id }}" data-id="{{ $dataBuku->id }}" title="Like"><i
                    class="bi-hand-thumbs-up{{ $dataRating ? ($dataRating->action == 'like' ? '-fill text-primary' : '') : '' }}"></i></button>
            <button class="btn btn-default" type="button" onclick="dislike(this)" value="dislike"
                id="dislike{{ $dataBuku->id }}" data-id="{{ $dataBuku->id }}" title="Dislike"><i
                    class="bi-hand-thumbs-down{{ $dataRating ? ($dataRating->action == 'dislike' ? '-fill text-primary' : '') : '' }}"></i></button>
            <button type="submit" class="btn {{ $btnClass }} btn-sm">{{ $btnText }}</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="btn btn-success btn-sm">Masuk Untuk Pinjam</a>
    @endif
</div>
