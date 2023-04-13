<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LIBRARY | Petugas Dashboard</title>

    {{-- basic assets --}}
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app-dark.css">

    {{-- icons --}}
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.png" type="image/png">

    {{-- font awesome --}}
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css">

    {{-- toastify --}}
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.css">

    {{-- custom input select choice.js --}}
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/mazer/extensions/choices.js/public/assets/styles/choices.min.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/pages/simple-datatables.css">

    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <script src="https://jambroong.github.io/assets/mazer/js/bootstrap.js"></script>

    {{-- toastify --}}
    <script src="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.js"></script>

    {{-- custom input select choice.js --}}
    <script src="https://jambroong.github.io/assets/mazer/extensions/choices.js/public/assets/scripts/choices.js"></script>

    <script src="https://jambroong.github.io/assets/plugins/jquery/jquery.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/jszip/jszip.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="https://jambroong.github.io/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <style>
        .table {
            border: 1px solid lightgray !important;
        }

        .theme-dark .table {
            border: 1px solid #3a3a47 !important;
        }
    </style>
    <script>
        async function cekDenda(e) {
            const id = e.value;
            const jenisDenda = document.getElementById('denda');
            const tarif = document.getElementById('tarif');
            const url = "<?= url('petugas/pengembalian/cekDenda') ?>/" + id;
            const getDenda = await fetch(url);
            const response = await getDenda.json();
            jenisDenda.value = response.jenisDenda;
            tarif.value = response.tarif;
        }

        async function cekTarif(e) {
            const jenis = e.value;
            const id = document.getElementById('peminjaman').value;;
            const tarif = document.getElementById('tarif');
            const url = "<?= url('petugas/pengembalian/cekTarif') ?>/" + id + '/' + jenis;
            const getTarif = await fetch(url);
            const response = await getTarif.json();
            tarif.value = response.tarif;
        }
    </script>
</head>

<body>
    <script src="https://jambroong.github.io/assets/mazer/js/initTheme.js"></script>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="index.html">
                                <h4 class="d-inline">E-LIBRARY</h4>
                            </a>
                        </div>
                        <div class="theme-toggle d-flex gap-2  align-items-center">
                            <i class="fas fa-sun" style="font-size: 22px;"></i>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                    style="cursor: pointer">
                                <label class="form-check-label"></label>
                            </div>
                            <i class="fas fa-moon" style="font-size: 20px;"></i>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i
                                    class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
