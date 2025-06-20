<?php
ob_start();
session_start();
include("include/connection.php");
require('cookie.php');
if( isset($_SESSION['frontuserid']) ){
  header('Location: main.php');
  exit(12);
}else if( isset($_COOKIE['frontuserid']  )){
    
 
    $userid = decryptCookie($_COOKIE['frontuserid']);
    
    $sql_query = "select count(*) as cntUser,tbl_user.* from tbl_user where id='".$userid."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if( $count > 0 ){
        $_SESSION['frontuserid'] = $userid; 
      header('Location: main.php');
       exit(456);
    }
}
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <style>
         .appContent3 .back{
         position: absolute;
         top: 5%;
         left: 0.6rem;
         height: 30px;
         }
         .appContent3 .logo{
         position: absolute;
         top: 40%;
         right: 1rem;
         height: 80px;
         }
         .appContent1{
         position: relative;
         z-index: 9;
         padding: 0.66667rem 0.8rem;
         border-radius: 25px 25px 0 0;
         margin-top: -0.53333rem;
         background-color: #fff;
         }   
         .inner-addon{
         border: 2px solid #FBCCCA;
         border-radius:10px;
         }
         .inner-addon .icon{
         padding:15px 12px;
         font-size: 22px;
         }
         /*.left-addon.custom-left  input{*/
         /*    padding-left:40px;*/
         /*}*/
         .number-img img{
         position: absolute;
         height:22px;
         top: 12px;
         left: 13px
         }
         .appContent3{
         position: relative;
         background: url(../assets/img/banner.png) no-repeat top;
         background-size: cover;
         height:250px;
         }
         .textbox1{
         margin-left:30px;
         }
         .textbox2
         {
         margin-left:5px;
         }
         .textbox {
         box-shadow: 0px 0px;
         height: auto;
         width:auto;
         color: #fff;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 17px;
         font-weight: 400;
         cursor: pointer;
         transition: all 0.4s ease;
         }
         button:focus {
         outline: none;
         }
         .textbox:focus{
         background:transparent      
         }
         .sumbitbtn{
         border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 320px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
          .regLog{
         width: fit-content;
         margin: 0 auto;
         display: table;
         }
         .regContent {
         margin: 0 auto;
         padding: 0 !important;
         color: #fff;
         font-size: 15px;
         background-color: rgba(50, 50, 51, .88);
         border-radius: 2px;
         }
         .fade1 {
         -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
         animation: fadein 0.5s, fadeout 0.5s 2.5s;
         }
         @-webkit-keyframes fadein {
         from {bottom: 0; opacity: 0;} 
         to {bottom: 30px; opacity: 1;}
         }
         @keyframes fadein {
         from {bottom: 0; opacity: 0;}
         to {bottom: 30px; opacity: 1;}
         }
         @-webkit-keyframes fadeout {
         from {bottom: 30px; opacity: 1;} 
         to {bottom: 0; opacity: 0;}
         }
         @keyframes fadeout {
         from {bottom: 30px; opacity: 1;}
         to {bottom: 0; opacity: 0;}
         }
         .modal-backdrop{
         background-color: transparent;
         }
         .modal{
         top:48%;
         }
         .passwordCust{
             font-weight:600;
             font-style: italic;
         }
          .appHeader1{
           color:#000;   
           width: 700px;
           height: 53px;  
           background:#151963;
         }
          .pageTitle{
        
             
          margin-right:300px;   
             
         }
         .logo1{
          width: 120px;
         height: 50px;
         margin-top: 70px;
         margin-left:250px;
              
             
             
         }
         
      </style>
   </head>
   <body >
      <!-- * Page loading --> 
      <!-- App Header -->
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div class="appContent3 text-white">
         <div   class="">
            <div  class="">
               <div  class="appHeader1"><a href="/index.php"><img  src="assets/img/back.png" class="back"></a><div class="pageTitle">7 LOTTERY</div></div>
            </div>
           
            <img  src="/512x512bb.jpg" class="logo1">
         </div>
      </div>
      <div style="background-image: linear-gradient(to right, #C00203 , red);"  id="appCapsule">
         <div style="background:white; " class="appContent1">
            <p></p>
            <div style="text-align: center;" >
               <h3 style="padding-top:20px;color: #cd0103;font-weight:400; font-size:31px;">Log In</h3>
            </div>
            <form action="#" id="loginForm" method="post" class="card-body" autocomplete="off">
               <p style="color:#959595; font-size:16px; font-weight:400;padding-bottom:10px;">phone number format: +7</p>
               <div class="inner-addon left-addon custom-left">
                  <div class="number-img">
                     <img src="./images/mobile.png">
                  </div>
                  <span style="top: 12px;left: 30;position: absolute;font-weight:400;font-size: 17px;color: #f2413b;padding-left: 33px;">+7</span>
                  <input type="tel" value="<?php echo @$_GET['mobile'];?>" id="login_mobile" name="login_mobile"  class="form-control textbox textbox1"  placeholder="Mobile" onKeyPress="return isNumber(event)" maxlength="15">
               </div>
               <div class="inner-addon left-addon custom-left mt-3">
                  <div class="number-img">
                     <img src="./images/lock.png">
                  </div>
                  <!--<input type="text"  onkeypress="changeinputformat(this.id)" value="<?php //echo @$_GET['password'];?>" id="login_password" name="login_password" class="form-control textbox textbox2" minlength="5"  placeholder="Password">-->
               <input type="text" style="-webkit-text-security: square;" onkeypress="changeinputformat(this.id)" value="<?php echo @$_GET['password'];?>" id="login_password" name="login_password" class="form-control textbox textbox2" minlength="5"  placeholder="Password">
               
               </div>
               <input type="hidden" name="action" value="login">
               <div class="text-center mt-3" style="">
                  <button type="submit" class="sumbitbtn">Log In</button>
               </div>
               <div style="font-size:17px; color: red;font-weight:400; " class="text-center mt-2"><a style="color: red;" href="register.php">Register</a>   <span style="padding:0px 5px">|</span>   <a style="color: red;" href="forgot-password.php">Forgot Password</a> </div>
         </div>
         </form>
      </div>
      
      <div id="registertoast" class="modal fade1" role="dialog">
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <div class="text-center" id="regtoast">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <script src="assets/js/jquery.validate.min.js"></script>
      <script src="assets/js/account.js"></script>
      <script>
         $(function(){
           $('#registertoast').on('show.bs.modal', function(){
               var registertoast = $(this);
               clearTimeout(registertoast.data('hideInterval'));
               registertoast.data('hideInterval', setTimeout(function(){
                   registertoast.modal('hide');
               }, 2000));
           });
           
           
           
         });
         
      </script>
   </body>
</html>