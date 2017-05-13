<?php require '../application.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pilih Toko</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../src/css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
    include "../navbar.php"
    ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m10 push-m1">
                    <div class="card-panel z-depth-2">
                        <div class="row">
                            <div class="center-align">
                                <h3 class="teal-text">Silahkan isi detail produk</h3>
                            </div>
                            <div class="divider"></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <form class="col s12" action="beli_shipped_produk.php" method="post">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="Berat barang" id="berat_barang" type="text" class="validate" name="berat_barang" required>
                                            <label for="beli_barang">Berat Barang</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input placeholder="Kuantitas" id="kuantitas_barang" type="text" class="validate" name="kuantitas_barang" required>
                                            <label for="kuantitas_barang">Kuantitas</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center-align">
                                            <input type="hidden" name="kode_produk" value="<?php echo $_POST['kode_produk']; ?>">
                                            <input type="hidden" name="harga_produk" value="<?php echo $_POST['harga_produk']; ?>">
                                            <input type="hidden" name="nama_toko" value="<?php echo $_POST['nama_toko']; ?>">
                                            <input type="hidden" name="command" value="beli_barang">
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
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="../web/src/js/script.js"></script>
        <script type="text/javascript" src="../web/src/js/ajax.js"></script>
    </body>
</html>
