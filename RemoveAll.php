<?php
include_once"assets/config.php";
session_start();
if(isset($_GET['c_id'])){

    $del = $_GET['c_id'];
    $delete=mysql_query( "DELETE FROM
      cart
    where c_id='$del'");?>

    <?PHP

      header("location: myCart.php");

}
?>
