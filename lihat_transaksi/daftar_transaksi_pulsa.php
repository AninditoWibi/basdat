<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Transaksi Pulsa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
        <?php
    include "navbar.php"
    ?>
        <div class="container">
            <div class="card-panel z-depth-2">
                <div class="center-align">
                    <h2 class="teal-text">Daftar Transaksi Pulsa</h2>
                </div>
                <table class="centered highlight">
                    <thead>
                        <tr>
                            <th>No Invoice</th>
                            <th>Nama Produk</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total Bayar</th>
                            <th>Nominal</th>
                            <th>Nomor</th>
                            <th>Ulasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>V000000001</td>
                            <td>Pulsa Telkomsel</td>
                            <td>2014-04-01</td>
                            <td>SUDAH DIBAYAR</td>
                            <td>12000</td>
                            <td>10</td>
                            <td>081210001001</td>
                            <td>
                                <button class="btn waves-effect waves-light" type="submit" name="beli">Ulas
                                    <i class="material-icons right">mode_edit</i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>V000000002</td>
                            <td>Pulsa Telkomsel</td>
                            <td>2014-04-02</td>
                            <td>SUDAH DIBAYAR</td>
                            <td>22000</td>
                            <td>20</td>
                            <td>081210001001</td>
                            <td>
                                <button class="btn waves-effect waves-light" type="submit" name="beli">Ulas
                                    <i class="material-icons right">mode_edit</i>
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="../web/src/js/script.js"></script>
        <script type="text/javascript" src="../web/src/js/ajax.js"></script>
    </body>
</html>
