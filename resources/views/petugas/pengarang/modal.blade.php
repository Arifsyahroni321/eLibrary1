<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengarang</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('petugasStorePengarang') }}"
        method="post">
        @csrf
        <div class="mb-3">
            <label for="nm_pengarang" class="form-label">Nama Pengarang</label>
            <input type="text" class="form-control" required id="nm_pengarang" name="nm_pengarang">
            <div class="invalid-feedback">
                Kolom Nama Pengarang Wajib Diisi!
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
            <label for="" class="form-label">Gender</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="L" required value="L">
                <label class="form-check-label" for="L">Laki-Laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="P" required value="P">
                <label class="form-check-label" for="P">Perempuan</label>
            </div>
            <div class="invalid-feedback">
                Pilih Salah Satu Gender!
            </div>
        </div>
            
        <div class="mb-3">
            <label for="tlp" class="form-label">Telpon</label>
            <input type="text" class="form-control" required id="tlp" name="tlp">
            <div class="invalid-feedback">
                Kolom No Telpon Pengarang Wajib Diisi!
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>
