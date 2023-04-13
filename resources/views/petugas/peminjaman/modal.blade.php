@if ($get == 'acc')
<div class="modal-header bg-success">
    <h5 class="modal-title white" id="myModalLabel120">
        <i class="fas fa-question-circle"></i> Peringatan!
    </h5>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <h5>Apakah Anda yakin untuk menyetujui permintaan <br> 
        peminjaman buku {{ $data->buku->judul }} oleh {{ $data->anggota->nama }}?</h5>
</div>
<div class="modal-footer">
    <form method="POST" action="{{ route('petugasAccPeminjaman', $data->id) }}" class="d-inline">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-success btn-sm">Setujui</button>
        <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Cancel</span>
        </button>
    </form>
</div>

@elseif ($get == 'reject')
<div class="modal-header bg-danger">
    <h5 class="modal-title white" id="myModalLabel120">
        <i class="fas fa-question-circle"></i> Peringatan!
    </h5>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <h5>Apakah Anda yakin untuk menolak permintaan <br> 
        peminjaman buku {{ $data->buku->judul }} oleh {{ $data->anggota->nama }}?</h5>
</div>
<div class="modal-footer">
    <form method="POST" action="{{ route('petugasRejectPeminjaman', $data->id) }}" class="d-inline">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
        <button type="button" class="btn btn-light-secondary btn-sm" data-bs-dismiss="modal">
            <i class="bx bx-x d-block d-sm-none"></i>
            <span class="d-none d-sm-block">Cancel</span>
        </button>
    </form>
</div>

@endif