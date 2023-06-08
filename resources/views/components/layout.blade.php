@props(['pageTitle'])

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=yes" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css"> --}}

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- style -->
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />

    <title>ShiniMark | {{$pageTitle}}</title>

    <!-- Favicon -->
    <meta name="msapplication-TileImage" content="/images/favicon.png"> <!-- Windows 8 -->
    <!--[if IE]><link rel="shortcut icon" href="assets/images/favicon.png"><![endif]-->
    <link rel="icon" type="image/png" href="/images/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    @include('partials.navbar')

    <x-flash-message />

    {{$slot}}

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> --}}

</body>

</html>