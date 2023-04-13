<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://jambroong.github.io/assets/mazer/js/app.js"></script>
@if ($msg = Session::get('msg'))
    <script>
        setTimeout(() => {
            Toastify({
                text: "{{ $msg['message'] }}",
                duration: 10000,
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
    (() => {
        'use strict'

        const forms = document.querySelectorAll('.needs-validation')
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                <?php
                $page = Route::currentRouteName();
                if ($page == 'register') { ?>
                const upass = form.password,
                    reupass = form.reupass
                upass.value != reupass.value && reupass.setCustomValidity('invalid');
                reupass.addEventListener('input', () => {
                    if (upass.value != reupass.value) {
                        reupass.setCustomValidity('invalid');
                    } else {
                        reupass.setCustomValidity('');
                    }
                });
                <?php } ?>

                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
</body>

</html>
