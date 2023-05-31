<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>Praktikum Web 2</title>
    <style>
        * {
            font-size: 14px;
        }

        html {
            position: relative;
            min-height: 100%;
        }

        body {
            margin-bottom: 60px;
        }

        footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #6F2CF5;
            font-family: Arial, Helvetica, sans-serif;
            /* z-index: 999; */
        }

        nav {
            background: #6F2CF5;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="?page=home">FTI-UNISKA</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=profile">Profil Penulis</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Link
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="http://uniska-bjm.ac.id" target="_blank">Website UNISKA</a>
                            <a class="dropdown-item" href="http://fti.uniska-bjm.ac.id" target="_blank">Website FTI UNISKA</a>
                            <a class="dropdown-item" href="http://sia.uniska-bjm.ac.id" target="_blank">Website SIA UNISKA</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">