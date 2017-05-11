<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Transaksi Shipped</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
    include "navbar.php"
    ?>
        <div class="container-fluid">
            <div class="row">
                
                <div class="card-panel z-depth-2 col s10 offset-s1">
                    <div class="center-align">
                        <h2 class="teal-text">Daftar Produk Dibeli</h2>
                    </div>
                    No Invoice: V000000001
                    <table class="centered highlight">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Berat</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Sub total</th>
                                <th>Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Sterile Diluent for Allergenic Extract</td>
                                <td>244</td>
                                <td>325</td>
                                <td>9888500</td>
                                <td>3213762500</td>
                                
                                <td>
                                    <button class="btn waves-effect waves-light" type="submit" name="ulas">Ulas
                                        <i class="material-icons left">view_list</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Maalox</td>
                                <td>753</td>
                                <td>766</td>
                                <td>99985000</td>
                                <td>76588510000</td>
                                <td>
                                    <button class="btn waves-effect waves-light" type="submit" name="ulas">Ulas
                                        <i class="material-icons left">view_list</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination center-align">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="src/js/script.js"></script>
    </body>
</html>
