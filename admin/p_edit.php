

<?php include"../assets/config.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body style="background:#8f8c8c;">
    <?php
        $edit= $_GET['edit'];
        $query = mysql_query("SELECT * FROM product where p_id='$edit'");
        $row=mysql_fetch_array($query);?>

  <div class="container">
    <div class="row mt-5">
      <div class="col-lg-10 m-auto">
        <div class="card shadow mb-5">
          <form  action="v_edit.php?edit=<?=$_GET['edit']?>" method="post" enctype="multipart/form-data" style="background:#dbd7d7" >
            <h2 class="mb-5 mt-3 text-uppercase text-center" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
              UPDATE PRODUCT
            </h2>
            <div class="row">
                <div class="form-group col-6">

                      <input type="text" class="form-control rounded-pill form-control-lg" name="_name" value="<?=$row['p_name']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_price" value="<?=$row['p_price']?>">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-6">

                  <input type="text" class="form-control rounded-pill form-control-lg" name="p_mfg" value="<?=$row['p_mfg']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="cat_title" value="<?=$row['cat_title']?>">
                </div>
            </div>

              <div class="row">
                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_qty" value="<?=$row['Qty']?>">
                </div>

                <div class="form-group col-6">

                    <input type="text" class="form-control rounded-pill form-control-lg" name="p_brand" value="<?=$row['p_brand']?>">
               </div>
            </div>

             <div class="form-group">
                 <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" name="update" value="UPDATE" class="mt-5">
             </div>

          </form>

        </div>
      </div>
    </div>
  </div>



  <?php
    if(isset($_POST['update'])){
      $p_id=$_GET['edit'];
      $p_name=$_POST['p_name'];
      $p_price=$_POST['p_price'];
      $p_mfg=$_POST['p_mfg'];
      $cat_title=$_POST['cat_title'];
      $Qty=$_POST['Qty'];
      $p_brand=$_POST['p_brand'];



      $update="UPDATE product
      set
      p_name='$p_name',p_price='$p_price',p_mfg='$p_mfg',cat_title='$cat_title',Qty='$Qty',p_brand='$p_brand' where p_id='$p_id'";
      mysql_query($update);
      redirect('products');
            }
             ?>




  </body>
</html>
