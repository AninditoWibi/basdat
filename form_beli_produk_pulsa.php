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
    include "navbar.php"
    ?>
        <div class="container">
            <div class="row">
                <div class="card-panel z-depth-2 col s10 push-s1">
                <div class="center-align">
                    <h3 class="teal-text">Form Membeli Produk Pulsa</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <form class="col s12" action="index.html" method="post">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="P0000021" id="kode_produk" type="text" class="validate">
                                    <label for="kode_produk">Kode Produk</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="nomor_token" type="text" class="validate">
                                    <label for="nomor_token">Nomor HP / Token Listrik</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 center-align">
                                    <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Submit
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
