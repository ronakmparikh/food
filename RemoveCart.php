<?php
include_once"assets/config.php";
session_start();
if(isset($_GET['cart_id'])){

    $del = $_GET['cart_id'];
    $delete=mysql_query( "DELETE FROM
      cart
    where cart_id='$del'");?>

    <?PHP

      header("location: myCart.php");

}
?>
