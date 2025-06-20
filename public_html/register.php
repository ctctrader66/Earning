<?php
   ob_start();
   session_start();
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
      <meta name="description" content="">
      <meta name="keywords" content="" />
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
         .inner-addon a{
         float:right;
         margin-top:-45px;
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
         .number-img .width{
         position: absolute;
         width:22px;
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
         .appHeader1 {
         width: 100%;
         background-image: linear-gradient(90deg,#fd877f,#f64841);
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
         .btn-otp{
         width: 30%;
         height: 45px;
         padding: 0 30px;
         line-height: 46px;
         border-radius: 7px;
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
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  font-size:18px;
         width: 65%;
         margin: 0 auto;
         border: 1px solid #DD1D1C;
         color: #fff;
         background-color: #DD1D1C;
         box-shadow: 0 0 4px 3px #FAA29F / 40%);
         }
         .textbox5
         {
         box-shadow:none;
         border: 2px solid #FAA29F;
         border-radius:8px;
         }
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  
         width: 90%;
         margin: 0 auto;
         border: 1px solid #fd877f;
         color: #fff;
         background-color: #fd877f;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         }
         .submitbtn:hover{
         color: #fff;}
         .registerback
         {
         border-radius: 25px;
         padding:10px 35px;
         font-weight: 400; 
         font-size: 16px;  
         margin: 0 auto;
         border: 1px solid #fd877f;
         color: #fd877f;
         background-color: white;
         }
         .registerback:hover{
         color: #fd877f;
         }
         .parent{
         text-align:center;
         display: flex;
         width:100%;
         }
         .child{
         width: 50%;
         float: left;
         flex: 1;
         padding:15px 10px 0px 15px;
         font-size: 19px;
         border-top: 1.50px solid #f7f7f7;
         }
         button:focus{
         outline:none;
         }
         .child button {
         color: #2C3E50;
         border:none;
         padding:0 20px;
         font-weight:500;
         background: transparent;
         text-align:center;
         }
         .child .colour {
         color: #6ABE57;
         }
         .tz_title{
             padding:10px 0;
         font-size: 16px;
         font-weight:400;
         color:rgb(70,85,101);
         }
         .banner{
         background: url(../images/myProfilebg.png) no-repeat 0 0;
         background-size: 100% auto;
         position: relative;
         height:80px;
         }
         .container{
         padding-top:5px;
         }
         .modal-content{ border-radius:15px;}
         .submitbtn{
         border-radius: 25px; height:45px; font-weight: 400; font-size: 21px;  
         width: 90%;
         margin: 0 auto;
         border: 1px solid #fd877f;
         color: #fff;
         background-color: #fd877f;
         box-shadow: 0 0 4px 3px rgb(92 186 71 / 60%);
         }
      </style>
   </head>
   <body>
      <?php include("include/connection.php");?>
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="login.php" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Register</div>
      </div>
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div id="appCapsule">
         <div class="appContent1 mb-2">
            <form action="#" method="post" id="Register" class="card-body" autocomplete="off">
               <p style="color:#959595; font-size:16px; font-weight:400;padding-bottom:10px;">phone number format: +91</p>
               <div class="inner-addon left-addon custom-left">
                  <div class="number-img">
                     <img src="./images/mobile.png">
                  </div>
                  <span style="top: 12px;left: 30;position: absolute;font-weight:400;font-size: 17px;color: #f2413b;padding-left: 33px;">+91</span>
                  <input type="tel" name="mobile" id="mobile"  class="form-control textbox textbox1"  placeholder="Mobile" onKeyPress="return isNumber(event)" maxlength="10">
                  <a href="javascript:void(0);" class="btn-otp" id="reg_otp" onClick="mobileveryfication();">OTP</a>
               </div>
               <div class="inner-addon left-addon custom-left mt-3">
                  <div class="number-img">
                     <img src="./images/lock.png">
                  </div>
                  <input type="password" name="password" id="password" class="form-control textbox textbox2"  placeholder="Password">
               </div>
               <div class="inner-addon left-addon custom-left mt-3">
                  <div class="number-img">
                     <img class="width" src="./images/refer.png">
                  </div>
              <!-- <input type="text" name="rcode" id="rcode" class="form-control textbox textbox2"  placeholder="Recommendation Code" value="<?php 
//                   $ref=mysqli_query($con,"select * from `tbl_paymentsetting`");
// 	$refadd=mysqli_fetch_array($ref);
// 	$fetchref = $refadd['refer'];
                  
//                   $code = $_GET['code'];
//         if($_GET['code']==''){echo "$fetchref";}else{echo "$code";};?>">-->
        
        <input type="text" name="rcode" id="rcode" class="form-control textbox textbox2"  placeholder="Recommendation Code" value="<?php if(isset($_GET['code'])) { echo $_GET['code']; } ?>">
               </div>
               <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
               <input type="hidden" name="action" value="register">
               <div class="form-group row mt-3 mb-3">
                  <div class="col-12">
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" style="background:red" checked class="custom-control-input" id="remember" name="remember">
                        <label  style="color:white" class="custom-control-label text-muted" for="remember">I Agree <a  style="color:red" data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">PRIVACY POLICY</a></label>
                     </div>
                  </div>
               </div>
               <div>
                  <div class="text-center mt-3" style="">
                     <button type="submit" class="btn submitbtn" >Register</button>
                  </div>
                  <div class="text-center mt-3" style="">
                     <a href="login.php" class="registerback">Already have an account, log in~</a>
                  </div>
               </div>
            </form>
         </div>
      </div>
   
      <!-- appCapsule -->
      <div id="registerthanksPopup" class="modal modalred fade" role="dialog" >
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <span class="text-center">Success</span>
               </div>
            </div>
         </div>
      </div>
      <div id="registertoast" class="modal modalred fade1" role="dialog">
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <div class="text-center" id="regtoast">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="privacy" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 style="font-weight:normal;">Privacy Policy</h5>
               </div>
               <div class="modal-body responsive">
                  <?php echo content($con,"privacy");?>
               </div>
               <div class="modal-footer">
                  <a class="pull-left" data-dismiss="modal"><strong>CLOSE</strong></a>
               </div>
            </div>
         </div>
      </div>
   <div id="otpform" class="modal fade" role="dialog">
     
       <div class="modal-dialog p-2" role="document">
            <div class="modal-content ">
               <div class="modal-body">
                  <button type="button" id="otpclose" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                  <p style="color:#959595; font-size:16px; font-weight:400;">Plese Enter OTP</p>
                  <div class="pt-1">
                     <form action="#" method="post" id="otpsubmitForm">
                        <div class="inner-addon left-addon custom-left mt-3">
                            <div class="number-img">
                               <img src="./images/verify.png">
                            </div>
                            <input type="text" name="otp" id="otp" class="form-control textbox textbox2"  onKeyPress="return isNumber(event)" placeholder="Enter OTP">
                         </div>
                       <input type="hidden" name="type" id="type" value="otpval">
                           <div class="parent">                      <div style="border-radius:0 0 0 15px;" class="child">                         <button  data-dismiss="modal">Cancel</button>                      </div>                      <div style="border-radius:0 0 15px 0; " class="child">                         <button class="colour"  type="submit">Confirm</button>                      </div>                    </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         </div>
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
         .modalred-backdrop{
         background-color: transparent;
         }
         .modalred{
         top:48%;
         }
        
      </style>
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