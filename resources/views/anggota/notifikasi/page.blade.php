@extends('anggota.index')
@inject('carbon', 'Carbon\Carbon')
@section('content')
    <div class="page-heading d-flex" style="justify-content: space-between">
        <h3>Notifikasi</h3>
        @if (count($data) > 0)
        <a href="{{ route('clearNotifikasi') }}" class="text-right">Bersihkan</a>
        @endif
    </div>
    <div class="page-content">
        @foreach ($data as $row)
            <div class="card">
                <div class="card-body">
                    <p>{{ $carbon::parse($row->tgl_notif)->diffForHumans() }}</p>
                    <h5>{{ $row->pesan }}</h5> <span class="badge bg-danger">{{ $row->status == 'unread' ? 'New' : '' }}</span>
                </div>
            </div>
        @endforeach
        @if (count($data) == 0)
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Belum Ada Notifikasi</h5>
            </div>
        </div>
        @endif
    </div>
@endsection
