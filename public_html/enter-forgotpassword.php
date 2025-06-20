<?php
   ob_start();
   session_start();
   include("include/connection.php");
   @$userid=encryptor('decrypt', $_GET['token']);
 
    if($userid=='')
    {header("location:forgot-password.php");exit();}else{
   ?>
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
         body{
         background:#fafafa;
         }
         .otpbtn {
         background-image: linear-gradient(#40cabf,
         #40cabf);
         width: 105px;
         padding: 25px 0px;
         margin-left: -10px;
         margin-top: -1px;
         border-radius: 0px;
         }
         .btn {
         background-image: linear-gradient(#40cabf,
         #40cabf);
         border-radius: 5px 5px 5px 5px;
         border: 0.5px solid white;
         color: white;
         transition: 0.5s;
         }
         .btn-otp{
         width: 100%;
         height: 46px;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         padding: 0 12px;
         line-height: 46px;
         border-radius: 2px;
         margin-bottom: 24px;
         border: 0;
         text-align: center;
         display: block;
         background: #f5f5f5;
         font-size: 16px;
         color: rgba(0,0,0,.87);
         }
         .btn-otp:hover{
         color: rgba(0,0,0,.87);
         }
         .inner-addon{
         position:relative;
         }
         .number-img img{
         position: absolute;
         height:22px;
         top: 12px;
         left: 13px
         }
         .card-body{
         padding:0;
         }
         .right-margin{
         margin-right:50px;
         }
         .inner-addon{
         margin-bottom:30px;
         }
         .btn-register{
         width: 65%;
         height: 44px;
         text-align: center;
         line-height: 44px;
         background: #009688;
         font-size: 14px;
         color: #fff;
         border: 0;
         border-radius: 2px;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
         }
         .custom-control .custom-control-input:checked ~ .custom-control-label:before{
         background: rgb(0, 0, 0) !important;
         border-color: rgb(0, 0, 0) !important;
         border-radius:unset;
         }
         .custom-control .custom-control-label:after{
         margin-left: 2px;
         }
         .custom-control .custom-control-input:checked ~ .custom-control-label:after{
         width: 18px;
         height: 18px;
         background-size: 15px 14px;
         }
         .custom-control .custom-control-label{
         padding-top: 3px;
         }
         .register-top-btn{
         margin:30px 0 50px;
         }
         .privacy-policy{
         margin:30px 0 30px;
         }
         #toast {
         background: rgba(50,50,51,.88);
         color: #fff;
         padding: 8px 12px;
         border-radius: 8px;
         text-align: center;
         margin: 0 auto;
         margin-top: -284px;
         font-size: 14px;
         width: 100%;
         max-width: 264px;
         visibility: hidden;
         z-index: 1;
         /*transform: translate3d(-50%,-50%,0);*/
         }
         #toast.show {
         visibility: visible;
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
         @media only screen and (max-width:480px){
         .right-margin{
         margin-right:0;
         }
         .register-top-btn{
         margin:10px 0 50px;
         }
         .privacy-policy{
         margin:30px 0 10px;
         }
         .appHeader1{
         height: 57px;
         }
         .appHeader1 .left, .appHeader1 .right{
         top:0;
         }
         }
         .privy
         {
         display: flex;
         flex-direction: row;
         align-items: center;
         }
         .btn1{
         width: 65%;
         height: 44px;
         text-align: center;
         line-height: 44px;
         background: #009688;
         font-size: 14px;
         color: #fff;
         border: 0;
         border-radius: 2px;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
         }
         .btndiv
         {
         padding: 15px 0 0 0;
         width: 100%;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         .pink-key, .pink-key1{
         display:none;
         }
         .modal{
         top:45%;
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
         .textbox
         {
         border:none;
         font-size:17px;
         border-radius:10px;
         box-shadow:none;
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
         .inner-addon{
         border: 2px solid #FBCCCA;
         border-radius:10px;
         }
         button:focus {
         outline: none;
         }
      </style>
   </head>
   <body>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Reset Password</div>
      </div>
      <!-- searchBox --> 
      <!-- * searchBox --> 
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div id="appCapsule" class="pb-2">
         <div class="appContent1 pb-0">
            <form action="#" id="finalforgotform">
               <div class="inner-addon left-addon">
                  <div class="number-img">
                     <img src="./images/lock.png">
                  </div>
                  <input type="password" name="fnpassword" id="fnpassword" class="form-control textbox" placeholder="New Password">
               </div>
               <div class="inner-addon left-addon">
                  <div class="number-img">
                     <img src="./images/lock.png">
                  </div>
                  <input type="password" name="fcpassword" id="fcpassword" class="form-control textbox" placeholder="Confirm Password">
               </div>
               <input type="hidden" name="type" id="type" value="passwordreset">
               <input type="hidden" name="userid" id="userid" value="<?php echo $userid;?>">
               <div class="text-center mt-3">
                  <button type="submit"  class="sumbitbtn">Confirm</button>
               </div>
            </form>
         </div>
      </div>
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
      <div id="alert2" class="modal fade1" role="dialog">
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <div class="text-center" id="alertmessage2">
                  </div>
               </div>
            </div>
         </div>
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
      <script>
         $(function(){
           $('#alert2').on('show.bs.modal', function(){
               var alert2 = $(this);
               clearTimeout(alert2.data('hideInterval'));
               alert2.data('hideInterval', setTimeout(function(){
                   alert2.modal('hide');
               }, 2000));
           });
         });
      </script>
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
<?php }?>