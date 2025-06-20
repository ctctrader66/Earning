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
         h5{ color:#888; font-size:20px; font-weight:normal;
             margin-bottom:18px;
         }
         h5 span{ color:#333; font-size:18px;}
         .divsize4 .btn{padding: 0 10px; width:100px;}
         .left-addon input {
         padding-left: 20px;
         }
         #payment .modal-dialog{position: absolute; bottom: 0; width: 100%;margin:0;}
         body {
         background: #fd565c;
         background-size: contain;
         background-repeat: no-repeat;      
         }
         .profit{height:68px;float:left;}
         .wallet{    height: 25px;
                     float: left;
                     margin-top: -5px;}
         .btnss{
         border-radius: 25px; height:40px; font-weight: 500; font-size: 14px;  
         width: 155px;
         margin: 0 auto;
         border: 1px solid #fd565c;
         color: #fff;
         background-color: #fd565c;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         font-weight: 600;
         }
         .btns{
         border-radius: 25px; height:40px; font-weight: 500; font-size: 14px;  
         width: 155px;
         margin: 0 auto;
         border: 1px solid #f3bd14;
         color: #FFF;
         background-color: #f3bd14;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
             font-weight: 600;
         }
         .headban{margin-top:60px;
             border-bottom-left-radius: 35px;
             border-bottom-right-radius: 40px;
                 background: #fd565c;
         }
         .underinfo{
                 padding: 10px;
                 margin-right: 0px;
                 margin-left: 0px;
                 background: #FFF;
                 border-radius: 30px;
         }
         .infobox{padding:10px 13px;margin-top:-15px;}
         .peroidbox{padding:10px 15px;margin-top:-5px;}
         .peroidbox .box{
            background: url(images/diban-0c200440.png);
    width: calc(100% - 0.69333rem);
    height: 115px;
    margin: 10px auto 0;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: 0px center;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    position: relative;
    color: #fff;
             box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);
             
         }
         .uppertbox{padding:10px 15px; margin-top:-10px;}
         .uppertbox .timebox{
             background:#fff;
             border-radius:8px;
             padding:2px;
             color:#b2b2b2;
             height:100px;
             box-shadow: 0 0.05333rem 0.10667rem #c5c5da40;}
         .gameidtimer{color:#fff;}
         .textwhite{color:#fff;}
         .banner{
         background: url(../images/bannertimeout.png) ;
         background-size:100px; 
         background-repeat: no-repeat;
         }
         .timer{
             background: -webkit-linear-gradient(315deg,transparent 0.13333rem,#fff 0) 0 0;
    /*background: linear-gradient(135deg,transparent 0.13333rem,#fff 0) 0 0;*/
             color:#f85050;
             font-weight:700;}
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
         width:25%;
         
         height:100px;
         }
         .nav-link1 img{height:55px;}
         .walletbox{padding: 15px;margin-top:-30px;}
         .walletbox .box{justify-content:center;background:#fff;border-radius: 0 0 15px 15px;padding:10px;color:#fff;box-shadow:  0.21333rem 0.02667rem 0 0 rgb(187 191 205 / 30%);}
         .walletimg1{
            height: 20px;
            padding: 0 10px;
            position: relative;
            top: 0px;
            left: 10px;
         }
         .walletbox1{padding: 15px;margin-top:-10px;}
         .walletbox1 .box{justify-content:center;background:#fff;border-radius:15px 15px 0 0;padding:10px;color:#fff;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .bet{padding:10px 15px;margin-top:-10px;}
         .bet .box{background:#fff;border-radius:8px;padding:8px;color:#fff;box-shadow: 0 0 0.21333rem 0.02667rem rgb(187 191 205 / 30%);}
         .btn_center button{
             padding: 8px 5px;
    font-size: 14px;
         border:none;
         transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
         }
         .btn_center button:hover{
         border:none;
         color:white;
         }
         .btn:hover{
             color:transparent !important;
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
         background: #f44336;
         color: #fff;
         width:100px;
         border-radius:  15px 0px 15px 0px;
         box-shadow: 0 0 0.21333rem 0.02667rem rgb(251 78 78 / 60%);
         }
         .back_big{
         background: #ffa82e;
         color: #fff;
         width:220px;
         border-radius: 20px  0px 0px 20px ;
         }
         .back_small{
         background: #6da7f4;
         color: #fff;
         width:220px;
         border-radius: 0px  20px 20px 0px;
         }
         .appContent1{
         background:#FBEDF3;
         border-radius:10px;
         }
         .btn5 {
         border-radius: 40px 40px 40px 40px;
         border: 0px solid white;
         color: transparent;
         /*background: #4caf50;*/
         transition: 0.5s;
         /*border: 2px solid white; */
         /*outline: 1px solid green;*/
         font-size:20px;
         background-size: cover !important;
    background-repeat: no-repeat !important;
         /*height:52px;*/
         height: 55px;
    width: 55px;
         }
         .btn6 {
        border-radius: 40px 40px 40px 40px;
         border: 0px solid white;
         /*background: #f44336;*/
         color: transparent;
         transition: 0.5s;
         background-size: cover !important;
    background-repeat: no-repeat  !important;
         /*border: 2px solid white; */
         /*outline: 1px solid red;*/
         font-size:20px;
         height: 55px;
    width: 55px;
         /*height:52px;*/
         }
         .btn3 {
           border-radius: 40px 40px 40px 40px;
    border: 0px solid white;
    color: transparent;
    transition: 0.5s;
    background: url(images/n0-30bd92d1.png);
    background-size: cover;
    background-repeat: no-repeat;
    /* border: 2px solid white; */
    /* outline: 1px solid red; */
    font-size: 20px;
    height: 55px;
    width: 55px;
         }
         .btn4 {
         border-radius: 40px 40px 40px 40px;
         border: 0px solid white;
         /*background: #f44336;*/
         color: transparent;
         transition: 0.5s;
         background-size: cover !important;
    background-repeat: no-repeat  !important;
         /*border: 2px solid white; */
         /*outline: 1px solid red;*/
         font-size:20px;
         height: 55px;
    width: 55px;
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
         background-color: #e8e7e8;
         border: 0.02667rem solid #e8e7e8;
         box-shadow: 0.02667rem 0.02667rem 0.13333rem 0.13333rem #eaeefc;
         color:#000;
         padding:0px;
         border-radius:8px;
         margin:13px 6px !important;
         font-weight:400
         }
         .nav-tabs2 .nav-link2.active {
         font-weight:700;
         color:#fff;
         background: #fd565c;
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
         padding: 20px !important;
         color: #fff;
         font-size: 15px;
         background: rgb(0 0 0 / 85%);
         }
         .modal {
    position: fixed;
    top: 0px;
    left: 0;
    z-index: 1050;
    display: none;
    width: 100%;
    height: 100%;
    overflow: hidden;
    outline: 0;
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
         /*border:none;*/
         /*border-radius:0px;*/
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
         /*height: 0.58667rem;*/
         font-weight: 700;
         /*font-size: .48rem;*/
         text-align: center;
         color: #fff;
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
         font-size:12px;
         font-weight:600;
         color:#fff;
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
         background-color: #fd565c;
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
         .appHeader1{
             background:#fd565c;
             background-image:none;
         }
         .blnc{
             display: flex;
    flex-direction: column-reverse;
    align-items: center;
         }
         .blt{
                 width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 10px;
    padding-bottom: 8px;
    margin-bottom: 10px;
        border-bottom: 1px solid #fd565c;
         }
         .num{
             font-size:20px !important;
         }
         th{
             background: #fd565c !important;
             color:#fff !important;
         }
         .sorting_disabled{
             color:#fff !important;
         }
         .selected {
            background-color: #ff626a !important; 
            color: #fff !important; 
        }
        .selecteds {
            background-color: #ff626a !important; 
            color: #fff !important; 
        }
        #trxLabel{
            /*background-color: #007BFF;*/
        }
        .blnc-box{
            color: #000;
    font-size: 14px;
    font-weight: 500;
    display: flex;
    align-items: center;
    width: 100%;
        }
        .bs{
                width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
        }
        
        .pageTitle img{
            width:100px !important;
        }
        .layout img{
            width:80px;
            height:30px;
        }
        .container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
    width: 100%;
    /* padding-right: 15px; */
    /* padding-left: 15px; */
    margin-right: auto;
    margin-left: auto;
}
.pim{
    position: absolute;
    top: 10px;
    left: 15px;
    height: 25px;
    width: 40%;
    font-size: 15px;
    text-align: center;
    border: 0.01333rem solid #fff;
    border-radius: 20px;
    display: -webkit-box;
    display: -webkit-flex;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-box-align: center;
    -webkit-align-items: center;
    align-items: center;
}
.pim::before {
        content: "";
    display: block;
    height: 18px;
    width: 20px;
    background-image: url(images/pi.png);
    background-repeat: no-repeat;
    background-size: 18px;
    background-position: center;
}
.prt {
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 2px;
    padding: 2px;
    text-align: left;
    margin-left: 0px;
    margin-bottom: 0;
    position: relative;
    bottom: -25px;
}
.histi{
    margin: 2px 18px;
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-left: -10px !important;
    position: relative;
    bottom: -33px;
}
.himg img{
    width: 25px !important;
    height:25px !important;
}
/* Add your styling for the spinning effect here */
        .image-spin {
            /* Add your spinning animation properties here */
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
      </style>
   </head>
   <body style="background-color:#f7f8ff">
      <?php
         include("include/connection1.php");
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
            <a href="game" onClick="goBack();" class="icon goBack"> <img  src="./images/icons8-arrow-50.png" class="back"> </a>
         </div>
         <div style="font-size:25px; font-weight:500" class="pageTitle"><img src="images/my-removebgg.png"></div>
         <div class="right ">
            <a href="help" class="icon goBack"> <img  src="images/icons/headphone.png" class="back"> </a>
         </div>
      </div>
      <!-- App Header -->
      
      
      <div class="headban">
          
         <div class="walletbox1">
             
            <div class="box">
                
                <div class="blnc">
                    <div class="blnc-box">
                        
                    <div class="bs">
                         
                        <div>
                            INR  <span style="margin-left:14px">:</span> <span id="trx_balance"  ><?php echo number_format(wallet($con,'amount',$userid), 2);?></span><a href="javascript:void(0);" onClick="reloadbtn(<?php echo $userid;?>);"><img class="walletimg1" id="spin-image" src="images/rld.png"></a>
                            
                        </div>
                    </div>
                        
                         
                          
                    </div>
                    <div style="text-align:center;" class="blt">
                        <img class="wallet" src="images/wlt.png"> 
                        <p style="color:#cacaca; font-size:14px; font-weight:400;">Wallet Balance</p>
                        
                     </div>
                    
                </div>
                
                
               
                  
               
            </div>
         </div>
         
         
         <div class="walletbox">
             
             
            <div class="box">
               <div class="layout">
                  
                  <div class="col-6 text-center">
                     <a class="btns btn" href="withdrawals">Withdraw</a>
                  </div>
                  <div  class="col-6 text-center">  <a style=""  href="crypto-tron" class="btnss btn"> Deposit</a></div>
               </div>
               <p></p>
            </div>
         </div>
         <div class="infobox">
            <div  class="row underinfo">
               <div class="layout">
                  <i style="color:#ed6a0c;font-size:20px;margin-right:10px;    margin-top: 4px;" class="fa fa-volume-up left"></i>
                  <marquee style="color:black;font-weight:600;margin-top: 4px;">  <?php $sqlget = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM setting WHERE id  =  1"));
                     $telegram = $sqlget['note']; echo $telegram;?>
                  </marquee>
                  <img src="images/dtl.png">
               </div>
            </div>
         </div>
         <div class="uppertbox">
            <div class="timebox">
               
               
               <ul style="" class="nav nav-tabs1 size4">
                     <li class="nav-item1" style="    height: 100px;
                      background: linear-gradient(180deg,#ff8080 0%,rgba(255,128,128,0) 100%);border-radius: 10px;"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1">
                     <img style="height:40px;padding-left:8px" src="images/time_a-f83ed4c7.png">
                     <span style="color:red;padding: 5px;" >Wingo</span>
                     <span style="color:red;padding: 5px;">1 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1">
                     <a style=" display: grid;line-height:5px" class="nav-link1"<a href="win">
                    <img style="height:40px;padding-left:11px" src="images/time-5d4e96a3.png">
                     <span style="color:#b2b2b2; padding: 5px;" >Wingo</span>
                     <span style="color:#b2b2b2; padding: 5px;">5 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1" <a href="win10min">
                     <img style="height:40px;padding-left:11px" src="images/time-5d4e96a3.png">
                     <span style="color:#b2b2b2; padding: 5px;" >Wingo</span>
                     <span style="color:#b2b2b2; padding: 5px;">10 min</span>
                     </a> 
                  </li>
                  <li class="nav-item1"> 
                     <a style=" display: grid;line-height:5px" class="nav-link1" <a href="win20min">
                     <img style="height:40px;padding-left:11px" src="images/time-5d4e96a3.png">
                     <span style="color:#b2b2b2; padding: 5px;" >Wingo</span>
                     <span style="color:#b2b2b2; padding: 5px;">20 min</span>
                     </a> 
                  </li>
               </ul>
            </div>
         </div>
      </div>
      
      
      <div class="peroidbox">
         <div class="layout box">
            <div class="gameidtimer">
                <div  class="pim">
                    How to play
                    
                </div>
               <h6 class="textwhite prt" >Win Go 1 min
               </h6>
               
               <h5>
                  
                  <div class="histi">
                      <div class="himg">
                          
                          <?php 
$periodQuery = mysqli_query($con, "SELECT * FROM `tbl_result` ORDER BY `id` DESC LIMIT 5;");
$periodData = array();

while ($row = mysqli_fetch_assoc($periodQuery)) {
    $periodData[] = $row;
}


if (count($periodData) >= 5) {
    $period1 = $periodData[0]['periodid'];
    $period2 = $periodData[1]['periodid'];
    $period3 = $periodData[2]['periodid'];
    $period4 = $periodData[3]['periodid'];
    $period5 = $periodData[4]['periodid'];
    
    $periodr1 = $periodData[0]['randomresult'];
    $periodr2 = $periodData[1]['randomresult'];
    $periodr3 = $periodData[2]['randomresult'];
    $periodr4 = $periodData[3]['randomresult'];
    $periodr5 = $periodData[4]['randomresult'];


    
    
} else {
    echo "Not enough records in the database.";
}                  
?>
                          <img  src="images/<?php
                          if ($periodr1==0){
                              echo "n0-30bd92d1.png";
                          }else if($periodr1==1){
                              echo "n1-dfccbff5.png";
                          }else if($periodr1==2){
                              echo "n2-c2913607.png";
                          }else if($periodr1==3){
                              echo "n3-f92c313f.png";
                          }else if($periodr1==4){
                              echo "n4-cb84933b.png";
                          }else if($periodr1==5){
                              echo "n5-49d0e9c5.png";
                          }else if($periodr1==6){
                              echo "n6-a56e0b9a.png";
                          }else if($periodr1==7){
                              echo "n7-5961a17f.png";
                          }else if($periodr1==8){
                              echo "n8-d4d951a4.png";
                          }else if($periodr1==9){
                              echo "n9-a20f6f42.png";
                          }
                          
                          ?>">
                      </div>
                      <div class="himg">
                          <img  src="images/<?php
                          if ($periodr2==0){
                              echo "n0-30bd92d1.png";
                          }else if($periodr2==1){
                              echo "n1-dfccbff5.png";
                          }else if($periodr2==2){
                              echo "n2-c2913607.png";
                          }else if($periodr2==3){
                              echo "n3-f92c313f.png";
                          }else if($periodr2==4){
                              echo "n4-cb84933b.png";
                          }else if($periodr2==5){
                              echo "n5-49d0e9c5.png";
                          }else if($periodr2==6){
                              echo "n6-a56e0b9a.png";
                          }else if($periodr2==7){
                              echo "n7-5961a17f.png";
                          }else if($periodr2==8){
                              echo "n8-d4d951a4.png";
                          }else if($periodr2==9){
                              echo "n9-a20f6f42.png";
                          }
                          
                          ?>">
                      </div>
                      <div class="himg">
                          <img  src="images/<?php
                          if ($periodr3==0){
                              echo "n0-30bd92d1.png";
                          }else if($periodr3==1){
                              echo "n1-dfccbff5.png";
                          }else if($periodr3==2){
                              echo "n2-c2913607.png";
                          }else if($periodr3==3){
                              echo "n3-f92c313f.png";
                          }else if($periodr3==4){
                              echo "n4-cb84933b.png";
                          }else if($periodr3==5){
                              echo "n5-49d0e9c5.png";
                          }else if($periodr3==6){
                              echo "n6-a56e0b9a.png";
                          }else if($periodr3==7){
                              echo "n7-5961a17f.png";
                          }else if($periodr3==8){
                              echo "n8-d4d951a4.png";
                          }else if($periodr3==9){
                              echo "n9-a20f6f42.png";
                          }
                          
                          ?>">
                      </div>
                      <div class="himg">
                          <img  src="images/<?php
                          if ($periodr4==0){
                              echo "n0-30bd92d1.png";
                          }else if($periodr4==1){
                              echo "n1-dfccbff5.png";
                          }else if($periodr4==2){
                              echo "n2-c2913607.png";
                          }else if($periodr4==3){
                              echo "n3-f92c313f.png";
                          }else if($periodr4==4){
                              echo "n4-cb84933b.png";
                          }else if($periodr4==5){
                              echo "n5-49d0e9c5.png";
                          }else if($periodr4==6){
                              echo "n6-a56e0b9a.png";
                          }else if($periodr4==7){
                              echo "n7-5961a17f.png";
                          }else if($periodr4==8){
                              echo "n8-d4d951a4.png";
                          }else if($periodr4==9){
                              echo "n9-a20f6f42.png";
                          }
                          
                          ?>">
                      </div>
                      <div class="himg">
                          <img  src="images/<?php
                          if ($periodr5==0){
                              echo "n0-30bd92d1.png";
                          }else if($periodr5==1){
                              echo "n1-dfccbff5.png";
                          }else if($periodr5==2){
                              echo "n2-c2913607.png";
                          }else if($periodr5==3){
                              echo "n3-f92c313f.png";
                          }else if($periodr5==4){
                              echo "n4-cb84933b.png";
                          }else if($periodr5==5){
                              echo "n5-49d0e9c5.png";
                          }else if($periodr5==6){
                              echo "n6-a56e0b9a.png";
                          }else if($periodr5==7){
                              echo "n7-5961a17f.png";
                          }else if($periodr5==8){
                              echo "n8-d4d951a4.png";
                          }else if($periodr5==9){
                              echo "n9-a20f6f42.png";
                          }
                          
                          ?>">
                      </div>
                      

                  </div>
                  <input type="hidden" id="futureid" name="futureid" value="<?php echo sprintf("%03d",gameid($con));?>">
               </h5>
            </div>
            
            <div style="margin-left:-30px;" class="gameidtimer text-right">
               <h6 style="font-weight:400; font-size:15px;" class="mb-1 textwhite">Time remaining</h6>
               <h5 class="gbutton2 " id="demo"> </h5>
               <span id="gameid" class="none textwhite" style="display: inline;font-size: 16px;letter-spacing: 2px;"><?php echo sprintf("%03d",gameid($con));?></span>
            </div>
            
            
            
         </div>
      </div>
      
      <div class="bet">
         <div class="box">
            <div class="btn_center">
               <button type="button"  class="back_one gbutton" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','Green');">Green</button>
               <button type="button" class="back_two gbutton" onClick="betbutton('linear-gradient(90deg,#b658fe 0%,#cd74ff 100%)','button','Violet');">Violet</button>
               <button type="button" class="back_three gbutton" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','Red');">Red</button>
            </div>
            <div class="long  mt-1">
               <div class="appContent1 mt-n1">
                  <div class="container-fluid">
                     <div class="layout text-center  d-flex justify-content-center">
                        <div class="divsize2">
                           <button type="button" class="btn   gbutton none btn3" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','0');">0</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="numbutton" style="background: url('images/n1-dfccbff5.png');
         background-size: cover;" class="btn   gbutton none btn5" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','1');">1</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n2-c2913607.png');" class="btn   gbutton none btn6" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','2');">2</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n3-f92c313f.png');" class="btn   gbutton none btn5" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','3');">3</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n4-cb84933b.png');" class="btn   gbutton none btn6" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','4');">4</button>
                        </div>
                     </div>
                     <div class="layout text-center  mt-2 d-flex justify-content-center">
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n5-49d0e9c5.png');" class="btn   gbutton none btn4" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','5');">5 </button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n6-a56e0b9a.png');" class="btn   gbutton none btn6" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','6');"> 6</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n7-5961a17f.png');" class="btn   gbutton none btn5" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','7');">7 </button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n8-d4d951a4.png');" class="btn   gbutton none btn6" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#ff646c 100%)','button','8');"> 8</button>
                        </div>
                        &emsp;
                        <div class="divsize2">
                           <button type="button" style="background: url('images/n9-a20f6f42.png');" class="btn   gbutton none btn5" onClick="betbutton('linear-gradient(90deg,#3faa70 0%,#47ba7c 100%)','button','9');"> 9</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            
            <div> <img style="width: 100%;" src="images/randomimg.png"></div>
         <div class="btn_center mt-1">
              <button type="button"  class="back_big gbutton" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#3AFC47 100%)','button','Green');changeInnerHTML();">BIG</button>
               <button type="button" class="back_small gbutton" onClick="betbutton('linear-gradient(90deg,#fc5050 0%,#3AFC47 100%)','button','Red');changeInnerHTML1();">SMALL</button> 
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
               border-top-right-radius: 20px;overflow: hidden;" class="modal-content ">
               <div class="modal-header paymentheader" id="paymenttitle">
                  <h4 class="modal-title" >Win Go 1min</h4>
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
                        <p class="left-text">Currency</p>
                     <div class="right-group">
                      <label class="btn1 selected" id="trxLabel" >
                        <input class="contract" type="radio" name="curradio" value="trx" checked onchange="changeLabelColor('trxLabel')">INR
                      </label>
                      
                    </div>
                    </div>
<!---->
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
                     <input type="hidden" name="finalamount" id="finalamount" value="0.1">
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
      
       <script>
        // Initially set the style for the default checked label
        // document.getElementById('trxLabel').classList.add('selected');

        function changeLabelColor(labelId) {
            var labels = document.getElementsByClassName("btn1");
            for (var i = 0; i < labels.length; i++) {
                labels[i].classList.remove("selected");
            }

            var selectedLabel = document.getElementById(labelId);
            selectedLabel.classList.add("selected");
        }
    </script>
  <!-- Jquery --> 
      <script src="/assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="/assets/js/lib/popper.min.js"></script> 
      <script src="/assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="/assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="/assets/js/app.js"></script>
      <script src="/assets/js/betting1.js"></script>
       <?php  include("include/pagestrick.php");?>
      <script src="/assets/js/jquery.dataTables.min.js"></script>
      <script>
    function changeInnerHTML() {
        // Get the element by id
        var element = document.getElementById('chn');

        // Check if the element exists
        if (element) {
            // Change the inner HTML of the element
            element.innerHTML = 'Select Big';
        }
    }
    
    function changeInnerHTML1() {
        // Get the element by id
        var element = document.getElementById('chn');

        // Check if the element exists
        if (element) {
            // Change the inner HTML of the element
            element.innerHTML = 'Select Small';
        }
    }
</script>
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
         
         function spini() {
            var spinImage = document.getElementById("spin-image1");

            spinImage.classList.add("image-spin");

            setTimeout(function() {
                spinImage.classList.remove("image-spin");
            }, 2000);
        }
         
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
           var distance = 60 - countDownDate % 60;
           //alert(distance);
           var i = distance / 60,
            n = distance % 60,
            o = n / 10,
            s = n % 10;
           var minutes = Math.floor(i);
           var seconds = ('0'+Math.floor(n)).slice(-2);
           document.getElementById("demo").innerHTML = "<span class='timer'>0"+Math.floor(minutes)+"</span>" + "<span>:</span>" +"<span class='timer'>"+seconds+"</span>";
         document.getElementById("counter").value = distance;
         if(distance==57 || distance==54 || distance==51 || distance==48 || distance==45){
         generateGameid();
         getResultbyCategory('parity','parity');
         getResultbyCategory('sapre','sapre');
         getResultbyCategory('bcone','bcone');
         }
         if(distance<=15)
         {
         $(".gbutton").prop('disabled', true);
         }else{ 
         $(".gbutton").prop('disabled', false);
         	}
         	
         	if (distance == 56) {
          reloadbtn(<?php echo $userid;?>);
        }else{
            
        }
        
        if (distance == 0) {
          location.reload();
        }
         }
         
         function generateGameid()
         {
         var futureid=$('#futureid').val();
         	$.ajax({
             type: "Post",
             data:"futureid=" + futureid + "& type=" + "generate" ,
             url: "periodid-generation1.php",
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
             url: "betform1.php",
             success: function (html) {
         		
         	 document.getElementById("loadform").innerHTML=html;
               return false;
               },
               error: function (e) {}
               });
         
         	if(type=='number'){
         	$(".paymentheader").css("background", color);
         		$(".paymentcolor").css("color", color);
         	document.getElementById('chn').innerHTML = 'Select '+name;
         
         		}else{
         	$(".paymentheader").css("background", color);
         		$(".paymentcolor").css("color", color);
         	document.getElementById('chn').innerHTML = 'Select '+name;
         	}
         	$('#payment').modal({backdrop: 'static', keyboard: false})  
              $('#payment').modal('show');
              document.getElementById('type').value = type;
         	 document.getElementById('value').value = name;
         
         	}
         //=====================amount calculation======================	
         
         function contracts() {
    

    // Update label styles
    var labels = document.getElementsByClassName("btn-secondary");
    for (var i = 0; i < labels.length; i++) {
        labels[i].classList.remove("selecteds");
    }

    // Add "selected" class to the clicked label
    event.target.closest('label').classList.add('selecteds');
}



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
         url: "getResultbyCategory1.php",
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