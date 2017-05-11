<?php
   session_start();
   set_search_path();

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

   function execute_query($query)
   {
       $conn = connectDB();
       $result = pg_query($conn, $query);
       return $result;
   }
?>
