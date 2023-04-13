<div class="modal-header">
    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Kategori</h1>
    <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal" aria-label="Close">
        <i class="fas fa-times"></i>
    </button>
</div>
<div class="modal-body">
    <form class="needs-validation" enctype="multipart/form-data" novalidate action="{{ route('petugasStoreKategori') }}"
        method="post">
        @csrf
        <div class="mb-3">
            <label for="kode" class="form-label">Kode</label>
            <input type="text" class="form-control" required id="kode" name="kode">
            <div class="invalid-feedback">
                Kolom Kode Wajib Diisi!
            </div>
        </div>
        <div class="mb-3">
            <label for="nm_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" required id="nm_kategori" name="nm_kategori">
            <div class="invalid-feedback">
                Kolom Nama Kategori Wajib Diisi!
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>