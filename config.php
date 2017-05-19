<?php


    $servername = "localhost";
    $username = "muhammad.fadhillah";
    $password = "";
    $dbname = "muhammad.fadhillah";
    $portno = "5432";

    $conn_string = "host=".$servername." port=".$portno." dbname=".$dbname." user=".$username." password=".$password;

    $psql_conn = pg_connect($conn_string);
    $result = pg_query($psql_conn, 'SET SEARCH_PATH TO tokokeren');
    if(!$result){
        die('Failed to set schema:'.$psql_conn->errorMsg());
    }


?>
