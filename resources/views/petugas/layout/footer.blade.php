@php
    $prefix = request()->route()->getPrefix();
@endphp
<footer style="margin-bottom: -25px">
    <div class="footer clearfix text-muted">
        <div class="float-start">
            <p>2022 &copy; Kampus Merdeka</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                by Kelompok 1A
            </p>
        </div>
    </div>
</footer>
<div class="modal fade modal-borderless" id="modal" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog" id="modalDialog" role="document">
        <div class="modal-content" id="tampil">

        </div>
    </div>
</div>
</div>
</div>
</div>
{{-- basic assets --}}
<script src="https://jambroong.github.io/assets/mazer/js/app.js"></script>
<script src="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/pages/simple-datatables.js"></script>

{{-- custom script --}}
@if ($msg = Session::get('msg'))
    <script>
        setTimeout(() => {
            Toastify({
                text: "{{ $msg['message'] }}",
                duration: 5000,
                close: true,
                gravity: "top",
                position: "center",
                style: {
                    <?php if($msg['type'] == 'success'){ ?>
                    background: "#4fbe87"
                    <?php } elseif ($msg['type'] == 'danger') { ?>
                    background: "#EB4432"
                    <?php } ?>
                },
            }).showToast()
        }, 200);
    </script>
@endif
<script>
    const preload = document.querySelector('.preload-wrapper');
    window.addEventListener('load', function() {
        preload.classList.add('fade-out-animation');
    });

    const modalElmt = document.querySelector('#modal');
    const modalDialog = document.querySelector('#modalDialog');
    const tampil = document.querySelector("#tampil");
    const action = document.querySelectorAll('.action');
    const modal = new bootstrap.Modal(modalElmt);

    action.forEach(tbl => {
        tbl.addEventListener('click', e => {
            const get = tbl.value;
            const id = tbl.getAttribute('data-id');
            const params = get + '/' + id;
            let url = "<?= url($prefix) . '/modal' ?>/";
            if (get == 'detail') {
                modalDialog.className =
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg';
                tbl.innerHTML =
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
                tbl.disabled = true;
            } else if (get == 'export') {
                modalDialog.className =
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full';
                tbl.innerHTML =
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;
                tbl.disabled = true;
            } else {
                if (get == 'add') {
                    tbl.innerHTML =
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...`;
                    tbl.disabled = true;
                } else {
                    tbl.innerHTML =
                        `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`;
                    tbl.disabled = true;
                }
                modalDialog.className = 'modal-dialog modal-dialog-centered modal-dialog-scrollable';
            }
            let response, getForm;
            getForm = fetch(url + params).then(res => {
                return response = res.text().then(res => {
                    return tampil.innerHTML = res;
                });
            }).then(() => modal.show());
            modalElmt.addEventListener('shown.bs.modal', () => {
                if (get == 'add') {
                    tbl.innerHTML = `<i class="fas fa-plus"></i> Tambah`;
                } else if (get == 'edit') {
                    tbl.innerHTML = `<i class="fas fa-edit"></i>`;
                } else if (get == 'detail') {
                    tbl.innerHTML = `<i class="bi-search"></i>`;
                } else if (get == 'delete') {
                    tbl.innerHTML = `<i class="fas fa-trash"></i>`;
                } else if (get == 'export') {
                    tbl.innerHTML = `<i class="fas fa-file-export"></i> Export`;
                } else if (get == 'acc') {
                    tbl.innerHTML = `<i class="fas fa-check"></i> Setujui`;
                } else if (get == 'reject') {
                    tbl.innerHTML = `<i class="fas fa-times"></i> Tolak`;
                }
                tbl.disabled = false;
                (() => {
                    'use strict'
                    const forms = document.querySelectorAll('.needs-validation')
                    Array.from(forms).forEach(form => {
                        form.addEventListener('submit', event => {
                            if (!form.checkValidity()) {
                                event.preventDefault()
                                event.stopPropagation()
                            }
                            form.classList.add('was-validated')
                        }, false)
                    })
                })()

                let choices = document.querySelectorAll(".choices");
                let initChoice;
                choices.forEach(ch => {
                    if (ch.classList.contains("multiple-remove")) {
                        initChoice = new Choices(ch, {
                            delimiter: ",",
                            editItems: true,
                            maxItemCount: -1,
                            removeItemButton: true,
                        })
                    } else {
                        initChoice = new Choices(ch, {
                            placeholder: true,
                            placeholderValue: 'Pilih Salah Satu' + ch.id,
                            searchPlaceholderValue: 'Cari data',
                            noResultsText: 'Hasil tidak ditemukan!',
                            noChoicesText: 'Tidak ada data!',
                            itemSelectText: 'Tekan Enter untuk memilih',
                            searchResultLimit: 100,
                            classNames: {
                                containerInner: 'form-control',
                                input: 'form-select',
                            }
                        })
                    }
                });
                $("#example1").DataTable({
                    "retrieve": true,
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        });
    });
</script>
</body>

</html>
