<?php require '../application.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Transaksi Pulsa</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="../src/css/style.css">
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $email = $_SESSION['login'];

                            /*--------------- Ambil banyaknya data -------------*/
                            $query = "SELECT count(*)
                                      FROM transaksi_pulsa
                                      WHERE email_pembeli = '$email'";
                            $row_nums = pg_fetch_row(execute_query($query))[0];
                            $page_nums = ceil($row_nums / 10);
                            /*--------------------------------------------------*/

                            if (!isset($_GET['page'])){
                                $current_page = 1;
                            } elseif ($_GET['page'] > $page_nums || $_GET['page'] < 1) {
                                $current_page = 1;
                            } else {
                                $current_page = $_GET['page'];
                            }
                            $offset = 10 * ($current_page - 1);


                            $query = "SELECT no_invoice, nama, tanggal, status, total_bayar, nominal, nomor
                                      FROM transaksi_pulsa TP, produk P
                                      WHERE email_pembeli = '$email' AND TP.kode_produk = P.kode_produk
                                      OFFSET $offset
                                      LIMIT 10";
                            $result = execute_query($query);


                            while ($row = pg_fetch_row($result)) {
                                echo "<tr>";
                                echo "<td>".$row[0]."</td>";
                                echo "<td>".$row[1]."</td>";
                                echo "<td>".$row[2]."</td>";
                                echo "<td>";
                                if ($row[3] < 2) {
                                    echo "BELUM DIBAYAR";
                                } else {
                                    echo "SUDAH DIBAYAR";
                                }
                                echo "</td>";
                                echo "<td>".$row[4]."</td>";
                                echo "<td>".$row[5]."</td>";
                                echo "<td>".$row[6]."</td>";
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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="../web/src/js/script.js"></script>
        <script type="text/javascript" src="../web/src/js/ajax.js"></script>
    </body>
</html>
