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
             background: linear-gradient(90deg, rgb(249, 89, 89) 0%, rgb(255, 154, 142) 100%) !important;
         /*border-bottom:0.50px solid #fff !important;*/
         }
       
         .appContent3 {
         position: relative;
         /*background-image: linear-gradient(90deg,#cd0103,#f64841);*/
         /*background-size: cover;*/
         height:230px;
             background: linear-gradient(90deg, rgb(249, 89, 89) 0%, rgb(255, 154, 142) 100%);
         }
         
       
         .intro{
             font-size: 10px;
             font-weight: 500;
             letter-spacing: 2px;
         }
         
         .profit{height:40px;}
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
         .bln{
             display: flex;
             
             justify-content: space-evenly;
                 padding-top: 10px;
         }
         .blc{
                 text-align: center;
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
         
         //   fetch wallet
$userwallet=mysqli_query($con,"select * from `tbl_bonus` where `id`='".$userid."'");
   $userwalletRows=mysqli_num_rows($userwallet);
   $userwalletResult=mysqli_fetch_array($userwallet);
   $walletusdt=$userwalletResult['amountusdt'];
   $wallettrx=$userwalletResult['amount'];
         ?>
      <!-- Page loading -->
      <!-- * Page loading --> 
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="main" class="icon goBack" onClick="goBack();"> <img  src="images/icons8-arrow-50.png" class="back"> </a>
         </div>
         <div class="pageTitle">Wallets</div>
      </div>
      <!-- App Header -->
      <div style="margin-top:50px" class="appContent3 text-white">
         <div class="justify-centent-center" style="    padding-bottom: 16px;  text-align:center">
            <div style="padding-bottom:10px;">
               <img class=" profit" src="images/walt.png">
            </div>
            <span class="intro" style="font-size: 15px;"> INR  <?php echo number_format($wallettrx, 3);?></span><br>
            <span class="intro" style="font-weight: 400;">Total Wallet</span>
         </div>
         <div class="bln">
             <div class="blc">
                 <p style="font-size:20px;"><?php echo number_format(wallet($con,'amount',$userid), 2);?> </p>
                 <p style="font-size: 12px;"> Total Amount</p>
                 
             </div>
             <div class="blc">
                 <p style="font-size:20px;">0 </p>
                 <p style="font-size: 12px;"> Total Deposit</p>
             </div>
             
             
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
             background: linear-gradient(90deg, rgb(249, 89, 89) 0%, rgb(255, 154, 142) 100%);
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
         .gp{
                 margin: 0px 28px;
                 background: #fff;
                 position: relative;
                 top: -25px;
                 border-radius: 10px;
         }
         .prog{
              width: 2.45333rem;
              height: 2.45333rem;
              position: relative;
              display: inline-block;
              width: var(--van-circle-size);
              height: var(--van-circle-size);
              text-align: center;
              padding: 0;
              margin: 0;
              font: inherit;
              font-size: 100%;
              vertical-align: baseline;
              border: 0;
              box-sizing: border-box;
         }
         svg{
             position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    box-sizing: border-box;
    font-family: bahnschrift;
        user-select: none;
         }
         svg:not(:root) {
    overflow-clip-margin: content-box;
    overflow: hidden;
}

path{
    fill: none;
    stroke: rgb(216, 216, 216);
    stroke-width: 100px;
    /*stroke: var(--van-circle-layer-color);*/
        
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700');

body{
  /*padding: 0px;*/
  /*margin: 0px;*/
  /*display: flex;*/
  /*align-items: center;*/
  /*justify-content: center;*/
  /*height: 100vh;*/
  /*background: #D5F2E3;*/
}

.circle-container{
  width: 100px;
  height: 100px;
  background: #E1E1E1;
  border-radius: 50%;
}

.circle-container .circle .item,
.circle-container .circle .fill{
  width: 100px;
  height: 100px;
  position: absolute;
  border-radius: 50%;
}

.circle-container .circle .item{
 clip: rect(0px, 100px, 100px, 60px);
}

.circle-container .circle .item .fill{
  clip: rect(0px, 64px, 100px, 0px);
  background-color: #d8d8d8;
}

.circle-container .circle .item.layer-1,
.circle-container .circle .fill{
  transform: rotate(126deg);
  animation: fill ease-in-out 3s;
}

@keyframes fill {
  0%{
    transform: rotate(0deg);
  }
  100%{
    transform: rotate(126deg);
  }
}

.inside-content{
     width: 90px;
    height: 90px;
    border-radius: 50%;
    background: #fff;
    text-align: center;
    margin-top: 5px;
    margin-left: 5px;
    position: absolute;
    font-weight: 700;
    font-family: "Poppins", sans-serif;
    font-size: 20px;
    line-height: 95px;
    padding-left: 5px;
}
.wrapper{
    display: flex;
    justify-content: space-around;
    align-items: center;
}
.rnd{
        text-align: center;
            padding-top: 20px;
}
.rnd h3{
    font-family: Inter;
    font-style: normal;
    font-weight: 400;
    line-height: 12px;
    letter-spacing: 2px;
    font-size: 14px;
    color: #333;
    margin-top: 12px;
}
.rnd span{
   font-family: Inter;
    font-style: normal;
    font-weight: 600;
    line-height: 3px;
    letter-spacing: 1px;
    font-size: 12px;
    text-align: center;
}
.mwt{
    text-align: center;
    padding: 10px;

}
.mwt button{
    
   width: 100%;
    height: 35px;
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 2px;
    text-shadow: 0 2px 2px rgba(231,65,65,.5);
    border: none;
    border-radius: 20px;
    background: -webkit-linear-gradient(top,#ff867a 0%,#f95959 100%);
    background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
    box-shadow: 0 2px #e74141;
}
.quil{
    display: flex;
    justify-content: space-around;
    width: 100%;
}
.qlb{
    width: 20%;
    text-align: center;
        display: flex;
    flex-direction: column;
    align-items: center;
}


.qlb img{
    width:40px;
    
    
}
.qimg{
        background: aliceblue;
    width: 80%;
    border-radius: 10px;
    padding: 6px;
    box-shadow: 0 0.05333rem 0.21333rem #d0d0ed5c;
}
.qlb span{
    font-size: 12px;
    font-family: Inter;
    font-style: normal;
    font-weight: 500;
    line-height: 18px;
    letter-spacing: 1px;
    margin-top: 10px;
    /* font-size: .32rem; */
    text-align: center;
}



             
         
      </style>
      
      


      <div class="gp">
          
          <div class="wrapper">
              
              <div class="rnd">
                <div class="circle-container">
                    <div class="circle">
                            <div class="item layer-1">
                               <div class="fill"></div>
                            </div>
                            <div class="item layer-2">
                               <div class="fill"></div>
                            </div>
                            <div class="inside-content">0%</div>
                    </div>
                    
                </div>
                <h3>INR<?php echo number_format(wallet($con,'amount',$userid), 2);?></h3>
                <span>Main Wallet </span>
              </div>
              
             <div class="rnd">
                <div class="circle-container">
                    <div class="circle">
                            <div class="item layer-1">
                               <div class="fill"></div>
                            </div>
                            <div class="item layer-2">
                               <div class="fill"></div>
                            </div>
                            <div class="inside-content">0%</div>
                    </div>
                </div>
                
                <h3><span>INR</span><?php echo number_format($wallettrx, 3);?></h3>
                
                <span>Commission Wallet </span>
             </div>
             
             
              
            
  
  
          </div>
          
          
          <div class="mwt">
              <button> Main Wallet Transfer </button>
          </div>
          
          <div class="quil">
              <div class="qlb"onclick="window.location.href='recharge.php';">
                  <div class="qimg">
                      <img src="images/dpt.png">
                      
                  </div>
                  <span>
                      Deposit
                  </span>
                  
                  
              </div>
              <div class="qlb">
                  
                  <div class="qimg"onclick="window.location.href='withdrawals';">
                      <img src="images/wtl.png">
                      
                  </div>
                  <span>
                      Withdraw
                  </span>
                  
                  
              
                  
              </div>
              <div class="qlb">
                  
                  
                  <div class="qimg"onclick="window.location.href='rechargehistory';">
                      <img src="images/depo.png">
                      
                  </div>
                  <span>
                      Deposit History
                  </span>
                  
                  
              
                  
              </div>
              <div class="qlb">
                  
                 
                  <div class="qimg"onclick="window.location.href='withdrawalrecord';">
                      <img src="images/wh.png">
                      
                  </div>
                  <span>
                      Withdraw History
                  </span>
                  
                  
              
                  
              </div>
              
              
          </div>
      <div class="parent">
          <div class="child active">
              <p><?php echo number_format(wallet($con,'amount',$userid), 2);?></p>
              <span>Lottery</span>
          </div>
          <div class="child active">
            <p><?php echo number_format(wallet($con,'amount',$userid), 2);?></p>
              <span>INR</span>
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
      <!--<div class="text-center mt-3">-->
      <!--     <button class="submitbtn">One-click Recycling</button>-->
      <!--</div>-->
      
      </div>
     
       <?php include("include/footer.php");?>
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