<?php
include_once"assets/config.php";
session_start();
if(isset($_GET['o_id'])){
    $log=$_SESSION['customer'];
    $c = $_GET['o_id'];
    $cancel=mysql_query( "UPDATE orders
      set
    order_status='cancel' where orders.o_id='$c'");
   $q=mysql_query("SELECT * FROM order where o_id='$c'");
    $r=mysql_fetch_array($q);
    header("location: MyOrder.php?c_id='".$r['c_id']."'");

}
