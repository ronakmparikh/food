
<?php include_once "assets/config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>MilkMart | online Dairy products available Here</title>
     <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
     <link rel="stylesheet" href="css\body.css">
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>
  <body style="background:#f1f3f6">
      <?php include"assets/header.php"?>
      <div class="container-fluid" style="padding-right:100px;padding-left:100px;margin-top:100px">
      <u> <h2 style="font-family:'cursive'">MY ORDER</h2></u>


      <?php
      if(isset($_SESSION['customer'])):
      $log=$_SESSION['customer'];
      $calling = mysql_query("select * from customer where c_email='$log'");
        $row = mysql_fetch_array($calling);
      $query = mysql_query("SELECT DISTINCT invoice_no from orders  inner join customer
      on orders.c_id=customer.c_id
      inner join product
        on orders.p_id=product.p_id
      inner join vendor
      on orders.v_email=vendor.v_email where orders.c_id='".$row['c_id']."' ORDER BY orders.o_id desc");


      $count = mysql_num_rows($query);
      if($count>0){
      while($order_data = mysql_fetch_array($query)): ?>

        <div class="col-lg-12">
          <div class="card mb-4">
                  <div class=" bordered p-2">
                    <div class="card bg-info text-white" style="width:15%;height:40px;padding-left:1.5%;padding-top:0.5%"> OD<?= $order_data['invoice_no'];?></div>
                  </div>

                  <?php
                    $order = mysql_query("SELECT * from orders inner join customer
                    on orders.c_id=customer.c_id
                    inner join product
                      on orders.p_id=product.p_id
                    inner join vendor
                    on orders.v_email=vendor.v_email where orders.c_id='".$row['c_id']."'" );
                    while ($data = mysql_fetch_array($order)):
                      if($order_data['invoice_no']==$data['invoice_no']){
                      $t=$data['order_time'];
                        ?>
                        <div class="card " style="padding-right:50px;padding-left:50px;border-radius:0px">
                          <div class="row" >
                                 <div class="col-lg-2 p-4">
                                 <img src="image\<?= $data['p_img'];?>" alt="" height="170px" width="100%">
                                </div>
                                <div class="col-lg-6">
                                  <p style="font-size:150%"><?= $data['p_name']?></p><hr>
                                 <p>Qty: <?= $data['each_qty']?> </p>
                                   <?php  $v_name = $data['v_f_name'];?>
                                   <p>Seller: <?=   $v_name;?></p>
                                  <p>Price: ₹<?= $data['p_price']?>/-</p>
                                </div>

                                  <div class="col-lg-3 mt-5">

                                <?php

                                 if($data['order_status']=='Active' || $data['order_status']=='Delivered'):
                                        date_default_timezone_set('Asia/Kolkata');
                                       //set an date and time to work with
                                       $o_time = $data['order_time'];
                                       //display the converted time
                                       $del_time=date('Y-m-d H:i',strtotime('+7 hour +20 minutes',strtotime($o_time)));
                                       //echo date('Y-m-d h:i:s', time());
                                        if( date('Y-m-d h:i:s', time())>$del_time):
                                          $o_id=$data['o_id'];
                                          $delevered=mysql_query( "UPDATE orders
                                            set
                                          order_status='Delivered' where orders.o_id='$o_id'");
                                             ?>
                                            <b class="text-success"> <i class="fas fa-shuttle-van text-info text-success"></i>  <i class="fas fa-check text-success"></i> Delivered</b><br> <br>

                                        <?PHP
                                        else:
                                          date_default_timezone_set('Asia/Kolkata');
                                         //set an date and time to work with
                                         $o_time = $data['order_time'];
                                         //display the converted time
                                         $del_time=date('H:i d-m-Y',strtotime('+7 hour +20 minutes',strtotime($o_time)));
                                        ?>

                                               <i class="fas fa-shuttle-van text-info"></i>  Delivery expected till <strong><?= date(' g:ia d M y ', strtotime($del_time)); ?></strong> <br><br>

                                              <a  href="#cancelOrder<?= $data['p_id'];?>"  data-toggle="modal"><i class="fas fa-times-circle text-info">CANCEL ITEM</i></a><br><br>



                                      <?php
                                        endif;
                                  else:
                                    date_default_timezone_set('Asia/Kolkata');
                                   //set an date and time to work with
                                   $o_time = $data['order_time'];
                                   //display the converted time
                                   $del_time=date('H:i d-m-Y',strtotime('+7 hour +20 minutes',strtotime($o_time)));

                                      ?>

                                          <del>  <i class="fas fa-shuttle-van text-info"></i>  Delivery expected till <strong><?= date(' g:ia d M y ', strtotime($del_time)); ?></strong> </del><br><br>
                                           <b data-toggle="modal" style="color:red"> CANCELLED</b><br><br>

                                <?PHP endif; ?>

                                 <br> <b>Quantity : </b><?= $data['qty']?>packs<br>
                                      <b> Total ₹<?= $data['p_price']*$data['qty']+20?>/-</b>
                                </div>

                            </div>
                        </div>

                        <!--  delete Modal -->
                        <div class="modal fade" id="cancelOrder<?= $data['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                  Are you really want to <strong style="color:red">CANCEL ORDER</strong> <strong>for <?= $data['p_name'];?></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <a href="cancel.php?o_id=<?= $data['o_id']?>" class="btn btn-primary">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>

                  <?PHP    }
                    endwhile;
                  ?>
                  <div class=" container-fluid row p-3 ml-0" style="border:solid 1px #ccc">
                    <u> Ordered On:</u>&nbsp;&nbsp;&nbsp;&nbsp;<?=$t?>
                  </div>

          </div>
        </div>
      <?php endwhile;
    }
    else{?>
      <div class="container">
        <div class="card shadow-sm">
          <img src="image/empty.png"  alt="" style="height:300px;width:300px ;margin:auto">
          <h4 style="margin:auto">You have not ordered yet!</h4>
          <a href="product.php" class="btn btn-success text-white mt-3 mb-3" style="height:40px;width:15%;padding:10px;margin:auto">
            <b>SHOP NOW</b></a>
        </div>
      </div>

  <?PHP	}
    endif;?>





    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!--this link is for popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!--this link is for js-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
