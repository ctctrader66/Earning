<?php 
   ob_start();
   session_start();
  if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="stylesheet" href="home/assets/css/style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="home/assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <?php   include("head.php"); ?>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <style>
         .fixed_kefu {
         position: fixed;
         right: 5px;
         top: 80%;
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;
         font-size: 12px;
         color: #000;
         border-radius: 50%;
         background: #fff;
         width: 60px;
         height: 60px;
         box-shadow: 0 0 1px #000;
         }
         .fixed_kefu img {
         max-width: 65px;
         max-height: 65px;
         width:100%;
         height:100%;
         }
         .htwspan{
         /* margin: 0 auto; */
         display: table;
         color: #000;
         font-size: 25px;
         /* margin-top: 5px; */
         margin-bottom: 15px;
         margin-top: 10px;
         }
         .box img {
         width: 72px;
         height: 65px;
         padding: 5px;
         margin: 5px;
         }
         .box {
         align-self: flex-end;
         animation-duration: 2s;
         animation-iteration-count: infinite;
         margin: -10px auto -20px auto;
         transform-origin: bottom;
         width: 200px;
         }
         .bounce-1, .bounce-3, .bounce-5 {
         animation-name: bounce-1;
         animation-timing-function: linear;
         }
         @keyframes bounce-1 {
         0%   { transform: translateY(0); }
         50%  { transform: translateY(-10px); }
         100% { transform: translateY(0); }
         }
         .bounce-2, .bounce-4{
         animation-name: bounce-2;
         animation-timing-function: linear;
         }
         @keyframes bounce-2 {
         0%   { transform: translateY(0); }
         50%  { transform: translateY(10px); }
         100% { transform: translateY(0); }
         }
         .counter li {
         display: inline-block;
         font-size: 14px;
         list-style-type: none;
         padding: 0.5em;
         text-transform: uppercase;
         font-weight: 500;
         background: #fff;
         margin-bottom: 15px;
         width: 23%;
         border-radius: 15px 15px;
         box-shadow: 3px 5px 0 rgb(172 182 192 / 30%);
         }
         .counter li span {
         background:#FAFAFB;
         display: block;
         margin-top: 10px;
         }
         .ribbon {
         font-weight: 600;
         font-size: 14px;
         color: #fff;
         position: absolute;
         top: 30px;
         margin-left: 33%;
         }
         .card .card-title {
         color:#696969;
         font-size:20px;
         font-weight:500;
         margin-bottom:16px
         }
         .fade-item {
         text-align:center;
         padding:20px 0px;
         list-style: none;
         transition: 2s all ease-in-out;
         opacity: 0;
         }
         .tabs-list  .active span{
         background:#FFF7F7;
         }
         .tabs-list  .active a{
         box-shadow: 0 2px 4px 3px rgb(238 211 215 / 30%);
         }
         .tabs-list  a .redimg{
         display:none;
         }
         .tabs-list .active .redimg{
         display:block;
         }
         .tabs-list li span{
         background:#DFDFDF;
         }
         #overlay{
         display: none;
         position: fixed;
         top: 0%;
         left: 0%;
         width: 100%;
         height: 100%;
         background-color: black;
         z-index:1001;
         }
         #overlay-content{ 
         position: fixed;
         width: 100%;
         height: 100%;
         background-color: red;
         text-align:center
         }
         #text{
         margin-top:150%;
         font-size:25px;
         text-align:center;
         color:#fff;
         font-weight:600;
         }
         .word-bx{
         font-size: 10px;
         font-weight: 100;
         color: #eee;
         }
         .cssbox {
         overflow: hidden;
         position: relative;
         display: flex;
         height: 30px;
         }
         .swipetext {
         vertical-align:middle;
         color: #000000;
         font-weight: 400;
         font-size: 16px;
         padding: 0 10px;
         height: 45px;
         margin-bottom: 45px;
         display: block;
         }
         .words { 
         animation: words 10s cubic-bezier(0.23, 1, 0.32, 1.2) infinite; 
         }
         @keyframes words {
         0% {
         margin-top: -360px; 
         }
         5% {
         margin-top: -270px; 
         }
         25% {
         margin-top: -270px; 
         }
         30% {
         margin-top: -180px; 
         }
         50% {
         margin-top: -180px; 
         }
         55% {
         margin-top: -90px; 
         }
         75% {
         margin-top: -90px; 
         }
         80% {
         margin-top: 0px; 
         }
         99.99% {
         margin-top: 0px; 
         }
         100% {
         margin-top: -270px; 
         }
         }
         .headerflag1{
         margin-left:14px;
         width: 100px;
         height: 45px;
         margin-top: -2px;  
         }
         .download1{
           width: 45px;
           height: 45px;   
           margin-top: -70px;  
          margin-right:-10px;
         }
         .headerflag{
           width: 70px;
           height: 43px;   
           margin-top: 5px;  
          margin-left:10px;
          border-radius: 5px;
           border: 1px ;
         }
         .appHeader1{
          color:#000;   
           width: 70px;
           height: 58px;  
           background:#151963;
         }
      </style>
   </head>
   <body style="background:#F9FAFB">
      <div id="overlay">
         <div id="overlay-content">
            <div id="text">
               7 LOTTERY
            </div>
         </div>
      </div>
      <?php
         include("include/connection.php");
         include("include/homepage.php");
         $userid=$_SESSION['frontuserid'];
         ?>
      <div class="mainLayout">
         <div id="myHeader" class="appHeader1 sticky">
            <div class="left"><img class="headerflag" src="home/assets/images/home/ausflag.png" alt="us"/></div>
             <div class="pageTitle"><img class="headerflag1" src="512x512bb.jpg" alt="us"/></div>
            <div class="pull-right ">
               <a href="JK-EUR.apk" class="icon goBack"> <img class="download1" alt="back" src="home/assets/images/home/down.png" class="back"> </a>
            </div>
         </div>
         <div style="padding-top:65px" id="" class="banner">
            <div id="demo" class="carousel slide" data-ride="carousel">
               <!-- The slideshow -->
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="home/assets/images/home/banner1.png" alt="banner1" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                     <img src="home/assets/images/home/banner2.png" alt="Banner2" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                     <img src="home/assets/images/home/banner3.png" alt="Banner2" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                     <img src="home/assets/images/home/banner4.png" alt="Banner2" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                     <img src="home/assets/images/home/banner5.png" alt="Banner2" width="1100" height="500">
                  </div>
                  <div class="carousel-item">
                     <img src="home/assets/images/home/banner6.png" alt="Banner2" width="1100" height="500">
                  </div>
               </div>
            </div>
         </div>
         <div id="" class="notice">
            <div class="col-md-1 notice_icon"><i style="color:#ed6a0c; font-size:30px;margin-left:-10px;" class="fa fa-volume-up"></i></div>
            <div class="col-md-5 notice_details">
               <marquee style="color:#ed6a0c;font-weight:600;">
                  <?php $sqlget = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting WHERE id  =  1"));
                     $telegram = $sqlget['note']; echo $telegram;?>
               </marquee>
            </div>
            <div class="col-md-5 notice_text">
               <span class="notice_title">
                  <img alt="latest" src="home/assets/images/home/notice-right.5fdac404.svg" />
                  <span>Latest Announcement
                  </span>
            </div>
         </div>
         <div style="margin-top:15px;"class="container-fluid" style=" background-color: #fafbfc;">
         <div class="card" style="margin: 0 auto; display:table;border: none !important;">
         <div class="card-body">
         <div class="row">
         <div class="stage">
         <div class="box bounce-1"><img  src="home/assets/images/home/pool.png" alt="pool" ><br><i style="color:red;margin-left:40px;margin-top:-25px;font-size:20px" class="fa fa-caret-up"></i></div>
         </div>
         <div class="stage">
         <div class="box bounce-2"><img src="home/assets/images/home/shark.png" alt="shark" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-3"><img src="home/assets/images/home/777png.png" alt="sven" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-4"><img src="home/assets/images/home/1000coins.png" alt="coins" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-5"><img src="home/assets/images/home/bollyball.png" alt="bollyball" /></div>
         </div>
         </div>
         <div class="row">
         <div class="stage">
         <div class="box bounce-1"><img  src="home/assets/images/home/pool.png" alt="pool" ><br><i style="color:red;margin-left:40px;margin-top:-25px;font-size:20px" class="fa fa-caret-up"></i></div>
         </div>
         <div class="stage">
         <div class="box bounce-2"><img src="home/assets/images/home/shark.png" alt="shark" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-3"><img src="home/assets/images/home/777png.png" alt="sven" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-4"><img src="home/assets/images/home/1000coins.png" alt="coins" /></div>
         </div>
         <div class="stage">
         <div class="box bounce-5"><img src="home/assets/images/home/bollyball.png" alt="bollyball" /></div>
         </div>
         </div>
         </div>
         </div>
         <div class="game-card-1" style="">
         <div   onclick="document.location='/win.php'" class="card-body">
         <img class="card-img-top" src="home/assets/images/home/940balls.png" alt="Cardcap">
         <h5 class="card-title">5 Min Wingo</h5>
         <p> Guess number/Green/Purple/Red to win </p>
         </div>
         <div class="v-slider">
         <div class="word-bx">
         <div class="cssbox">
         <ul class="words">
         <li class="swipetext"> <span style="color:black;">  
         <img alt="avatar" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.'$nami"';?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount5;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="avatarh" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami2;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount6;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="avatarhe" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami3;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount7;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="avatarimg" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami4;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount8;?></span>    
         </li>
         </ul>
         </div>
         </div>
         </div>
         </div>
           <div class="game-card-3" style="">
            <div   onclick="document.location='/win1min.php'" class="card-body">
         <img class="card-img-top" src="home/assets/images/home/940balls.png" alt="Carcap">
         <h5 class="card-title">1 Min Lottery</h5>
         <p> BIG/NUMBERS/SMALL to win </p>
         </div>
         <div class="v-slider  ">
         <div class="word-bx">
         <div class="cssbox">
         <ul class="words">
         <li class="swipetext"> <span style="color:black;">  
         <img alt="chdkj" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami9;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount13;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="imgacv" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami10;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount14;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="sdcds" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami11;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount15;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="fgdfgdf" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami12;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount16;?></span>    
         </li>
         </ul>
         </div>
         </div>
         </div>
         </div>
         <div class="game-card-2" style="">
        <div  class="card-body">    
         <img class="card-img-top" src="home/assets/images/home/zoo.png" alt="Cardcap">
         <h5 class="card-title">Zoo Roulette</h5>
         <p>  Guess Bird/Animal To win  </p>
         </div>
         <div class="v-slider  ">
         <div class="word-bx">
         <div class="cssbox">
         <ul class="words">
         <li class="swipetext"> <span style="color:black;">  
         <img class="avatar-img" alt="avatarg" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami5;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount9;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="avatarim" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami6;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount10;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="homea" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami7;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount11;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="imgavatar" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami8;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount12;?></span>    
         </li>
         </ul>
         </div>
         </div>
         </div>
         </div> 
       
         <div class="game-card-4" style="">
            <div  class="card-body">
         <img class="card-img-top" src="home/assets/images/home/tandg.png" alt="Cardcap">
         <h5 class="card-title">Tiger Dragon</h5>
         <p> Coming Soon </p>
         </div>
         <div class="v-slider  ">
         <div class="word-bx">
         <div class="cssbox">
         <ul class="words">
         <li class="swipetext"> <span style="color:black;">  
         <img alt="sacsac" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami13;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount17;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="sac54t" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami14;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount18;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="sacs5" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami15;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount19;?></span>    
         </li>
         <li class="swipetext"> 
         <img alt="asdfcsdg6" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/>  
         <?php echo 'Member'.$nami16;?>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;€<?php echo $amount20;?></span>    
         </li>
         </ul>
         </div>
         </div>
         </div>
         </div>
         <div class="card" style="margin-top:15px;">
         <img class="" src="home/assets/images/home/bonus.png" alt="Carcap">
         <div style="margin-top:-72px; text-align:center">
         <span style="color:#FEEED7; font-size:20px;font-weight:500">€ 597421.06</span>
         </div>
         <img style="margin-top:-138px;" src="home/assets/images/home/dollercoins.png" alt="Cardap">
         </div>
         <div class="counter mt-5">
         <p style="color:#2D3F50; font-size:20px;font-weight:400"  id="head" class="text-center">WEBSITE RUNNING TIME</p>
         <ul>
         <li>
         <span id="days"></span>
         <hr>
         <p>DAYS</p>
         </li>
         <li>
         <span id="hours"></span>
         <hr>
         <p>HOURS</p>
         </li>
         <li>
         <span id="minutes"></span>
         <hr>
         <p>MINUTES</p>
         </li>
         <li>
         <span id="seconds"></span>
         <hr>
         <p>SECONDS</p>
         </li>
         </ul>
         </div>
         </div>
         <div class="container player-stat" style=" background-color: #fafbfc; margin-bottom:-15px;">
            <ul>
               <li>
                  <img alt="asd43" src="./home/assets/images/home/whiteuser.png" />
                  <div class="player-stat-p">
                     <p  style="font-size:17px; margin:-5px 0px">876454</p>
                     <p style="color:#CAB0FF; font-size:15px; font-weight:400">Player</p>
                  </div>
               </li>
               <li>
                  <img alt="sag87" src="./home/assets/images/home/boardusers.png" />
                  <div class="player-stat-p">
                     <p style="font-size:17px; margin:-5px 0px">876544</p>
                     <p  style="color:#CAB0FF; font-size:15px; font-weight:400">Total betting</p>
                  </div>
               </li>
               <li>
                  <img alt="wefwe434" src="./home/assets/images/home/whiteusers.png" />
                  <div class="player-stat-p">
                     <p style="font-size:17px; margin:-5px 0px">767582</p>
                     <p  style="color:#CAB0FF; font-size:15px; font-weight:400">Online</p>
                  </div>
               </li>
            </ul>
         </div>
         <style>
            .table {
            display: table;
            width: 100%;
            table-layout: fixed;
            border-collapse: collapse;
            list-style: none;
            margin-bottom:-20px;
            margin-top:-5px;
            margin-left:-8px;
            }
            .table li {
            display: table-cell;
            text-align: center;
            }
         </style>
         <div style="height:25px;background-color: #fafbfc !important;"></div>
         <div class="container-fluid" style="background:#fafbfc;">
            <div class="card" style="border:none;position:relative;text-align:center;">
               <span class="ribbon">Todays Withdrawal</span>
               <img alt="asdcew5" src="home/assets/images/home/ribbon.png" />
            </div>
            <div class="card player-list" style=" background-color: #fafbfc;justify-content:center">
               <ul style="margin-top:2px; text-align:center">
                  <li class="fade-item">
                     <ul class="table ">
                        <li><img alt="j675wed" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/></li>
                        <li><?php echo $name;?></li>
                        <li class="" style="color:red;font-weight: 600;">€<?php echo $amount;?></li>
                        <li><?php echo $formatDate1;?></li>
                     </ul>
                  </li>
                  <li class="fade-item">
                     <ul class="table">
                        <li><img alt="dasdwq3" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/></li>
                        <li><?php echo $name1;?></li>
                        <li class="" style="color:red;font-weight: 600;">€<?php echo $amount1;?></li>
                        <li><?php echo $formatDate2;?></li>
                     </ul>
                  </li>
                  <li class="fade-item">
                     <ul class="table">
                        <li><img alt="wef7u67" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/></li>
                        <li><?php echo $name2;?></li>
                        <li class="" style="color:red;font-weight: 600;">€<?php echo $amount2;?></li>
                        <li><?php echo $formatDate3;?></li>
                     </ul>
                  </li>
                  <li class="fade-item">
                     <ul class="table">
                        <li><img alt="wef45" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/></li>
                        <li><?php echo $name3;?></li>
                        <li class="" style="color:red;font-weight: 600;">€<?php echo $amount3;?></li>
                        <li><?php echo $formatDate4;?></li>
                     </ul>
                  </li>
                  <li class="fade-item">
                     <ul class="table">
                        <li><img alt="ewef445" class="avatar-img" src="home/assets/images/home/avatar.cfa8dd9d.svg"/></li>
                        <li><?php echo $name4;?></li>
                        <li class="" style="color:red;font-weight: 600;">€<?php echo $amount4;?></li>
                        <li><?php echo $formatDate5;?></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="card htw" style="background: #f5f5f8;">
               <div class="">
                  <span class="htwspan" style="margin:0 auto;display:table;">How it works ?</span>
                  <div>
                     <div class="how-it-works row">
                        <div class="col-md-12 tabs">
                           <ul class="tabs-list">
                              <li class="active" >
                                 <a href="#tab1">
                                    <span>First Step</span>
                                    <p>Choose a game</p>
                                    <img alt="game1" src="home/assets/images/home/whitefirst.png" style="float:right;width:35px;height:35px;"/>
                                    <img alt="game2" class="redimg" src="home/assets/images/home/redfirst.png" style="float:right;width:35px;height:35px;"/>
                                 </a>
                              </li>
                              <li >
                                 <a href="#tab2">
                                    <span>Second Step</span>
                                    <p>Pick your game...</p>
                                    <img alt="game3" src="home/assets/images/home/whitesecond.png" style="float:right;width:35px;height:35px;"/>
                                    <img alt="game4" class="redimg" src="home/assets/images/home/redfirst.png" style="float:right;width:35px;height:35px;"/>
                                 </a>
                              </li>
                              <li >
                                 <a href="#tab3">
                                    <span> Third Step</span>
                                    <p>Bet Amount</p>
                                    <img alt="game5" src="home/assets/images/home/whitethree.png" style="float:right;width:35px;height:35px;"/>
                                    <img alt="game6" class="redimg" src="home/assets/images/home/redthree.png" style="float:right;width:35px;height:35px;"/>
                                 </a>
                              </li>
                              <li >
                                 <a href="#tab4">
                                    <span>Fourth Step</span>
                                    <p>Get Bonus</p>
                                    <img alt="game7" src="home/assets/images/home/whitefour.png" style="float:right;width:35px;height:35px;"/>
                                    <img alt="game8" class="redimg" src="home/assets/images/home/redfour.png" style="float:right;width:35px;height:35px;"/>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- test -->
         <div class="tabs home-how">
            <div id="tab1" class="tab active">
               <span class="how-title text-center">Choose a game</span><br/>
               <span class="how-des">You can choose to play 1 minute, 3 minutes, 4 minutes, and 10 minutes Lottery games.</p>
            </div>
            <div id="tab2" class="tab ">
               <span class="how-title text-center">Pick your game</span><br/>
               <span class="how-des">Choose your lucky number or color.</span>
            </div>
            <div id="tab3" class="tab">
               <span class="how-title text-center">Bet Amount</span><br/>
               <span class="how-des">Choose the amount you want to bet and confirm.</span>
            </div>
            <div id="tab4" class="tab">
               <span class="how-title text-center">Get Bonus</span><br/>
               <span class="how-des">When you select the lucky number of the current period, the system will automatically add the bonus to your balance</span>
            </div>
         </div>
         <!-- end -->
         <!-- <div class="" style="width:384px">
            <img class="stickysideImage" src="home/assets/images/home/support.png"  />
            </div> -->
      </div>
      </div>
      <br> <br>
      <br>
      <br>
      <a href="help.php" target="_blank" class="fixed_kefu">
      <img alt="gamehelp" src="./home/assets/images/home/support-modified.png">
      </a>
      <!-- Jquery --> 
      <?php include("include/footer.php");?>
      <script src="home/assets/js/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="home/assets/js/popper.min.js"></script> 
      <script src="home/assets/js/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="home/assets/js/owl.carousel.min.js"></script> 
      <!-- Tween Max -->
      <script src="home/assets/js/tweenmax.js"></script> 
       <?php  include("include/pagestrick.php");?>
      <!-- Main Js File --> 
      <script >
         const second = 1000,
         minute = second * 60,
         hour = minute * 60,
         day = hour * 24;
         
         let countDown = new Date('May 27, 2021 20:00:00').getTime(),
                          x = setInterval(function() {
                                            let now = new Date().getTime(),
                                            distance = now - countDown;
                                            document.getElementById('days').innerText = Math.floor(distance / (day)),
                                            document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                                            document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                                            document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);
                                          }, second);
         
         var items = document.getElementsByClassName("fade-item");
         for (let i = 0; i < items.length; ++i) {
          fadeIn(items[i], i * 1000)
         }
         
         function fadeIn (item, delay) {
          setTimeout(() => {
            item.classList.add('fadein')
          }, delay)
         }
         $(document).ready(function(){
         
         $(".tabs-list li a").click(function(e){
         e.preventDefault();
         });
         
         $(".tabs-list li").click(function(){
         var tabid = $(this).find("a").attr("href");
         $(".tabs-list li,.tabs div.tab").removeClass("active");   // removing active class from tab
         
         $(".tab").hide();   // hiding open tab
         $(tabid).show();    // show tab
         $(this).addClass("active"); //  adding active class to clicked tab
         
         });
         
         });
         
         var vsOpts = {
         $slides: $('.v-slide'),
         $list: $('.v-slides'),
         $slides2: $('.v-slide2'),
         $list2: $('.v-slides2'),
         $slides3: $('.v-slide3'),
         $list3: $('.v-slides3'),
         $slides4: $('.v-slide4'),
         $list4: $('.v-slides4'),
         duration: 40,
         lineHeight: 50
         }
         
         var vSlide = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide2 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide3 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         var vSlide4 = new TimelineMax({
         paused: false,
         repeat: 1
         });
         
         vsOpts.$slides.each(function(i) {
         console.log('length : '+ vsOpts.$slides.length);
         vSlide.to(vsOpts.$list, vsOpts.duration / vsOpts.$slides.length, {
          y: i * -1 * 70,
          ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide.play();
         
         vsOpts.$slides2.each(function(i) {
         console.log('length2 : '+ vsOpts.$slides2.length);
         vSlide2.to(vsOpts.$list2, vsOpts.duration / vsOpts.$slides2.length, {
          y: i * -1 * 70,
          ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide2.play();
         
         vsOpts.$slides3.each(function(i) {
         console.log('length3 : '+ vsOpts.$slides3.length);
         vSlide3.to(vsOpts.$list3, vsOpts.duration / vsOpts.$slides3.length, {
          y: i * -1 * 70,
          ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide3.play();
         
         vsOpts.$slides4.each(function(i) {
         console.log('length4 : '+ vsOpts.$slides4.length);
         vSlide4.to(vsOpts.$list4, vsOpts.duration / vsOpts.$slides4.length, {
          y: i * -1 * 70,
          ease: Elastic.easeOut.config(1, 0.4)
         });
         });
         
         vSlide4.play();
         
         
      </script>
   </body>
</html>