<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LIBRARY | About us </title>

    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app-dark.css">
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/shared/iconly.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/pages/simple-datatables.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.css">
    <script src="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.js"></script>
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
    
</head>

    <body>
        <script src="https://jambroong.github.io/assets/mazer/js/initTheme.js"></script>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <a href="{{ route('home') }}"><h4>E-LIBRARY</h4></a>
                        </div>
                        <div class="header-top-right">
                            <div class="theme-toggle d-flex gap-2  align-items-center">
                                <i class="fas fa-sun" style="font-size: 22px;"></i>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark"
                                        style="cursor: pointer">
                                    <label class="form-check-label"></label>
                                </div>
                                <i class="fas fa-moon" style="font-size: 20px;"></i>
                            </div>
                <!-- Burger button responsive -->
                            <a href="#"
        class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
    </a>
    </div>
    </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item">
                    <a href="{{ route('home') }}" class="menu-link">
                        <span><i class="bi bi-house-fill"></i> Home</span>
                    </a>
                </li>

         <li class="menu-item">
        <a href="{{ url('/about') }}" class="menu-link">
            <span><i class="fas fa-question-circle"></i> Tentang Kami</span>
        </a>
        </li>
        </ul>
     </div>
    </nav>
    </header>

       
    <section id="content-types">
        <div class="row justify-content-center" >         
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-bottom img-fluid" src="assets/image/ammar.jpeg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Biodata</h4>
                            <p class="card-text">
                                <b>Nama :</b>    Ammat Mubarok Robbani<br>
                                <b>Kampus :</b>  STT Terpadu Nurul fikri <br>
                               <b>Jurusan :</b>  Teknik Informatika <br>
                               <b>Role :</b>  Developer
                            </p>
                            <a href="#" class="card-link"><small>Read 12 Comments</small></a>
                        </div>
                        <div class="btn-group align-items-center mx-2 px-1">
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-bottom img-fluid" src="assets/image/lilana.jpeg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Biodata</h4>
                            <p class="card-text">
                                <b>Nama :</b>    Akhmad Lylana<br>
                                <b>Kampus :</b>  STT Terpadu Nurul fikri <br>
                               <b>Jurusan :</b>  Teknik Informatika <br>
                               <b>Role :</b>  Developer
                            </p>
                            <a href="#" class="card-link"><small>Read 12 Comments</small></a>
                        </div>
                        <div class="btn-group align-items-center mx-2 px-1">
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-bottom img-fluid" src="assets/image/roni.jpg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Biodata</h4>
                            <p class="card-text">
                                <b>Nama :</b>   Moh. Arif syahroni<br>
                                <b>Kampus :</b> Universitas Nurul Jadid <br>
                               <b>Jurusan :</b>  Teknik Informatika <br>
                               <b>Role :</b>  Developer
                            </p>
                            <a href="#" class="card-link"><small>Read 12 Comments</small></a>
                        </div>
                        <div class="btn-group align-items-center mx-2 px-1">
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-12" >
                <div class="card" > 
                    <div class="card-content"  >
                        <img class="card-img-bottom img-fluid" src="assets/image/ika.jpeg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Biodata</h4>
                            <p class="card-text">
                                <b>Nama :</b>   Ika Maria Daniati<br>
                                <b>Kampus :</b>  Universitas Nusantara PGRI <br>
                               <b>Jurusan :</b>  Teknik Informatika <br>
                               <b>Role :</b>  Ui/Ux Designer
                            </p>
                            <a href="#" class="card-link"><small>Read 12 Comments</small></a>
                        </div>
                        <div class="btn-group align-items-center mx-2 px-1">
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12" >
                <div class="card" id="ammar">
                    <div class="card-content" >
                        <img class="card-img-bottom img-fluid" src="assets/image/rafli.jpeg"
                            alt="Card image cap" style="height: 20rem; object-fit: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Biodata</h4>
                            <p class="card-text">
                                <b>Nama :</b>    Muhammad Rafli Edka <br>
                                <b>Kampus :</b>  STT Terpadu Nurul fikri <br>
                               <b>Jurusan :</b>  Teknik Informatika <br>
                               <b>Role :</b>  Ui/Ux Designer
                            </p>
                            <a href="#" class="card-link"><small>Read 12 Comments</small></a>
                        </div>
                        <div class="btn-group align-items-center mx-2 px-1">
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-heart d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-chat d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                            <button type="button" class="btn btn-link p-2 m-1 text-decoration-none">
                                <i class="bi bi-bookmark d-flex align-items-center justify-content-center text-secondary"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
                        
        </div>
    </section>
    </body>


<script src="https://jambroong.github.io/assets/mazer/js/bootstrap.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/app.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/pages/horizontal-layout.js"></script>
<script src="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="https://jambroong.github.io/assets/mazer/js/pages/simple-datatables.js"></script>


