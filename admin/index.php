    <?php
    session_start();
    if ($_SESSION['username'] == '') {
        header("location:../index.php");
    }
     ?>
    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- <base href="praktikum2020"> -->
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <title>Praktikum 2020</title>
        <style>
            body {
                margin-bottom: 6em;
            }

            * {
                font-size: 14px;
            }

            footer {
                position: fixed;
                /* height: 100px; */
                bottom: 0;
                width: 100%;
                background: #6F2CF5;
                padding: 10px 0;
                color: #fff;
                font-family: Arial, Helvetica, sans-serif;
                letter-spacing: 1.5px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <h3 class="mt-4 mb-4">Aplikasi Data Mahasiswa</h3>
            <div class="row">
                <div class="col-md-3 col-sm-12 mb-4">
                    <?php include 'nav.php'; ?>
                </div>

                <div class="col-md-9 col-sm-12">
                    <?php include '../connection.php'; ?>

                    <?php

                    // error_reporting(0);
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                        switch ($_GET['page']) {
                            default:
                                include "dashboard.php";
                                break;
                            case "dashboard";
                                include "dashboard.php";
                                break;
                                // mahasiswa
                            case "mahasiswa-show";

                                include "../mahasiswa/mahasiswa_show.php";

                                break;
                            case "mahasiswa-add";

                                include "../mahasiswa/mahasiswa_add.php";

                                break;
                            case "mahasiswa-edit";

                                include "../mahasiswa/mahasiswa_edit.php";

                                break;
                            case "mahasiswa-delete";

                                include "../mahasiswa/mahasiswa_delete.php.php";

                                break;
                            case "mahasiswa-update";

                                include "../mahasiswa/mahasiswa_update.php";

                                break;
                                // user
                            case "user-add";
                                include "../user/user_add.php";

                                break;
                            case "user-show";
                                include "../user/user_show.php";

                                break;
                            case "user-edit";
                                include "../user/user_edit.php";

                                break;
                            case "user-update";
                                include "../user/user_update.php";
                                break;
                        }
                    } else {
                        include 'dashboard.php';
                    }
                    ?>
                </div>
            </div>
        </div>
        <footer>
            <div class="container">
                <span>&copy; 2020 - FTI UNISKA</span>
            </div>
        </footer>
    </body>

    </html>