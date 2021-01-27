<?php include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>FoodStuff | online Dairy products available Here</title>
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
<u> <h2 style="font-family:'cursive'">MY CART</h2></u>
      <?php
$d= date('Y-m-d h:i:s', time());

        if(isset($_SESSION['customer'])):
          $log=$_SESSION['customer'];
          $calling = mysql_query("select * from customer where c_email='$log'");
          $data = mysql_fetch_array($calling);
          $cart_query=mysql_query("SELECT * FROM cart
            inner join customer
            on cart.c_id=customer.c_id
            inner join product
              on cart.p_id=product.p_id
            inner join vendor
            on cart.v_email=vendor.v_email
            where cart.c_id='".$data['c_id']."' ORDER BY cart.cart_id desc");
						$total=0;
						$array=[];
						$c=0;
						$num_row=mysql_num_rows($cart_query);
						if($num_row>0){
							while($cart_row = mysql_fetch_array($cart_query)):
								  $o_id  = hash('sha256', microtime() );
							 $array[$c]=[$cart_row['c_id'],$cart_row['p_id'],$cart_row['v_email'],$o_id,$cart_row['qty']];
							 $c++;
								?>
	          <div class="card shadow-sm mt-4" style="padding-right:50px;padding-left:50px;">

	            <div class="row" style="border: solid 1px #ccc">
	                   <div class="col-lg-2 p-4">
	                   <a href="item.php?p_id=<?= $cart_row['p_id'];?>"><img src="image\<?= $cart_row['p_img'];?>" alt="" height="170px" width="100%"></a>
	                  </div>
	                  <div class="col-lg-6">
	                    <p style="font-size:150%"><?= $cart_row['p_name']?></p><hr>
	                   <p>weight: <?= $cart_row['each_qty']?> </p>
	                     <?php  $v_name = $cart_row['v_f_name'];?>
	                     <p>Seller: <?=   $v_name;?></p>
											 <p>Quantity: <?= $cart_row['qty']?></p>

	                    <p>Price: <?= $cart_row['p_price']?>*<?= $cart_row['qty']?> = ₹ <?=$p= $cart_row['p_price']* $cart_row['qty']?>/-</p>
	                  </div>

	                    <div class="col-lg-3 mt-5">
                        <?=
                        date_default_timezone_set('Asia/Kolkata');
                        $c_time=date('Y-m-d h:i:s', time());
                        $del_time=date('Y-m-d H:i',strtotime('+7 hour +20 minutes',strtotime($c_time)));?>
                        <i class="fas fa-shuttle-van text-info"></i>  Delivery expected till <strong><?= date(' g:ia d M y ', strtotime($del_time));?></strong> <br><br>
	                      <a  href="#cancelCart<?= $cart_row['cart_id'];?>"  data-toggle="modal"><i class="fas fa-times-circle text-danger"> REMOVE</i></a><br><br>
	                   <br>
															 <?php
												 $total = $total + $p;
										 ?>
	                  </div>
	              </div>
	          </div>
	          <!--  delete Modal -->

	          <div class="modal fade" id="cancelCart<?= $cart_row['cart_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	            <div class="modal-dialog" role="document">
	              <div class="modal-content">
	                <div class="modal-body">
	                    Are you really want to <strong style="color:red">Remove</strong> <strong> <?= $cart_row['p_name'];?></strong> From your cart?
	                </div>
	                <div class="modal-footer">
	                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
	                  <a href="RemoveCart.php?cart_id=<?= $cart_row['cart_id']?>" class="btn btn-primary">Yes</a>
	                </div>
	              </div>
	            </div>
	          </div>

				<?PHP
				endwhile;
	          ?>

						<div style="margin-bottom:1%"></div>
	      </div>
	      <div style="margin-bottom:7%"></div>
        <div class="modal fade" id="emptyCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                  Are you really want to <strong style="color:red">EMPTY</strong> your cart?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <a href="RemoveAll.php?c_id=<?= $data['c_id']?>" class="btn btn-primary">Yes</a>
              </div>
            </div>
          </div>
        </div>
					<form class="" action="MyCart.php" method="post">
						<input type="submit" name="order" value="PLACE ORDER" class="btn btn-warning fixed-bottom" style="height:70px;width:20%;margin-left:30%;padding:25px">
					</form>
					<div class="btn btn-info text-white fixed-bottom" style="margin-right:20%;height:70px;width:20%;padding:25px;margin-left:10%">
						 <b> Total ₹ <?= $total+20?>/-</b>
						 <a href="product.php" class="btn btn-success text-white fixed-bottom" style="height:70px;width:20%;padding:25px;margin-left:50%">
								<b>CONTINUE SHOPPING</b>
					</a>
						 <a href="#emptyCart"  class="btn btn-danger fixed-bottom " data-toggle="modal"  style="height:70px;width:20%;margin-left:70%;padding:25px"> <b>EMPTY CART</b></a>

				<?PHP	 }
				else{?>
					<div class="container">
						<div class="card shadow-sm">
							<img src="image/empty.png"  alt="" style="height:300px;width:300px ;margin:auto">
							<h4 style="margin:auto">Your cart is empty!</h4>
							<a href="product.php" class="btn btn-success text-white mt-3 mb-3" style="height:40px;width:15%;padding:10px;margin:auto">
 								<b>SHOP NOW</b></a>
						</div>
					</div>

			<?PHP	}
				?>

    <?php endif;
    ?>

		<?php
$id=date('Ymdhis');

			if(isset($_POST['order'])){
        foreach ($array as $key => $value){
					$insert = mysql_query("INSERT INTO orders (invoice_no,c_id,p_id,v_email,qty) values ('$id','$value[0]','$value[1]','$value[2]','$value[4]')");
				}
				$del=mysql_query("DELETE FROM cart where cart.c_id='".$data['c_id']."'");
				echo "<script>window.open('MyOrder.php','_self')</script>";

			}
		?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!--this link is for popper-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <!--this link is for js-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
