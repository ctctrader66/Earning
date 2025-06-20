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
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <style>
         h3 {
         font-weight:normal;
         }
         .tdtext{ font-size:18px !important; color:#090 !important; font-weight:500; text-align:right;}
         .tdtext2{ font-size:18px !important; color:#f00 !important; font-weight:500; text-align:right;}
         .tdtext3{ font-size:18px !important; color:#FFB400 !important; font-weight:500; text-align:right;}
         strong{font-weight:700; }
         .text small{ font-size:15px; color:#888;}
         .listView .listItem {
         padding: 0px 55px 0px 0px;
         }
         .listView .listItem .text {
         font-size: 17px;
         }
        .appContent1{
            margin-top:-20px;
        }
         .imgicon{width:100px;}
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         include("loading.php");
         $userid=$_SESSION['frontuserid'];?>
      <!-- App Header -->
      <div id="header" class="appHeader1">
         <div class="left">
            <a href="main.php" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Transcation Record</div>
      </div>
      <!-- * App Header --> 
      <!-- App Capsule -->
      <div style="margin-top:55px;" id="appCapsule">
         <div class="appContent1 listView">
            <table class="table ">
               <thead>
               </thead>
               <tbody>
                  <?php
                     @$userid=$_SESSION['frontuserid'];
                        $summery=mysqli_query($con,"select * from `tbl_walletsummery` where `userid`='".$userid."' order by id desc");
                     $summeryRows=mysqli_num_rows($summery);
                     if($summeryRows!=''){
                      while($summeryResult=mysqli_fetch_array($summery)){
                     $post_date = $summeryResult['createdate'];
                     $post_date2 = strtotime($post_date);
                     $convert=date('Y-m-d H:i',$post_date2);
                     $actiontypearray=explode("~",$summeryResult['actiontype']);
                     @$actiontype=$actiontypearray[0];
                     @$actiontypeval=$actiontypearray[1];
                     if($actiontype=='recharge'){
                  ?>
     
        <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
    
      <div class="text"><div><strong style="font-weight:600">Recharge Increase</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }
      if($actiontype=='Signin'){
                  ?>
     
        <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
    
      <div class="text"><div><strong style="font-weight:600">Signin Received</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }
      if($actiontype=='join'){?>
         <tr>
         <td>
         <div class="listItem">
         <div class="image">
         <img class="imgicon" src="images/redwallet1.png">
         </div>
         <div class="text"><div><strong style="font-weight:600">Bet Decrease</strong><small><?php echo $convert;?></small></div></div>
         </div>
         </td>
         <td class="tdtext2">-<?php echo number_format($summeryResult['amount'],2);?></td>
         </tr>
         <?php }if($actiontype=='win'){?>
     
        <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
    
      <div class="text"><div><strong style="font-weight:600">Prize Increase</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }if($actiontype=='withdraw'){
         $chkwithdrawalQuery=mysqli_query($con,"select * from `tbl_withdrawal` where `id`='".$actiontypeval."'");
         $chkwithdrawalResult=mysqli_fetch_array($chkwithdrawalQuery);
         if($chkwithdrawalResult['status']==0){
         			?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/redwallet1.png">
      </div>
      
      <div class="text"><div><strong style="font-weight:600">Withdrawal Decrease</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext2">-<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }/*else if($chkwithdrawalResult['status']==1){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/redwallet1.png">
      </div>
      </div>
      <div class="text"><div><strong style="font-weight:600">Withdrawal</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext3">-<?php echo number_format($summeryResult['amount'],2);?><br>
      <small>Pending..</small></td>
      </tr>
      <?php }*/else if($chkwithdrawalResult['status']==2){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
    
      <div class="text"><div><strong style="font-weight:600">Withdrawal Back</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }?>
      <?php }if($actiontype=='envelope'){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
    
      <div class="text"><div><strong style="font-weight:600">Gift Income</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }if($actiontype=='reward'){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
   
      <div class="text"><div><strong style="font-weight:600">Reward Increase</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }
      if($actiontype=='task'){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
   
      <div class="text"><div><strong style="font-weight:600">Promote Reward</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }if($actiontype=='bonus'){?>
      <tr>
      <td>
      <div class="listItem">
      <div class="image">
      <img class="imgicon" src="images/greenwallet1.png">
      </div>
     
      <div class="text"><div><strong style="font-weight:600">Bonus Increase</strong><small><?php echo $convert;?></small></div></div>
      </div>
      </td>
      <td class="tdtext">+<?php echo number_format($summeryResult['amount'],2);?></td>
      </tr>
      <?php }}}?>
      </tbody>
      </table>
      <div style="text-align:center"class="p-1"><span style="font-size:15px; color:#9697A6"> No More</span></div>
      </div>
      </div>
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script> 
      <script src="assets/js/jquery.validate.min.js"></script> 
      <?php  include("include/pagestrick.php");?>
   </body>
</html>