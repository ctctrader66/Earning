<?php 
   ob_start();
   session_start();
   
   if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
       
   include("include/connection.php");
//   include("a.php");
  $userid=$_SESSION['frontuserid'];
  include 'include/conn.php';

// Assuming you have already established a database connection

// Fetch level 1 members
$sqlLevel1 = "SELECT t1.id, t1.code, t1.owncode, t1.mobile
              FROM tbl_user t1
              WHERE t1.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)";

$resultLevel1 = mysqli_query($conn, $sqlLevel1);
$countLevel1 = mysqli_num_rows($resultLevel1);



// Fetch level 2 members
$sqlLevel2 = "SELECT t3.id, t3.code, t3.owncode, t3.mobile
              FROM tbl_user t3
              WHERE t3.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))";

$resultLevel2 = mysqli_query($conn, $sqlLevel2);
$countLevel2 = mysqli_num_rows($resultLevel2);

// Fetch level 3 members
$sqlLevel3 = "SELECT t5.id, t5.code, t5.owncode, t5.mobile
              FROM tbl_user t5
              WHERE t5.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)))";

$resultLevel3 = mysqli_query($conn, $sqlLevel3);
$countLevel3 = mysqli_num_rows($resultLevel3);

// Fetch level 4 members
$sqlLevel4 = "SELECT t7.id, t7.code, t7.owncode, t7.mobile
              FROM tbl_user t7
              WHERE t7.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))))";

$resultLevel4 = mysqli_query($conn, $sqlLevel4);
$countLevel4 = mysqli_num_rows($resultLevel4);

// Fetch level 5 members
$sqlLevel5 = "SELECT t9.id, t9.code, t9.owncode, t9.mobile
              FROM tbl_user t9
              WHERE t9.code IN (SELECT t10.owncode FROM tbl_user t10 WHERE t10.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)))))";

$resultLevel5 = mysqli_query($conn, $sqlLevel5);
$countLevel5 = mysqli_num_rows($resultLevel5);

// Fetch level 6 members
$sqlLevel6 = "SELECT t11.id, t11.code, t11.owncode, t11.mobile
              FROM tbl_user t11
              WHERE t11.code IN (SELECT t12.owncode FROM tbl_user t12 WHERE t12.code IN (SELECT t10.owncode FROM tbl_user t10 WHERE t10.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))))))";

$resultLevel6 = mysqli_query($conn, $sqlLevel6);
$countLevel6 = mysqli_num_rows($resultLevel6);



$almemberlv3=$countLevel1+$countLevel2+$countLevel3+$countLevel4+$countLevel5+$countLevel6 ;

   
  // Date
   $today=date('Y-m-d');
   
//   fetch wallet
$userwallet=mysqli_query($con,"select * from `tbl_bonus` where `id`='".$userid."'");
   $userwalletRows=mysqli_num_rows($userwallet);
   $userwalletResult=mysqli_fetch_array($userwallet);
   $walletusdt=$userwalletResult['amountusdt'];
   $wallettrx=$userwalletResult['amount'];
   
   
   
   // level 1
   $user=mysqli_query($con,"select * from `tbl_user` where `id`='".$userid."'");
   $userRows=mysqli_num_rows($user);
   $userResult=mysqli_fetch_array($user);
   $owncode=$userResult['owncode'];
   
   $userlevel1=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id asc");
   $userlevel1Rows=mysqli_num_rows($userlevel1);
   $user1Result=mysqli_fetch_array($userlevel1);
   
   $userl2oc=$user1Result['owncode'];
   
   
   $userlevel2=mysqli_query($con,"select *  from `tbl_user` where `code`='".$userl2oc."' order by id asc");
   $userlevel2Rows=mysqli_num_rows($userlevel2);
   $user2Result=mysqli_fetch_array($userlevel2);
   $userl3oc=$user2Result['owncode'];
   
   $userlevel3=mysqli_query($con,"select *  from `tbl_user` where `code`='".$userl3oc."' order by id asc");
   $userlevel3Rows=mysqli_num_rows($userlevel3);
   $user3Result=mysqli_fetch_array($userlevel3);
   
   $totalutl3 =$userlevel1Rows+$userlevel2Rows+$userlevel3Rows ;
   
   // level 1 today
   $userlevel1today=mysqli_query($con,"select * from `tbl_user` where `code`='".$owncode."' and date(`createdate`)='".$today."' order by id asc");
   $userlevel1todays=mysqli_num_rows($userlevel1today);
   
   
   //commission total trx
    $commsionl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level1id`='".$userid."'");
    $commsionl1fetch=mysqli_fetch_assoc($commsionl1);
                        
   $commsionl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level2id`='".$userid."'");
   $commsionl2fetch=mysqli_fetch_assoc($commsionl2);
   
    $commsionl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level3id`='".$userid."'");
   $commsionl3fetch=mysqli_fetch_assoc($commsionl3);
   
    $commsionl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level4id`='".$userid."'");
   $commsionl4fetch=mysqli_fetch_assoc($commsionl4);
   
    $commsionl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level5id`='".$userid."'");
   $commsionl5fetch=mysqli_fetch_assoc($commsionl5);
   
    $commsionl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level6id`='".$userid."'");
   $commsionl6fetch=mysqli_fetch_assoc($commsionl6);
   
   $withoutl1c = $commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   $withL1c = $commsionl1fetch['total']+$commsionl2fetch['total']+$commsionl3fetch['total']+$commsionl4fetch['total']+$commsionl5fetch['total']+$commsionl6fetch['total'];
   
   
   //commission total usdt
    $commsionlt1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level1id`='".$userid."'");
    $commsionlt1fetch=mysqli_fetch_assoc($commsionlt1);
                        
   $commsionlt2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level2id`='".$userid."'");
   $commsionlt2fetch=mysqli_fetch_assoc($commsionlt2);
   
    $commsionlt3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level3id`='".$userid."'");
   $commsionlt3fetch=mysqli_fetch_assoc($commsionlt3);
   
    $commsionlt4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level4id`='".$userid."'");
   $commsionlt4fetch=mysqli_fetch_assoc($commsionlt4);
   
    $commsionlt5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level5id`='".$userid."'");
   $commsionlt5fetch=mysqli_fetch_assoc($commsionlt5);
   
    $commsionlt6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level6id`='".$userid."'");
   $commsionlt6fetch=mysqli_fetch_assoc($commsionlt6);
   
   
   $withLt1c = $commsionlt1fetch['total']+$commsionlt2fetch['total']+$commsionlt3fetch['total']+$commsionlt4fetch['total']+$commsionlt5fetch['total']+$commsionlt6fetch['total'];
   
   
   
   
   $yesterday = date("Y-m-d", strtotime("yesterday"));
    
    
    
    
    
    
    
   //commission yesterday
    $commsionyl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `  `level1id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionyl1fetch=mysqli_fetch_assoc($commsionyl1);
    
    // level1 trx commision
    $commsionyltrx1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level1id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionyltrx1fetch=mysqli_fetch_assoc($commsionyltrx1);
    
    $trxcomm1 = $commsionyltrx1fetch['total'];
    
    // level2 trx commision
    $commsionyltrx2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level2id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionyltrx2fetch=mysqli_fetch_assoc($commsionyltrx2); 
    
    $trxcomm2 = $commsionyltrx2fetch['total'];
    
    // level3 trx commision
    $commsionyltrx3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level3id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionyltrx3fetch=mysqli_fetch_assoc($commsionyltrx3);
    
    $trxcomm3 = $commsionyltrx3fetch['total'];
    
    // yesterday total trx commission
    
    $yesterdayalltrxcomm =$trxcomm1+$trxcomm2+$trxcomm3 ;  
    
    
    // level1 USDT commision
    $commsionylusdt1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level1id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionylusdt1fetch=mysqli_fetch_assoc($commsionylusdt1);
    
    $usdtcomm1 = $commsionylusdt1fetch['total'];
    
    // level2 USDT commision
    $commsionylusdt2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level2id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionylusdt2fetch=mysqli_fetch_assoc($commsionylusdt2); 
    
    $usdtcomm2 = $commsionylusdt2fetch['total'];
    
    // level3 USDT commision
    $commsionylusdt3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level3id`='".$userid."' and date(`createdate`)='".$yesterday."'");
    $commsionylusdt3fetch=mysqli_fetch_assoc($commsionylusdt3);
    
    $usdtcomm3 = $commsionylusdt3fetch['total'];
    
    // yesterday total trx commission
    
    $yesterdayallusdtcomm =$usdtcomm1+$usdtcomm2+$usdtcomm3 ; 
                        
                        
                        
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
   
   
   
    //commission week trx
    $commsionwlt1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level1id`='".$userid."' and date(`createdate`)>'".$weekend."'");
                        $commsionwlt1fetch=mysqli_fetch_assoc($commsionwlt1);
                        
   $commsionwlt2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level2id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwlt2fetch=mysqli_fetch_assoc($commsionwlt2);
   
    $commsionwlt3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level3id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwlt3fetch=mysqli_fetch_assoc($commsionwlt3);
   
    $commsionwlt4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level4id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwlt4fetch=mysqli_fetch_assoc($commsionwlt4);
   
    $commsionwlt5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level5id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwlt5fetch=mysqli_fetch_assoc($commsionwlt5);
   
    $commsionwlt6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `curr`='trx' and `level6id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwlt6fetch=mysqli_fetch_assoc($commsionwlt6);
   
  
   $withLwt1c = $commsionwlt1fetch['total']+$commsionwlt2fetch['total']+$commsionwlt3fetch['total']+$commsionwlt4fetch['total']+$commsionwlt5fetch['total']+$commsionwlt6fetch['total'];
   
   
   
   
   
    //commission week usdt
    $commsionwl1=mysqli_query($con,"select sum(level1amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level1id`='".$userid."' and date(`createdate`)>'".$weekend."'");
                        $commsionwl1fetch=mysqli_fetch_assoc($commsionwl1);
                        
   $commsionwl2=mysqli_query($con,"select sum(level2amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level2id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl2fetch=mysqli_fetch_assoc($commsionwl2);
   
    $commsionwl3=mysqli_query($con,"select sum(level3amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level3id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl3fetch=mysqli_fetch_assoc($commsionwl3);
   
    $commsionwl4=mysqli_query($con,"select sum(level4amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level4id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl4fetch=mysqli_fetch_assoc($commsionwl4);
   
    $commsionwl5=mysqli_query($con,"select sum(level5amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level5id`='".$userid."' and date(`createdate`)>'".$weekend."'");
   $commsionwl5fetch=mysqli_fetch_assoc($commsionwl5);
   
    $commsionwl6=mysqli_query($con,"select sum(level6amount) as total FROM `tbl_bonussummery` WHERE `curr`='usdt' and `level6id`='".$userid."' and date(`createdate`)>'".$weekend."'");
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
    height: auto;
    color: #fff;
    background-color: #f95959;
    padding-top: 0.6rem;
    background-image: url(https://91club.com/assets/png/promotionbg-9dcd78e9.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    padding-bottom: 60px;
         }
         .child {   margin:0 10px;
         width: 100%%;
         float: center;
         flex: 1;
         padding:10px 10px;
             display: flex;
    flex-direction: column;
    align-items: center;
         /*border-radius:10px;*/
         /*border: 1.50px solid red;*/
         }
         .child span{
                height: 24px;
    /* min-width: 16px; */
    background: #ff8d8d;
    border-radius: 0.66667rem;
    line-height: 20px;
    text-align: center;
    font-size: 10px;
    margin-bottom: 4px;
    white-space: nowrap;
    padding: 2px 12px;
    width: 100%;
    letter-spacing: 2px;
         }
         .child p{
        font-size: 10px;
    margin-bottom: 10px;
    text-align: center;
        font-weight: 500;
         }
         .inivite{
         padding: 5px;   
         }
         img{
         height: 26px;
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
             height: 35px;
             width: 100%;
             background: linear-gradient(180deg,#ff867a 0%,#f95959 100%);
             box-shadow: 0 0.05333rem #e74141;
             border-radius: 24px;
             color: #fff;
             border: none;
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
            text-align: center;
    position: relative;
    top: -75px;
    background: #fff;
    width: auto;
    margin: 2px 20px;
    left: 0;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    padding: 2px;
         } 
         .appHeader1 {
    width: 100%;
    background-image: none;
    background:#f8f9fd;
    color: black;
    z-index: 999;
    padding: 0 24px;
    height: 55px;
    text-align: center;
}
.appHeader1 .pageTitle {
      padding-top: 14px;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 0px;
    color: black !important;
    font: inherit;
}
.appHeader1 .back {
    position: absolute;
    top: 20%;
    left: 0.6rem;
    height: 28px;
}
font {
           display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    font-size: 10px;
    font-weight: 400;
    color: #888888;
}
.colmh{
        height: 40px;
    line-height: 45px;
    background-color: #f6f6f6;
    color: #151515;
    font-size: 12px;
    padding-left: 22px;
    background-image: url(./images/tm.png);
    background-size: 25px;
    background-repeat: no-repeat;
    background-position: 4px center;
}
font span{
        color: red;
    /* position: relative; */
    display: flex;
    position: relative;
    font-size: 18px;
}
.colm{
        position: relative;
    width: 50%;
}
.mmn{
    text-align: center;
    position: relative;
    top: -75px;
    background: transparent;
    width: auto;
    margin: 4px 28px;
    left: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 2px;
}
.ibt{
    padding: 4px 2px;
}
.quikl{
    display: flex;
    flex-direction: column;
    align-items: center;
}
.qcell{
    background: #fff;
    width: 100%;
    margin: 8px 0;
    display: flex;
    justify-content: space-between;
    height: 50px;
    align-items: center;
    padding: 5px 10px;
}
.appBottomMenu .item span {
    display: block;
    font-size: 14px !important;
    font-weight: 400;
    position: absolute;
    left: 0;
    bottom: 2px;
    right: 0;
}
#header {
    position: fixed;
    top: 0;
    background-color: #f8f9fd;
    color: #333;
    font-size: 20px;
    width: 100%;
    z-index: 9999;
}
      </style>
   </head>
   <body style="background:#f6f7ff">
     
       <div  id="header">
      <div class="appHeader1">
          <div class="left ">
            <a href="main" class="icon goBack"> <img  src="images/back.png" class="back"> </a> 
          </div>
         <div class="pageTitle">Agency</div>
         <div class="right ">
            <a href="promotionrecord" class="icon goBack"> <img  src="images/mt.png" class="back"> </a>
         </div>
         <div class="left "></div>
        </div>
      </div>
     
    
      <div class='parent' style="margin-top:50px">
          
          
         <div style=""class='child' >
           
            <div style="font-size: 26px;font-size: 20px;width: 100%;display: flex;justify-content: space-evenly;align-items: center;margin-bottom: 6px;"><div>TRX</div> <div><?php echo round($yesterdayalltrxcomm,3);?></div></div>
             <div style="font-size: 26px;font-size: 20px;width: 100%;display: flex;justify-content: space-evenly;align-items: center;margin-bottom: 6px;"><div>USDT</div> <div style="margin-right: 6px;"><?php echo round($yesterdayallusdtcomm,3);?></div></div>
             <span style="font-weight:500;font-size:14px;    display: block;">Yesterday Total Commission </span>
             <p>Upto the level 6 income is available</p>
         </div>
         
         
       
         
         
         
         
      </div>
        <div style=" " class='child1'>
            <div class="colm">
                <div class="colmh">
                    
                    <!--<img src="images/tm.png">-->
                    Direct subordinates
                    
                    
                </div>
                <font style="    margin-top: 5px;">
                    
                    <span style="color:red"><?php echo round($userlevel1todays);?></span> Today's Invite</font><br>
                <font style="    margin-top: 21px;"><span style="color:red"><?php echo round($userlevel1Rows);?></span>Direct subordinates</font><br>
                
                <font style="    margin-top: 21px;"><span style="color:red"><?php echo $almemberlv3;?> </span>Total Team</font><br>
                
                
                
                
            </div>
            
            <div class="colm">
                <div class="colmh">
                    
                    <!--<img src="images/tm.png">-->
                    Team Commission
                    
                    
                </div>
                <font style="margin-top: 5px;"><span style="color:red">0</span>Today new Team Size</font><br>
                
                
                
                <font> <div style="color:red;font-size: 14px;width: 100%;display: flex;justify-content: center;align-items: center;margin-bottom: 0px;gap: 10px;"><div>INR</div> <div><?php echo round($withLwt1c,3);?></div></div>
                
                    </font>
                    <font> <div style="color:red;font-size: 14px;width: 100%;display: flex;justify-content: center;align-items: center;margin-bottom: 0px;gap: 10px;"><div></div> <div><?php echo round($withLw1c,3);?></div></div>
                
                     Commision for the Week</font><br>
                
                <font> <div style="color:red;font-size: 14px;width: 100%;display: flex;justify-content: center;align-items: center;margin-bottom: 0px;gap: 10px;"><div>INR</div> <div><?php echo round($withL1c,3);?></div></div>
                
                    </font>
                <font>
                    <div style="color:red;font-size: 14px;width: 100%;display: flex;justify-content: center;align-items: center;margin-bottom: 0px;gap: 10px;"><div></div> <div><?php echo round($withLt1c,3);?></div></div>
                    Total Commision</font>
                
                
                
                
                
                
            </div>
            
            
            <!--<font>Number of Direct subordinates:<span style="color:red"><?php echo round($userlevel1Rows);?></span></font><br>-->
            
            
            <!---->
            <!---->
            
         </div>
      
      
      <div class="mmn">
          
          <div class="ibt"> <button onclick="window.location.href='invite';">INVITE LINK </button> </div>
          <div class="quikl">
              
              <div class="qcell" onclick="copyToClipboard('#p1')">
                  <div class="clt">
                      <img src="./images/cic.png">
                      <span> Copy Invitation Code</span>
                  </div>
                  
                  <div class="clt">
                      
                      <span id="p1"> <?php echo $owncode;?></span>
                      <img src="./images/ar.png">
                  </div>
              </div>
              
              <div class="qcell" onclick="window.location.href='team';">
                  <div class="clt">
                      <img src="./images/tmr.png">
                      <span> Team Report</span>
                  </div>
                  
                  <div class="clt">
                      
                      <!--<span> 1266387823</span>-->
                      <img src="./images/ar.png">
                  </div>
              </div>
              
              <div class="qcell" onclick="window.location.href='bonushistory';">
                  <div class="clt">
                      <img src="./images/commission-1a0e795f.png">
                      <span> Commission Detail</span>
                  </div>
                  
                  <div class="clt">
                      
                      <!--<span> 1266387823</span>-->
                      <img src="./images/ar.png">
                  </div>
              </div>
              
              <div class="qcell">
                  <div class="clt">
                      <img src="./images/itr.png">
                      <span>Invitation Rule</span>
                  </div>
                  
                  <div class="clt">
                      
                      <!--<span> 1266387823</span>-->
                      <img src="./images/ar.png">
                  </div>
              </div>
              
              <div class="qcell">
                  <div class="clt">
                      <img src="./images/server-b7c71127.png">
                      <span>Agent Line Customer Service</span>
                  </div>
                  
                  <div class="clt">
                      
                      <!--<span> 1266387823</span>-->
                      <img src="./images/ar.png">
                  </div>
              </div>
              
              
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