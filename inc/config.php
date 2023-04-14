<?php
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "xemphim";
 try
 {
     $DBcon = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
     $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $Nhan_connect = mysqli_connect($DB_host,$DB_user,$DB_pass,$DB_name);
    mysqli_set_charset($Nhan_connect,"utf8");
    $conn=mysqli_connect($DB_host,$DB_user,$DB_pass,$DB_name);
    $conn->set_charset("utf8");
 }
 catch(PDOException $e)
 {
     echo "ERROR : ".$e->getMessage();
 }

