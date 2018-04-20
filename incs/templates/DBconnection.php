<?php 
//making connection with student DB
$host='localhost';
$user='root';
$password='1112';
$database='ecommerce';
    $connect= mysqli_connect($host, $user, $password, $database);
            if(mysqli_connect_errno()){
            die('connection Error! ' . mysqli_connect_error());
            
            }else {}
            mysqli_query($connect,"SET NAMES 'utf8' ");//to read and write Arabic data
?>