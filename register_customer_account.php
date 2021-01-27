
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

    <div style="background:url('image/15.jpg');background-repeat:no-repeat;background-size:cover;position:relative;">
      <div style="background-color:rgba(0,0,0,.6);position:relative">
        <div class="container-fluid mt-5" class="login-container d-flex align-items-center justify-content-cent" style="margin-top:60px">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <form class="login-form text-center" method="post" action="register_customer_account.php" enctype="multipart/form-data">
                                <h2 class="mb-5 mt-3 text-uppercase text-white" style="font-family: 'Kaushan Script',cursive;color:#ff0867">
                                  Sign Up Here
                                </h2>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="First Name"  name="c_f_name" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <input type="text" class="form-control rounded-pill form-control-lg" placeholder="Last Name" name="c_L_name" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="password" id="txtNewPassword" placeholder="Enter passward" name="c_pass"class="form-control rounded-pill form-control-lg" required>
                                    </div>

                                    <div class="form-group col-5">
                                        <input  type="password" id="txtConfirmPassword" placeholder="Confirm Passward" name="c_con_pass" class="form-control rounded-pill form-control-lg" required>
                                    </div>


                                      <div class="col-lg-1 py-3" style="margin-left:-5%;">
                                        <div style="color:red; float:right" id="CheckPasswordMatch"></div>
                                      </div>

                                </div>

                                  <div class="row">
                                    <div class="form-group col-6">
                                        <input type="number" class="form-control rounded-pill form-control-lg" placeholder="Age" name="c_age" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_gen">
                                            <option value="" selected disabled hidden>Gender</option>
                                            <option>male</option>
                                            <option>female</option>
                                            <option>other</option>
                                        </select>
                                   </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="email" class="form-control rounded-pill form-control-lg"placeholder="Email" name="c_email" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <input  oninput="count()" onfocusout="chkPhn()" id="inp" type="number" class="form-control rounded-pill form-control-lg"placeholder=" Phone" name="c_phn" required><b><span  style="opacity:0.0"id="invalid">inavalid</span></b>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <input type="textarea" class="form-control rounded-pill form-control-lg"placeholder="Address" name="c_add" required>
                                    </div>

                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_city">
                                            <option value="" selected disabled hidden>City</option>
                                            <option>Purnea</option>
                                            <option>Saharsa</option>
                                            <option>Katihar</option>
                                            <option>Kishanganj</option>
                                            <option>Bhagalpur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <select class="form-control rounded-pill form-control-lg" name="c_state">
                                            <option value="" selected disabled hidden>State</option>
                                            <option>Bihar</option>
                                            <option>panjab</option>
                                            <option>Delhi</option>
                                            <option>Jharkhand</option>
                                            <option>Uttar Pradesh</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <input type="number" class="form-control rounded-pill form-control-lg"placeholder="Pin code" name="c_pin" required>
                                    </div>
                                  </div>

                                  <div class="col-12 form-group">
                                      <label for="" class="text-white">Profile Photo</label>
                                          <input type="file" name="c_img" class="form-control rounded-pill form-control-lg" >
                                  </div>

                                  <div class="text-center">
                                        <label>
                                          <input type="checkbox"  name=""><label for="" class="text-white">By creating a account you agree to our</label>
                                            <a >Terms & Privacy.</a>
                                        </label>
                                  </div>

                                 <div class="form-group">
                                        <input type="submit" class="btn btn-success btn-block form-control rounded-pill form-control-lg" value="REGISTER ACCOUNT" name="c_register">
                                 </div>

                                 <div class="col-12 text-right text-small text-white" >
                                      Already hava an account? <a href="login.php" >Login</a>
                                 </div>
                          </form>
                    </div>
               </div>
           </div>

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

              var c=0;
              var v=0;
              function count()
              {

              var i=document.getElementById("invalid");

                 i.style.color="white";
                 i.style.opacity"0.9";
                 c=c+1;
                 var x= document.getElementById("inp");
                 if(c==1 && x.value<6)

                 {
                   v=1;
                 }

                }



                function chkPhn()
                      {
                       var y= document.getElementById("inp");
                       var a=y.value;

                       if(v==1 || a.length!=10)
                       {
                         var i=document.getElementById("invalid");

                         i.style.color="red";
                         i.style.opacity="0.9";
                         y.style.border="solid 1px red";
                       }
                       else{
                         y.style.border="solid 1px #ccc";
                       }
                     }

              </script>
               <?php include"assets/footer.php"?>
         </div></div>
     </body>
 </html>

 <?php
 if(isset($_POST['c_register'])){

   $c_f_name=$_POST['c_f_name'];
   $c_phn=$_POST['c_phn'];
   $c_email=$_POST['c_email'];
   $c_add=$_POST['c_add'];
   $c_pin=$_POST['c_pin'];
   $c_pass=sha1($_POST['c_pass']);
   $c_L_name=$_POST['c_L_name'];
   $c_age=$_POST['c_age'];
   $c_gen=$_POST['c_gen'];
   $c_city=$_POST['c_city'];
   $c_state=$_POST['c_state'];
   $c_img = $_FILES['c_img']['name'];
   $c_img_tmp =  $_FILES['c_img']['tmp_name'];
   move_uploaded_file($c_img_tmp,"image/$c_img");

   $duplicate=mysql_query("SELECT * FROM customer WHERE c_email='$c_email'");
   if(mysql_num_rows($duplicate)>0){
     	echo "<script>alert('This Email Id is Already Existed')</script>";
   }
   else{
     $query = mysql_query("INSERT INTO customer (c_f_name,c_phn,c_email,c_add,c_pin,c_pass,c_img,c_L_name,c_age,c_gen,c_city,c_state) value('$c_f_name','$c_phn','$c_email','$c_add','$c_pin','$c_pass','$c_img','$c_L_name','$c_age','$c_gen','$c_city','$c_state')");
     send_sms($_POST['c_phn'],"Dear " . $_POST['c_f_name'] . ", your account for FoodStuff is created successfully :)  KEEP SHOPPING");
  echo "<script>window.open('login.php','_self')</script>";


   }

 }


 ?>
