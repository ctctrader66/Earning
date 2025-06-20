<?php 
   ob_start();
   session_start();
   
   if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
      
   include("include/connection.php");
   $userid=$_SESSION['frontuserid'];
   
  // Date
   $today=date('Y-m-d');
   
   // level 1
   $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
   $userRows=mysqli_num_rows($user);
   $userResult=mysqli_fetch_array($user);
   $owncode=$userResult['owncode'];
   $userlevel1=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id asc");
   $userlevel1Rows=mysqli_num_rows($userlevel1);
   
   // level 1 today
   $userlevel1today=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' and date(`createdate`)='".$today."' order by id asc");
   $userlevel1todays=mysqli_num_rows($userlevel1today);
   
   
   //commission total
    $commsionl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."'");
                        $commsionl1fetch=mysqli_fetch_assoc($commsionl1);
                        
   $commsionl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."'");
   $commsionl2fetch=mysqli_fetch_assoc($commsionl2);
   
    $commsionl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."'");
   $commsionl3fetch=mysqli_fetch_assoc($commsionl3);
   
    $commsionl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."'");
   $commsionl4fetch=mysqli_fetch_assoc($commsionl4);
   
    $commsionl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."'");
   $commsionl5fetch=mysqli_fetch_assoc($commsionl5);
   
    $commsionl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."'");
   $commsionl6fetch=mysqli_fetch_assoc($commsionl6);
   
   $withoutl1c = $commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   $withL1c = $commsionl1fetch['total']+$commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   
   $yesterday = date("Y-m-d", strtotime("yesterday"));
    
   //commission yesterday
    $commsionyl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."' and date(`createdate`)='".$yesterday."'");
                        $commsionyl1fetch=mysqli_fetch_assoc($commsionyl1);
                        
   $commsionyl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl2fetch=mysqli_fetch_assoc($commsionyl2);
   
    $commsionyl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl3fetch=mysqli_fetch_assoc($commsionyl3);
   
    $commsionyl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl4fetch=mysqli_fetch_assoc($commsionyl4);
   
    $commsionyl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl5fetch=mysqli_fetch_assoc($commsionyl5);
   
    $commsionyl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."' and date(`createdate`)='".$yesterday."'");
   $commsionyl6fetch=mysqli_fetch_assoc($commsionyl6);
   
   $withoutyl1c = $commsionyl2fetch['total']+$commsionyl3fetch['total']+$commsionyl4fetch['total']+$commsionyl5fetch['total']+$commsionyl6fetch['total'];
   
   $withLy1c = $commsionyl1fetch['total']+$commsionyl2fetch['total']+$commsionyl3fetch['total']+$commsionyl4fetch['total']+$commsionyl5fetch['total']+$commsionyl6fetch['total'];
   
   
   $weekend = date('Y-m-d',strtotime("-7 days"));
   
    //commission week
    $commsionwl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `level1id`='".$userid."' and date(`createdate`)>'".$weekend."'");
                        $commsionwl1fetch=mysqli_fetch_assoc($commsionwl1);
                        
   $commsionwl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `level2id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl2fetch=mysqli_fetch_assoc($commsionwl2);
   
    $commsionwl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `level3id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl3fetch=mysqli_fetch_assoc($commsionwl3);
   
    $commsionwl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `level4id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl4fetch=mysqli_fetch_assoc($commsionwl4);
   
    $commsionwl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `level5id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl5fetch=mysqli_fetch_assoc($commsionwl5);
   
    $commsionwl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `level6id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl6fetch=mysqli_fetch_assoc($commsionwl6);
   
  
   $withLw1c = $commsionwl1fetch['total']+$commsionwl2fetch['total']+$commsionwl3fetch['total']+$commsionwl4fetch['total']+$commsionwl5fetch['total']+$commsionwl6fetch['total'];
   
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
         body{
         background:#8B8B8B;
         }
         .heading{
         background:#F4F4F4;
         width:100%;
         padding:10px 20px;
         }
         .heading span{
         font-weight:400;
         font-size:16px;
         color:#000;
         }
         .parent {
         padding: 20px 0px;
         text-align:center;
         display: flex;
         width:100%;
         }
         .child {   margin:0 10px;
         width: 45%;
         float: left;
         flex: 1;
         padding:10px 10px;
         border-radius:10px;
         border: 1.50px solid red;
         }
         .child span{
         font-size:16px;
         color:#000;
         text-align:center;
         }
         .child p{
         font-size:17px;
         color:red;
         text-align:center;
         }
         .inivite{
         padding: 5px;   
         }
         img{
         height:150px;
         margin:0;
         padding:0;
         background:#FBFCFD;
         }
         .row{
         text-align:center;
         justify-content: center;
         }
         .col{
         vertical-align: middle;
         }
         button{
         height: 44px;
         width:100%;
         background: #f2413b;
         box-shadow: 3px 5px 5px rgb(242 65 59 / 27%);
         border-radius: 10px;
         color: #fff;
         border:1px solid #f2413b;
         }
         .contenor{
         margin: 0.4rem 0.4rem 0;
         background: #fff;
         box-shadow: 0 0.13333rem 0.29333rem 0.02667rem rgb(0 0 0 / 12%);
         border-radius: 0.10667rem;
         overflow-y: auto;
         }
      
        .table{
            text-align:center;

        }
         .table th{
             border:none;
              background:#F4F4F4;  
           font-weight:400;
         font-size:14px;
         color:#000;
         }
       
         .nav-tabs {
         background:#fff;
         border-radius:0px;
         border:0;
         font-weight:400;
         padding:5px 3px 5px 3px
         }
         .nav-tabs .nav-link {
         height:44px;
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center;
         background:transparent;
         color:#000;
         padding:0 16px;
         border-top:none;
         border-left:none;
         border-right:none;
         border-radius:0px;
         margin:0 !important;
         font-weight:400;
         font-size:16px;
         }
         .nav-tabs .nav-link:hover {
         background:#fff;
         color:red;
         border-bottom:none ;
         font-weight:400;
         }
         .nav-tabs .nav-link.active {
         font-weight:400;
         color:red;
         border-bottom:none ;
         font-size:16px;
         }
         .parent1 {
         padding: 20px 0px;
         text-align:center;
         display: flex;
         width:100%;
         }
         .child1 { 
         width: 50%;
         float: left;
         flex: 1;
         padding:10px 10px;
         } 
      </style>
   </head>
   <body style="background:#F9FAFB">
     
       <div  id="header">
      <div class="appHeader1">
         <div class="pageTitle">Promotion</div>
         <div class="right ">
            <a href="promotionrecord.php" class="icon goBack"> <img  src="images/promo.png" class="back"> </a>
         </div>
      </div>
      <ul class="nav nav-tabs size4">
         <li class="nav-item"> 
            <a class="nav-link active" href="#" >Data</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link " href="team.php" >Team</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link " href="bonushistory.php" >History</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link " href="tutorial.php" >Tutorial</a> 
         </li>
      </ul></div>
      <div style="margin-top:110px" class="heading md-1">
         <span>My Reward</span>
      </div>
    
      <div class='parent'>
         <div style=""class='child'>
            <span style="font-weight:500;font-size:18px;">Yesterday Total Commission is </span>
            <p><?php echo round($withLy1c,1);?></p>
            <p></p>
            <font>Direct Commission:<?php echo round($commsionyl1fetch['total'],1);?></font><br>
            <font>Team Commission:<?php echo round($withoutyl1c,1);?></font>
         </div>
         <div style="text-align:left;" class='child'>
            <font>Number of Direct subordinates:<span style="color:red"><?php echo round($userlevel1Rows);?></span></font><br>
            <font>Total Number of Team:<span style="color:red">0</span></font><br>
            <font>Today's Invite:<span style="color:red"><?php echo round($userlevel1todays);?></span></font><br>
            <font>Today new Team Size:<span style="color:red">0</span></font><br>
            <font>Total Commision for the Week:<span style="color:red"><?php echo round($withLw1c,1);?></span></font><br>
            <font>Total Commision:<span style="color:red"><?php echo round($withL1c,1);?></span></font>
         </div>
      </div>
      <div class="inivite">
         <div class="parent1">
            <div style="margin-top:-25px" class="child1">
               <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=https://7lottery.org/register.php?code=<?php echo user($con,'owncode',$userid);?>">
               <span style="margin-top:10px;font-size:15px;">Long Press To Save<br>The QR Code</span>
            </div>
            <div style="margin-top:10px" class="child1">
               <button onclick="copyToClipboard('#p1')">Copy Invitation Code</button>
               <p style="margin:10px"></p>
               <button onclick="copyToClipboard('#p2')">Copy Link</button>
            </div>
         </div>
      </div>
      <p  style="display:none" id="p1"><?php echo user($con,'owncode',$userid);?></p>
      <p style="display:none" id="p2">https://7lottery.org/register.php?code=<?php echo user($con,'owncode',$userid);?></p>
   
      <div style="margin-top:-25px;" class="heading  md-3">
         <span>Rebate Amount Corresponding Table</span>
      </div>
      <div class="inivite contenor mb-5">
         <div >
            <table class="table  ">
               <tr>
                  <th>Agent Level</th>
                  <th>Total Referral</th>
                  <th>Total Bet</th>
                  <th>Recharge</th>
               </tr>
               <tr>
                  <td>0Lv</td>
                  <td>0</td>
                  <td>0</td>
                  <td>0</td>
               </tr>
               <tr>
                  <td>1Lv</td>
                  <td>5</td>
                  <td>100000</td>
                  <td>100000</td>
               </tr>
                  <tr>
                  <td>2Lv</td>
                  <td>10</td>
                  <td>200000</td>
                  <td>200000</td>
               </tr>
                   <tr>
                  <td>3Lv</td>
                  <td>15</td>
                  <td>500000</td>
                  <td>500000</td>
               </tr>
               <tr>
                  <td>4Lv</td>
                  <td>20</td>
                  <td>1000000</td>
                  <td>700000</td>
               </tr>
               <tr>
                  <td>5Lv</td>
                  <td>25</td>
                  <td>2000000</td>
                  <td>1000000</td>
               </tr>
                <tr>
                  <td>6Lv</td>
                  <td>30</td>
                  <td>4000000</td>
                  <td>2000000</td>
               </tr>
            </table>
         </div>
      </div>
     
     
     <!--1 table end-->
     
     <div style="margin-top:-35px;" class="heading  md-3">
         <span>Commission Calculation Method (Lottery)</span>
      </div>
      <div class="inivite contenor mb-5">
         <div >
            <table class="table  ">
               <tr>
                  <th>Hierarchy<br><span style="font-size:10px">Rebate Ratio</span></th>
                  <th>Tier 1<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 2<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 3<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 4<br><span style="font-size:10px">Commission</span></th>
               </tr>
               <tr>
                  <td>0Lv</td>
                  <td>0.6%</td>
                  <td>0.18%</td>
                  <td>0.054%</td>
                  <td>0.0162%</td>
               </tr>
               <tr>
                  <td>1Lv</td>
                  <td>0.7%</td>
                  <td>0.245%</td>
                  <td>0.0858%</td>
                  <td>0.03%</td>
               </tr>
                  <tr>
                  <td>2Lv</td>
                  <td>0.75%</td>
                  <td>0.2812%</td>
                  <td>0.1054%</td>
                  <td>0.0396%</td>
               </tr>
                   <tr>
                  <td>3Lv</td>
                   <td>0.8%</td>
                  <td>0.32%</td>
                  <td>0.128%</td>
                  <td>0.0512%</td>
               </tr>
               <tr>
                  <td>4Lv</td>
                    <td>0.85%</td>
                  <td>0.3612%</td>
                  <td>0.1536%</td>
                  <td>0.0652%</td>
               </tr>
               <tr>
                  <td>5Lv</td>
                   <td>0.9%</td>
                  <td>0.405%</td>
                  <td>0.1822%</td>
                  <td>0.0082%</td>
               </tr>
                <tr>
                  <td>6Lv</td>
                  <td>1%</td>
                  <td>0.5%</td>
                  <td>0.25%</td>
                  <td>0.125%</td>
               </tr>
                <tr>
                  <td>...</td>
                   <td>...</td>
                    <td>...</td>
                     <td>...</td>
                      <td>...</td>
               </tr>
            </table>
         </div>
      </div>
     
       <!--2 table end-->
     
     <div style="margin-top:-35px;" class="heading  md-3">
         <span>Commission Calculation Method (Slots)</span>
      </div>
      <div class="inivite contenor mb-5">
         <div >
            <table class="table  ">
               <tr>
                  <th>Hierarchy<br><span style="font-size:10px">Rebate Ratio</span></th>
                  <th>Tier 1<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 2<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 3<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 4<br><span style="font-size:10px">Commission</span></th>
               </tr>
               <tr>
                  <td>0Lv</td>
                  <td>0.3%</td>
                  <td>0.09%</td>
                  <td>0.027%</td>
                  <td>0.0081%</td>
               </tr>
               <tr>
                  <td>1Lv</td>
                  <td>0.35%</td>
                  <td>0.1225%</td>
                  <td>0.0429%</td>
                  <td>0.015%</td>
               </tr>
                  <tr>
                  <td>2Lv</td>
                  <td>0.375%</td>
                  <td>0.1406%</td>
                  <td>0.0527%</td>
                  <td>0.0198%</td>
               </tr>
                   <tr>
                  <td>3Lv</td>
                   <td>0.4%</td>
                  <td>0.16%</td>
                  <td>0.064%</td>
                  <td>0.0256%</td>
               </tr>
               <tr>
                  <td>4Lv</td>
                    <td>0.425%</td>
                  <td>0.1806%</td>
                  <td>0.0768%</td>
                  <td>0.0326%</td>
               </tr>
               <tr>
                  <td>5Lv</td>
                   <td>0.45%</td>
                  <td>0.2025%</td>
                  <td>0.0911%</td>
                  <td>0.041%</td>
               </tr>
                <tr>
                  <td>6Lv</td>
                  <td>0.5%</td>
                  <td>0.25%</td>
                  <td>0.125%</td>
                  <td>0.625%</td>
               </tr>
                <tr>
                  <td>...</td>
                   <td>...</td>
                    <td>...</td>
                     <td>...</td>
                      <td>...</td>
               </tr>
            </table>
         </div>
      </div>
     
          <!--3 table end-->
     
     <div style="margin-top:-35px;" class="heading  md-3">
         <span>Commission Calculation Method (Casino)</span>
      </div>
      <div class="inivite contenor mb-5">
         <div >
            <table class="table  ">
               <tr>
                  <th>Hierarchy<br><span style="font-size:10px">Rebate Ratio</span></th>
                  <th>Tier 1<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 2<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 3<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 4<br><span style="font-size:10px">Commission</span></th>
               </tr>
               <tr>
                  <td>0Lv</td>
                  <td>0.3%</td>
                  <td>0.09%</td>
                  <td>0.027%</td>
                  <td>0.0081%</td>
               </tr>
               <tr>
                  <td>1Lv</td>
                  <td>0.35%</td>
                  <td>0.1225%</td>
                  <td>0.0429%</td>
                  <td>0.015%</td>
               </tr>
                  <tr>
                  <td>2Lv</td>
                  <td>0.375%</td>
                  <td>0.1406%</td>
                  <td>0.0527%</td>
                  <td>0.0198%</td>
               </tr>
                   <tr>
                  <td>3Lv</td>
                   <td>0.4%</td>
                  <td>0.16%</td>
                  <td>0.064%</td>
                  <td>0.0256%</td>
               </tr>
               <tr>
                  <td>4Lv</td>
                    <td>0.425%</td>
                  <td>0.1806%</td>
                  <td>0.0768%</td>
                  <td>0.0326%</td>
               </tr>
               <tr>
                  <td>5Lv</td>
                   <td>0.45%</td>
                  <td>0.2025%</td>
                  <td>0.0911%</td>
                  <td>0.041%</td>
               </tr>
                <tr>
                  <td>6Lv</td>
                  <td>0.5%</td>
                  <td>0.25%</td>
                  <td>0.125%</td>
                  <td>0.625%</td>
               </tr>
                <tr>
                  <td>...</td>
                   <td>...</td>
                    <td>...</td>
                     <td>...</td>
                      <td>...</td>
               </tr>
            </table>
         </div>
      </div>
     
          <!--4 table end-->
     
     <div style="margin-top:-35px;" class="heading  md-3">
         <span>Commission Calculation Method (Sport)</span>
      </div>
      <div class="inivite contenor mb-5">
         <div >
            <table class="table  ">
               <tr>
                  <th>Hierarchy<br><span style="font-size:10px">Rebate Ratio</span></th>
                  <th>Tier 1<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 2<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 3<br><span style="font-size:10px">Commission</span></th>
                  <th>Tier 4<br><span style="font-size:10px">Commission</span></th>
               </tr>
               <tr>
                  <td>0Lv</td>
                  <td>0.3%</td>
                  <td>0.09%</td>
                  <td>0.027%</td>
                  <td>0.0081%</td>
               </tr>
               <tr>
                  <td>1Lv</td>
                  <td>0.35%</td>
                  <td>0.1225%</td>
                  <td>0.0429%</td>
                  <td>0.015%</td>
               </tr>
                  <tr>
                  <td>2Lv</td>
                  <td>0.375%</td>
                  <td>0.1406%</td>
                  <td>0.0527%</td>
                  <td>0.0198%</td>
               </tr>
                   <tr>
                  <td>3Lv</td>
                   <td>0.4%</td>
                  <td>0.16%</td>
                  <td>0.064%</td>
                  <td>0.0256%</td>
               </tr>
               <tr>
                  <td>4Lv</td>
                    <td>0.425%</td>
                  <td>0.1806%</td>
                  <td>0.0768%</td>
                  <td>0.0326%</td>
               </tr>
               <tr>
                  <td>5Lv</td>
                   <td>0.45%</td>
                  <td>0.2025%</td>
                  <td>0.0911%</td>
                  <td>0.041%</td>
               </tr>
                <tr>
                  <td>6Lv</td>
                  <td>0.5%</td>
                  <td>0.25%</td>
                  <td>0.125%</td>
                  <td>0.625%</td>
               </tr>
                <tr>
                  <td>...</td>
                   <td>...</td>
                    <td>...</td>
                     <td>...</td>
                      <td>...</td>
               </tr>
            </table>
         </div>
      </div>
     
      <style>
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

</style>
<div id="alert" class="modal" role="dialog" >
  <div class="modal-dialog regLog" role="document">
    <div class="modal-content regContent">
      <div class="modal-body" >
       <div class="text-center" id="alertmessage">
      </div>
    </div>
  </div>
</div></div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <!-- Jquery --> 
      <script>
         function copyToClipboard(element) {
              $('#alert').modal('show');
     document.getElementById('alertmessage').innerHTML = "<p>Copy Succeeded</p>";
         var $temp = $("<input>");
         $("body").append($temp);
         $temp.val($(element).text()).select();
         document.execCommand("copy");
         $temp.remove();
         }
      </script>
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
  $(function(){
    $('#alert').on('show.bs.modal', function(){
        var alert = $(this);
        clearTimeout(alert.data('hideInterval'));
        alert.data('hideInterval', setTimeout(function(){
            alert.modal('hide');
        }, 2000));
    });
});
</script>
   </body>
</html>