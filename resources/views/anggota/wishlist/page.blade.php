@extends('anggota.index')
@section('content')
    <div class="page-heading">
        <h3>Wishlist</h3>
    </div>
    
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Buku</th>
                            <th class="text-center"><i class="fas fa-cog"></i></th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $no= 1; @endphp
                        @foreach ($dataWishlist as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->buku->judul }}</td>
                                <td>
                                    <div class="d-inline">
                                        {{-- <button class="btn btn-success btn-sm">Pinjam</button> --}}
                                        <button class="btn btn-info btn-sm action" data-id="{{ $row->buku->id }}" data-get="detail">Detail</button>
                                        <button class="btn btn-danger btn-sm action" data-id="{{ $row->buku->id }}" data-get="delete">Hapus</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
