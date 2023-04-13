@extends('anggota.index')
@section('content')
    <div class="page-heading">
        <h3>Semua Koleksi</h3>
    </div>
    <div class="page-content">
        <section class="row">
            @foreach ($data as $buku)
                <div class="col-md-3">
                    <div class="card action" data-id="{{ $buku->id }}" data-get="detail">
                        <div class="card-content">
                            <img class="card-img-top img-fluid" src="{{ url('public/storage/' . $buku->cover) }}"
                                alt="Card image cap" style="height: 20rem" />
                            <div class="card-body">
                                <h4 class="card-title">{{ $buku->judul }}</h4>
                                <p class="card-text">
                                    {{ $buku->sinopsis }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
        <div class="row justify-content-center">
            <section class="col-md-7">
                <nav>
                    <ul class="pagination pagination-primary pagination-sm text-center">
                        <div class="d-flex mx-auto">
                            <li class="page-item {{ ($page == 1) ? 'disabled' : '' }}" style="{{ ($page == 1) ? 'cursor: not-allowed;' : '' }}">
                                <a class="page-link" href="{{ route('page', $page - 1) }}">
                                    <span aria-hidden="true"><i class="bi bi-chevron-left"></i></span>
                                </a>
                            </li>
                            @if ($page > 4)
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('page', 1) }}">1</a>
                                </li>
                                <li class="page-item">
                                    <b class="page-link" style="background: none;">...</b>
                                </li>
                            @endif
                            @php
                                $i = $page > 4 ? $page - 2 : 1;
                                $j = 1;
                            @endphp
                            @for ($i; $i <= $jmlPage; $i++)
                                <li class="page-item {{ $page == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ route('page', $i) }}">{{ $i }}</a>
                                </li>
                                @php
                                    $j++
                                @endphp
                                @if ($j == 6)
                                    @break
                                @endif
                            @endfor
                            @if ($jmlPage > 5 && $page < $jmlPage - 2)
                                <li class="page-item">
                                    <b class="page-link" style="background: none;">...</b>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="{{ route('page', $jmlPage) }}">{{ $jmlPage }}</a>
                                </li>
                            @endif
                        <li class="page-item {{ ($page == $jmlPage) ? 'disabled' : '' }}" style="{{ ($page == $jmlPage) ? 'cursor: not-allowed;' : '' }}">
                            <a class="page-link" href="{{ route('page', $page + 1) }}">
                                <span aria-hidden="true"><i class="bi bi-chevron-right"></i></span>
                            </a>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
