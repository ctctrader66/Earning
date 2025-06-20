<?php
ob_start();
session_start();
include("include/connection.php");
require('cookie.php');
if( isset($_SESSION['frontuserid']) ){
  header('Location: main');
  exit(12);
}else if( isset($_COOKIE['frontuserid']  )){
    
 
    $userid = decryptCookie($_COOKIE['frontuserid']);
    
    $sql_query = "select count(*) as cntUser,tbl_user.* from tbl_user where id='".$userid."'";
    $result = mysqli_query($con,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['cntUser'];

    if( $count > 0 ){
        $_SESSION['frontuserid'] = $userid; 
      header('Location: main');
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
         top: 6%;
         left: 0.6rem;
         height: 26px;
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
         /*border-radius: 25px 25px 0 0;*/
         margin-top: -0.53333rem;
         background-color: #fff;
         }   
         .inner-addon{
         border: none;
         border-radius:10px;
         }
         .inner-addon .icon{
         padding:15px 12px;
         font-size: 22px;
         margin-bottom: 14px;
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
         /*background: url(../assets/img/banner.png) no-repeat top;*/
         background:#fd877f ;
         background-size: cover;
         height:160px;
         }
         .textbox1{
         margin-left:5px;
         }
         .textbox2
         {
         margin-left:5px;
         }
         .textbox {
         /*box-shadow: 0px 0px;*/
         height: 40px;
         width:100%;
         color: #fff;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 14px;
         font-weight: 400;
         cursor: pointer;
         transition: all 0.4s ease;
         box-shadow: 0 0.05333rem 0.21333rem #d0d0ed5c;
         }
         button:focus {
         outline: none;
         }
         .textbox:focus{
         background:#fff;
         border:1px solid #fd877f ;
         }
         .sumbitbtn{
            border-radius: 30px;
            height: 40px;
            font-weight: 500;
            font-size: 14px;
            width: 80%;
            margin: 0 auto;
            border: 1px solid #fd877f;
            color: #fff;
            /* background-color: #fd877f; */
            text-shadow: 0 0.05333rem 0.02667rem rgba(231,65,65,.5019607843);
            background: -webkit-linear-gradient(top,#ff867a 0%,#f95959 100%);
            background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
            box-shadow: 0 0.05333rem #e74141;
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
           width: 100%;
           height: 53px;  
           background:#fd877f;
         }
          .pageTitle{
        
             
          text-align:center;
          padding-top:5px !important;
             
         }
         .logo1{
          width: 120px;
         height: 50px;
         margin-top: 70px;
         margin-left:250px;
              
             
             
         }
         .apc1 h1{
             color:aliceblue !important;
             font-size: 18px;
             padding: 6px 12px;
             
         }
         .apc2{
            padding: 0px 12px;
            line-height: 1;
         }
         .apc2 span{
              color:aliceblue !important;
              /*padding: 6px 12px;*/
              font-size: 10px;
         }
         .lwp{
                display: flex;
                flex-direction: column;
                align-items: center;
         }
         .lwp span{
             padding: 6px;
             border-bottom: 2px solid #fd877f;
             color: #fd877f;
             font-size: 12px;
         }
         .lwp img{
             width: 30px;
         }
         .ephone{
             width:20px;
             padding: 2px 2px;
             margin-right: 4px;
         }
         .e-phone{
             color: #959595;
             font-size: 14px;
             /* border: 1px solid #fd877f; */
             padding: 4px 4px;
                 display: flex;
              flex-direction: row;
              align-items: center;
              justify-content: flex-start;
              padding-left: 6px;
         }
         body{
                 background: #f7f8ff;
         }
         .reg{
                 display: inline-block;
                 width: 80%;
                 height: 40px;
                 color: #ff7172;
                 font-size: 14px;
                 background: #f7f8ff;
                 border-radius: 30px;
                 border: 0.01333rem solid #ff7172;
                 box-shadow: none;
                 text-shadow: none;
                 margin-top: 10px;
                 font-weight: 700;
                 letter-spacing: .05333rem;
                 padding-top: 8px;
         }
         .mld{
             display:flex;
             flex-direction: row;
             justify-content: space-evenly;
             align-items: center;
         }
         .ml{
             font-size: 12px;
             display: flex;
             flex-direction: column;
             align-items: center;
         }
         .pageTitle img{
             /*-webkit-mask-image: url(./images/1697188464491.jpeg);*/
             /*    -webkit-mask-size: contain;*/
             filter: drop-shadow(0px 0px 0px white);
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
               <div  class="appHeader1">
                   <a href="/index"><img  src="./images/icons8-arrow-50.png" class="back"></a>
               <div class="pageTitle"><img style="    width: 120px;" src="./images/my-removebgg.png"></div></div>
            </div>
           
            <!--<img  src="/512x512bb.jpg" class="logo1">-->
         </div>
         
         <div class="apc1">
             <h1>Login </h1>
             
             <div class="apc2">
                 <span>Please log in with your phone number or email  </span><br>
                 <span>If you forget your password, please contact customer service  </span>
             </div>
        </div>
        
        
      </div>
      <div style="background-image: linear-gradient(to right, #C00203 , red);"  id="appCapsule">
         <div style="background:#f7f8ff; " class="appContent1">
            
            <div style="text-align: center;border-bottom: 1px solid #ddd;" >
                
               <div class="lwp">
                   <img src="images/phone.png">
                   <span>Login With Phone</span>
               </div>
               
            </div>
            <form action="#" id="loginForm" method="post" class="card-body" autocomplete="off">
               <p class="e-phone">
                   <img class="ephone" src="images/ephone.png">Phone number</p>
               <div class="inner-addon left-addon custom-left">
                  <div class="number-img">
                     <!--<img src="./images/mobile.png">-->
                  </div>
                  <span style="top: 10px;left: 30;position: absolute;font-weight:400;font-size: 14px;color: #f2413b;padding-left: 10px;"></span>
                  <input type="tel" value="<?php echo @$_GET['mobile'];?>" id="login_mobile" name="login_mobile"  class="form-control textbox textbox1"  placeholder="Mobile" onKeyPress="return isNumber(event)" maxlength="15">
               </div>
               <p class="e-phone">
                   <img class="ephone" src="images/pass.png">Password</p>
               <div class="inner-addon  custom-left ">
                  <div class="number-img">
                     <!--<img src="./images/lock.png">-->
                  </div>
                  <!--<input type="text"  onkeypress="changeinputformat(this.id)" value="<?php //echo @$_GET['password'];?>" id="login_password" name="login_password" class="form-control textbox textbox2" minlength="5"  placeholder="Password">-->
               <input type="text" style="-webkit-text-security: square;" onkeypress="changeinputformat(this.id)" value="<?php echo @$_GET['password'];?>" id="login_password" name="login_password" class="form-control textbox textbox2" minlength="5"  placeholder="Pleasw Enter Password">
               
               </div>
               <input type="hidden" name="action" value="login">
               <div class="text-center " style="">
                  <button type="submit" class="sumbitbtn">Log In</button>
                  
                  
               </div>
               <div class="text-center " style="" onclick="window.location.href = './register';">
                
                  <h class="reg" href="register"> Register</h>
                  
               </div>
               <div style="font-size:17px; color: red;font-weight:400; " class="text-center mt-2 mld">
                   
                        <div class="ml" style="color: red;" onclick="window.location.href = './reset_password';">
                          <img src="images/forgetp.png" style="width: 40px;">
                          <span>Forgot Password </span>
                        </div> 
                     
                        <div class="ml" style="color: red;" onclick="window.location.href = './helpcenter';">
                          <img src="images/customer.png" style="width: 40px;">
                          <span>Customer Service </span>
                        </div> 
                </div>
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