<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    $disable=mysql_query( "UPDATE product
      set
    p_status='Not Available' where p_id='$del'");
      header("location: products.php");
}
