<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penerbit</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('petugasStorePenerbit') }}"
        method="post">
        @csrf
        <div class="mb-3">
            <label for="nm_penerbit" class="form-label">Nama Lembaga</label>
            <input type="text" class="form-control" required id="nm_penerbit" name="nm_penerbit">
            <div class="invalid-feedback">
                Kolom Nama Lembaga Wajib Diisi!
            </div>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="alamat" rows="4" class="form-control" required></textarea>
            <div class="invalid-feedback">
                Kolom Alamat Wajib Diisi!
            </div>
        </div>
        <div class="mb-3">
            <label for="tlp" class="form-label">Telpon</label>
            <input type="text" class="form-control" required id="tlp" name="tlp">
            <div class="invalid-feedback">
                Kolom No Telpon Lembaga Wajib Diisi!
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>