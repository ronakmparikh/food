<?php include_once "assets/config.php";
session_start();

if(isset($_POST["add_to_cart"]))
{
					$p_id=$_POST['p_id'];
					$qty=$_POST['quantity'];
		      $c_id=$_POST['c_id'];
		      $v_email=$_POST['v_email'];
		      $duplicate=mysql_query("SELECT * FROM cart WHERE p_id='$p_id' AND c_id='$c_id'");
		         if(mysql_num_rows($duplicate)==0){
		           $insert = mysql_query("INSERT INTO cart (c_id,p_id,v_email,qty) values ('$c_id','$p_id','$v_email','$qty')");
					      }

								else{
									echo '<script>alert("Item Already Added")</script>';
								}
								header("Location: {$_SERVER["HTTP_REFERER"]}");


		}
?>
<script></script>
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

    <!--this line includes header file-->
    <?php include"assets/header.php"
    ?>

        <div class="container-fluid" style="margin-top:80px">
          <div class="row">
              <div class="col-4 col-lg-2 col-md-2  mt-4">

                <!-- this div is used for create a list group-->
                <div class="list-group shadow" style="padding:0px">
                      <a  href="product.php" class="list-group-item list-group-item-action active text-white">category</a>

                      <!--this php code will dynamically add the category from the DB-->
                      <?php

                          $cat = mysql_query("SELECT * FROM category");//stores all categories in $cat variable
                          while ($c = mysql_fetch_array($cat)): //fetch each row in $c variable
                      ?>

                      <!--this will show a dynamic list group in category section...this category is extracted from category table's cat_title-->
                      <a href="product.php?cat=<?= $c['cat_title'];?>" class="list-group-item list-group-item-action"><?= $c['cat_title'];?></a>

                      <?php endwhile;?>
                </div>
            </div>
              <?php
                $e= mysql_num_rows(mysql_query(" SELECT * from product where p_status='Available'"));
              ?>

            <!--this section is for product container-->
            <div class="col-8 col-lg-10 col-md-10">
              <div class="row">
                <div class="col-12" style="text-align:center;">
                  <b> <h3 class="btn btn-warning"  id="inf">Our delicious products (<?=$e?>) </h3><hr></b>
                </div>

                <!--the below section is used for adding the prodects dynamically from DB-->
                <?php

                /*if the user will search by name of product then this if will be executed and filterred data will be shown*/
                  if(isset($_GET['find'])){
                      $search = $_GET['search'];
                      $calling = mysql_query("SELECT * FROM product WHERE p_name LIKE '%$search%' AND p_status='Available'");
                    }

                /*if the user will search category wise then this elseif will be executed and filterred data will be shown*/
                  elseif(isset($_GET['cat'])){
                      $cat = $_GET['cat'];
                      $calling = mysql_query("SELECT * FROM product WHERE cat_title='$cat' AND p_status='Available' ");
                    }

              /* if the user will directly go to the products page then this else will be executed without filteration*/
                  else{
                      $calling = mysql_query("SELECT * FROM product WHERE p_status='Available'");  /*collects all data from product table*/
                    }
                      $count = mysql_num_rows($calling);  /*$count will store the no. of row in product*/
                      if ($count > 0):

                      while($row = mysql_fetch_array($calling)):  /*while loop starts and fetch one-by-one row in $row variable*/
                ?>

                <div class="col-9 col-lg-3 col-md-4 col-sm-6 ">
																	<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"><!--?action=add&id=<?php echo $row["p_id"]; ?>-->

														<div style="border:1px solid #333; background-color:#fff; border-radius:5px; padding:16px; margin-bottom:10%" align="center">
														<a href="item.php?p_id=<?= $row['p_id'];?>"><img src="image\<?= $row['p_img'];?>" alt="" height="170px" class="w-100"></a><hr>

														<h6 class="text-dark"><?php echo $row["p_name"]; ?></h6>

														<h6 class="text-dark">₹ <?php echo $row["p_price"]; ?>/-</h6>


															<?php
																if(isset($_SESSION['customer'])):
																	$log=$_SESSION['customer'];


																	$cust = mysql_query("SELECT * from customer where c_email='$log'");
																	$cust_row = mysql_fetch_array($cust);
																	$c_id=$cust_row['c_id'];
															?>


																													<input  min="1" max="10" type="number" name="quantity" value="1" class="form-control text-center" />

																													<input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
																													<input type="hidden" name="v_email" value="<?php echo $row['v_email'];?>">
																													<input type="hidden" name="c_id" value="<?php echo $c_id;?>">

																														<input type="hidden" name="hidden_image" value="<?php echo $row["p_img"]; ?>" />

																													<input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>" />

																													<input type="hidden" name="hidden_price" value="<?php echo $row["p_price"]; ?>" />

																													<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />


														<?php endif?>

													</div>
												</form>
                </div>

                <?php endwhile;

              else:  /*if no product is available related to search the this else will be executed*/
                ?>
                  <div class='card'>
                      <div class='card-body'>
                        <h1> Product is not available</h1>
                      </div>
                  </div>
                <?php endif;?>
          </div>
        </div>
      </div>
    </div>

   <?php include"assets/footer.php"?>
 </body>
</html>
