<?php require '../application.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Pulsa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <?php
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    ?>
    <div class="container">
        <div class="center-align">
            <h2 class="teal-text">Daftar Produk Pulsa</h2>
        </div>
        <table class="highlight">
            <thead>
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th class="center-align">Deskripsi</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /*--------------- Ambil banyaknya data -------------*/
                $query = "SELECT count(*)
                FROM produk_pulsa NATURAL JOIN produk";
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

                $query = "SELECT *
                FROM produk_pulsa NATURAL JOIN produk
                OFFSET $offset
                LIMIT 10";
                $result = execute_query($query);


                while ($row = pg_fetch_row($result)) {
                    echo "<tr>";
                    echo "<td>".$row[0]."</td>";
                    echo "<td>".$row[2]."</td>";
                    echo "<td>".$row[3]."</td>";
                    echo "<td>".$row[4]."</td>";
                    echo "<td>".$row[1]."</td>";
                    ?>
                    <td>
                        <form action="form_beli_produk_pulsa.php" method="post">
                            <input type="hidden" name="kode_produk" value="<?php echo $row[0]; ?>">
                            <input type="hidden" name="harga" value="<?php echo $row[3]; ?>">
                            <input type="hidden" name="nominal" value="<?php echo $row[1]; ?>">
                            <button class="btn waves-effect waves-light" type="submit">Beli
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
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>
