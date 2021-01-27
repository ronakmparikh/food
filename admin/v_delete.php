<?php
include_once"../assets/config.php";
session_start();
if(isset($_GET['del'])){

    $del = $_GET['del'];
    //$delete = mysql_query("DELETE FROM vendor where v_id='$del'");

  $disable=mysql_query( "UPDATE vendor
    set
  v_status='Disabled' where v_id='$del'");
    header("location: vendors.php");
}
