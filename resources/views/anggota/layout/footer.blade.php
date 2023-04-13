</div>
@php
    $prefix = request()
        ->route()
        ->getPrefix();
@endphp
<footer>
    <div class="container">
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2022 &copy; Kampus Merdeka</p>
            </div>
            <div class="float-end">
                <p>
                    Crafted with
                    <span class="text-danger"><i class="bi bi-heart-fill"></i></span>
                    by Kelompok 1A
                </p>
            </div>
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
<script src="https://jambroong.github.io/assets/mazer/js/bootstrap.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/app.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/pages/horizontal-layout.js"></script>
<script src="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/pages/simple-datatables.js"></script>

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
            const get = tbl.getAttribute('data-get');
            const id = tbl.getAttribute('data-id');
            const params = get + '/' + id;
            let url = "<?= url($prefix) . '/modal' ?>/";
            let response, getForm;
            if (get == 'detail') {
                modalDialog.className =
                    'modal-dialog modal-dialog-centered modal-dialog-scrollable modal-full';
            } else {
                modalDialog.className = 'modal-dialog modal-dialog-centered modal-dialog-scrollable';
            }
            getForm = fetch(url + params).then(res => {
                return response = res.text().then(res => {
                    return tampil.innerHTML = res;
                });
            }).then(() => modal.show());



            modalElmt.addEventListener('hidden.bs.modal', () => {
                tampil.innerHTML = '';
            });

        });
    });
</script>
</body>

</html>
