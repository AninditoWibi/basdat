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
        <div class="container">
            <div class="center-align">
                <h2 class="teal-text">Daftar Produk</h2>
            </div>
            <form class="col s12" action="index.html" method="post">
                <div class="row">
                    <div class="input-field col s6 push-s3">
                        <select>
                            <option value="" disabled selected>Silahkan pilih kategori</option>
                            <option value="1">K01</option>
                            <option value="2">K02</option>
                            <option value="3">K03</option>
                        </select>
                        <label>Kategori</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 push-s3">
                        <select>
                            <option value="" disabled selected>Silahkan pilih sub-kategori</option>
                            <option value="1">SK01</option>
                            <option value="2">SK02</option>
                            <option value="3">SK03</option>
                        </select>
                        <label>Sub Kateori</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 center-align">
                        <button class="btn waves-effect waves-light btn-small" type="submit" name="action">Filter
                            <i class="material-icons right">filter_list</i>
                        </button>
                    </div>
                </div>
            </form>
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
                <tbody>
                    <tr>
                        <td>S0000001</td>
                        <td>Maalox</td>
                        <td>59900</td>
                        <td class="center-align">TERSEDIA</td>
                        <td class="center-align">YA</td>
                        <td>599794727</td>
                        <td class="center-align">BEKAS</td>
                        <td>8800.62</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>S0000071</td>
                        <td>Lipitor</td>
                        <td>789700</td>
                        <td class="center-align">TERSEDIA</td>
                        <td class="center-align">YA</td>
                        <td>354215945</td>
                        <td class="center-align">BARU</td>
                        <td>8800.25</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>S0000175</td>
                        <td>Piroxicam</td>
                        <td>99789900</td>
                        <td class="center-align">TERSEDIA</td>
                        <td class="center-align">YA</td>
                        <td>990795664</td>
                        <td class="center-align">BARU</td>
                        <td>67888800.2</td>
                        <td>
                            <button class="btn waves-effect waves-light" type="submit" name="beli">Beli
                                <i class="material-icons right">shopping_cart</i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>S0000202</td>
                        <td>Ranitidine Hydrochloride</td>
                        <td>889801</td>
                        <td class="center-align">TERSEDIA</td>
                        <td class="center-align">YA</td>
                        <td>184269327</td>
                        <td class="center-align">BEKAS</td>
                        <td>77875800.213</td>
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
        <script type="text/javascript" src="src/js/script.js"></script>
    </body>
</html>
