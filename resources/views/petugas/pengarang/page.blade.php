@extends('petugas.index')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Pengarang</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('petugasDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Master Data</li>
                            <li class="breadcrumb-item active" aria-current="page">Pengarang</li>
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
                </div>
                <div class="card-body">

                    <table class="table table-striped table-bordered table-hover" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Lembaga</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Alamat</th>
                                <th class="text-center">Telpon</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no= 1; @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nm_pengarang }}</td>
                                    <td>{{ $row->gender }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->tlp }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
