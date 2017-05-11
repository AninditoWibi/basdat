<?php require 'application.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Beli Produk</title>
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
                    <h2 class="teal-text">Daftar Produk</h2>
                </div>
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Berat</th>
                            <th>Kuantitas</th>
                            <th>Harga</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = "SELECT KJ.kode_produk, nama, berat, kuantitas, KJ.harga, sub_total
                                      FROM keranjang_belanja KJ, produk P
                                      WHERE KJ.kode_produk = P.kode_produk
                                      LIMIT 10";
                            $result = execute_query($query);

                            while ($row = pg_fetch_row($result)) {
                                echo "<tr>";
                                foreach ($row as $column) {
                                    echo "<td>".$column."</td>";
                                }
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
                <ul class="pagination center-align">
                    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                </ul>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="alamat_kirim" class="materialize-textarea"></textarea>
                        <label for="alamat_kirim">Alamat kirim</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <select>
                            <option value="" disabled selected>Silahkan pilih jasa kirim</option>
                            <option value="1">JNE REGULER</option>
                            <option value="2">JNE YES</option>
                            <option value="3">JNE OKE</option>
                            <option value="3">TIKI REGULER</option>
                            <option value="3">POS PAKET BIASA</option>
                            <option value="3">POS PAKET KILAT</option>
                            <option value="3">WAHANA</option>
                            <option value="3">J&T EXPRESS</option>
                            <option value="3">PAHALA</option>
                            <option value="3">LION PARCEL</option>
                        </select>
                        <label>Jasa Kirim</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align">
                        <button class="btn waves-effect waves-light btn-large" type="submit" name="action">Checkout
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="web/src/js/script.js"></script>
    </body>
</html>
