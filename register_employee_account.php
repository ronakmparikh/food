<?php include_once"assets/config.php";?>
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
                    <form class="login-form text-center" enctype="multipart/form-data" method="post" action="register_employee_account.php" >
                                <h2 class="mb-5 text-uppercase" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
                                  Sign Up Here (Vendors)
                                </h2>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="" class="m-0 p-0 text-small"> </label>
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name"  name="emp_f_name" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="" class="m-0 p-0 text-small" ></label>
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="emp_L_name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="password" id="txtNewPassword" placeholder="Enter passward" name="emp_pass"class="form-control rounded-pill form-control-lg" required>
                                    </div>

                                    <div class="form-group col-5">

                                        <input  type="password" id="txtConfirmPassword" placeholder="Confirm Passward" name="emp_con_pass" class="form-control rounded-pill form-control-lg"  required>
                                    </div>


                                      <div class="col-lg-1 py-3" style="margin-left:-5%;">
                                        <div style="color:red; float:right" id="CheckPasswordMatch"></div>
                                      </div>

                                </div>

                                <div class="row">
                                    <div class="form-group col-6" >

                                        <input type="number" class="form-control rounded-pill form-control-lg" placeholder="Age" name="emp_age" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <select class="form-control rounded-pill form-control-lg" name="emp_gen" >
                                            <option value="" selected disabled hidden>Gender</option>
                                            <option  >male</option>
                                            <option  >female</option>
                                            <option  >others</option>
                                        </select>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="email" class="form-control rounded-pill form-control-lg"placeholder="Email" name="emp_email" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder=" Phone" name="emp_phn" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">

                                        <input type="textarea" class="form-control rounded-pill form-control-lg"placeholder="Address" name="emp_add" required>
                                    </div>

                                    <div class="form-group col-6">

                                        <select class="form-control rounded-pill form-control-lg" name="emp_city">
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

                                        <select class="form-control rounded-pill form-control-lg" name="emp_state">
                                            <option  selected disabled hidden>State</option>
                                            <option  >Bihar</option>
                                            <option  >panjab</option>
                                            <option  >Delhi</option>
                                            <option  >Jharkhand</option>
                                            <option  >Uttar Pradesh</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">

                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder="Pin code" name="emp_pin" required>
                                    </div>
                                  </div>
                                  <div class="col-12 form-group">
                                      <label for="">Profile Photo</label>
                                          <input type="file" name="emp_img" class="form-control rounded-pill form-control-lg" >
                                  </div>

                                  <div class="text-center">
                                        <label>
                                          <input type="checkbox" name=""> By creating a account you agree to our
                                            <a href="#">Terms & Privacy.</a>
                                        </label>
                                  </div>


                                 <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" value="REGISTER ACCOUNT" name="emp_register">
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
 if(isset($_POST['emp_register'])){

   $emp_f_name=$_POST['emp_f_name'];
   $emp_phn=$_POST['emp_phn'];
   $emp_email=$_POST['emp_email'];
   $emp_add=$_POST['emp_add'];
   $emp_pin=$_POST['emp_pin'];
   $emp_pass=sha1($_POST['emp_pass']);
   $emp_L_name=$_POST['emp_L_name'];
   $emp_age=$_POST['emp_age'];
   $emp_gen=$_POST['emp_gen'];
   $emp_city=$_POST['emp_city'];
   $emp_state=$_POST['emp_state'];
   $emp_img = $_FILES['emp_img']['name'];
   $emp_img_tmp =  $_FILES['emp_img']['tmp_name'];
   move_uploaded_file($emp_img_tmp,"image/$emp_img");
   $duplicate=mysql_query("SELECT * FROM employee WHERE emp_email='$emp_email'");
   if(mysql_num_rows($duplicate)>0){
       echo "<script>alert('This Email Id is Already Existed')</script>";
   }
   else{
     $query = mysql_query("INSERT INTO employee (emp_f_name,emp_phn,emp_email,emp_add,emp_pin,emp_pass,emp_img,emp_L_name,emp_age,emp_gen,emp_city,emp_state) value('$emp_f_name','$emp_phn','$emp_email','$emp_add','$emp_pin','$emp_pass','$emp_img','$emp_L_name','$emp_age','$emp_gen','$emp_city','$emp_state')");
     send_sms($_POST['c_phn'],"Dear " . $_POST['c_f_name'] . ", your account for FoodStuff is created successfully :)");
     echo "<script>window.open('register_employee_account.php','_self')</script>";

   }

 }


 ?>
