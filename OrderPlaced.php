
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
      <?php
        if(isset($_SESSION['customer'])):
          $log=$_SESSION['customer'];
          $p_id=$_GET['p_id'];
          $c_query=mysql_query("SELECT * FROM customer WHERE c_email='$log'");
          $c_row=mysql_fetch_array($c_query);

          $p_query=mysql_query("SELECT * FROM product inner JOIN vendor on  vendor.v_email=product.v_email WHERE p_id='$p_id'");
          $p_row=mysql_fetch_array($p_query);
          $o_query=mysql_query("SELECT * FROM orders WHERE p_id='$p_id'");
          $o_row=mysql_fetch_array($o_query);



        ?>

      <div class="container-fluid" style="margin-top:80px;padding-right:100px;padding-left:100px;">
           <div class="card shadow-sm mt-4">
              <div class="row">
                <div class="col-lg-8">
                  <img src="image\hurrey.png" alt="" style="height:100px;width:7%;float:left" class="mb-4 ml-4">
                   <span style="position:absolute;top:30%;left:13%;font-family: 'Lobster', cursive;font-size:150%;color:#009432;">Hurray! Your Order for  "<?= $p_row['p_name']?>" @ rs.<?= $p_row['p_price']?> Has Been Placed successfully... <i class="fas fa-smile" style="color:#FFC312;"></i></span>
                </div>

                <div class="col-lg-3 " style="border-left:solid #ccc 1px">
                 <span style="font-size:130%;font-family: 'Josefin Sans', sans-serif;margin-left:5%;margin-top:20%">Why call? just click!</span> <br> <span style="font-size:80%;margin-left:5%">Easily Track your MilkMart order</span><br><br>
                  <a href="MyOrder.php?c_id=<?= $c_row['c_id']?>" class="btn btn-info" style="margin-left:5%"> Go to My Orders</a>
                </div>

                <div class="col-lg-1 " >
                 <img src="image\group-2@3x.png" alt="" style="height:70px;width:80%;margin-top:45%">
                </div>

              </div>
          </div>

          <div class="card shadow-sm mt-4 text-capitalize" style="font-family: 'Josefin Sans', sans-serif;">
              <div class="row mt-4 ml-3">
                <div class="col-lg-4">
                  <h6 style="font-size:150%;color:black"><i class="fas fa-bicycle"></i>  Delivery Address</h6><hr>
                  <p style="Color:black" ><?= $c_row['c_f_name']?> <?= $c_row['c_L_name']?></p>
                  <p><?= $c_row['c_add']?></p>
                  <p><?= $c_row['c_city']?> <?= $c_row['c_state']?>, <?= $c_row['c_pin']?></p><br>
                  <p style="color:black">Phone Number</p>
                  <p><?= $c_row['c_phn']?></p>
                </div>

                <div class="col-lg-4" style="border-left: solid 1px #ccc">
                  <h6 style="font-size:150%;color:black"><i class="fas fa-gift"></i>  Offers!</h6><hr>
                  <h6>Get 40% off on all groceries at your first shopping.</h6> <br>
                  <h6>Get Free Home delivery on shopping of Rs.500 or more.</h6>
                </div>

                <div class="col-lg-4" style="border-left: solid 1px #ccc">
                  <h6 style="font-size:150%;color:black"><i class="fas fa-network-wired"></i>  More Actions</h6><hr>
                  <p><a href="register_vendor_account.php" style="color:#556"><i class="fas fa-handshake text-info"></i>  .share your products if you have.</a></p>
                  <p> <a href="Contact.php" style="color:#556"><i class="fas fa-comment-dots text-info"></i>  Feedback for our service</a> </p>
                  <p style="color:#556"><i class="fab fa-get-pocket text-info" ></i>   Get in touch with us: <br> <a href="#" style="color:#556; margin-left:5%">MilkMart4u@gmil.com</a> </p>

                </div>
              </div>
          </div>

          <div class="card shadow-sm mt-4 text-capitalize" style="font-family: 'Josefin Sans', sans-serif;">
            <div class="row">
                   <div class="col-lg-2 p-4">
                   <img src="image\<?= $p_row['p_img'];?>" alt="" height="170px" width="100%">
                  </div>
                  <div class="col-lg-6">
                    <p style="font-size:200%"><?= $p_row['p_name']?></p><hr>
                   <p>Qty: <?= $p_row['each_qty']?> </p>
                     <?php  $v_name = $p_row['v_f_name'];?>
                     <p>Seller: <?=   $v_name;?></p>
                    <p>Price: ₹<?= $p_row['p_price']?>/-</p>
                  </div>

                  <div class="col-lg-3 mt-5">
                   <i class="fas fa-shuttle-van text-info"></i>  Delivery expected Within 5 Hours. <br><br>
                   <a href="" class="link  text-info"><i class="fas fa-times-circle text-info"></i> cancel item</a><br>
                   <a href="Contact.php" class="link  text-info"><i class="fas fa-question-circle text-info"></i> Need Help?</a><br><br>
                    <b>Quantity : </b><?= $o_row['qty']?>packs<br>
                   <b> Total ₹<?= $p_row['p_price']*$o_row['qty']+20?>/-</b> (Delivery charge included.)
                  </div>

              </div>
            </div>
          </div>


      </div>
    <?php endif;
    ?>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!--this link is for popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!--this link is for js-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
