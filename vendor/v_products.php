
<?php include_once "../assets/config.php";
session_start();
if(!isset($_SESSION['vendor'])):
  header("location: ../vendor_login.php");
endif;
?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="..\bootstrap\bootstrap.min.css">
    <link rel = "icon" href = "..\image\ico.gif" type = "image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">
  </head>

  <body>
    <?php include"header.php"?>

    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-3">
        <?php include"include/side.php"?>
        </div>

        <div class="col-lg-9">
          <div class="row">
                    <div class="col-8">
                      <blockquote class="blockquote"><h2 class="font-weight-bold h5 my-4">Manage products </h2></blockquote>
                    </div>
            <div class="col-4">
              <form action="v_products.php"  method="get" class="form-inline mt-3">
                  <input type="search" placeholder="Search products" class="form-control" name="v_p_search" value="<?php if(isset($_GET['v_p_search'])){echo $_GET['v_p_search'];}?>">
                    <?php
                    if(isset($_GET['v_p_search'])): ?>
                      <a href="v_products.php" class="btn btn-danger">Clear Search</a>

                    <?php else: ?>
                      <input type="submit" value="Go" name="find" class="btn btn-success">
                    <?php endif;?>


              </form>
            </div>
            </div>
          <table class="table table-bordered text-center">
            <tr>
              <th>Serial No.</th>
              <th>Name</th>
              <th>Action</th>
              <th>Status</th>
            </tr>

            <tr>
              <?php

              $log = $_SESSION['vendor'];
              if(isset($_GET['find'])):
                $search=$_GET['v_p_search'];
                $calling = mysql_query("SELECT * from product where p_name like '%$search%' and v_email='$log'");
                $count=mysql_num_rows($calling);
                      if($count==0):
                        echo"<h1>No Product of this name</h1>";
                      endif;
            else:
              $calling=mysql_query("SELECT * from product where v_email='$log'");
            endif;

                $count=mysql_num_rows($calling);
                if($count>0):
                  $c=0;
                  while($row=mysql_fetch_array($calling)):
                    $c++;
              ?>


              <td><?= $c?></td>
              <td><?= $row["p_name"]?></td>
              <td>
                <a type="button"  href="#vendorProduct<?= $row['p_id'];?>" class="btn btn-success" data-toggle="modal"><i class="fas fa-eye" name="view"></i></a>


                <a href='p_edit.php?edit=<?= $row['p_id']?>' class="btn btn-info">
                  <i class="fas fa-pen-alt" name="edit"></i>
                </a>

                <a type="button"  href="#deleteVendorProduct<?= $row['p_id'];?>" class="btn btn-danger" data-toggle="modal"><i class="fas fa-trash-alt" name="X"></i></a>

                <!--  delete Modal -->
                <div class="modal fade" id="deleteVendorProduct<?= $row['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-body" >
                          Are you really want to<strong style="color:red"> Disable</strong> <strong><?= $row['p_name'];?></strong>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <a href="p_delete.php?del=<?= $row['p_id']?>" class="btn btn-primary">Yes</a>
                      </div>
                    </div>
                  </div>
                </div>

                <!--  View Modal -->
                <div class="modal fade" id="vendorProduct<?= $row['p_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable " role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                          <strong >PRODUCTS</strong>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered mt-5">
                              <tr>
                                <th>product Id</th>
                                <td><?= $row['p_id']?></td>
                              </tr>
                              <tr>
                                <th>product name</th>
                                <td><?= $row['p_name'];?></td>
                              </tr>
                              <tr>
                                <th>Price</th>
                                  <td>₹<?= $row['p_price'];?>/-</td>
                              </tr>
                              <tr>
                                <th>Manufacturing date</th>
                                  <td><?= $row['p_mfg'];?></td>
                              </tr>

                              <tr>
                                <th>product Category</th>
                                  <td><?= $row['cat_title'];?></td>
                              </tr>
                              <tr>
                                <th>Quantity</th>
                                  <td><?= $row['Qty'];?></td>
                              </tr>
                              <th>Inserted By</th>
                                <td><?= $row['v_email'];?></td>
                              </tr>
                              <tr>
                                <th>product description</th>
                                  <td><?= $row['p_desc'];?></td>
                              </tr>
                              <tr>
                                <th>Brand</th>
                                  <td><?= $row['p_brand'];?></td>
                              </tr>
                              <tr>
                                <th>Status</th>
                                  <td> <a href="#" style="color:#21c416"><?= $row['p_status'];?></a> </td>
                              </tr>
                              <tr>

                            <u><h5 class="text-center mt-3 mb-4 text-uppercase"><?= $row['p_name']?><span class="text-lowercase">'s complete details here</span></h5></u>
                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                      </div>
                    </div>
                  </div>
                </div>



              </td>
              <td><?= $row['p_status']?></td>
            </tr>
          <?php
                endwhile;
                endif;?>
          </table>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
