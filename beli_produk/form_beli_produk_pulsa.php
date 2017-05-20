<?php require '../application.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beli Pulsa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
                <div class="card-panel z-depth-2 col s10 push-s1">
                <div class="center-align">
                    <h3 class="teal-text">Form Membeli Produk Pulsa</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <form class="col s12" action="../index.php" method="post">
                            <div class="row">
                                <div class="col s12">
                                    <p>Kode Produk : <?php echo $_POST['kode_produk']; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nomor_token" type="text" class="validate" name="nomor_hp_listrik">
                                    <label for="nomor_token">Nomor HP / Token Listrik</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 center-align">
                                    <input type="hidden" name="command" value="beli_pulsa">
                                    <input type="hidden" name="kode_produk" value="<?php echo $_POST['kode_produk']; ?>">
                                    <input type="hidden" name="harga" value="<?php echo $_POST['harga']; ?>">
                                    <input type="hidden" name="nominal" value="<?php echo $_POST['nominal']; ?>">
                                    <button class="btn waves-effect waves-light btn-large" type="submit">Submit
                                        <i class="material-icons right">send</i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    </body>
</html>
