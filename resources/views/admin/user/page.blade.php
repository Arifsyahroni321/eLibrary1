@extends('admin.index')
@section('content')
    <div class="page-heading">
        <div class="page-title mb-3">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data User</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">User</li>
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
                    <button value="export" id="export" class="btn btn-success btn-sm action"><i
                            class="fas fa-file-export"></i>
                        Export</button>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">

                    <table class="table table-striped table-bordered table-hover" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">username</th>
                                <th class="text-center">email</th>
                                <th class="text-center">role</th>
                                <th class="text-center">Aktivasi</th>
                                <th class="text-center">foto</th>
                                <th class="text-center"><i class="fas fa-cog"></i></th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no= 1; @endphp
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td>{{ $row->is_active }}</td>
                                    <td>
                                        <div class="avatar avatar-xl me-3">
                                            <img src="{{ url('public/storage/' . $row->foto) }}" alt=""
                                                srcset="">
                                        </div>
                                    </td>
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
