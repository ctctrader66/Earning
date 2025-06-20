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
             z-index: 9999;
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
           width: 100px;
           height: 30px;   
           margin-top: 5px;  
          margin-left:10px;
          border-radius: 5px;
           border: 1px ;
         }
         .appHeader1{
            color: #000;
            width: 100%;
            height: 50px;
            background: #f7f8ff;
         }
         
         .pull-right img{
             width:30px;
         }
         .pull-right{
             margin-right: 0px;
         }
         .notice{
                display: -webkit-box;
            display: -webkit-flex;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            align-items: center;
            width: 100%;
            height: 55px;
            padding-inline: 0.26667rem;
            color: #303a4c;
            font-size: 12px;
            border-radius: 30px;
            background: #fff;
            box-shadow: 0 3px 3px #d0d0ed4d;
         }
         
.notice_title {
        width: 66%;
    /* padding: 0 0.26667rem; */
    display: inline-block;
    /* line-height: .8rem; */
    /* color: #fff; */
    height: 35px;
    right: 3px;
    top: -12px;
    position: absolute;
    /* padding: 5px; */
    background-color: #fff;
    background-image: url(./images/dtl.png);
    border-radius: 20px;
    color: #fff;
    background-size: 100px;
    background-repeat: no-repeat;
}
.notice_title img{
    width:40px;
}
.gamelist-box{
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    height: 100%;
    margin-top: 10px;
    width:100%;
}
.g-side-b{
    -webkit-flex-shrink: 0;
    flex-shrink: 0;
    -webkit-box-flex: 1;
    -webkit-flex-grow: 1;
    flex-grow: 1;
    /*width: 10%;*/
    overflow-y: auto;
    -webkit-overflow-scrolling: touch;
}
.game-type{
        
    
    background: url(images/bg-edc23a85.png) no-repeat;
    background-size: 100% 100% !important;
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
    padding: 0;
    font-weight: 500;
    
    background-size: 100% 100%;
    position: relative;
    display: block;
    box-sizing: border-box;
    padding: var(--van-sidebar-padding);
    overflow: hidden;
    color: var(--van-sidebar-text-color);
    font-size: var(--van-sidebar-font-size);
    line-height: var(--van-sidebar-line-height);
    
    cursor: pointer;
    -webkit-user-select: none;
    user-select: none;
}
.g-dtl{
    display: flex;
    height: 80px;
    flex-direction: column;
    align-items: center;
    
}
.g-dtl img{
    width: 50px;
    margin-top: 5px;
}
.g-dtl span{
    color:black;
    font-size: 14px;
}
.gm-b{
    position: sticky;
    top: 0;
    display: -webkit-inline-box;
    display: -webkit-inline-flex;
    display: inline-flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    width: 80%;
    height: -webkit-min-content;
    height: min-content;
    padding-left: 5px;
    
}
.gm-b-c{
    
}
.game-lb{
    position: relative;
    width: 100%;
     height: 100px;
    /* text-align: end; */
    background: -webkit-linear-gradient(324.57deg,#ff8e89 12.38%,#ffc3a2 87.13%);
    background: linear-gradient(125.43deg,#ff8e89 12.38%,#ffc3a2 87.13%);
    box-shadow: 0 -0.05333rem 0.13333rem #fff6f4 inset, 0 0.10667rem 0.21333rem 0.05333rem #d0d0ed5c;
    margin-bottom: 10px;
    border-radius: 20px;
    display: flex;
    justify-content: space-around;
    padding: 14px 6px;
}
.gm-t img{
    width:90px;
}
.gm-t p{
    margin: 0px;
    color: #f4f5f8;
    font-weight: 600;
    font-size: 12px;
    white-space: pre-wrap;
    /* text-align: left; */
    line-height: 20px;
}
.gm-t h{
    /*font-size:14px;*/
    /*margin:0px;*/
    color:#fff;
    white-space: break-spaces;
    font-weight: 700;
    font-size: 15px;
}
.wind-h h1{
    font-size: 20px;
    padding-left: 14px;
    font-weight: 700;
    color: #473e3e;
}
.wind-h h1::before {
        content: "";
    position: relative;
    top: 28px;
    left: -10px;
    z-index: 9999;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
    width: 4px;
    height: 15px;
    background: #f64646;
    display: block;
}
}
.wind-db{
        overflow: hidden;
}
.wind-dt{
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    width: 100%;
    /*height: 1.6rem;*/
    margin-bottom: 10px;
    padding: 0.26667rem 0.24rem;
    border-radius: 0.13333rem;
    background: #fff;
    box-shadow: 0 0.05333rem 0.21333rem #d0d0ed5c;
}
.wd{
    display: flex;
    flex-direction: row;
    align-items: center;
        padding: 8px;
}
.wind-lft img{
    width: 65px!important;
    border-radius: 50px;
}
.wind-lft span{
    color: #243047;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 700;
}
.r-txt {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    color: #243047;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    font-weight: 700;
}
.wd img{
    width:100px;
}
.place{
    position: relative;
    display: grid;
    grid-template-columns: repeat(3,1fr);
    justify-items: center;
    width: 100%;
    z-index: 1;
    height: 160px;
    margin-bottom: 30px;
    background: url(images/stage-f0b7a560.png) no-repeat center center/100% 100%;
}
.p-box{
        position: relative;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    width: 3rem;
    height: 3.46667rem;
}
.p-imgu{
    position: relative;
    display: grid;
    place-items: center;
    width: 80px;
    /* min-width: 65px; */
    /* height: 80px; */
    min-height: 80px;
    border-radius: 50%;
    overflow: hidden;
}
.p-imgb{
    position: absolute;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: justify;
    -webkit-justify-content: space-between;
    justify-content: space-between;
    width: 80px;
    height: 80px;
}
.p-imgu img{
    width: 80px;
    border-radius: 40px;
}
.p-imgb img{
    /*width: 70px;*/
    /*border-radius: 40px;*/
}
.ia{
    position: relative;
    top: -42px;
    left: -35px;
    width: 80px;
}
.ib{
    width: 110px;
    position: relative;
    left: -14px;
    top: 5px;
}
.p-txt {
    text-align: center;
    margin-top: 15px;
    color: #fff;
    font-weight: 700;
    font-size: 12px;
}
.am{
    padding: 2px 14px;
    border-radius: 20px;
    display: block;
    color: #fff;
    background: linear-gradient(90deg,#ff8f8b 1.19%,#ffbda0 97.86%);
}
.p-dt{
        position: relative;
    z-index: 2;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    flex-direction: column;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    gap: 0.21333rem;
    width: 100%;
    top: -40px;
}
.wind-db{
    width: 100%;
}
.carousel-item{
 border-radius: 20px;   
    
}


      </style>
   </head>
   <body style="background:#f7f8ff">
      <div id="overlay">
         <div id="overlay-content">
            <div id="text">
               
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
            <div class="left">
                <img class="headerflag" src="/images/logoaaaaicon.png" alt="us"/>
                </div>
             <div class="pageTitle"></div>
            <div class="pull-right ">
                <img src="./images/msg.png">
               <a href="MY-WINGO.apk" class="icon goBack"> <img  src="images/dwnld.png" > </a>
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
                     <img src="home/assets/images/home/banner66.png" alt="Banner2" width="1100" height="500">
                  </div>
               </div>
            </div>
         </div>
         
         
         <div id="" class="notice">
            <div class="col-md-1 notice_icon"><i style="color:#ed6a0c; font-size:25px;margin-left:-10px;" class="fa fa-volume-up"></i></div>
            <div class="col-md-5 notice_details">
               <marquee style="color:#ed6a0c;font-weight:600;">
                  <?php $sqlget = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting WHERE id  =  1"));
                     $telegram = $sqlget['note']; echo $telegram;?>
               </marquee>
            </div>
            <div class="col-md-5 notice_text">
               <span class="notice_title">
                  
                  
                  </span>
            </div>
         </div>
         
         
         
        <div class="gamelist-box">
            <div class="g-side-b">
                <div class="game-type" style="background: url(images/bgActive-805fae0e.png) no-repeat;">
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamecategory_20230714010207qmfa.png">
                        <span> Mini Games</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                <div class="game-type">
                    
                    <div class="g-dtl">
                        <img src="images/gamw.png">
                        <span> Lottery</span>
                        
                    </div>
                    
                </div>
                
                
            </div>
            
            <div class="gm-b">
                
                <div class="gm-b-c" onclick="window.location.href='win';">
                    
                    <div class="game-lb">
                        <div class="gm-t">
                            
                            <h> Win go</h>
                            <p style="margin-top: 8px;">Guess Number</p>
                            <p>Big/Small to win</p>
                            
                        </div>
                        <div class="gm-t">
                            <img src="images/lotterycategory_202307140102511fow.png">
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                <div class="gm-b-c">
                    
                    <div class="game-lb"onclick="window.location.href='win1min';">
                        <div class="gm-t">
                            
                            <h> INR Win</h>
                            <p style="margin-top: 8px;">Guess Number</p>
                            <p>Big/Small to win</p>
                            
                        </div>
                        <div class="gm-t">
                            <img src="images/lotterycategory_20230714010246lyuc.png">
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                <div class="gm-b-c">
                    
                    <div class="game-lb"onclick="window.location.href='win';">
                        <div class="gm-t">
                            
                            <h> K3</h>
                            <p style="margin-top: 8px;">Guess Number</p>
                            <p>Green/Red/Purple to win</p>
                            
                        </div>
                        <div class="gm-t">
                            <img src="images/lotterycategory_20230714010227swu2.png">
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                <div class="gm-b-c">
                    
                    <div class="game-lb"onclick="window.location.href='win1min';">
                        <div class="gm-t">
                            
                            <h> 5 D</h>
                            <p style="margin-top: 8px;">Guess Number</p>
                            <p>Green/Red/Purple to win</p>
                            
                        </div>
                        <div class="gm-t">
                            <img src="images/lotterycategory_2023071401023322dy.png">
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
                
                
            </div>
        </div>
        
        
        
        
        <div class="wind-b">
            <div class="wind-h">
                <h1>Winning Information</h1>
            </div>
            
            <div class="wind-db">
                
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+843****36849</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>34.5 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+187****63572</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>68.32 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+927****08964</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>276.3 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+449****79732</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>102.6 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+917****30075</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>1132.9 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+621****76209</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        <div class="r-img">
                            <img src="images/WinGo-35d04760.png">
                        </div>
                        <div class="r-txt">
                            <span> Win</span>
                            <span>1902.1 INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                
            </div>
            
            
        </div>
        
        
        <div class="wind-b">
            <div class="wind-h">
                <h1>Today's earnings chart</h1>
            </div>
            
            
            <div class="wind-db" style="margin-top: 100px;">
                
                
                
                <div class="place">
                    
                    <div class="p-box">
                        
                        <div class="p-imgu" style="top: -23px;">
                            <img src="images/15-80f41fc6.png">
                        </div>
                        <div class="p-imgb" style="top: -23px;">
                            <img class="ia" src="images/crown2-c8aced52.png">
                            <img class="ib" src="images/place2-8189be28.png">
                            
                        </div>
                       <div class="p-txt">
                         <span>+84776****8734</span>
                         <span class="am">3904$</span>
                       </div>
                        
                        
                        
                    </div>
                    <div class="p-box">
                        
                        <div class="p-imgu" style="top: -50px;">
                            <img src="images/7-00479cfa.png">
                        </div>
                        <div class="p-imgb" style="top: -50px;">
                            <img class="ia" src="images/crown1-3912fd85.png">
                            <img class="ib" src="images/place1-fe39c3f3.png">
                            
                        </div>
                        <div class="p-txt">
                         <span>+92923***2395</span>
                         <span class="am">3587$</span>
                       </div>
                        
                        
                        
                    </div>
                    <div class="p-box">
                        
                        <div class="p-imgu" style="top: -20px;">
                            <img src="images/1-a6662edb.png">
                        </div>
                        <div class="p-imgb" style="top: -20px;">
                            <img class="ia" src="images/crown3-2ca02146.png">
                            <img class="ib" src="images/place3-d9b0be38.png">
                            
                        </div>
                        <div class="p-txt">
                         <span>+446108***4382</span>
                         <span class="am">3143$</span>
                       </div>
                        
                        
                        
                    </div>
                    
                </div>
                
                <div class="p-dt" >
                    
                    
                    
                    
                    
                    <div class="wind-db">
                
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+9233***67252</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span>2983</span>
                            <span>INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+9230***21726</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span> 2887</span>
                            <span>INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+9195***67432</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span> 2673</span>
                            <span>INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+1544***90003</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span> 2358</span>
                            <span>INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+6254***43543</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span> 2019</span>
                            <span>INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="wind-dt">
                    <div class="wind-lft wd">
                        <div class="wind-img">
                            <img src="images/1-a6662edb.png">
                            <span>+8154***67540</span>
                        </div>
                        
                    </div>
                    <div class="wind-rigt wd">
                        
                        
                        <div class="r-txt am" style="font-size: 18px;font-size: 18px;width: 140px;text-align: center;margin-left: 5px;">
                            <span> 1365</span>
                            <span> INR</span>
                        </div>
                        
                    </div>
                    
                </div>
                
                
            </div>
                    
                </div>
                
                
                
                
                
                </div>
            
            
        </div>
       
         <!-- test -->
       
         <!-- end -->
         <!-- <div class="" style="width:384px">
            <img class="stickysideImage" src="home/assets/images/home/support.png"  />
            </div> -->
      </div>
      </div>
      <br>
      <br>
      <br>
      <a href="help" target="_blank" class="fixed_kefu">
      <img alt="gamehelp" src="./images/icon_sevice-9f0c8455.png">
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