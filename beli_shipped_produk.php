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
            <div id="kategori-kosong-alert" class="modal">
                <div class="modal-content">
                    <h4>Kategori tidak ada</h4>
                    <p>Silahkan pilih kategori untuk me-filter produk</p>
                </div>
                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">OK</a>
                </div>
            </div>
            <div class="center-align">
                <h2 class="teal-text">Daftar Produk</h2>
            </div>
            <div class="card-panel z-depth-2 col s12">
                <div class="row">
                    <div class="input-field col s5">
                        <select id="pilih-kategori">
                            <option value="" disabled selected>Silahkan pilih kategori</option>
                            <option value="Semua Kategori">Semua Kategori</option>
                            <?php
                            $query = "SELECT nama, kode
                                      FROM kategori_utama";
                            $result = execute_query($query);

                            while ($row = pg_fetch_row($result)) {
                                echo "<option value=\"$row[1]\">$row[0]</option>";
                            }
                            ?>
                        </select>
                        <label>Kategori</label>
                    </div>
                    <div class="input-field col s5">
                        <select id="pilih-subkategori">
                            <option value="" disabled selected>Silahkan pilih sub-kategori</option>
                        </select>
                        <label>Sub Katgeori</label>
                    </div>
                    <div class="col s2 center-align">
                        <input id="nama-toko" type="hidden" value="<?php echo $nama_toko;?>">
                        <button class="btn waves-effect waves-light btn-large" id="filter-produk-button" type="button">Filter
                            <i class="material-icons right">filter_list</i>
                        </button>
                    </div>
                </div>
            </div>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th class="center-align">Deskripsi</th>
                        <th class="center-align">Asuransi</th>
                        <th class="center-align">Stok</th>
                        <th class="center-align">Baru/Bekas</th>
                        <th>Harga Grosir</th>
                    </tr>
                </thead>
                <tbody id="tabel-beli-shipped-produk">
                    <?php
                        $query = "SELECT SP.kode_produk, nama, harga, deskripsi, is_asuransi, stok, is_baru, harga_grosir
                                  FROM shipped_produk SP, produk P
                                  WHERE SP.kode_produk = P.kode_produk AND nama_toko = '$nama_toko'";
                        $result = execute_query($query);

                        while ($row = pg_fetch_row($result)) {
                            echo "<tr>";
                            for ($ii = 0; $ii < 8; $ii++) {
                                echo "<td>";
                                if ($ii == 3) {
                                    if ($row[5] > 0) {
                                        echo "TERSEDIA";
                                    } else {
                                        echo "KOSONG";
                                    }
                                } elseif ($row[$ii] == 't') {
                                    echo "YA";
                                } elseif ($row[$ii] == 'f') {
                                    echo "TIDAK";
                                } else {
                                    echo $row[$ii];
                                }
                                echo "</td>";
                            }
                    ?>
                                <td>
                                    <form action="index.html" method="post">
                                        <input type="hidden" name="kode_produk" value="<?php echo $row[0]; ?>">
                                        <button class="btn waves-effect waves-light" type="submit" name="beli_barang">Beli
                                            <i class="material-icons right">shopping_cart</i>
                                        </button>
                                    </form>
                                </td>
                    <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
            <ul class="pagination center-align">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active"><a href="#!">1</a></li>
                <li class="waves-effect"><a href="#!">2</a></li>
                <li class="waves-effect"><a href="#!">3</a></li>
                <li class="waves-effect"><a href="#!">4</a></li>
                <li class="waves-effect"><a href="#!">5</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="web/src/js/script.js"></script>
        <script type="text/javascript" src="web/src/js/ajax.js"></script>
    </body>
</html>
