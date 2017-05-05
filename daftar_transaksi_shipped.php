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
                            <tr>
                                <td>V000000001</td>
                                <td>Cyber Track Inc</td>
                                <td>2014-04-01</td>
                                <td>BARANG SUDAH DIBAYAR</td>
                                <td>79600</td>
                                <td>707 Harper Circle</td>
                                <td>8000</td>
                                <td>OQN6486715906681</td>
                                <td>JNE YES</td>
                                <td>
                                    <button class="btn waves-effect waves-light" type="submit" name="beli">Produk
                                        <i class="material-icons left">view_list</i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>V000000002</td>
                                <td>Schamberger-Rutherford</td>
                                <td>2017-02-18</td>
                                <td>BARANG SUDAH DIBAYAR</td>
                                <td>99500</td>
                                <td>5 Petterle Place</td>
                                <td>15000</td>
                                <td>QBN7202961661740</td>
                                <td>JNE REGULER</td>
                                <td>
                                    <button class="btn waves-effect waves-light" type="submit" name="beli">Produk
                                        <i class="material-icons left">view_list</i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <ul class="pagination center-align">
                        <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                        <li class="active"><a href="#!">1</a></li>
                        <li class="waves-effect"><a href="#!">2</a></li>
                        <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="src/js/script.js"></script>
    </body>
</html>
