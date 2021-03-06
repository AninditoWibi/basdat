<?php require '../application.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lihat History Transaksi</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../src/css/style.css">
    </head>
    <body>
        <?php
        include "navbar.php";
        if(!isset($_SESSION['login'])){
            header("Location: ../login.php");
        }
        ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m10 push-m1">
                    <div class="card-panel z-depth-2">
                        <div class="row">
                            <div class="center-align">
                                <h4 class="teal-text">Silahkan pilih history transaksi yang ingin anda lihat!</h4>
                            </div>
                            <div class="divider"></div>
                        </div>
                        <div class="container">
                            <div class="row center-align">
                                <a href="daftar_transaksi_pulsa.php" class="btn waves-effect waves-light teal lighten-2 btn-large">History Transaksi Pulsa</a>
                            </div>
                            <div class="row center-align">
                                <a href="daftar_transaksi_shipped.php" class="btn waves-effect waves-light red lighten-2 btn-large">History Transaksi Barang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="../web/src/js/script.js"></script>
        <script type="text/javascript" src="../web/src/js/ajax.js"></script>
    </body>
</html>
