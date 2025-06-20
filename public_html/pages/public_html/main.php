<?php 
   ob_start();
   session_start();
   // print_r($_SESSION);exit();
   if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
  $today=date('Y-m-d');
  ?>
  
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
         background-color#fff !important;
         border-color: #fff !important;
         }
         * {
         box-sizing: border-box;
         }
         /* Create two equal columns that floats next to each other */
         .column1 {
         padding-left: 15px;
         padding-right: 15px;
         width: calc(100% / 3);
         float: left;
         /* Should be removed. Only for demonstration */
         }
         /* Clear floats after the columns */
         .row1:after {
         content: "";
         display: table;
         clear: both;
         margin-bottom: -0.50cm;
         }
         /* Create two equal columns that floats next to each other */
         .column {
         float: center;
         width: calc(100% / 2);
         /* Should be removed. Only for demonstration */
         }
         /* Clear floats after the columns */
         .row:after {
         content: "";
         display: table;
         clear: both;
         }
         .appContent3 {
         position: relative;
         background: url(../images/icons/mytop.png) no-repeat top;
         background-size: cover;
         height:220px;
         margin-top:25px;
         }
         .user-block img {
         width: 40px;
         height: 40px;
         float: left;
         margin-right:10px;
         margin-top:-10px;
         background:#333;
         }
         .img-circle {
         border-radius: 50%;
         }
         .accordion .btn-link {
         box-shadow:none;
         margin:0px 0px;
         color: #333 !important;
         font-size: 16px;
         font-weight: normal;
         }
         .accordion .collapsed {
         border:none;
         }
         .accordion .show {
         }
         .accordion .sub-link {
         box-shadow:none;
         color: #333 !important;
         font-size: 14px;
         font-weight: normal;
         display:block;
         }
         .accordion .sub-link:hover {
         color:#00F !important;
         }
         .accordion .btn-link:hover {
         background:#F5F5F5;
         }
         .accordion .btn-link {
         position: relative;
         }
         .btn3 {
         background-color: #FFD700;
         border-radius: 15px 15px 15px 15px;
         border: 1px solid white;
         padding-bottom: 4px;
         padding-top: 4px;
         padding-left: 25px;
         padding-right: 25px;
         transition: 0.5s;
         }
         .accordion .btn-link::after {
         content: "\f105";
         color: #545E68;
         top: 12px;
         right: 9px;
         position: absolute;
         font-family: "FontAwesome";
         font-size:24px;
         }
         .btn1 {
         border-radius: 15px 0px 15px 0px;
         border: 2px solid white;
         padding-bottom: 4px;
         padding-top: 4px;
         padding-left: 25px;
         padding-right: 25px;
         transition: 0.5s;
         }
         .right{
         float:right;
         }
         .btn2 {
         border-radius: 5px 05px 5px 5px;
         border: 2px solid white;
         padding-bottom: 4px;
         padding-top: 4px;
         padding-left: 30px;
         padding-right: 30px;
         transition: 0.5s;
         }
         .accordion .btn-link[aria-expanded="true"]::after {
         content: "\f106";
         }
         .light{
         height: 24px;
         padding: 0px 0px;
         margin: 5px 2px;
         border-radius: 20px;
         width: 24px;}
         .light1{
         height: 26px;
         padding: 0px 0px;
         margin: 5px 2px;
         border-radius: 20px;
         width: 26px;}
         .appHeader1 .right{
         top: 1%;
         right: 0.6rem;
         height: 30px;
         }
         .sticky {
         position: fixed;
         }
         .sticky + .content {
         padding-top: 102px;
         }
         .rightic{float:right;margin-top:-27px;}
         .intro{
         font-size:15px; font-weight:600;
         }
         .imgleft{
         padding:0 10px;
         }
         .profit{height:68px;}
         .wallet{height:64px;float:left;}
         #quick-links  .quick-links-box a{
         text-align: center;
         }
         #quick-links .quick-links-box{
         margin-top:-40px;
         border-radius: 7px 7px 5px  5px;
         padding: 20px 20px;
         background-color: #fff;
         position: relative;
         width: 100%;
         height:230px;
         color: #5E5E5E;
         font-weight: 500;
         text-align: center;
         }
         #quick-links  .quick-links-box1 a{
         text-align: center;
         }
         #quick-links .quick-links-box1{
         background: url(../images/icons/mytop11.png) no-repeat top;
         background-size: cover;
         height:220px;
         margin-top:25px;
         
         border-radius: 10px;
         background-size: 100% 100%;
         box-shadow: 0 0 0px 0px rgb(92 186 71 / 60%);
         padding: 10px 10px;
         background-color: #fff;
         position: relative;
         margin:0 -35px;
         margin-bottom:15px;
         margin-top:-40px;
         height:150px;
         color: #5E5E5E;
         font-weight: 500;
         text-align: center;
         }
         .banner{
         margin: 0 .4rem .4rem;
         height: 1.38667rem;
         background: url(../images/icons/banner.png) no-repeat 0 0;
         background-size: 100% auto;
         font-size: .53333rem;
         color: #fff;
         position: relative;
         }
         .btnss{
         border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 170px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
          margin-top:-25px;
          margin-left: -18px;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .btns{
         border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 165px;
         margin: 0 auto;
         border: 1px solid #6B6C6C;
         color: #FFF;
         background-color: #6B6C6C;
         margin-top:-25px;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .btnss:focus{
             outline:none;
             color:#fff;
         }
         .btns:focus{
             outline:none;
             color:#fff;
         }
         .banner .pageTitle {
         padding-top:18px;
         font-size: 21px;
         font-weight: 400;
         letter-spacing: .02em;
         color:#fff;
         }
         .three{
         width:50px;
         height:50px;
         margin-bottom:10px;
         }
         .imggg{
         margin-left: -18px; margin-right: 12px;  width:35px; height: 35px;
         }
         .cardheader{
         margin-top:-13px;
         margin-bottom:7px;
         }
         .cardheader1{
         margin-top:7px;
         margin-bottom:-13px;
         }
         .icon1{
         width: 80%;
         position: absolute;
         left: 10%;
         top:185px;
         height: 5%;
         background: url(../images/icons/walletbanner.png) no-repeat 0 0;
         background-size: 100% 100%;
         }
         .balance {
         padding: 0.4rem 0.4rem 0;
         background: linear-gradient(135deg,#fe9b0c,#ffcc51);
         border-radius: 0.26667rem;
         background-size: 100% 100%;
         box-shadow: 0 0.05333rem 0.42667rem 0 rgb(253 188 51 / 55%);
         }
         .m-t-10 {
         margin-top: 0.26667rem!important;
         }
         .txt {
         font-size: .4rem;
         color: #fff;
         }
         .c-row-middle {
         align-items: center;
         }
         .c-row {
         display: flex;
         }.c-row-middle-center {
         align-items: center;
         }
         .c-row-center, .c-row-middle-center {
         justify-content: center;
         }
         .c-row {
         display: flex;
         }
         .money {
         margin: 0.32rem 0;
         color: #fff;
         font-weight: 600;
         font-size: .8rem;
         }
         element.style {
         width: 25px;
         height: 25px;
         }
         .balance .img {
         width: 0.58667rem;
         height: 0.48rem;
         }
         .m-l-15 {
         margin-left: 0.4rem!important;
         }
         .van-image {
         position: relative;
         display: inline-block;
         }
         .van-image__error, .van-image__img, .van-image__loading {
         display: block;
         width: 100%;
         height: 100%;
         }
         .info {
         width: 100%;
         height: 1.06667rem;
         }
         .c-row {
         display: flex;
         }
         .appContent1{
         background:white;
         margin:16px;
         border-radius:5px;
         }
         .left{
         float:left;
         }
         .image-spin {
         animation: spin 2s linear infinite;
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
         .walletimg{width:28px;margin-right:5px;}
         .walletimg1{width:25px;margin-top:-12px; margin-left:10px;}
         .bottomtext{font-size:16px;font-weight:400;color:red;}
         .submitbtn{
         border-radius: 5px; height:45px; font-weight: 400; font-size: 14px;  
         width: 320px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         margin-bottom: -10px;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(92 186 71 / 60%);
         }
         
         .modal{margin-top:50%;}
         .parent{
         text-align:center;
         display: flex;
         width:100%;
         }
         .tz_title{
         font-size: 18px;
         padding-bottom: 15px;
         font-weight:500;
         color:#000;
         }
       .child{
         width: 50%;
         float: left;
         flex: 1;
         padding:10px 10px;
         font-size: 19px;
         border: 1.50px solid #f7f7f7;
         }
         button:focus{
         outline:none;
         }
         .child button {
         color: #767778;
         border:none;
         line-height:20px;
         padding:0 20px;
         background: transparent;
         text-align:center;
         }
         .child a button{
         color: #1998FB;
         }
         
         .container1{
         text-align:center;
         padding:20px;
         }
        
         
      </style>
   </head>
   <body style="background:#F9FAFB">
      <?php
         include("include/connection.php");
        // include("loading.php");
        $userid=$_SESSION['frontuserid'];
         
         ?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <div id="header" class="appHeader1">
         <div class="pageTitle">Center</div>
         <div class="right ">
            <a href="help.php" class="icon goBack"> <img  src="images/icons/headphone.png" class="back"> </a>
         </div>
      </div>
      <!-- App Header -->
      <div class="appContent3 content text-white">
         <div class=" position: fixed;" style="padding:60px; text-align:left">
            <div class="left"> <img class="img-circle img-bordered-lg profit" src="assets/img/avatar.svg"> </div>
            <div class="">
               <span class="intro"><?php echo user($con,'username',$userid);?></span><br>
               <span class="intro1">ID:<?php echo user($con,'id',$userid);?></span><br>
               <span class="intro1">Mobile:+7<?php echo substr(user($con,'mobile',$userid),0,-8);?>**<?php echo substr(user($con,'mobile',$userid), 4);?></span>
            </div>
            <a class="rightic" href="profile.php"><i class="fa fa-angle-right" style="color:white; font-size:27px"></i></a>
         </div>
      </div>
      <section id="quick-links">
         <div class="container">
            <div class="quick-links-box">
               <div class="container">
                  <span style=" margin-left:-85%;color:#000; Font-size:15px;"></span>
                  <p></p>
                  <p></p>
                  <div class="quick-links-box1">
                     <div style=" margin-left:-47%;margin-top:5px;"><img class="walletimg" src="images/icons/whitewallet.png"><span style="color:#FF350A; font-weight:400; font-size:18px;">Wallet balance:</span></div>
                     <div class="text-center" style="margin: 20px 0">
                        <span style="color:#FF350A;  font-weight:500; font-size:30px;">€ <span id="balance" > <?php echo number_format(wallet($con,'amount',$userid), 2);?></span></span><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"> <img class="walletimg1" id="spin-image" src="images/icons/refresh.png"></a>
                     </div>
                     <div class="row align-items-center justify-content-between">
                        <div  class="col-6 text-center" style="border-right:2PX solid #FF350A;"> <span class="bottomtext"> Today Bet<br>€ <?php $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_walletsummery` where userid = '".$userid."' and date(`createdate`)='".$today."' and actiontype = 'join' "); $wagar_bet1=mysqli_fetch_array($total_bet1); $total_bet = $wagar_bet1['total1']; echo round($total_bet,1);?></span></div>
                        <div class="col-6 text-center">
                           <span class="bottomtext"> Total Bet<br>€ <?php $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_walletsummery` where userid = '".$userid."' and actiontype = 'join' ");
                                      	$wagar_bet1=mysqli_fetch_array($total_bet1);
                                      $total_bet = $wagar_bet1['total1']; echo round($total_bet,1);?></span>
                        </div>
                     </div>
                  </div>
               </div>
               <br>
               <div class="row align-items-center justify-content-between">
                  <div  class="col-6 text-center">  <a style=""  href="recharges.php" class="btnss btn"> Deposit</a></div>
                  <div class="col-6 text-center">
                     <a class="btns btn" href="withdrawals.php">Withdraw</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <div style="padding:12px;margin-top:-10px;">
         <div style="height:55px; text-align:center"class="banner">
            <div class="pageTitle">Promote</div>
            <a class="rightic" href="promotion.php"><img src="images/icons/arrow.png" style="height:15px; weight:30px; padding-right:10px; margin-top:7px;"></a>
         </div>
      </div>
      
      </div>
      <div style="margin-top:-20px" class="row1">
         <div class="column1 ">
            <br>
            <a href="order.php" style="color:black;" >
               <center><span style="font-size:15px;"><img class="three" src="images/icons/bet.png"><br>Bet Record<span></center>
            </a>
         </div>
         <div class="column1 ">
            <br>
            <a href="transactions.php" style="color:black;">
               <center><span style="font-size:15px;"> <img class="three" src="images/icons/historys.png"><br>Transcation<span></center>
            </a>
         </div>
         <div class="column1 ">
            <br>
            <a href="complaint.php" style="color:black;">
               <center><span style="font-size:15px;"> <img class="three" src="images/icons/bells.png"><br>Message<span></center>
            </a>
         </div>
      </div>
      <p></p>
      <div class="appContent1 mb-5">
         <div class="contentBox long mb-3">
            <div class="contentBox-body card-body">
               <!-- listview -->
               <div class="accordion" id="accordionExample">
                  <div class="card-header cardheader">
                     <h3 class="mb-0"> <a href="resetpassword.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/security.png">ACCOUNT SECURITY</a> </h3>
                  </div>
                <!--  <div class="card-header">
                     <h3 class="mb-0"> <a href="mission.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/mission.png">PROMOTE MISSION</a> </h3>
                  </div> -->
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="envelope.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/code.png">GIFT CODE</a> </h3>
                  </div>
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="newtutorial.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/question.png">BEGINNER TUTORIAL</a> </h3>
                  </div>
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="about.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/about.png">ABOUT</a> </h3>
                  </div>
                  <div class="card-header cardheader1">
                     <h3 class="mb-0"> <a href="help.php" class="btn btn-link collapsed collapsed1"><img  class="imggg" src="images/icons/support.png">CUSTOMER SERVICE</a> </h3>
                  </div>
               </div>
               <!-- * listview --> 
           </div>
            <div class="text-center mt-3" style="">
               <a data-toggle="modal" href="#confirm" data-backdrop="static" data-keyboard="false"  class="btn submitbtn">Login out</a>
            </div>
         </div>
      </div>
      <div id="confirm" class="modal " role="dialog">
         <div style="" class="modal-dialog p-3" role="document">
            <div class="modal-content">
               <div class="container1">
                  <span class="tz_title">Prompt</span>
                  <p class="mt-1 text-dark">Do you want to log out?</p>
               </div>
               <input type="hidden" id="id" name="id" value="">
               <input type="hidden" id="type" name="type" value="">
               <div class="parent">
                  <div style="border-radius:0 0 0 15px;" class="child">
                     <button  data-dismiss="modal">Cancel</button>
                  </div>
                  <div style="border-radius:0 0 15px 0; " class="child">
                     <a href="logout.php"><button onclick="logout.php">Confirm</button></a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include("include/footer.php");?>
      <!-- appCapsule -->
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <?php  include("include/pagestrick.php");?>
      <script>
         var spinImage = document.getElementById("spin-image");
         
         spinImage.addEventListener("click", function() {
         spinImage.classList.add("image-spin");
         
         setTimeout(function() {
         spinImage.classList.remove("image-spin");
         }, 2000);
         });
         
      </script>
      <script>
         function reloadbtn(id){
         
         
         $.ajax({
           type: "Post",
           data:"userid=" + id,
           url: "getwalletbalance.php",
           success: function (html) {
         
         	document.getElementById('balance').innerHTML =html;
             return false;
             },
             error: function (e) {}
             });
         
         }
      </script>
   </body>
</html>