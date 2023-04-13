@extends('anggota.index')
@section('content')
    <div class="page-heading">
        <h3>Peminjaman</h3>
    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Buku</th>
                            <th class="text-center">Status</th>
                            <th class="text-center"><i class="fas fa-cog"></i></th>

                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php $no= 1; @endphp
                        @foreach ($dataPeminjaman as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->buku->judul }}</td>
                                <td>{{ Str::ucfirst($row->status) }}</td>
                                <td>
                                    <div class="d-inline">
                                        <button class="btn btn-info btn-sm action" data-id="{{ $row->id }}" data-get="detail">Detail</button>
                                        @if ($row->status == 'pending')
                                        <button class="btn btn-danger btn-sm action" data-id="{{ $row->id }}" data-get="delete">Batal Pinjam</button>
                                        @endif
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
