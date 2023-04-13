<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Jenis Denda</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('petugasStoreJenisDenda') }}"
        method="post">
        @csrf
        <div class="form-group">
            <label for="jenis" class="form-label">Jenis Denda</label>
            <input type="text" class="form-control" required id="jenis" name="jenis">
            <div class="invalid-feedback">
                Kolom Jenis Denda Wajib Diisi!
            </div>
        </div>
        <div class="form-group">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="4" class="form-control" required></textarea>
            <div class="invalid-feedback">
                Kolom Keterangan Wajib Diisi!
            </div>
        </div>
        <div class="form-group">
            <label for="tarif" class="form-label">Tarif Denda</label>
            <input type="text" class="form-control" required id="tarif" name="tarif">
            <div class="invalid-feedback">
                Kolom Tarif Denda Lembaga Wajib Diisi!
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>