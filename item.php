
<?php include_once "assets/config.php";
session_start();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>MilkMart | online Dairy products available Here</title>
    <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
  <link rel="stylesheet" href="bootstrap\bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/body.css">
  <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/product.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>

.img-zoom-container {
  position: relative;
}
.img-zoom-container:hover .img-zoom-result{
  display: block;
}

.img-zoom-lens {
  position: absolute;
  /*set the size of the lens:*/
  width: 150px;
  height: 100px;
}

.img-zoom-result {
  border: 1px solid #fff;
  position: relative;
  top:-8%;
  left:100%;
  display: none;
  z-index: 999;
  width: 213%;
  height:530px;
  margin-left: 5%
}

</style>
<script>
function imageZoom(imgID, resultID) {
  var img, lens, result, cx, cy;
  img = document.getElementById(imgID);
  result = document.getElementById(resultID);
  /*create lens:*/
  lens = document.createElement("DIV");
  lens.innerHTML="";
  lens.setAttribute("style","text-align:center;color:black;padding-top:20px;");
  lens.setAttribute("class", "img-zoom-lens");
  /*insert lens:*/
  img.parentElement.insertBefore(lens, img);
  /*calculate the ratio between result DIV and lens:*/
  cx = result.offsetWidth / lens.offsetWidth;
  cy = result.offsetHeight / lens.offsetHeight;

  /*set background properties for the result DIV:*/
  result.style.backgroundImage = "url('" + img.src + "')";
  result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
  /*execute a function when someone moves the cursor over the image, or the lens:*/
  lens.addEventListener("mousemove", moveLens);
  img.addEventListener("mousemove", moveLens);
  /*and also for touch screens:*/
  lens.addEventListener("touchmove", moveLens);
  img.addEventListener("touchmove", moveLens);
  function moveLens(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image:*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    /*calculate the position of the lens:*/
    x = pos.x - (lens.offsetWidth / 2);
    y = pos.y - (lens.offsetHeight / 2);
    /*prevent the lens from being positioned outside the image:*/
    if (x > img.width - lens.offsetWidth) {x = img.width - lens.offsetWidth;}
    if (x < 0) {x = 0;}
    if (y > img.height - lens.offsetHeight) {y = img.height - lens.offsetHeight;}
    if (y < 0) {y = 0;}
    /*set the position of the lens:*/
    lens.style.left = x + "px";
    lens.style.top = y + "px";
    /*display what the lens "sees":*/
    result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>


</head>
<body style="background:#f5f7fa">
      <?php include"assets/header.php"?>

 <div class="container-fluid" style="margin-top:100px">
      <div class="row mt-5">
    <div class="col-lg-2 ">
  <div class="list-group shadow" style="padding:0px">
            <a href="sweets.php" class="list-group-item list-group-item-action active">category</a>

            <?php
                $cat = mysql_query("SELECT * FROM category");
                while ($c = mysql_fetch_array($cat)):
      ?>
          <a href="product.php?cat=<?= $c['cat_title'];?>" class="list-group-item list-group-item-action"><?= $c['cat_title'];?></a>

          <?php endwhile;?>

          </div>
      </div>



    <div class="col-lg-10 col-12 ">
          <div class="row">

           <?php
              if(isset($_GET['p_id'])):
              $p_id = $_GET['p_id'];
              $calling = mysql_query("SELECT * from product where p_id='$p_id'");
              $row = mysql_fetch_array($calling);
              ?>

            <!--below section is for item image-->
          <!--  <div class="col-lg-4">
              <img src="image\<?= $row['p_img'];?>" alt="" class="w-100 shadow "><br><br>
              <a href="order.php?p_id=<?= $row['p_id']?>" class="btn btn-success py-2 " style="height:45px;width:100%;">BUY NOW</a>
            </div>-->

            <div class=" col-lg-4 img-zoom-container">
              <img id="myimage" src="image\<?= $row['p_img'];?>" class="w-100 myimage shadow-sm " style="float:left;height:350px;width:100%)">
              <div id="myresult" class="img-zoom-result"></div>
              <a href="order.php?p_id=<?= $row['p_id']?>" class="btn btn-success py-2 " style="height:45px;width:100%;position:absolute;top:400px;left:0%">BUY NOW</a>
            </div>


              <!--below section is for item information table-->
            <div class="col-lg-8">
              <table class="table table-bordered shadow">
                <tr>
                  <th>Name</th>
                  <td><?= $row['p_name'];?></td>
                </tr>

                <tr>
                  <th>Price</th>
                  <td><?= $row['p_price'];?></td>
                </tr>

                <tr>
                  <th>Qty</th>
                  <td><?= $row['each_qty'];?></td>
                </tr>

                <tr>
                  <th>Brand</th>
                  <td><?= $row['p_brand'];?></td>
                </tr>

                <tr>
                  <th>Category</th>
                  <td><?= $row['cat_title'];?></td>
                </tr>
              </table>
              <div class="card mt-5 border border-dark">
                 <div class="card-header bg-dark text-white">Description</div>
                  <div class="card-body lead">
                    <?= $row['p_desc'];?>
                  </div>
              </div>
          </div>
            </div>

            <?php endif;?>
          </div>

        </div>
       </div>
 <script>
</script>
   <?php include"assets/footer.php"?>


<script type="text/javascript">
    $(document).ready(function(){

      $(".myimage").hover(function(){
        imageZoom("myimage", "myresult");
      });
    })
</script>
 </body>
</html>
