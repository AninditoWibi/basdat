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
      if($_POST['command'] === 'login') {
          login($_POST['username'], $_POST['password']);
      } elseif($_POST['command'] === 'logout') {

      } elseif ($_POST['command'] === 'addBook') {

      }
      else if($_POST['command'] === 'borrow'){

      }
      else if($_POST['command'] === 'return'){

      }
      else if($_POST['command'] === 'review'){
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
?>
