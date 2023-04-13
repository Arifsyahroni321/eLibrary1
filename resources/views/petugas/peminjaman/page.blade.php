@extends('petugas.index')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Peminjaman</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('petugasDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Transaksi</li>
                            <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped table-bordered table-hover" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Peminjam</th>
                                <th class="text-center">Buku</th>
                                <th class="text-center">Status</th>
                                <th class="text-center"><i class="fas fa-cog"></i></th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no= 1; @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->anggota->nama }}</td>
                                    <td>{{ $row->buku->judul }}</td>
                                    <td>{{ Str::ucfirst($row->status ) }}</td>
                                    <td>
                                        @if ($row->status == 'pending')
                                        <div class="d-inline">
                                            <button class="btn btn-success btn-sm action" value="acc" data-id="{{ $row->id }}"><i class="fas fa-check"></i> Setujui</button>
                                            <button class="btn btn-danger btn-sm action" value="reject" data-id="{{ $row->id }}"><i class="fas fa-times"></i> Tolak</button>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
