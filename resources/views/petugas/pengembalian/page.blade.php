@inject('carbon', 'Carbon\Carbon')
@extends('petugas.index')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pengembalian</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('petugasDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Transaksi</li>
                            <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button value="add" data-id="add" class="btn btn-success btn-sm action"><i class="fas fa-plus"></i> Tambah</button>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered table-hover" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Peminjam</th>
                                <th class="text-center">Buku</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Denda</th>
                                <th class="text-center">Tarif</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no= 1; @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->peminjaman->anggota->nama }}</td>
                                    <td>{{ $row->peminjaman->buku->judul }}</td>
                                    <td>{{ Str::ucfirst($row->peminjaman->status) }}</td>
                                    <td>{{ $carbon::parse($row->peminjaman->tgl_pinjam)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ $carbon::parse($row->tgl_kembali)->translatedFormat('l, d F Y') }}</td>
                                    <td>{{ $row->denda->jenis }}</td>
                                    <td>@rupiah($row->tarif)</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
