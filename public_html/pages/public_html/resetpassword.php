<?php 
ob_start();
session_start();
 if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
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
         top: 45%;
         right: 1rem;
         height: 45px;
         }
         .appContent1{
         padding: 0.66667rem 0.8rem;
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
         .textbox1{
         margin-left:30px;
         }
         .textbox2
         {
         margin-left:5px;
         }
         .textbox
         {
         border:none;
         font-size:17px;
         width:auto;
         } 
         .appHeader1 {
         width: 100%;
         background-image: linear-gradient(90deg,#cd0103,#f64841);
         color: #fff;
         z-index: 999;
         padding: 0 24px;
         height:55px;
         }
         .appHeader1 .back{
         position: absolute;
         top: 23%;
         left: 0.6rem;
         height: 30px;
         }
         .appHeader1 .pageTitle {
         padding-top:18px;
         font-size: 21px;
         font-weight: 400;
         letter-spacing: .02em;
         color:#fff;
         }
         .sumbitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  
         width: 60%;
         margin: 0 auto;
         border: 1px solid #5cba47;
         color: #fff;
         background-color: #5cba47;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         }
         .appContent1{padding:30px;}
         .btn-otp{
         width: 100%;
         height: 48px;
         padding: 0 30px;
         line-height: 46px;
         border-radius: 7px;
         margin-bottom: 24px;
         border: 0;
         text-align: center;
         display: block;
         background-color: #f9e8e8;
         border-color: #f9e8e8!important;
         font-size: 16px;
         color: rgba(0,0,0,.87);
         }
         .btn-otp:hover{
         color: rgba(0,0,0,.87);
         border:none;
         }
         .form-control { box-shadow:none;border-radius:10px;}
         button:focus {
         outline: none;
         }
         .modal{
         top:48%;
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
         font-size: 14px;
         background-color: rgba(50, 50, 51, .88);
         border-radius: 8px;
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
      </style>
   </head>
   <body>
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a onClick="goBack();" href="#" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Reset Password</div>
         <div class="right ">
            <a  href="help.php" class="icon goBack"> <img  src="images/icons/headphone.png" class="back"> </a>
         </div>
      </div>
      <!-- searchBox --> 
      <!-- * searchBox --> 
      <!-- * App Header --> 
      <!-- App Capsule 
      <div id="appCapsule" class="pb-3">
         <div class="appContent1 pb-0">
            <form action="#" id="forgotform">
               <p style="color:#959595; font-size:16px; font-weight:400;padding-bottom:10px;">phone number format: +91</p>
               <div class="inner-addon left-addon custom-left">
                  <div class="number-img">
                     <img src="./images/mobile.png">
                  </div>
                  <span style="top: 14px;left: 30;position: absolute;font-weight:400;font-size: 17px;color: #f2413b;padding-left: 33px;">+91</span>
                  <input type="tel" name="fmobile" id="fmobile"  class="form-control textbox textbox1"  placeholder="Mobile">
                  <input type="hidden" name="type" id="type" value="chkmobile">
               </div>
               <div style="float:right;margin-bottom:-25px;">
                  <div class="">
                     <button type="submit" class="btn-otp"> OTP </button>
                  </div>
               </div>
            </form>
            <form action="#" method="post" id="otpsubmitForm">
               <div class="row ">
                  <div class="">
                     <div class="inner-addon left-addon right-margin">
                        <div class="number-img">
                           <img src="./images/verify.png">
                        </div>
                        <input type="tel" name="otp" id="otp" onKeyPress="return isNumber(event)" class="form-control textbox" placeholder="Verification Code" value="" maxlength="6">
                     </div>
                  </div>
               </div>
               <input type="hidden" id="userid" name="userid" value="">
               <input type="hidden" name="type" id="type" value="otpval">
               <div class="text-center mt-2">
                  <button type="submit"  class="sumbitbtn">Submit</button>
               </div>
            </form>
         </div>
      </div>-->
      <?php include("include/footer.php");?>
      <!-- appCapsule -->
      <div id="alert" class="modal fade1" role="dialog">
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <div class="text-center" id="alertmessage">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Jquery --> 
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <script src="assets/js/jquery.validate.min.js"></script>
      <script src="assets/js/forgot-password.js"></script>
      <?php  include("include/pagestrick.php");?>
      <script>
         $(function(){
           $('#alert').on('show.bs.modal', function(){
               var alert = $(this);
               clearTimeout(alert.data('hideInterval'));
               alert.data('hideInterval', setTimeout(function(){
                   alert.modal('hide');
               }, 2000));
           });
         });
      </script>
   </body>
</html>