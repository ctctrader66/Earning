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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <style>
         .btn { 
         width:264px;font-size:16px; height:44px;color:white;
         }
         .form-control{box-shadow:none; border-bottom:#ccc solid 1px; height:26px; margin-bottom:3px;}
         .form-group{margin-bottom:0px;}
         .form-group.>label {
         left: 8px;
         position: relative;
         background-color: white;
         padding: 0px 5px 0px 5px;
         font-size: 1.1em;
         transition: 0.1s;
         pointer-events: none;
         font-weight: 500 !important;
         transform-origin: bottom left;
         }
         .form-control.:focus~label{
         transform: translate(1px,-85%) scale(0.80);
         opacity: .8;
         color: #005ebf;
         }
         .form-control.:valid~label{
         transform-origin: bottom left;
         transform: translate(1px,-110%) scale(0.80);
         opacity: .8;
         }
         .appContent1{
         box-sizing: border-box;
         }
         .textarea{
         height: 40px;
         width: 300;
         color: #fff;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 16px;
         font-weight: 400;
         margin: 8px 0;
         cursor: pointer;
         transition: all 0.4s ease;
         }
         .form-control {
         border: 2px solid #FBCCCA;
         border-radius:10px;
         }
         label{
         margin-bottom:-15px;
         color:#000;
         font-weight:400;
         font-size:15px;
         }
         .otpbtn{
         text-align: center;
         border: 0;
         border-radius: 2px;
         color: #fff;
         font-size: 14px;
         background-color: #5cba47;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         }
         .btn-otp{
         width: 30%;
         height: 38px;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         padding: 0 12px;
         border-radius: 10px;
         border: 0;
         margin-top:7px;
         text-align: center;
         display: block;
         background-color: #5cba47;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         font-size: 16px;
         color: #fff;
         }
         .btn-otp:hover{
         color: #fff;
         }
         .container{
         padding:10px;
         }
         .vcard{
         border-radius:10px;
         }
         .submitbtn{
         border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 330px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         button:focus {
         outline: none;
         }
      </style>
   </head>
   <body>
      <?php 
         include("include/connection.php");
         $userid=$_SESSION['frontuserid'];?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Add Account</div>
      </div>
      <!-- searchBox --> 
      <!-- * searchBox --> 
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div id="appCapsule" class="container">
         <div class="appContent1" >
            <form action="#" method="post" id="bankcardform">
               <div class="vcard">
                  <div class="mb-2"><img style="height:42px; margin-right:10px" src="images/paywallet.png"> Add TRX Address</div>
                  <div class="form-group ">
                     <label for="name">Actual Name</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="name" name="name" required value="">
                  </div>
               <!--   <div class="form-group ">
                     <label for="ifsc">IFSC Code</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="ifsc" name="ifsc" required value="">
                  </div>-->
                <!--  <div class="form-group ">
                     <label for="bank">Bank Name</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="bank" name="bank" required value="">
                  </div>-->
                  <div class="form-group ">
                     <label for="account">TRX Adderss</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="account" name="account" required value="">
                <!--  </div>
                  <div class="form-group ">
                     <label for="state">State/Territory</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="state" name="state" required value="">
                  </div>-->
                  <div class="form-group ">
                     <label for="city">City</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="city" name="city" required value="">
                  </div>
                  <div class="form-group ">
                     <label for="address">Address</label>
                     <input type="text" placeholder="it is Required" class="form-control textarea " id="address" name="address" required value="">
                  </div>
                  <div class="form-group ">
                     <label for="email">Email id</label>
                     <input type="email" placeholder="it is Required" class="form-control textarea " id="email" name="email" required value="">
                  </div>
                  <div class="form-group ">
                     <label for="mobile">Account Phone Number +7</label>
                     <input type="tel" class="form-control textarea " id="mobile" name="mobile" maxlength="15"  required readonly value="<?php echo user($con,'mobile',$userid);?>">
                  </div>
                <!--  <div class="form-group ">
                     <label for="mobile">Code</label>
                     <div class="layout">
                        <input type="text" class="form-control textarea " id="verification" name="verification" maxlength="6" placeholder="Verification Code" required value="">
                        <button class="btn-otp" type="button" id="send_verification">OTP</button>
                     </div>-->
                  </div>
               </div>
               <input type="hidden" name="action" value="bank">
               <input type="hidden" name="userid" value="<?php echo $userid;?>">
               <input type="hidden" name="editid" value="">
               <div class="text-center mt-3">
                  <button type="submit" class="btn submitbtn" >Add Bank Account</button>
               </div>
            </form>
         </div>
      </div>
      <p class="mt-5 mb-10"> </p>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <style>
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
         background-color: #FE3B3B;
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
         .modal{
         top:45%;
         }
      </style>
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
      <script src="assets/js/addbankcard.js"></script>
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