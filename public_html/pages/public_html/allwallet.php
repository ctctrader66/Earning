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
         .appHeader1 {
         background-color: #fff !important;
         border-bottom:0.50px solid #fff !important;
         }
       
         .appContent3 {
         position: relative;
         background-image: linear-gradient(90deg,#cd0103,#f64841);
         background-size: cover;
         height:180px;
         }
         
       
         .intro{
         font-size:20px; font-weight:500;
         }
         
         .profit{height:75px;}
         .wallet{height:64px;float:left;}
         
         .info {
         width: 100%;
         height: 1.06667rem;
         }
         .c-row {
         display: flex;
         }
         .appContent1{
         margin:16px;
         border-radius:5px;
         }
         .left{
         float:left;
         }
         .walletimg{width:28px;margin-right:5px;}
         .walletimg1{width:28px;margin-top:-12px; margin-left:10px;}
         .bottomtext{font-size:3.5vw;font-weight:400;color:white;}
      </style>
   </head>
   <body style="background:#F9FAFB">
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
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="main.php" class="icon goBack" onClick="goBack();"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">All Wallets</div>
      </div>
      <!-- App Header -->
      <div style="margin-top:50px" class="appContent3 text-white">
         <div class="justify-centent-center" style="padding:20px;  text-align:center">
            <div style="padding-bottom:10px;">
               <img class=" profit" src="images/icons/wallet.svg">
            </div>
            <span class="intro">  TRX <?php echo number_format(wallet($con,'amount',$userid), 2);?></span><br>
            <span class="intro">Total Wallet</span>
         </div>
      </div>
      <style>
            .parent {
         padding-top:15px;
         text-align:center;
         display: flex;
         width:100%;
         }
         .parent2 {
         padding-top:15px;
         text-align:center;
         display: flex;
         width:66.66%;
         }
         .child {   margin:0 10px;
         width: 45%;
         float: left;
         flex: 1;
         padding:18px 10px;
         border-radius:10px;
        background:#EEEEEE;
         }
         .child span{
         font-size:15px;
         color:#000;
         text-align:center;
         }
         .child p{
         font-size:16px;
         color:#000;
         text-align:center;
         }
         .active{
             background-image: linear-gradient(rgb(205, 1, 3), rgb(246, 72, 65));
             color:white;
         }
         .active span{
              color:white;
         }
         .active p{
              color:white;
         }
         .submitbtn{
              border-radius: 25px; height:45px; font-weight: 400; font-size: 18px;  
                  width: 80%;
                  margin: 0 auto;
                  border: 1px solid #cd0103;
                  color: #fff;
                  background-color: #cd0103;
                  box-shadow: 0 0 4px 3px rgb(207 0 69 / 20%);
         }
         .submitbtn:focus{
             outline:none;
         }
      </style>
      <div class="parent">
          <div class="child active">
              <p><?php echo number_format(wallet($con,'amount',$userid), 2);?></p>
              <span>Lottery</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>JDB</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>DG</span>
          </div>
          
      </div>
      <div class="parent">
          <div class="child">
           <p>0.00</p>
              <span>CMD</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>SaBa</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>CQ9</span>
          </div>
          
      </div>
         <div class="parent">
          <div class="child">
           <p>0.00</p>
              <span>MG</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>PG</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>IM</span>
          </div>
          
      </div>
           <div class="parent">
          <div class="child">
           <p>0.00</p>
              <span>EVO_Video</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>JILI</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>Card365</span>
          </div>
          
      </div>
       <div class="parent2">
          <div class="child">
           <p>0.00</p>
              <span>V8Card</span>
          </div>
           <div class="child">
              <p>0.00</p>
              <span>AG_Video</span>
          </div>
           
          
      </div>
      <div class="text-center mt-3">
           <button class="submitbtn">One-click Recycling</button>
      </div>
     
      
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <?php  include("include/pagestrick.php");?>
   </body>
</html>