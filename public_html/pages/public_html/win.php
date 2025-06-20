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
      <?php include 'head.php';?>
      <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <style>
         h5{ color:#888; font-size:20px; font-weight:normal;}
         h5 span{ color:#333; font-size:22px;}
         .divsize4 .btn{padding: 0 10px; width:100px;}
         .left-addon input {
         padding-left: 20px;
         }
         #payment .modal-dialog{position: absolute; bottom: 0; width: 100%;margin:0;}
         body {
         background: url(../images/game.png);
         background-size: contain;
         background-repeat: no-repeat;      
         }
         .profit{height:68px;float:left;}
         .wallet{height:70px;float:left; margin-top:-15px;}
         .btnss{
         border-radius: 5px; height:40px; font-weight: 500; font-size: 14px;  
         width: 155px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .btns{
         border-radius: 5px; height:40px; font-weight: 500; font-size: 14px;  
         width: 155px;
         margin: 0 auto;
         border: 1px solid #6B6C6C;
         color: #FFF;
         background-color: #6B6C6C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .headban{margin-top:60px;}
         .underinfo{padding:8px;margin-right:10px;margin-left:5px;background:#FFFBE8;border-radius:5px;}
         .infobox{padding:10px 13px;margin-top:-15px;}
         .peroidbox{padding:10px 15px;margin-top:-10px;}
         .peroidbox .box{background:#F84A54;border-radius:8px;padding:8px 8px 0px 8px;color:#fff;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .uppertbox{padding:10px 15px; margin-top:-10px;}
         .uppertbox .timebox{background:#fff;border-radius:8px;padding:2px;color:#fff;height:125px;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .gameidtimer{color:#fff;}
         .textwhite{color:#fff;}
         .banner{
         background: url(../images/bannertimeout.png) ;
         background-size:100px; 
         background-repeat: no-repeat;
         }
         .timer{background:#DA2031;color:#fff;font-weight:600;}
         .question{
         background: hsla(0,0%,100%,.8);padding:7px;border-radius:50%;height:30px;
         }
         .nav-tabs1 .nav-item1 {
         text-align:center
         }
         .nav-tabs1 .nav-link1 {
         height:44px;
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center;
         background:transparent;
         padding:0 16px;
         border-top:none;
         border-left:none;
         border-right:none;
         border-radius:0px;
         margin:0 !important;
         }
         .nav-tabs1.size4 {
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center
         }
         .nav-tabs1.size4 .nav-item1 {
         width:25%
         }
         .nav-link1 img{height:55px;}
         .walletbox{padding: 15px;margin-top:-30px;}
         .walletbox .box{justify-content:center;background:#fff;border-radius: 0 0 15px 15px;padding:10px;color:#fff;box-shadow:  0.21333rem 0.02667rem 0 0 rgb(187 191 205 / 30%);}
         .walletimg1{height:20px;padding:0 10px;margin-top:-5px;}
         .walletbox1{padding: 15px;margin-top:-10px;}
         .walletbox1 .box{justify-content:center;background:#fff;border-radius:15px 15px 0 0;padding:10px;color:#fff;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .bet{padding:10px 15px;margin-top:-10px;}
         .bet .box{background:#fff;border-radius:8px;padding:8px;color:#fff;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .btn_center button{
         padding: 13px 18px;
         font-size: 17px;
         border:none;
         transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
         }
         .btn_center button:hover{
         border:none;
         color:white;
         }
         button:focus{
         outline:none;
         color:white;
         }
         .btn_center{
         width: 100%;
         display: flex;
         flex-direction: row;
         align-items: center;
         justify-content: space-between;
         padding: 10px 15px;
         box-sizing: border-box;
         margin-top: -5px;
         }
         .back_one{
         background: #4caf50;
         color: #fff;
         width:100px;
         border-radius: 0px 15px 0px 15px;
         box-shadow: 0 0 0.21333rem 0.02667rem rgb(92 186 71 / 72%);
         }
         .back_two{
         background: #DB5FD1;
         color: #fff;
         width:100px;
         border-radius:15px;
         box-shadow: 0 0 0.21333rem 0.02667rem rgb(219 95 209 / 58%);
         }
         .back_three{
         background: #f44336;3
         color: #fff;
         width:100px;
         border-radius:  15px 0px 15px 0px;
         box-shadow: 0 0 0.21333rem 0.02667rem rgb(251 78 78 / 60%);
         }
         .back_big{
         background: #FFC511;
         color: #fff;
         width:220px;
         border-radius: 20px  0px 0px 20px ;
         }
         .back_small{
         background: #5CBA47;
         color: #fff;
         width:220px;
         border-radius: 0px  20px 20px 0px;
         }
         .appContent1{
         background:#FBEDF3;
         border-radius:10px;
         }
         .btn5 {
         border-radius: 30px 30px 30px 30px;
         border: 0px solid white;
         color: #fff;
         background: #4caf50;
         transition: 0.5s;
         border: 2px solid white; 
         outline: 1px solid green;
         font-size:20px;
         height:52px;
         }
         .btn6 {
         border-radius: 30px 30px 30px 30px;
         border: 0px solid white;
         background: #f44336;
         color: #fff;
         transition: 0.5s;
         border: 2px solid white; 
         outline: 1px solid red;
         font-size:20px;
         height:52px;
         }
         .btn3 {
         border-radius: 30px 30px 30px 30px;
         border: 0px solid white;
         color: #fff;
         transition: 0.5s;
         background: linear-gradient(to right bottom, #f44336 50%, #DB5FD1 50%);
         border: 2px solid white; 
         outline: 1px solid red;
         font-size:20px;
         height:52px;
         }
         .btn4 {
         border-radius: 30px 30px 30px 30px;
         border: 0px solid white;
         color: #fff;
         transition: 0.5s;
         background : linear-gradient(to right bottom, #4caf50 50%, #DB5FD1 50%);
         border: 2px solid white; 
         outline: 1px solid green;
         font-size:20px;
         height:52px;
         }
         .divsize2{margin:-8px;}
         .resulttable{background-color:#FBEDF3;width:25%;}
         .nav-tabs2 {
         background:#FAFBFC;
         border-radius:0px;
         border:0;
         padding:7px 15px;
         margin:-10px;
         }
         .nav-tabs2 .nav-item2 {
         text-align:center
         }
         .nav-tabs2 .nav-link2 {
         height:44px;
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center;
         background-color: #eaeefc;
         border: 0.02667rem solid #3c5ef6;
         box-shadow: 0.02667rem 0.02667rem 0.13333rem 0.13333rem #eaeefc;
         color:#000;
         padding:0px;
         border-radius:8px;
         margin:13px 6px !important;
         font-weight:400
         }
         .nav-tabs2 .nav-link2.active {
         font-weight:400;
         color:#000;
         background-color: #fbedf3;
         border: 0.02667rem solid #fb4e4e;
         box-shadow: 0.02667rem 0.02667rem 0.13333rem 0.13333rem #fbedf3;
         }
         .nav-tabs2 .size2, {
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center
         }
         .nav-tabs2.size3 .nav-item2 {
         width:33.33%
         }
         .regLog{
         width: fit-content;
         margin: 100% auto;
         }
         .regContent {
         margin: 0% auto;
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
         .mb-1 {
         margin-bottom: 10px !important;
         margin-left: -12px;
         }
         .modal-header {
         display: -ms-flexbox;
         display: block;
         -ms-flex-align: start;
         align-items: flex-start;
         -ms-flex-pack: justify;
         justify-content: center;
         text-align:center;
         border-bottom: 1px solid #dee2e6;
         border-top-left-radius: 15px;
         border-top-right-radius: 15px;
         height: 110px;
         width: 100%;
         vertical-align:middle;
         }
         .btn1 {
         height: 30px;
         padding: 0px 15px;
         margin: 6px 8px;
         font-size: 14px;
         line-height: 1.2em;
         font-weight: 500;
         display: -webkit-inline-box;
         display: inline-flex;
         -webkit-box-align: center;
         align-items: center;
         -webkit-box-pack: center;
         justify-content: center;
         -webkit-transition: 0.2s all;
         transition: 0.2s all;
         text-decoration: none !important;
         border-radius: 2px;
         -webkit-box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         border-radius: 7px;
         }
         .btn-secondary {
         border:none;
         border-radius:0px;
         background: #F0F0F0;
         box-shadow:none;
         color: #000;
         }
         .btn-secondary:active{
         background: #000;
         border:none;
         border-radius:0px;
         box-shadow:none;
         color: #fff;
         }
         .btn-secondary:hover{
         background: #000;
         border:none;
         box-shadow:none;
         border-radius:0px;
         color: #fff;
         }
         input[type=checkbox], input[type=radio] {
         box-sizing:border-box;
         padding:0;
         display: none;
         }
         .number-input {
         display: flex;
         justify-content: center;
         align-items: center;
         }
         .number-input button {
         -webkit-appearance: none;
         background-color: transparent;
         border: none;
         align-items: center;
         justify-content: center;
         cursor: pointer;
         margin: 0;
         position: relative;
         }
         .number-input button:before,
         .number-input button:after {
         display: inline-block;
         position: absolute;
         content: '';
         height: 2px;
         transform: translate(-50%, -50%);
         }
         .number-input button.plus:after {
         transform: translate(-50%, -50%) rotate(90deg);
         }
         .number-input input[type=number] {
         text-align: center;
         }
         .number-input.number-input {
         /* border: 1px solid #ced4da; */
         width: 50%;
         margin-top:10px;
         font-size:15px;
         }
         .number-input.number-input button {
         padding: 15px;
         background:#EAEAEA;
         }
         .number-input.number-input button.minus {
         padding: 15px;
         background:#EAEAEA;
         }
         
         .number-input.number-input input[type=number] {
         width: 50%;
         border: 1px solid #E0E0E0;
         margin:0 5px;
         font-size: 18px;
         height: 30px;
         color: #495057;
         }
         .mma{
         margin-left: -21px;
         margin-right: 48px;
         }
         input#myamount {
         width: 25%;
         border: none;
         border-width: 0 1px;
         font-size: 1rem;
         height: 2rem;
         color: #495057;
         background-color: #f2f3f5;
         }
         .mybtn {
         width: 60%;
         margin: 0px;
         padding: 0px;
         background: red;
         border: none;
         border-radius: 0px;
         height: 40px;
         color: #fff;
         }
         .mmybbtn{
         width: 30%;
         color: #fff;
         }
         .mybutton{
         height: 50px;
         }
         .container {
         display: flex;
         justify-content: space-between;
         align-items: center;
         }
         .left-text {
         text-align: left;
         margin: 0;
         font-size:16px;
         }
         .right-group {
         display: flex;
         justify-content: flex-end;
         }
         .right-input {
         float:right;
         }
         .parent{
         text-align:center;
         display: flex;
         width:100%;
         }
         .child{
         width: 40%;
         float: left;
         background:#25253C;
         padding:14px 0px;
         font-size: 15px;
         }
         
         .child button {
         color: #737382;
         border:none;
         line-height:20px;
         padding:0 10px;
         font-weight:500;
         background: transparent;
         text-align:center;
         }
         .child1{
         width: 60%;
         color:white;
         float: left;
         flex: 1;
         padding:14px 0px;
         font-size: 15px;
         }
         .child1 button {
         color:white;
         border:none;
         line-height:20px;
         padding:0 10px;
         font-weight:500;
         background: transparent;
         text-align:center;
         }
         .modal-title{
         font-size:20px;
         vertical-align:middle;
         margin-bottom:10px;
         }
         @keyframes fadeIn {
         0% {opacity: 0;}
         100% {opacity: 1;} 
         } 
         #alert.modal.modal-dialog{
         background-color: transparent;
         top:58%;
         }
         .image-spin {
         animation: spin 2s linear infinite;
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
        
             #bconecontainer table thead{
         background:#FBEDF3;
         }
         #bconecontainer table thead th{
         border-top: 1px solid white;
         vertical-align:middle;
         border-bottom: 1px solid white;
         height:32px;
         font-size:14px;
         font-weight:600;
         color:black;
         }
         #bconecontainer table td{
            border:none;
         background:#fff;
         height:35px;
         font-size:14px;
         font-weight:400;
         vertical-align:middle;
         }
       
         #paritycontainer table thead{
         background:#FBEDF3;
         }
         #paritycontainer table thead th{
         border-top: 1px solid white;
         vertical-align:middle;
         border-bottom: 1px solid white;
         height:32px;
         font-size:14px;
         font-weight:600;
         color:black;
         }
         #paritycontainer table td{
         background:#fff;
         height:35px;
         font-size:14px;
         font-weight:400;
         vertical-align:middle;
         }
         #header {
         position: fixed;
         top: 0;
         background-color: #fff;
         color: #333;
         font-size: 20px;
         width: 100%;
         }
         .point {
         width: 12px;
         height: 12px;
         border-radius: 50%;
         display: block;
         text-align: center;
         margin: auto;
         }
         .btnss:focus{
             outline:none;
             color:white
         }
         .btns:focus{
             outline:none;
             color:white
         }
         .boxi{vertical-align:middle;margin:0;justify-content:center;}
         .boxi .cardview{background:transparent; justify-content:center; text-align:center;border-radius:15px;padding:20px;}
         .boxi .cardview img{height:240px;}
         .con{justify-content:center;text-align:center;}
         .con span{font-weight:400; font-size:18px; color:#A39799;}
      </style>
   </head>
   <body style="background-color:#FAFBFC">
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
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="game.php" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div style="font-size:25px; font-weight:500" class="pageTitle">7 LOTTERY</div>
         <div class="right ">
            <a href="help.php" class="icon goBack"> <img  src="images/icons/headphone.png" class="back"> </a>
         </div>
      </div>
      <!-- App Header -->
      <div class="headban">
         <div class="walletbox1">
            <div class="box">
               <div>
                  <div  class="">
                     <img class="wallet" src="images/icons/wallet.png"> 
                     <div style="margin-top:20px;">
                        <p style="color:#000; font-size:22px; font-weight:500;">Total</p>
                        <p style="color:#cacaca; font-size:14px; font-weight:400;">Wallet Balance</p>
                        <p style="float:right;color:#000; font-size:22px; font-weight:500;margin-top:-40px;" > € <span id="balance" ><?php echo number_format(wallet($con,'amount',$userid), 2);?></span> <a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img class="walletimg1" id="spin-image" src="images/brefresh.png"></a></p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="walletbox">
            <div class="box">
               <div class="layout">
                  <div  class="col-6 text-center">  <a style=""  href="recharges.php" class="btnss btn"> Deposit</a></div>
                  <div class="col-6 text-center">
                     <a class="btns btn" href="withdrawals.php">Withdraw</a>
                  </div>
               </div>
               <p></p>
            </div>
         </div>
         <div class="infobox">
            <div  class="row underinfo">
               <div class="layout">
                  <i style="color:#ed6a0c;font-size:20px;margin-right:10px;" class="fa fa-volume-up left"></i>
                  <marquee style="color:#ed6a0c;font-weight:600;">  <?php $sqlget = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting WHERE id  =  1"));
                     $telegram = $sqlget['note']; echo $telegram;?>
                  </marquee>
               </div>
            </div>
         </div>
         <div class="uppertbox">
            <div class="timebox">
               <hr style="border:3px solid #9898A8; ">
               <ul style="margin-top:-40px;" class="nav nav-tabs1 size4">
                  <li class="nav-item1"> 
                     <a class="nav-link1"><i style="background: hsla(0,0%,100%,.8);padding:7px;border-radius:50%;height:30px;margin-top:-3px;color:green;font-size:22px;" class="fa fa-question-circle"></i></a> 
                  </li>
                  <li class="nav-item1"> 
                     <a class="nav-link1 question"><i style="background: hsla(0,0%,100%,.8);padding:7px;border-radius:50%;height:30px;margin-top:-3px;color:red;font-size:22px;" class="fa fa-question-circle"></i></a> 
                  </li>
                  <li class="nav-item1"> 
                     <a class="nav-link1 question "><i style="background: hsla(0,0%,100%,.8);padding:7px;border-radius:50%;height:30px;margin-top:-3px;color:green;font-size:22px;" class="fa fa-question-circle"></i></a> 
                  </li>
                  <li class="nav-item1"> 
                     <a class="nav-link1 question"><i style="background: hsla(0,0%,100%,.8);padding:7px;border-radius:50%;height:30px;margin-top:-3px;color:green;font-size:22px;" class="fa fa-question-circle"></i></a> 
                  </li>
               </ul>
               <ul style="" class="nav nav-tabs1 size4">
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1" <a href="win1min.php">
                     <img style="height:20px;padding-left:8px" src="images/greentimer.png">
                     <i style="color:green;font-size:22px;margin-top:-6px" class="fa fa-caret-down"></i>
                     <span style="color:green; font-weight:700;">1 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1">
                     <img style="height:20px;padding-left:7px" src="images/redtimer.png">
                     <i style="color:red;font-size:22px;margin-top:-6px" class="fa fa-caret-down"></i>
                     <span style="color:red; font-weight:700;">5 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1">
                     <img style="height:20px;padding-left:11px" src="images/greentimer.png">
                     <i style="color:green;font-size:22px;margin-top:-6px" class="fa fa-caret-down"></i>
                     <span style="color:green; font-weight:700;">10 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1">
                     <img style="height:20px;padding-left:11px" src="images/greentimer.png">
                     <i style="color:green;font-size:22px;margin-top:-6px" class="fa fa-caret-down"></i>
                     <span style="color:green; font-weight:700;">20 min</span>
                     </a> 
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="peroidbox">
         <div class="layout box">
            <div class="gameidtimer">
               <h6 class="mb-1 textwhite" style="font-size:12px;; font-weight:400; border-radius:5px; border:1px solid white; padding:5px; width:65%;text-align:center;margin-left:1px;">5 minute</h6>
               <h5>
                  <span class="showload">
                     <div class="spinnner-border text-danger" role="status">
                     </div>
                  </span>
                  <span id="gameid" class="none textwhite"><?php echo sprintf("%03d",gameid($con));?></span>
                  <input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($con));?>">
               </h5>
            </div>
            <div class="gameidtimer banner"> </div>
            <div style="border-left:2px dotted #fff; margin-left:-30px;" class="gameidtimer text-right">
               <h6 style="font-weight:400; font-size:15px;" class="mb-1 textwhite">Left time to buy</h6>
               <h5 class="gbutton2 " id="demo"></h5>
            </div>
         </div>
      </div>
      <div class="bet">
         <div class="box">
            <div class="btn_center">
               <button type="button"  class="back_one gbutton" onClick="betbutton('#1DCC70','button','Green');">Green</button>
               <button type="button" class="back_two gbutton" onClick="betbutton('#DB5FD1','button','Violet');">Violet</button>
               <button type="button" class="back_three gbutton" onClick="betbutton('#FF0000','button','Red');">Red</button>
            </div>
            <div class="long  mt-1">
               <div class="appContent1 mt-n1">
                  <div class="container-fluid">
                     <div class="layout text-center  d-flex justify-content-center">
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn3" onClick="betbutton('#FF0000','button','0');">0</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="numbutton" class="btn   gbutton none btn5" onClick="betbutton('#1DCC70','button','1');">1</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn  gbutton none btn6" onClick="betbutton('#FF0000','button','2');">2</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn5" onClick="betbutton('#1DCC70','button','3');">3</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn6" onClick="betbutton('#FF0000','button','4');">4</button>
                        </div>
                     </div>
                     <div class="layout text-center  mt-2 d-flex justify-content-center">
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn4" onClick="betbutton('#1DCC70','button','5');">5 </button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn6" onClick="betbutton('#FF0000','button','6');"> 6</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn5" onClick="betbutton('#1DCC70','button','7');">7 </button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn6" onClick="betbutton('#FF0000','button','8');"> 8</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn5" onClick="betbutton('#1DCC70','button','9');"> 9</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <div class="btn_center mt-1">
              <button type="button"  class="back_big gbutton" onClick="betbutton('#FF0000','button','Green');">BIG</button>
               <button type="button" class="back_small gbutton" onClick="betbutton('#1DCC70','button','Red');">SMALL</button> 
            </div>  
         </div>
      </div>
      <ul class="nav nav-tabs2 size3" id="myTab3" role="tablist">
         <li class="nav-item2"> 
            <a class="nav-link2 active" id="home-tab3" data-toggle="tab" href="#parity" role="tab" onClick="tabname('parity');getResultbyCategory('parity','parity');">Game Record</a> 
         </li>
         <li class="nav-item2"> 
            <a class="nav-link2" id="chart-tab3"  data-toggle="tab" href="#bcone" role="tab" onClick="getResultbyCategory('bcone','bcone');">Chat tren</a>
         </li>
         <li class="nav-item2"> 
            <a class="nav-link2" id="profile-tab3" data-toggle="tab" href="#sapre" role="tab" onClick="getResultbyCategory('sapre','sapre');">My Game Record</a>
         </li>
      </ul>
      <div>
          
          
   

         <!--=====================game area end============================-->
         <div class="mt-1 pb-5">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade active show" id="parity" role="tabpanel"></div>
                <div class="tab-pane fade show" id="bcone" role="tabpanel"></div>
               <div class="tab-pane fade show" id="sapre" role="tabpanel"></div>
            </div>
         </div>
      </div>
      <!-- appCapsule -->
      <div  id="payment" class="modal fadeIn" role="dialog">
         <div   class="modal-dialog" role="document">
            <div style="border-top-left-radius: 20px;
               border-top-right-radius: 20px" class="modal-content ">
               <div class="modal-header paymentheader" id="paymenttitle">
                  <h4 class="modal-title" >5 minute</h4>
                  <span id="chn" class="paymentcolor" style="background:white;border-radius:5px; padding:5px 80px"> </span>
               </div>
               <div style="display: flex; justify-content: space-between; width: 100%;margin-top:-43px;">
                  <div style="width: 50%; height: 50px; background: linear-gradient(10deg, #fff 50%,transparent 0);"></div>
                  <div style="width: 50%; height:50px; background: linear-gradient(-10deg, #fff 50%,transparent 0);"></div>
               </div>
               <form action="#" method="post" id="bettingForm" autocomplete="off">
                  <div style="margin:0px -18px -20px -18px" class="modal-body" id="loadform">
                     <!---   ---->
                     <div class="container mt-1">
                        <p class="left-text">Money</p>
                        <div class="right-group">
                           <label class=" btn1 btn-secondary" onClick="contract(10);">
                           <input class="contract" type="radio" name="optradio" id="hoursofoperation" value="1" checked >1</label>
                           <label class=" btn1 btn-secondary" onClick="contract(100);">
                           <input type="radio" class="contract" name="optradio" id="hoursofoperation" value="100">100</label>
                           <label class=" btn1 btn-secondary" onClick="contract(1000);">
                           <input type="radio" class="contract" name="optradio" id="hoursofoperation" value="1000">1000</label>
                        </div>
                     </div>
                     <div class="container">
                        <p class="left-text">Multiply</p>
                        <div class="def-number-input number-input ">
                           <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); addvalue();" class="minus"></button>
                           <input class="quantity" min="1" name="amount" id="amount" value="1" type="number" onKeyUp="addvalue();">
                           <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); addvalue();" class="plus"></button>
                        </div>
                     </div>
                     <div style="margin: 10px 0px" class="container">
                        <p style="color:white" class="left-text">.</p>
                        <div class="right-group">
                           <label class="  btn1 btn-secondary">
                           <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="3">x3<br>
                           </label>
                           <label class="  btn1 btn-secondary">
                           <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="5">x5<br>
                           </label>
                           <label class="  btn1 btn-secondary">
                           <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="10">x10<br>
                           </label>
                           <label class="  btn1 btn-secondary">
                           <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="20">x20<br>
                           </label>
                           <script>
                              function myFunction(browser) {
                                document.getElementById("amount").value = browser;
                              }
                           </script>
                        </div>
                     </div>
                     <input type="hidden" id="contractmoney" name="contractmoney" value="1">   
                     <input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
                     <input type="hidden" name="type" id="type" class="form-control" value="">
                     <input type="hidden" name="value" id="value" class="form-control" value="">
                     <input type="hidden" name="counter" id="counter" class="form-control" >
                     <input type="hidden" name="inputgameid" id="inputgameid" class="form-control" value="<?php echo sprintf("%03d",gameid($con));?>"> 
                     <div class="custom-control custom-checkbox m-2">
                        <input type="checkbox" checked class="custom-control-input" id="presalerule" name="presalerule">
                        <label class="custom-control-label text-muted" for="presalerule">I Agree <a data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">Presale Rule</a></label>
                     </div>
                     <input type="hidden" name="finalamount" id="finalamount" value="1">
                     <div class="parent">
                        <div class="child">
                           <button  data-dismiss="modal">Cancel</button>
                        </div>
                        <div  class="child1 paymentheader">
                           <button  id="type" type="submit">Confirm</span></button>
                        </div>
                     </div>
                     <!------>
                  </div>
                  <input type="hidden" name="tab" id="tab" value="parity">
               </form>
            </div>
         </div>
      </div>
      <div id="alert" class="modal" role="dialog" >
         <div  class="modal-dialog  regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body" >
                  <div class="text-center" id="alertmessage">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="loader" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content" style="background:transparent; border:none;">
               <div class="text-center pb-1">
                  <a type="button" id="closbtnloader" data-dismiss="modal">
                     <div class="spinner-grow text-success"></div>
                  </a>
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
      <script src="assets/js/betting.js"></script>
       <?php  include("include/pagestrick.php");?>
      <script src="assets/js/jquery.dataTables.min.js"></script>
      <script>
         // Get the modal button and close button elements
         var modalButton = document.getElementById("betbutton");
         var modalCloseButton = document.getElementById("type");
         
         // Add a click event listener to the modal button
         modalButton.addEventListener("click", function() {
           // Disable the modal button
           modalButton.disabled = true;
         });
         
         // Add a hidden.bs.modal event listener to the modal
         $('#payment').on('hidden.bs.modal', function () {
           // Enable the modal button
           modalButton.disabled = false;
         });
      </script>
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
         $(document).ready(function () {
            
         var x = setInterval(function() { 
         start_count_down(); 
           $('#closbtnloader').click(); 
         }, 1e3);
         
         getResultbyCategory('parity','parity');
          getResultbyCategory('sapre','sapre');
          getResultbyCategory('bcone','bcone');
         
         });
         function start_count_down() { 
         $(".showload").hide();
         $(".none").show();
         var countDownDate = Date.parse(new Date) / 1e3;
           var now = new Date().getTime();
           var distance = 300 - countDownDate % 300;
           //alert(distance);
           var i = distance / 60,
            n = distance % 60,
            o = n / 10,
            s = n % 10;
           var minutes = Math.floor(i);
           var seconds = ('0'+Math.floor(n)).slice(-2);
           document.getElementById("demo").innerHTML = "<span class='timer'>0"+Math.floor(minutes)+"</span>" + "<span>:</span>" +"<span class='timer'>"+seconds+"</span>";
         document.getElementById("counter").value = distance;
         if(distance==297 || distance==294 || distance==291 || distance==288 || distance==285){
         generateGameid();
         getResultbyCategory('parity','parity');
         getResultbyCategory('sapre','sapre');
         getResultbyCategory('bcone','bcone');
         }
         if(distance<=30)
         {
         $(".gbutton").prop('disabled', true);
         }else{ 
         $(".gbutton").prop('disabled', false);
         	}
         	if (distance == 296) {
          reloadbtn(<?php echo $userid;?>);
        }else{
            
        }
         }
         
         function generateGameid()
         {
         var futureid=$('#futureid').val();
         	$.ajax({
             type: "Post",
             data:"futureid=" + futureid + "& type=" + "generate" ,
             url: "periodid-generation.php",
             success: function (html) {
              //alert(html);
         	 var arr = html.split('~');
         	 //alert(arr[1]);
         	 document.getElementById("gameid").innerHTML=arr[0];
         	 document.getElementById("inputgameid").value=arr[0];
         	 document.getElementById("futureid").value=arr[0];
               return false;
               },
               error: function (e) {}
               });
         	}
         	
         	function betbutton(color,type,name)
         {
         	$.ajax({
             type: "Post",
             data:"type=" + type+ "& name=" + name ,
             url: "betform.php",
             success: function (html) {
         		
         	 document.getElementById("loadform").innerHTML=html;
               return false;
               },
               error: function (e) {}
               });
         
         	if(type=='number'){
         	$(".paymentheader").css("background-color", color);
         		$(".paymentcolor").css("color", color);
         	document.getElementById('chn').innerHTML = 'Select '+name;
         
         		}else{
         	$(".paymentheader").css("background-color", color);
         		$(".paymentcolor").css("color", color);
         	document.getElementById('chn').innerHTML = 'Select '+name;
         	}
         	$('#payment').modal({backdrop: 'static', keyboard: false})  
              $('#payment').modal('show');
              document.getElementById('type').value = type;
         	 document.getElementById('value').value = name;
         
         	}
         //=====================amount calculation======================	
         function contract(abc){ //alert(abc);
         var amount =$("#amount").val();
         document.getElementById('contractmoney').value = abc;
         var addvalue=abc*amount;
         document.getElementById('showamount').innerHTML = addvalue;
         document.getElementById('finalamount').value = addvalue;
         
         };	
         function addvalue()
         { 
         var amount =$("#amount").val();
         var contractmoney =$("#contractmoney").val();
         var addvalue=contractmoney*amount;
         document.getElementById('showamount').innerHTML = addvalue;
         document.getElementById('finalamount').value = addvalue;
         	}
         
         function tabname(tabname){
         document.getElementById('tab').value = tabname;	
         	}	
         
         //=====================amount calculation======================
         //====================== get Result==============================
         
         function getResultbyCategory(category,containerid)
         { 
         $.ajax({
         type: "Post",
         data:"category=" + category,
         url: "getResultbyCategory.php",
         success: function (html) {
         document.getElementById(containerid).innerHTML=html;
         
         waitlist('parity',<?php echo $userid;?>,'paritywait');
         
         if(category=='parity'){
         $('#parityt').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": false,
         "info": true,
         "autoWidth": false
         });
         
         }
         else if(category=='sapre'){
         
         $('#myrecordparityt').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": false,
         "info": false,
         "autoWidth": false
         });
         }
         else if(category=='bcone'){
         
         $('#bconet').DataTable({
         "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": false,
         "info": false,
         "autoWidth": false
         });
         }
         
         
         return false;
         },
         error: function (e) {}
         });
         
         }
         
         $(document).ready(function () {
         	waitlist('parity',<?php echo $userid;?>,'paritywait');
         });
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
      <script>
         $(function(){
           $('#alert').on('show.bs.modal', function(){
               var alert = $(this);
               clearTimeout(alert.data('hideInterval'));
               alert.data('hideInterval', setTimeout(function(){
                   alert.modal('hide');
               }, 1000));
           });
         });
      </script>
   </body>
</html>