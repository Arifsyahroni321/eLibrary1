<!doctype html>
<html lang="en">
@php
    $page = Route::currentRouteName();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-LIBRARY | {{ Str::ucfirst($page) }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app.css">
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/css/main/app-dark.css">

    {{-- icons --}}
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.svg"
        type="image/x-icon">
    <link rel="shortcut icon" href="https://jambroong.github.io/assets/mazer/images/logo/favicon.png" type="image/png">

    {{-- font awesome --}}
    <link rel="stylesheet"
        href="https://jambroong.github.io/assets/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css">

    {{-- toastify --}}
    <link rel="stylesheet" href="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.css">
    <script src="https://jambroong.github.io/assets/mazer/extensions/toastify-js/src/toastify.js"></script>

</head>

<body>
