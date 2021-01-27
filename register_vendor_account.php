<?php include_once"assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FoodStuff | online Dairy products available Here</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel = "icon" href = "image\ico.gif" type = "image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

    <link rel="stylesheet" type="text/css" href="css/Sign_style.css">
    <link rel="stylesheet" href="css\body.css">
 </head>

 <body>
    <?php include"assets/header.php";?>
        <div class="container-fluid mt-5" class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <form class="login-form text-center" enctype="multipart/form-data" method="post" action="register_vendor_account.php" >
                                <h2 class="mb-5 text-uppercase" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
                                  Sign Up Here (Vendors)
                                </h2>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="" class="m-0 p-0 text-small"> </label>
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name"  name="v_f_name" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="" class="m-0 p-0 text-small" ></label>
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="v_L_name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="password" id="txtNewPassword" placeholder="Create passward" name="v_pass"class="form-control rounded-pill form-control-lg" required>
                                    </div>

                                    <div class="form-group col-5">

                                        <input  type="password" id="txtConfirmPassword" placeholder="Confirm Passward" name="v_con_pass" class="form-control rounded-pill form-control-lg"  required>
                                    </div>


                                      <div class="col-lg-1 py-3" style="margin-left:-5%;">
                                        <div style="color:red; float:right" id="CheckPasswordMatch"></div>
                                      </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-6" >

                                        <input type="number" min="15" max="90" class="form-control rounded-pill form-control-lg" placeholder="Age" name="v_age" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <select class="form-control rounded-pill form-control-lg" name="v_gen" >
                                            <option value="" selected disabled hidden>Gender</option>
                                            <option  >male</option>
                                            <option  >female</option>
                                            <option  >others</option>
                                        </select>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="email" class="form-control rounded-pill form-control-lg"placeholder="Email" name="v_email" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder=" Phone" name="v_phn" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="textarea" class="form-control rounded-pill form-control-lg"placeholder="Address" name="v_add" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <select class="form-control rounded-pill form-control-lg" name="v_city">
                                            <option  selected disabled hidden>City</option>
                                            <option  >Purnea</option>
                                            <option  >Saharsa</option>
                                            <option  >Katihar</option>
                                            <option  >Kishanganj</option>
                                            <option  >Bhagalpur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <select class="form-control rounded-pill form-control-lg" name="v_state">
                                            <option  selected disabled hidden>State</option>
                                            <option  >Bihar</option>
                                            <option  >panjab</option>
                                            <option  >Delhi</option>
                                            <option  >Jharkhand</option>
                                            <option  >Uttar Pradesh</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">

                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder="Pin code" name="v_pin" required>
                                    </div>
                                  </div>
                                  <div class="col-12 form-group">
                                      <label for="">Profile Photo</label>
                                          <input type="file" name="v_img" class="form-control rounded-pill form-control-lg" >
                                  </div>

                                  <div class="text-center">
                                        <label>
                                          <input type="checkbox" name=""> By creating a account you agree to our
                                            <a href="#">Terms & Privacy.</a>
                                        </label>
                                  </div>


                                 <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" value="REGISTER ACCOUNT" name="v_register">
                                 </div>


                                 <div class="col-12 text-right text-small" >
                                      Already hava an account? <a href="login.php" >Login</a>
                                 </div>
                          </form>
                    </div>
               </div>
           </div>

           <?php include"assets/footer.php"?>
           <script>
              function checkPasswordMatch() {
                  var password = $("#txtNewPassword").val();
                  var confirmPassword = $("#txtConfirmPassword").val();
                  if (password != confirmPassword)
                      $("#CheckPasswordMatch").html('<i class="fas fa-times-circle" style="height:30px;width:10%"></i>');
                  else {
                      $("#CheckPasswordMatch").html(' <i class="fas fa-check-circle" style="color:green" style="height:30px;width:10%"></i>');
                  }
              }
              $(document).ready(function () {
                 $("#txtConfirmPassword").keyup(checkPasswordMatch);
              });
              </script>
     </body>
 </html>

 <?php
 if(isset($_POST['v_register'])){
   $v_con_pass=$_POST['v_con_pass'];
   $v_f_name=$_POST['v_f_name'];
   $v_phn=$_POST['v_phn'];
   $v_email=$_POST['v_email'];
   $v_add=$_POST['v_add'];
   $v_pin=$_POST['v_pin'];
   $v_pass= sha1($_POST['v_pass']);
   $v_L_name=$_POST['v_L_name'];
   $v_age=$_POST['v_age'];
   $v_gen=$_POST['v_gen'];
   $v_city=$_POST['v_city'];
   $v_state=$_POST['v_state'];
   $v_img = $_FILES['v_img']['name'];
   $v_img_tmp =  $_FILES['v_img']['tmp_name'];
   move_uploaded_file($v_img_tmp,"image/$v_img");

   $duplicate=mysql_query("SELECT * FROM vendor WHERE v_email='$v_email'");
      if(mysql_num_rows($duplicate)>0){
       echo "<script>alert('This Email Id  Already Exist')</script>";
   }
   else{

   $query = mysql_query("INSERT INTO vendor (v_f_name,v_phn,v_email,v_add,v_pin,v_pass,v_img,v_L_name,v_age,v_gen,v_city,v_state) value('$v_f_name','$v_phn','$v_email','$v_add','$v_pin','$v_pass','$v_img','$v_L_name','$v_age','$v_gen','$v_city','$v_state')");
   send_sms($_POST['v_phn'],"Dear " . $_POST['v_f_name'] . ", your account for FoodStuff is created successfully :) KEEP IN TOUCH");
}
    echo"<script>window.open('vendor_login.php','_self')</script>";

 }


 ?>
