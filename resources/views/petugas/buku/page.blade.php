@extends('petugas.index')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Buku</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('petugasDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Buku</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button value="add" id="add" class="btn btn-success btn-sm action"><i class="fas fa-plus"></i>
                        Tambah</button>
                    <button value="export" id="export" class="btn btn-success btn-sm action"><i class="fas fa-file-export"></i>
                        Export</button>
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered table-hover" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Buku</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center"><i class="fas fa-cog"></i></th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no= 1; @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->kode }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->kategori->nm_kategori }}</td>
                                    <td class="text-center">
                                        <button value="edit" data-id="{{ $row->id }}"
                                            class="btn btn-primary btn-sm action"><i class="fas fa-edit"></i></button>
                                        <button value="detail" data-id="{{ $row->id }}"
                                            class="btn btn-info btn-sm action"><i class="bi-search"></i></button>
                                        <button value="delete" data-id="{{ $row->id }}"
                                            class="btn btn-danger btn-sm action"><i class="fas fa-trash"></i></button>
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
