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
    include "navbar.php"
    ?>
        <div class="container">
            <div id="nama-toko-kosong-alert" class="modal">
                <div class="modal-content center-align">
                    <h4>Nama toko belum dipilih!</h4>
                    <div class="divider"></div>
                    <p>Silahkan pilih toko yang tersedia dari droopdown list</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m10 push-m1">
                    <div class="card-panel z-depth-2">
                        <div class="center-align">
                            <h3 class="teal-text">Form Pilih Toko</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select id="pilih-toko">
                                                <option value="" disabled selected>Silahkan pilih toko</option>
                                                <?php
                                                    $query = "SELECT nama
                                                              FROM toko";
                                                    $result = execute_query($query);

                                                    while ($row = pg_fetch_row($result)) {
                                                        echo "<option value='$row[0]'>$row[0]</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label>Nama Toko</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center-align">
                                            <button id="pilih-toko-button" class="btn waves-effect waves-light btn-large" type="button">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
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
