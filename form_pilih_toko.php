<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pilih Toko</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="src/css/style.css" rel="stylesheet">
    </head>
    <body>
        <?php
    include "navbar.php"
    ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m10 push-m1">
                    <div class="card-panel z-depth-2">
                        <div class="center-align">
                            <h3 class="teal-text">Form Pilih Toko</h3>
                        </div>
                        <div class="container">
                            <div class="row">
                                <form class="col s12" action="index.html" method="post">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select>
                                                <option value="" disabled selected>Silahkan pilih toko</option>
                                                <option value="1">Cyber Track Inc</option>
                                                <option value="2">Schamberger-Rutherford</option>
                                                <option value="3">Herzog, Altenwerth and Kris</option>
                                            </select>
                                            <label>Nama Toko</label>
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
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="web/src/js/script.js"></script>
    </body>
</html>
