<?php require '../application.php'; ?>
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
                        <h2 class="teal-text">Daftar Transaksi Shipped</h2>
                    </div>
                    <table class="centered highlight">
                        <thead>
                            <tr>
                                <th>No Invoice</th>
                                <th>Nama Toko</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Total Bayar</th>
                                <th>Alamat kirim</th>
                                <th>Biaya Kirim</th>
                                <th>Nomor Resi</th>
                                <th>Jasa Kirim</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn = connectDB();
                                $email = $_SESSION['login'];

                                /*--------------- Ambil banyaknya data -------------*/
                                $query = "SELECT count(*)
                                          FROM transaksi_shipped
                                          WHERE email_pembeli = '$email'";
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


                                $query = "SELECT *
                                          FROM transaksi_shipped
                                          WHERE email_pembeli = '$email'
                                          OFFSET $offset
                                          LIMIT 10";

                                $result = execute_query($query);

                                while ($row = pg_fetch_row($result)) {
                                    echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[6]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>";
                                        if ($row[3] == 1) {
                                            echo "Transaksi Dilakukan";
                                        } elseif ($row[3] == 2) {
                                            echo "Barang Sudah Dibayar";
                                        } elseif ($row[3] == 3) {
                                            echo "Barang sudah dikirim";
                                        } else {
                                            echo "Barang sudah diterima";
                                        }
                                        echo "</td>";
                                        echo "<td>$row[4]</td>";
                                        echo "<td>$row[7]</td>";
                                        echo "<td>$row[8]</td>";
                                        echo "<td>$row[9]</td>";
                                        echo "<td>$row[10]</td>";
                            ?>
                                    <td>
                                        <form action="daftar_produk_dibeli.php" method="post">
                                            <input type="hidden" name="no_invoice" value="<?php echo $row[0]; ?>">
                                            <button class="btn waves-effect waves-light" type="submit">Lihat
                                                <i class="material-icons left">view_list</i>
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
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="../web/src/js/script.js"></script>
        <script type="text/javascript" src="../web/src/js/ajax.js"></script>
    </body>
</html>
