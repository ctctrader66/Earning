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
         background: #fd877f;
         background-size: cover;
         height:220px;
         margin:0px;
         border-radius: 0 0 0.9rem 0.9rem;
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
         font-size: 12px;
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
         font-size:15px;
         }
         .contentBox.long .contentBox-body {
    border-radius: 20px 20px 20px 20px;         
    background: #fff;
    margin-left: -20px;
    margin-right: -20px;
    padding: 20px;
     border-top: none; 
     border-bottom: none; 
}
.appContent1 {
    padding: 0 20px;
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
         .profit{height:60px;}
         .wallet{height:25px;float:left;}
         #quick-links  .quick-links-box a{
         text-align: center;
         }
         #quick-links .quick-links-box{
         margin-top:-90px;
         border-radius: 7px 7px 5px  5px;
         padding: 20px 20px;
         background-color: #fff;
         position: relative;
         width: 100%;
         height:160px;
         box-shadow: 0 0.05333rem 0.21333rem 0.02667rem #d0d0ed5c;
         color: #5E5E5E;
         font-weight: 500;
         text-align: center;
         }
         #quick-links  .quick-links-box1 a{
         text-align: center;
         }
         #quick-links .quick-links-box1{
         background: #fd877f;
         background-size: cover;
         height:125px;
         margin-top:90px;
         
         border-radius: 10px;
         background-size: 100% 100%;
         box-shadow: 0 0 0px 0px rgb(92 186 71 / 60%);
         padding: 10px 10px;
         background-color: #fff;
         position: relative;
         margin:0 -35px;
         margin-bottom:15px;
         margin-top:-40px;
         height:125px;
         color: #5E5E5E;
         font-weight: 500;
         text-align: center;
         }
         .banner{
         margin: 0 .4rem .4rem;
         height: 1.38667rem;
         background: linear-gradient(90.13deg,#ff8e8a .14%,#ffc1a1 99.92%) no-repeat 0 0;
         border-radius: 0.26667rem;
         background-size: 100% auto;
         font-size: .53333rem;
         color: #fff;
         position: relative;
         display: flex;
         flex-direction: row;
         align-items: center;
         width: 98%;
         margin: -6px 4.21px;
         padding: 6px 8px;
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
         width:35px;
         height:35px;
         margin-bottom:0px;
         }
         .imggg{
             margin-left: -30px;
             margin-right: 12px;
             width: 25px;
             height: 25px;
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
         margin:0 16px;
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
         .walletimg1{width:20px;margin-left:10px;}
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
             color: #fc6d69;
    border: 1px solid #fc6d69;
    line-height: 20px;
    padding: 4px 12px;
    background: transparent;
    text-align: center;
    border-radius: 16px;
    font-size: 14px;
    
         }
         .child a button{
         color: #fff;
    background: #fc6d69;
         }
         
         .container1{
         text-align:center;
         padding:20px;
         }
         .dtl{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            position: relative;
            top: 30px;
            left: -35px;
         }
         .d1{
             padding: 0px 10px;
             font-size: 18px;
             font-weight: 700;
             color: #fff!important;
             letter-spacing: 2px;
         }
         .d2 span{
             font-size: 12px;
             /*font-weight: 600;*/
             /*letter-spacing: 4px;*/
             /*font-size: 18px;*/
             font-weight: 600;
             color: #fff!important;
             letter-spacing: 1px;
         }
         .id{
             width: auto;
             background: #ff9495;
             border-radius: 0.53333rem;
             padding: 0px 4px;
             margin-left: 0px;
             color: #fff;
             font-size: 12px !important;
             display: -webkit-box;
             display: -webkit-flex;
             display: flex;
             -webkit-box-align: center;
             -webkit-align-items: center;
             align-items: center;
             -webkit-justify-content: space-around;
             justify-content: flex-start;
             
         }
         .intro img{
             width:40px;
         }
         .intro1{
             font-size: 12px !important;
         }
         .blnc{
             margin-top: 0px !important;
             display: flex;
             flex-direction: row;
             align-items: center;
             justify-content: flex-start;
             padding: 6px 0px;
         }
         .blnctrx{
             margin-left: 233px;
             margin-top: -32px !important;
             display: flex;
             flex-direction: row;
             align-items: center;
             justify-content: flex-start;
             padding: 6px 0px;
         }
         .qlp{
             display: flex;
             flex-direction: row;
             justify-content: space-evenly;
             align-items: center;
             padding: 10px 2px;
             border-top: 1px solid #e6e8e8;
         }
         .ql img{
             width:25px;
         }
         .ql span{
             font-size:12px;
         }
        
        .ql{
            display: flex;
            flex-direction: column;
            align-items: center;
         }
         .iup{
             font-size:12px;
         }
         .idp{
             font-size:12px;
         }
         .int{
             padding: 0px 10px;
         }
         .quil{
             margin-top: -2px;
             font-size: 12px;
             display: flex;
             flex-direction: row;
             justify-content: space-around;
         }
         .colm1{
             display: flex;
             padding: 18px 10px;
             background: #fff;
             box-shadow: 0 0.05333rem 0.21333rem #d0d0ed5c;
             border-radius: 6px 6px 6px 6px;
             width: 163px;
             height: 70px;
             margin: 6px 8px;
         }
         .colm1 h3{
            font-size: 12px;
            font-weight: 800;
             margin-bottom: 0;
         }
         .colm1 span{
            font-size: 12px;
            font-weight: 400;
             margin-bottom: 0;
         }
         .colm1 div{
             width: fit-content;
             height: fit-content;
             line-height: 12px;
         }
         .lgt{
                 margin-bottom: 90px;
                     display: flex;
                 justify-content: center;
         }
         .lgta{
                 width: 80%;
                 text-align: center;
                 border: 1px solid #666 !important;
                 border-radius: 20px;
                 padding: 3px;
                 color:#666 !important;
         }
         .blnc{
             display: flex;
    flex-direction: column-reverse;
    align-items: center;
         }
         .blnc-box{
            color: #000;
    font-size: 14px;
    font-weight: 600;
    display: flex;
    align-items: center;
    width: 100%;
        flex-direction: column;
        }
        .bs{
                width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
        }
        .walletimg1{
            height: 20px;
            /*padding: 0 10px;*/
            position: relative;
            top: 0px;
            left: 0px;
         }
         .blt{
                 width: 100%;
    display: flex;
    justify-content: center;
    margin-top: -10px;
    margin-bottom: 15px;
    padding-bottom: 8px;
    border-bottom: 1px solid #fd565c;
         }
      </style>
   </head>
   <body style="background:#f7f8ff">
      <?php
         include("include/connection.php");
        // include("loading.php");
        $userid=$_SESSION['frontuserid'];
         
         ?>
      <!-- Page loading -->
    
      <!-- App Header -->
      <div class="appContent3 content text-white">
         <div class="dtl" style="">
            <div class="d1"> <img class="img-circle img-bordered-lg profit" src="images/girl.png"> </div>
            <div class="d2">
               <span class="intro"><?php echo user($con,'username',$userid);?> <img src="./images/vip.png"></span><br>
               <span class="id">UID:   &nbsp;&nbsp;|&nbsp;&nbsp;<?php echo user($con,'id',$userid);?></span>
               <span class="intro1">Mobile:+84<?php echo substr(user($con,'mobile',$userid),0,-8);?>**<?php echo substr(user($con,'mobile',$userid), 4);?></span>
            </div>
            <!--<a class="rightic" href="profile.php"><i class="fa fa-angle-right" style="color:white; font-size:27px"></i></a>-->
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
                      
                      
                     <div class="blnc">
                    <div class="blnc-box">
                        
                        
                    <div style="text-align:center;" class="blt">
                        <img class="wallet" src="images/wlt.png"> 
                        <p style="color:#cacaca; font-size:14px; font-weight:400;">Wallet Balance</p>
                        
                     </div>
                    <div class="bs">
                        
                        
                        <div>
                            INR   <span style="margin-left:14px">:</span> <span id="trx_balance"  ><?php echo number_format(wallet($con,'amount',$userid), 2);?></span><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img class="walletimg1" id="spin-image" src="images/rld.png"></a>
                            
                        </div>
                    </div>
                        
                         
                          
                    </div>
                    
                    
                </div>
                     
                     
                     <div class="qlp">
                         
                         <div class="ql" onclick="window.location.href='wallet';">
                            <img src="./images/wlt.png">
                            <span>Wallet</span>
                         </div>
                         <div class="ql" onclick="window.location.href='recharge.php';">
                            <img src="./images/dpt.png"> 
                            <span>Deposit</span>
                         </div>
                         <div class="ql" onclick="window.location.href='withdrawals';">
                            <img src="./images/wtl.png"> 
                            <span>Withdraw</span>
                         </div>
                         <div class="ql">
                            <img src="./images/vp.png"> 
                            <span>VIP</span>
                         </div>
                         
                         
                         
                         
                        <!--<div  class="col-6 text-center" style="border-right:2PX solid #FF350A;"> <span class="bottomtext"> Today Bet<br>€-->
                        <?php 
                        // $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_walletsummery` where userid = '".$userid."' and date(`createdate`)='".$today."' and actiontype = 'join' "); $wagar_bet1=mysqli_fetch_array($total_bet1); $total_bet = $wagar_bet1['total1']; echo round($total_bet,1);
                        ?>
                        <!--</span></div>-->
                        
                        <!--<div class="col-6 text-center">-->
                        <!--   <span class="bottomtext"> Total Bet<br>€-->
                           <?php 
                        //   $total_bet1 = mysqli_query($con,"SELECT sum(amount) as total1 FROM `tbl_walletsummery` where userid = '".$userid."' and actiontype = 'join' ");
                        //               	$wagar_bet1=mysqli_fetch_array($total_bet1);
                        //               $total_bet = $wagar_bet1['total1']; echo round($total_bet,1);
                                      ?>
                                      <!--</span>-->
                        </div>
                        
                        
                        
                        
                     </div>
                  </div>
               </div>
               <br>
               <!--<div class="row align-items-center justify-content-between">-->
               <!--   <div  class="col-6 text-center">  <a style=""  href="recharges.php" class="btnss btn"> Deposit</a></div>-->
               <!--   <div class="col-6 text-center">-->
               <!--      <a class="btns btn" href="withdrawals.php">Withdraw</a>-->
               <!--   </div>-->
               <!--</div>-->
            </div>
         </div>
      </section>
      
      
      <div style="padding:12px;margin-top:-10px;">
         <div style="height:80px;"class="banner">
             <img style="width:40px;" src="images/vault-a933a89f.png">
             <div class="int">
                 <span class="iup">Safe </span><br>
                 <span class="idp">Daily interest rate 0.1%  + VIP extra income safe, calculated every 1 minute </span>
                 
                 
             </div>
            
         </div>
      </div>
      
      
      
      
      </div>
      
      
      <div style="" class="quil">
         <div class="colm1 " onclick="window.location.href='order';">
             
            
            <img class="three" src="images/trnx.png">
            <div>
                <h3 style="">Bet</h3>
                <span>My Bet History</span>
            </div>
             
            
         </div>
         <div class="colm1 " onclick="window.location.href='transactions';">
             <img class="three" src="images/trnsc.png">
            
            <div>
                <h3 style="">Transcation</h3>
                <span>My Transcation History</span>
            </div>
              
            
         </div>
         </div>
         
         
         <div style="" class="quil">
             
             
         <div class="colm1 " onclick="window.location.href='rechargehistory';">
             
             <img class="three" src="images/depo.png">
             <div>
                 
                 <h3 style=""> Deposit</h3>
                 <span>My Deposit History</span>
                 
             </div>
            
         </div>
         <div class="colm1 " onclick="window.location.href='withdrawalrecord';">
            <img class="three" src="images/withd.png">
            <div>
                <h3 style=""> Withdraw</h3>
                <span>My Withdraw History</span>
            </div>
            
         </div>
         </div>
      
      
      
      
      <div class="appContent1 ">
         <div class="contentBox long mb-2">
            <div class="contentBox-body card-body">
               <!-- listview -->
               <div class="accordion" id="accordionExample">
                  <div class="card-header cardheader">
                     <h3 class="mb-0"> <a href="resetpassword" class="btn btn-link collapsed"><img  class="imggg" src="images/stg.png">Setting</a> </h3>
                  </div>
                <!--  <div class="card-header">
                     <h3 class="mb-0"> <a href="mission.php" class="btn btn-link collapsed"><img  class="imggg" src="images/icons/mission.png">PROMOTE MISSION</a> </h3>
                  </div> -->
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="envelope" class="btn btn-link collapsed"><img  class="imggg" src="images/gift.png">Gifts</a> </h3>
                  </div>
                   <div class="card-header">
                     <h3 class="mb-0"> <a href="profile" class="btn btn-link collapsed"><img  class="imggg" src="images/gift.png">Profile</a> </h3>
                  </div>
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="newtutorial" class="btn btn-link collapsed"><img  class="imggg" src="images/beging.png">Beginer Guide</a> </h3>
                  </div>
                  <div class="card-header">
                     <h3 class="mb-0"> <a href="about" class="btn btn-link collapsed"><img  class="imggg" src="images/abt.png">About</a> </h3>
                  </div>
                   <div class="card-header">
                     <h3 class="mb-0"> <a href="about" class="btn btn-link collapsed"><img  class="imggg" src="images/abt.png">Language </a> </h3>
                  </div>
                  <div class="card-header cardheader1">
                     <h3 class="mb-0"> <a href="help" class="btn btn-link collapsed collapsed1"><img  class="imggg" src="images/servicec.png">Customer Service</a> </h3>
                  </div>
               </div>
               <!-- * listview --> 
           </div>
           
           
            
         </div>
        
      </div>
       <div class="lgt" style="">
               <a Onclick=window.location.href="logout" data-toggle="modal" href="#confirm" data-backdrop="static" data-keyboard="false"  class="lgta">Logout</a>
            </div>
      
      
            
            
      <div id="confirm" class="modal " role="dialog">
         <div style="" class="modal-dialog p-3" role="document">
            <div class="modal-content">
               <div class="container1">
                  <span class="tz_title"><img style="    width: 80px;" src="images/warn.png"></span>
                  <h1 class="mt-1 text-dark" style="font-size: 14px;">Do you want to log out?</h1>
               </div>
               <input type="hidden" id="id" name="id" value="">
               <input type="hidden" id="type" name="type" value="">
               <div class="parent">
                  <div style="border-radius:0 0 0 15px;" class="child">
                     <button  data-dismiss="modal">Cancel</button>
                  </div>
                  <div style="border-radius:0 0 15px 0; " class="child">
                     <a href="logout"><button onclick="logout">Confirm</button></a>
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
      
      <script>
         var spinImage = document.getElementById("spin-image");
         
         spinImage.addEventListener("click", function() {
         spinImage.classList.add("image-spin");
         
         setTimeout(function() {
         spinImage.classList.remove("image-spin");
         }, 2000);
         });
         
         function spini() {
            var spinImage = document.getElementById("spin-image1");

            spinImage.classList.add("image-spin");

            setTimeout(function() {
                spinImage.classList.remove("image-spin");
            }, 2000);
        }
         $(document).ready(function() {
    
    function updateBalances() {
        $.ajax({
            url: 'getwalletbalance.php',
            type: 'POST',
            data: { userid: '<?php echo $userid;?>' }, // Replace with actual user id
            dataType: 'json',
            success: function(data) {
                $('#trx_balance').text(data.trx_balance);
                $('#usdt_balance').text(data.usdt_balance);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('Error:', errorThrown);
            }
        });
    }

    // Call the function initially
    updateBalances();

    // Set an interval to refresh the balances every 10 seconds (adjust as needed)
    setInterval(updateBalances, 1000);
});
      </script>
      
      
      
   </body>
</html>