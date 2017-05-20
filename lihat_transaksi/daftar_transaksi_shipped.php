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

                                $query = "SELECT *
                                          FROM transaksi_shipped
                                          WHERE email_pembeli = '$email'";

                                $result = execute_query($query);

                                while ($row = pg_fetch_row($result)) {
                                    echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[6]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[3]</td>";
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
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
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
