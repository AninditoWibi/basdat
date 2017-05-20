<?php require '../application.php'; ?>
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
    include "navbar.php";
    if(!isset($_SESSION['login'])){
        header("Location: ../login.php");
    }
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
                    $pembeli = $_SESSION['login'];

                    /*--------------- Ambil banyaknya data -------------*/
                    $query = "SELECT count(*)
                              FROM keranjang_belanja
                              WHERE pembeli = '$pembeli'";
                    $row_nums = pg_fetch_row(execute_query($query))[0];
                    $page_nums = ceil($row_nums / 10);
                    /*--------------------------------------------------*/

                    /*------------------- Page Number Handlers --------------------*/
                    if (!isset($_GET['page'])){
                        $current_page = 1;
                    } elseif ($_GET['page'] > $page_nums || $_GET['page'] < 1) {
                        $current_page = 1;
                    } else {
                        $current_page = $_GET['page'];
                    }
                    $offset = 10 * ($current_page - 1);
                    /*-------------------------------------------------------------*/


                    $query = "SELECT KJ.kode_produk, nama, berat, kuantitas, KJ.harga, sub_total
                    FROM keranjang_belanja KJ, produk P
                    WHERE KJ.kode_produk = P.kode_produk AND pembeli = '$pembeli'
                    OFFSET $offset
                    LIMIT 10";
                    $result = execute_query($query);

                    if (pg_num_rows($result) == 0) {
                    ?>
                        <td colspan="6">
                            <div class="card-panel red lighten-2 center-align">
                                <h5>Oops, keranjang belanja Anda kosong. Sudahkah anda membeli barang?</h5>
                            </div>
                        </td>
                    <?php
                    } else {
                        while ($row = pg_fetch_row($result)) {
                            echo "<tr>";
                            foreach ($row as $column) {
                                echo "<td>".$column."</td>";
                            }
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
                if (pg_num_rows($result) > 0) {
            ?>
            <ul class="pagination center-align">
                <?php
                for ($ii=1; $ii <= $page_nums; $ii++) {
                    ?>
                    <li class="<?php if ($ii == $current_page) echo 'active'; else echo 'waves-effect'; ?>">
                        <a href="?page=<?php echo $ii; ?>"><?php echo $ii; ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <form action="../index.php" method="post">
                <div class="row">
                    <div class="input-field col s6">
                        <select name="jasa_kirim">
                            <?php
                            $nama_toko = $_SESSION['nama_toko'];
                            $query = "SELECT nama
                            FROM jasa_kirim, toko_jasa_kirim
                            WHERE jasa_kirim = nama AND nama_toko = '$nama_toko'";
                            $result = execute_query($query);

                            while ($row = pg_fetch_row($result)) {
                                echo "<option value=\"$row[0]\">$row[0]</option>";
                            }
                            ?>
                        </select>
                        <label>Jasa Kirim</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="alamat_kirim" class="materialize-textarea" name="alamat"></textarea>
                        <label for="alamat_kirim">Alamat kirim</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align">
                        <input type="hidden" name="command" value="checkout">
                        <button class="btn waves-effect waves-light btn-large" type="submit">Checkout
                            <i class="material-icons right">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <?php
                }
            ?>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="../web/src/js/script.js"></script>
</body>
</html>
