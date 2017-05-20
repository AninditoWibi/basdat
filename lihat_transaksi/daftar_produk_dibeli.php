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
        include "navbar.php";
        if(!isset($_SESSION['login'])){
            header("Location: ../login.php");
        }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="card-panel z-depth-2 col s10 offset-s1">
                    <div class="center-align">
                        <h2 class="teal-text">Daftar Produk Dibeli</h2>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <p>No Invoice :
                                <?php
                                    if (!isset($_POST['no_invoice'])) {
                                        header("Location: daftar_transaksi_shipped.php");
                                    } else {
                                        $no_invoice = $_POST['no_invoice'];
                                        echo $no_invoice;
                                    }
                                ?>
                            </p>
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

                                /*--------------- Ambil banyaknya data -------------*/
                                $query = "SELECT count(*)
                                          FROM list_item
                                          WHERE no_invoice = '$no_invoice'";
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


                                $query = "SELECT nama, berat, kuantitas, LI.harga, sub_total, LI.kode_produk
                                          FROM list_item LI, produk P
                                          WHERE LI.kode_produk = P.kode_produk AND LI.no_invoice = '$no_invoice'
                                          OFFSET $offset
                                          LIMIT 10";

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
                                        <form action="../web/ulas.php" method="post">
                                            <input type="hidden" name="kode_produk" value="<?php echo $row[5]; ?>">
                                            <button class="btn waves-effect waves-light" type="submit">Ulas
                                                <i class="material-icons right">mode_edit</i>
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
