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
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <style>
         .content{padding:20px;}
         .lefttext{float:left;font-size:18px;font-weight:500;}
         h4{color:#000;}
         .pic{width:100%;}
.appHeader1 {
    width: 100%;
    background-image: none;
    background: linear-gradient(90deg,#f95a5a 0%,#ff998e 100%);
    color: #fff;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
}
      </style>
   </head>
   <body style="background:#f7f8ff">
      <?php
         include("include/connection.php");
         include("loading.php");
         
         $userid=$_SESSION['frontuserid'];
         $selectruser=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
         $userresult=mysqli_fetch_array($selectruser);
         $selectwallet=mysqli_query($con,"select * from `tbl_wallet` where `userid`='".$userid."'");
         $walletResult=mysqli_fetch_array($selectwallet);
         ?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <div class="appHeader1">
         <div class="left">
            <a href="/main.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         </div>
         
         <div class="pageTitle">Beginer Tutorial</div>
      
      </div>
      <!-- App Header -->
      <div style="margin-top:55px;" class="content">
         <div class="lefttext">
            <h4>1. How To Register</h4>
            - Fill Your Phone Number<br>
            - Set your passoword (6 Letters)<br>
            - Fill your Recommendation code<br>       
            - Click Register
         </div>
         <center>  <img class="pic" src="images/home/epic101-min.jpg"></center>
         <br>
         <div class="lefttext">
            <h4>2. How To Betting</h4>
            Click start game then choose 1minute, 3minute, 5minute or 10minute.<br>
            Green  : if the result shows 1,3,7,9<br>
            Red    : if the result shows 2,4,6,8<br>       
            Violet  : if the result shows 0 or 5<br>
            Small  : if the result shows 0,1,2,3,4<br>
            Big    : if the result shows 5,6,7,8,9<br>
            <font>This company not allowed to place Illegal betting<br>Exp ：Betting (Big and small together) or (Red and Green together) in the same time.</font>
         </div>
         <center>  <img class="pic" src="images/home/epic102-min.jpg"></center>
         <br>
         <div class="lefttext">
            <h4>3. How To Recharge</h4>
            Click Wallet Icon, Click The Recharge Button, and we have three ways to make a recharge ( UPI, BANK TRANSFER, USDT/CRYPTO)
         </div>
         <center>  <img class="pic" src="images/home/epic103-min.jpg"></center>
         <center>  <img class="pic" src="images/home/epic104-min.jpg"></center>
         <br>
         <h4>4. How To Withdrawal</h4>
         Click Wallet Icon, Click Withdraw Button.<br>
         - Enter withdraw amount<br>
         - Make Sure Your Total Bet Until Zero<br>
         - Select Your Bank Account Or Add Your Bank Account<br>
         - Input Your Login Password
         <center>  <img class="pic" src="images/home/epic105-min.jpg"></center>
         <center>  <img class="pic" src="images/home/epic106-min.jpg"></center>
         <br>
         <h4>5. How To Order</h4>
         When The Betting Complete You Can Click My Game Record To See Your Bet Record, You Can Check The Chart Trend. 
          <center>  <img class="pic" src="images/home/epic107-min.jpg"></center>
      <br>
      <h4>5. How To Order</h4>
         When The Betting Complete You Can Click My Game Record To See Your Bet Record, You Can Check The Chart Trend. 
          <center>  <img class="pic" src="images/home/epic107-min.jpg"></center>
      <br>
       <h4>6. Times New Roman</h4>
         If you have a downline or referral member use your own link to register and if they make a recharge you can claim a reward. The agent will get a minimum commission of 0.6 % (level 1) and 0.18% (level 2) from each transaction that is done by the referral (Added every day at 00:30 AM.) If the accumulated transactions of the Referral reach a certain target, the agent will get an additional bonus with the following rebates.
          <center>  <img class="pic" src="images/home/epic108-min.jpg"></center>
      <br>
       <h4>7. Account security</h4>
         Go To Center Icon, Click Account Security.<br>
         - Fill your mobile number<br>
         - Click OTP then will send it to message to your number as your verification code<br>
         - Enter Strongest new password, and Confirm your password.<br>
         - Click sure<br>
          <center>  <img class="pic" src="images/home/epic109-min.jpg"></center>
            <center>  <img class="pic" src="images/home/epic110-min.jpg"></center>
      <br>
        <h4>8. Forgot Password</h4>
         - Click Forgot Password<br>
         - Fill your mobile number<br>
         - Click OTP then will send it to message to your number as your verification code<br>
         - Enter Strongest new password, and Confirm your password.<br>
         - If Cannot Receive OTP Please Contact Customer Service Immediately.<br>
          <center>  <img class="pic" src="images/home/epic111-min.jpg"></center>
           <center>  <img class="pic" src="images/home/epic112-min.jpg"></center>
            <center>  <img class="pic" src="images/home/epic113-min.jpg"></center>
      <br>
         <h4>9. About</h4>
         Click About for more details regarding Privacy Policy and Risk Disclosure Agreement.<br>
          <center>  <img class="pic" src="images/home/epic114-min.jpg"></center>
           <center>  <img class="pic" src="images/home/epic115-min.jpg"></center>
           
      <br>
      </div>
     
      </div>
      </div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
     <?php  include("include/pagestrick.php");?>
      <!-- Jquery --> 
  
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
   </body>
</html>