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
    include "../navbar.php"
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
                    <tr>
                        <td>P0000001</td>
                        <td>Pulsa Telkomsel</td>
                        <td>12000</td>
                        <td>Untuk nelpon dan internetan</td>
                        <td>10000</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>P0000021</td>
                        <td>Pulsa XL</td>
                        <td>12000</td>
                        <td>Untuk nelpon dan internetan</td>
                        <td>10000</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>P0000081</td>
                        <td>Pulsa Smartfren</td>
                        <td>12000</td>
                        <td>Untuk nelpon dan internetan</td>
                        <td>10000</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>P0000198</td>
                        <td>Paket Airtel</td>
                        <td>230000</td>
                        <td>Untuk nelpon dan internetan</td>
                        <td>200000</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
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
    </body>
</html>
