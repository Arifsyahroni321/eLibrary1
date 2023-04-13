@inject('carbon', 'Carbon\Carbon')
@if ($get == 'add')
<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengembalian</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form action="{{ route('petugasStorePengembalian') }}" novalidate class="needs-validation" method="post">
        @csrf
        <div class="mb-3">
            <label for="peminjaman" class="form-label">Peminjaman</label>

            <select class="choices form-select" required id="peminjaman" name="peminjaman" onchange="cekDenda(this)">
                <option value="">Pilih Salah Satu Peminjaman</option>
                @foreach ($peminjaman as $row)
                    <option value="{{ $row->id }}">
                        {{ $row->anggota->nama . ' - ' . $row->buku->judul }}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Pilih Salah Satu Transaksi Peminjaman!
            </div>
        </div>
        <div class="mb-3">
            <label for="denda" class="form-label">Jenis Denda</label>

            <select class="form-select" required id="denda" name="denda" onchange="cekTarif(this)">
                @foreach ($denda as $row)
                    <option value="{{ $row->id }}">
                        {{ is_numeric($row->tarif) ? $row->jenis . ' - ' . 'Rp.' . $row->tarif : $row->jenis . ' - ' . $row->tarif }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">
                Pilih Salah Satu Jenis Denda!
            </div>
        </div>
        <div class="mb-3">
            <label for="tarif" class="form-label">Tarif</label>
            <input type="text" name="tarif" id="tarif" class="form-control" readonly value="">
        </div>
        <button type="submit" class="btn btn-primary btm-sm"><i class="fas fa-check"></i> Submit</button>
    </form>
</div>
@endif