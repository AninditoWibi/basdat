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
                        <h2 class="teal-text">Daftar Produk Dibeli</h2>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <p>No Invoice : </p>
                        </div>
                    </div>
                    <table class="centered highlight">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Berat</th>
                                <th>Kuantitas</th>
                                <th>Harga</th>
                                <th>Sub-total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn = connectDB();
                                $email = $_SESSION['login'];
                                $no_invoice = $_POST['no_invoice'];

                                $query = "SELECT nama, berat, kuantitas, LI.harga, sub_total
                                          FROM list_item LI, produk P
                                          WHERE LI.kode_produk = P.kode_produk AND LI.no_invoice = '$no_invoice'";

                                $result = execute_query($query);

                                while ($row = pg_fetch_row($result)) {
                                    echo "<tr>";
                                        echo "<td>$row[0]</td>";
                                        echo "<td>$row[1]</td>";
                                        echo "<td>$row[2]</td>";
                                        echo "<td>$row[3]</td>";
                                        echo "<td>$row[4]</td>";
                            ?>
                                    <td>
                                        <button class="btn waves-effect waves-light" type="submit">Ulas
                                        </button>
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
