<?php
   session_start();
   set_search_path();

   /*
        Cara pakai:
        1. Semua perintah disini harus melewati method POST

        2. Cara pass value bisa menggunakan tag <input> dengan type hidden.
           Contoh: <input type="hidden" name="password" value="12345"></input>

        3. Cara menerima seperti biasa, $_POST['password'].
           Maka $_POST['password'] akan menyimpan nilai 12345

        4. Ingat! semua tag <input> harus didalam tag <form> dan hanya bisa dikirim
           dengan tag <input> atau <button> dengan type=submit !!!

        Contoh lengkap:
        <form method="post">
        	<input type="hidden" name="harga_barang" value="100000">
        	<button type="submit" name="button">Beli</button>
        </form>
   */
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      if (isset($_POST['command']) && isset($_SESSION['login'])) {
          if($_POST['command'] === 'login') {
              login($_POST['username'], $_POST['password']);
          } elseif($_POST['command'] === 'logout') {

          } elseif ($_POST['command'] === 'ganti_subkategori') {
              ganti_subkategori($_POST['kategori']);
          }
          else if($_POST['command'] === 'filter_shipped_produk') {
              filter_shipped_produk($_POST['kategori'], $_POST['nama_toko']);
          }
          else if($_POST['command'] === 'pilih_toko') {
              if (!isset($_SESSION['nama_toko'])) {
                  $_SESSION['nama_toko'] = $_POST['nama_toko'];
              }
          }
          else if($_POST['command'] === 'beli_barang') {
              beli_barang($_POST['kode_produk'],
              $_POST['harga_produk'],
              $_POST['berat_barang'],
              $_POST['kuantitas_barang']);
          }
          elseif ($_POST['command'] === 'checkout') {
              checkout($_POST['jasa_kirim'], $_POST['alamat']);
          }
          elseif ($_POST['command'] === 'beli_pulsa') {
              beli_pulsa($_POST['kode_produk'], $_POST['harga'], $_POST['nomor_hp_listrik'], $_POST['nominal']);
          }
      }
   }

   /*
        Berfungsi untuk mengecek koneksi ke database dan dapat digunakan untuk eksekusi query.
   */
   function connectDB() {
      $servername = "localhost";
      $username = "muhammad.fadhillah";
      $password = "";
      $dbname = "muhammad.fadhillah";
      $portno = "5432";

      // Create connection
      $conn_string = "host=".$servername." port=".$portno." dbname=".$dbname." user=".$username." password=".$password;
      $conn = pg_connect($conn_string);

      // Check connection
      if (!$conn) {
         die("Connection failed: " + $conn->errorMsg());
      }

      return $conn;
   }

   function set_search_path()
   {
       $conn = connectDB();
       $set_search_path = "SET SEARCH_PATH TO tokokeren";
       pg_query($conn, $set_search_path);
   }

   function login($username, $password)
   {
       $conn = connectDB();


   }

   /*
        Menerima input berupa query, dan mengembalikan resource yang bisa di fetch, atau FALSE jika query gagal.
   */
   function execute_query($query)
   {
       $conn = connectDB();
       $result = pg_query($conn, $query);
       return $result;
   }

   /*
        Mengganti select option dari subkategori dropdown yang sesuai dengan kategori utama
   */
   function ganti_subkategori($kategori_utama)
   {
       $query = "SELECT nama, kode
                 FROM sub_kategori";

       if ($kategori_utama !== 'Semua Kategori') {
           $query .= " WHERE kode_kategori = '$kategori_utama'";
       } else {
           echo '<option value="Semua Kategori">Semua Sub-kategori</option>';
       }
       $result = execute_query($query);

       while ($row = pg_fetch_row($result)) {
           echo "<option value=\"$row[1]\">$row[0]</option>";
       }
   }

    function filter_shipped_produk($kategori, $nama_toko)
    {
        $query = "SELECT SP.kode_produk, nama, harga, deskripsi, is_asuransi, stok, is_baru, harga_grosir
                  FROM shipped_produk SP, produk P
                  WHERE SP.kode_produk = P.kode_produk AND nama_toko='$nama_toko'";

        if ($kategori !== 'Semua Kategori') {
            $query .= " AND SP.kategori = '$kategori'";
        }
        $result = execute_query($query);

        while ($row = pg_fetch_row($result)) {
            echo "<tr>";
            for ($ii = 0; $ii < 8; $ii++) {
                echo "<td>";
                if ($ii == 3) {
                    if ($row[5] > 0) {
                        echo "TERSEDIA";
                    } else {
                        echo "KOSONG";
                    }
                } elseif ($row[$ii] == 't') {
                    echo "YA";
                } elseif ($row[$ii] == 'f') {
                    echo "TIDAK";
                } else {
                    echo $row[$ii];
                }
                echo "</td>";
            }
            echo '
            <td>
                <form action="beli_shipped_produk.php" method="post">
                    <input type="hidden" name="kode_produk" value="'.$row[0].'">
                    <input type="hidden" name="command" value="beli_barang">
                    <button class="btn waves-effect waves-light" type="submit" name="beli_barang">Beli
                        <i class="material-icons right">shopping_cart</i>
                    </button>
                </form>
            </td>
            ';
        }
    }

    function beli_barang($kode_produk, $harga, $berat, $kuantitas)
    {
        $sub_total = $harga * $berat;
        $email = $_SESSION['login'];

        $query = "INSERT INTO keranjang_belanja
                  VALUES('$email',
                         '$kode_produk',
                         '$berat',
                         '$kuantitas',
                         '$harga',
                         '$sub_total')";
        execute_query($query);
    }

    function checkout($jasa_kirim, $alamat)
    {
        $email = $_SESSION['login'];
        $nama_toko = $_SESSION['nama_toko'];

        $query = "SELECT sum(berat)
                  FROM keranjang_belanja
                  WHERE pembeli = '$email'";

        $total_berat = pg_fetch_row(execute_query($query))[0];

        $query = "SELECT sum(sub_total)
                  FROM keranjang_belanja
                  WHERE pembeli = '$email'";

        $total_biaya = pg_fetch_row(execute_query($query))[0];

        $query = "SELECT tarif
                  FROM jasa_kirim
                  WHERE nama = '$jasa_kirim'";

        $tarif = pg_fetch_row(execute_query($query))[0];
        $biaya_kirim = $total_berat * $tarif;
        $total_bayar = $total_biaya + $biaya_kirim;
        $no_invoice = 'V'.rand(100000000, 999999999);
        $date = date('Y-m-d', time());
        $timestamp = date('Y-m-d H:i:s', time());

        $query = "INSERT INTO transaksi_shipped(no_invoice, tanggal, waktu_bayar, email_pembeli, alamat_kirim, nama_jasa_kirim, nama_toko, status)
                  VALUES('$no_invoice', '$date', '$timestamp', '$email', '$alamat', '$jasa_kirim', '$nama_toko', 1)";
        execute_query($query);

        $query = "INSERT INTO list_item VALUES($no_invoice, )";
    }

    function beli_pulsa($kode_produk, $harga, $nomor, $nominal)
    {
        $email = $_SESSION['login'];
        $no_invoice = 'V'.rand(100000000, 999999999);
        $date = date('Y-m-d', time());
        $timestamp = date('Y-m-d H:i:s', time());

        $query = "INSERT INTO transaksi_pulsa(no_invoice, tanggal, waktu_bayar, status, total_bayar, email_pembeli, nominal, nomor, kode_produk)
                  VALUES('$no_invoice', '$date', '$timestamp', 2, '$harga', '$email', '$nominal', '$nomor', '$kode_produk')";
        execute_query($query);
    }
?>
