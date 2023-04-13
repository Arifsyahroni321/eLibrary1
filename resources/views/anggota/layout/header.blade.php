<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-LIBRARY | Home</title>

    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app-dark.css">
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/shared/iconly.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/pages/simple-datatables.css">
    <script src="https://jambroong.github.io/assets/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.css">
    <script src="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.js"></script>
    <script>
        async function like(e) {
            const id = e.getAttribute('data-id');
            const url = '<?= url('/rating/like') ?>/' + id;
            const getAction = await fetch(url);
            const response = await getAction.json();
            const btnDislike = document.getElementById('dislike' + id);
            e.children[0].className = response.ths;
            btnDislike.children[0].className = response.other;
            likeVal.innerHTML = response.likeVal;
            dislikeVal.innerHTML = response.dislikeVal;
        }
    
        async function dislike(e) {
            const id = e.getAttribute('data-id');
            const url = '<?= url('/rating/dislike') ?>/' + id;
            const getAction = await fetch(url);
            const response = await getAction.json();
            const btnLike = document.getElementById('like' + id);
            e.children[0].className = response.ths;
            btnLike.children[0].className = response.other;
            likeVal.innerHTML = response.likeVal;
            dislikeVal.innerHTML = response.dislikeVal;
        }

        async function wishlist(e) {
            const id = e.getAttribute('data-id');
            const url = '<?= url('/wishlist/add') ?>/' + id;
            const getAction = await fetch(url);
            const response = await getAction.json();
            const jmlWishlist = document.getElementById('menuWishlist');
            const jmlTransaksi = document.getElementById('menuTransaksi');
            e.children[0].className = response.ths;
            jmlWishlist.innerHTML = 'Wishlist (' + response.jmlWishlist + ')' ;
            Toastify({
                text: response.message,
                duration: 5000,
                close: true,
                gravity: "top",
                position: "center",
                style: {
                    background: "#4fbe87"
                },
            }).showToast()
        }
    </script>
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
                            @if (Auth::check())
                            <a href="{{ route('notifikasi') }}" type="button" class="btn btn-default btn-sm">
                                <i class='bi bi-bell bi-sub fs-4'></i> 
                                @if ($jmlNotif > 0)
                                <span class="badge bg-danger">{{ $jmlNotif }}</span>
                                @endif
                            </a>
                            <div class="dropdown">
                                <a href="#" id="topbarUserDropdown"
                                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="avatar avatar-md2">
                                        <img src="{{ url('public/storage/' . Auth::user()->foto) }}" alt="Avatar">
                                    </div>
                                    <div class="text">
                                        <h6 class="user-dropdown-name">{{ Auth::user()->nama }}</h6>
                                        <p class="user-dropdown-status text-sm text-muted">
                                            {{ Str::ucfirst(Auth::user()->role) }}
                                        </p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg"
                                    aria-labelledby="topbarUserDropdown">
                                    <li><a class="dropdown-item" id="menuWishlist" data-jml="{{ $jmlWishlist }}" href="{{ route('wishlist') }}">Wishlist ({{ $jmlWishlist }})</a></li>
                                    <li><a class="dropdown-item" id="menuTransaksi" data-jml="{{ $jmlPeminjaman }}" href="{{ route('transaksi') }}">Transaksi ({{ $jmlPeminjaman }})</a></li>
                                    <li><a class="dropdown-item" href="#">Settings</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login/Register</a> @endif

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

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-stack"></i> Kategori</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="component-alert.html" class="submenu-link">Alert</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-badge.html" class="submenu-link">Badge</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-breadcrumb.html" class="submenu-link">Breadcrumb</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-button.html" class="submenu-link">Button</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-card.html" class="submenu-link">Card</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-carousel.html" class="submenu-link">Carousel</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-collapse.html" class="submenu-link">Collapse</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-dropdown.html" class="submenu-link">Dropdown</a>
                                </li>
                            </ul>

                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="component-list-group.html" class="submenu-link">List Group</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-modal.html" class="submenu-link">Modal</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-navs.html" class="submenu-link">Navs</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-pagination.html" class="submenu-link">Pagination</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-progress.html" class="submenu-link">Progress</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-spinner.html" class="submenu-link">Spinner</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="component-tooltip.html" class="submenu-link">Tooltip</a>
                                </li>

                                <li class="submenu-item has-sub">
                                    <a href="#" class="submenu-link">Extra Components</a>

                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">
                                        <li class="subsubmenu-item">
                                            <a href="extra-component-avatar.html" class="subsubmenu-link">Avatar</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="extra-component-sweetalert.html" class="subsubmenu-link">Sweet
                                                Alert</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="extra-component-toastify.html" class="subsubmenu-link">Toastify</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="extra-component-rating.html" class="subsubmenu-link">Rating</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="extra-component-divider.html" class="subsubmenu-link">Divider</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item active has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-grid-1x2-fill"></i> Penerbit</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="layout-default.html" class="submenu-link">Default Layout</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="layout-vertical-1-column.html" class="submenu-link">1
                                        Column</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="layout-vertical-navbar.html" class="submenu-link">Vertical
                                        Navbar</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="layout-rtl.html" class="submenu-link">RTL Layout</a>
                                </li>

                                <li class="submenu-item active">
                                    <a href="layout-horizontal.html" class="submenu-link">Horizontal
                                        Menu</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-file-earmark-medical-fill"></i> Pengarang</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item has-sub">
                                    <a href="#" class="submenu-link">Form Elements</a>

                                    <!-- 3 Level Submenu -->
                                    <ul class="subsubmenu">
                                        <li class="subsubmenu-item">
                                            <a href="form-element-input.html" class="subsubmenu-link">Input</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="form-element-input-group.html" class="subsubmenu-link">Input
                                                Group</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="form-element-select.html" class="subsubmenu-link">Select</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="form-element-radio.html" class="subsubmenu-link">Radio</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="form-element-checkbox.html" class="subsubmenu-link">Checkbox</a>
                                        </li>

                                        <li class="subsubmenu-item">
                                            <a href="form-element-textarea.html" class="subsubmenu-link">Textarea</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="menu-item has-sub">
                    <a href="{{ url('/about') }}" class="menu-link">
                        <span><i class="bi bi-life-preserver"></i> Tentang Kami</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="https://zuramai.github.io/mazer/docs"
                                        class="submenu-link">Documentation</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                                        class="submenu-link">Contribute</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="https://github.com/zuramai/mazer#donation"
                                        class="submenu-link">Donate</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    </header>
    {{-- <div class="row">
                <div class="col-12">
                    <div class="p-5 mb-4 bg-light rounded-3">
                        <div class="container-fluid py-5 jumbotron">
                        </div>
                    </div>
                </div>
            </div> --}}
    <div class="content-wrapper container">
