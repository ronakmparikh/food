
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
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>
  <body style="background:#f1f3f6">
      <?php include"assets/header.php"?>
      <div class="container-fluid" style="margin-top:100px">
        <div class="row mt-5">
          <div class="col-lg-8">
            <?php
              if(!isset($_SESSION['customer'])):
            ?>
              <div class="card shadow-sm" style="width:100%">
                <div class="card-header bg-info text-white">
                  1.LOGIN OR SIGNUP
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6">
                      <form class="" action="order.php" method="post">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="username" name='email' style="border:#000;border-bottom:#ccc solid 1px">
                        </div>
                        <div class="form-group">
                          <input type="password" class="form-control" placeholder="password" name="password" style="border:#000;border-bottom:#ccc solid 1px">
                          <input type="hidden" name="p_id" value="<?= $_GET['p_id'];?>">
                        </div>
                        <input type="submit" class="card mb-5 w-100 text-center text-white py-2" value="CONTINUE" name="login" style="background:#fb641b;height:40px;">
                      </form>
                    </div>
                    <div class="col-lg-6">
                      <div class="container-fluid text-center text-dark">
                        Advantages of our secure login <br><hr>
                        <i class="fas fa-shuttle-van text-info"></i>&nbsp;Easily track orders, Hassel free returns <br><br>
                        <i class="fas fa-bell text-info"></i>&nbsp;Get relevant alerts and recommendation <br><br>
                        <i class="fas fa-star text-info"></i>&nbsp;Wishlist,Reviews,Rating and  Many More...
                      </div>
                    </div>
                  </div>
              </div>

              </div>

            <?php

                if(isset($_POST['login'])){
                	$email = $_POST['email'];
                	$password = sha1($_POST['password']);

                	$query = mysql_query("select * from customer where c_email ='$email' AND c_pass ='$password'");
                	$count = mysql_num_rows($query);

                	if($count > 0){
                			$_SESSION['customer'] = $email;
                      $p_id = $_POST['p_id'];
                			echo"<script>window.open('order.php?p_id=$p_id','_self')</script>";
                	}
                	else{
                		echo "<script>alert('your username and password is wrong')</script>";
                	}
                }
                ?>
                <div class="card mt-3 shadow-sm">
                  <div class="card-body">
                  2. DELEVERY ADDRESS
                  </div>
                </div>

                <div class="card mt-3 shadow-sm">
                  <div class="card-body">
                  3. ORDER SUMMERY
                  </div>
                </div>

                <div class="card mt-3 shadow-sm">
                  <div class="card-body">
                  4. PAYMENT OPTION
                  </div>
                </div>
          <?php
           else:
             $log = $_SESSION['customer'];
             $query = mysql_query("SELECT * FROM customer where c_email='$log'");
             $c_row = mysql_fetch_array($query);

             ?>

             <div class="card">
               <div class="card-body">
                 1. <b></b>Login <i class="fas fa-check"></i>
                 <a href="login.php" class="btn btn-outline-info" style="float:right">CHANGE</a><br>
                <span><?= $log ?></span>
               </div>
             </div>

             <div class="card shadow-sm mt-3" style="width:100%">
               <div class="card-header bg-info text-white">
                 2. DELEVER HERE OR CHANGE?
               </div>
               <div class="card-body">
                 <div class="row">
                   <div class="col-lg-6">
                     <form class="" action="order.php" method="post">
                       <div class="form-group">
                         <input type="hidden" class="form-control"
                         value="<?=$c_row['c_id']?>" name='c_id'>
                       </div>

                       <div class="form-group">
                         <input type="text" class="form-control"
                         value="<?=$c_row['c_add']?>" name='c_add' style="border:#000;border-bottom:#ccc solid 1px">
                       </div>

                       <div class="form-group">
                         <input type="text" class="form-control" value="<?=$c_row['c_city']?>" name="c_city" style="border:#000;border-bottom:#ccc solid 1px">
                       </div>
                     </div>
                       <div class="col-lg-6">
                         <div class="form-group">
                           <input type="text" class="form-control" value="<?=$c_row['c_state']?>" name="c_state" style="border:#000;border-bottom:#ccc solid 1px">
                         </div>

                         <div class="form-group">
                           <input type="text" class="form-control" value="<?=$c_row['c_pin']?>" name="c_pin" style="border:#000;border-bottom:#ccc solid 1px">
                         </div>
                       </div>
                       <?PHP
                        $p_id=$_GET['p_id'];
                       ?>
                       <input type="hidden" name="p_id" value="<?=$p_id?>">
                       <input type="submit" class="card mb-5 w-100 text-center text-white py-2" value="CONTINUE" name="chng_add" style="background:#fb641b;height:40px;">

                     </form>


                   </div>
                 </div>
             </div>

             <div class="card shadow-sm mt-3" style="width:100%">
               <div class="card-header bg-info text-white">
                 3.ORDER SUMMERY
               </div>

               <?php
                    $p_id=$_GET['p_id'];
                    $_SESSION['product']=$p_id;
                   $query=mysql_query("SELECT * FROM product inner join vendor on product.v_email=vendor.v_email WHERE p_id='$p_id'");
                    $p_row=mysql_fetch_array($query);
               ?>
               <div class="card-body ">
                 <div class="row">
                        <div class="col-lg-2">
                        <img src="image\<?= $p_row['p_img'];?>" alt="" height="200px" width="100%">
                       </div>
                       <div class="col-lg-5">
                         <p style="font-size:200%"><?= $p_row['p_name']?></p><hr>
                        <p>Qty: <?= $p_row['each_qty']?> </p>
                          <?php  $v_name=$p_row['v_email'];?>
                        <p>Seller: <?=   $p_row['v_f_name'];?> <?=$p_row['v_L_name'];?></p>
                         <p>Price: ₹<?= $p_row['p_price']?>/-</p>
                       </div>

                       <div class="col-lg-4">
                         <i class="fas fa-shuttle-van text-info"></i> Delivery expected Within 4 Hours.
                       </div>

                   </div>
                 </div>
             </div>

             <div class="card shadow-sm mt-3" style="width:100%">
               <div class="card-header bg-info text-white">
                 4. PAYMENT OPTION
               </div>

               <div class="card-body ">
                 <div class="row">
                        <div class="col-lg-10">
                        <input type="checkbox" name="payment_option" value="" checked>
                        <label for="">cash on </label><br>
                        <input type="checkbox" name="payment_option" value="" disabled>
                        <label for="">Online Payment</label> <span class="text-danger" style="font-size:10px">online payment is currently unavaiable</span>
                    <!--   <input type="submit" class="card mb-5  text-center text-white py-2" value="OK" name="pay" style="background:#fb641b;height:40px;float:right;margin-top:-5%">-->
                       </div>
                </div>
              </div>
              <form class="" action="order.php" method="post">
                <input type="hidden" name="p_id" value="<?= $p_row['p_id']?>">

                <input type="hidden" name="p_name" value="<?= $p_row['p_name']?>">
                <input type="hidden" name="v_email" value="<?= $p_row['v_email']?>">
                  <input type="hidden" name="c_phn" value="<?= $c_row['c_phn']?>">
                  <input type="hidden" name="c_f_name" value="<?= $c_row['c_f_name']?>">
                <input type="hidden" name="c_id" value="<?= $c_row['c_id']?>">
                <input type="hidden" name="p_qty" id="sendata" value="<script>qty</script>">
                <input type="submit" class="card mb-5 text-white py-2" value="PLACE ORDER" name="order" style="background:#fb641b;height:40px;r">
              </form>
                 </div>

             <?php
                  if(isset($_POST['chng_add'])){
                    $c_id=$_POST['c_id'];
                    $c_add=$_POST['c_add'];
                    $c_state=$_POST['c_state'];
                    $c_city=$_POST['c_city'];
                    $c_pin=$_POST['c_pin'];
                    $p_id=$_POST['p_id'];

                    $update=mysql_query("UPDATE customer
                    SET
                    c_add='$c_add',c_state='$c_state',c_city='$c_city',c_pin='$c_pin' where c_id='$c_id'");
                      echo"<script>window.open('order.php?p_id=$p_id','_self')</script>";
                 }

                 ?>

                 <?php
                 $id=date('Ymdhis');
                   if(isset($_POST['order'])){
                     $qty=$_POST['p_qty'];
                     $p_id=$_POST['p_id'];
                      $c_id=$_POST['c_id'];
                     $v_email=$_POST['v_email'];
                      
                     $insert = mysql_query("INSERT INTO orders (invoice_no,c_id,p_id,v_email,qty) values ('$id','$c_id','$p_id','$v_email','$qty')");
                //   send_sms($_POST['c_phn'],"Dear " . $_POST['c_f_name'] . ",Your Order for ".$_POST['p_name']." has been Placed.");

                    echo "<script>window.open('OrderPlaced.php?p_id=$p_id','_self')</script>";
                    }
                 ?>
               </div>


                         <div class="col-lg-3 ml-3">
                           <div class="card shadow">
                             <div class="card-header">
                               PRICE DETAILS
                             </div>
                             <div class="card-body">
                               <table style="width:100%">
                                 <tr>
                                   <th>Price(1 item )</th>
                                 <?php
                                 $id=$_GET['p_id'];
                                 $p=mysql_query("SELECT * from product where p_id='$id'");
                                 $r=mysql_fetch_array($p)?>

                                   <td style="float:right">₹<span class="price"><?= $r['p_price']?></span>/-</td>
                                 </tr>

                                 <tr>

                                     <th>Qty</th>
                                     <td class="float-right">
                                       <span>
                                         <button type="button" class="btn btn-outline-danger btn-sm minus">-</button>
                                         <span class=" btn btn-outline-info display bordered btn-sm text-dark" >1</span>
                                         <button type="button" class="btn btn-outline-success btn-sm plus">+</button>

                                       </span>
                                     </td>
                                 </tr>
                                 <tr style="border-bottom:1px solid #ccc">
                                   <th>Delivery Charge</th>
                                   <td style="float:right">₹20/-</td>
                                 </tr>

                                 <tr>
                                   <th>Total</th>
                                   <td style="float:right">₹ <span class="total"><?= $r['p_price']+20?></span>/-</td>
                                 </tr>
                               </table>
                             </div>

                           </div>
                         </div>
             <?php endif;?>



      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!--this link is for popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!--this link is for js-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
var qty;
  $(document).ready(function(){
    $(".plus").click(function(){
      var display = $(".display").text();
          display = parseInt(display)
          if (display<20) {
              display+=1
          }

          $(".display").text(display)
      var price = $(".price").text();
          price = parseInt(price)
      var total = display * price + 20;
      $(".total").text(total)
    qty=  $("#sendata").val(display);

    })


      $(".minus").click(function(){
        var display = $(".display").text();
            display = parseInt(display)
            if(display>1){  display-=1}

            $(".display").text(display)
        var price = $(".price").text();
            price = parseInt(price)
        var total = display * price + 20;
        $(".total").text(total)
      qty=  $("#sendata").val(display);

      })


    $("#sendata").val(1);

  });

</script>
  </body>
</html>
