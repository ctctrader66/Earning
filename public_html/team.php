<?php 
   ob_start();
   session_start();
   
    if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
      
   include("include/connection.php");
   $userid=$_SESSION['frontuserid'];
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
         background:#f7f8ff;
         }
         .heading{
         background:#f7f8ff;
         width:100%;
         padding:10px 20px;
         }
         .appHeader1 {
    width: 100%;
    background-image:none;
     background:#f7f8ff;
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
#header {
    position: fixed;
    top: 0;
    background-color: #fff;
    color: #333;
    font-size: 16px;
    width: 100%;
}
.back{
     position: absolute;
         top: 6%;
         left: 0.6rem;
         height: 26px;
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
         margin: 15px;
         background: #fff;
         box-shadow: 0 0.13333rem 0.29333rem 0.02667rem rgb(0 0 0 / 12%);
         border-radius: 0.10667rem;
         overflow-y: auto;
         }
         .contenor1{
         margin: 15px;
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
         .table{margin-top:-5px;}
.cont{
    position:relative;
    width: 100%;
    margin: 2px 15px;
    margin-top: 50px;
}
.cont input{
   width: 90%;
    padding: 6px 20px;
    outline: none;
    border: none;
    border-radius: 18px;
    background: #fff;
    box-shadow: 0 0.05333rem 0.21333rem #d0d0ed5c;
    font-size: 12px;
}
.cont img{
       position: absolute;
    right: 50px;
    top: 10%;
    width: 50px;
    height: 30px;
    background:none;
}
      </style>
   </head>
   <body style="background:#f7f8ff">
     
         <div  id="header">
      <div class="appHeader1">
          <a class="left" href="/promotion.php"><img  src="./images/icons8-arrow-50.png" class="back"></a>
         <div class="pageTitle">Team</div>
         <div class="right ">
            <!--<a href="promotionrecord.php" class="icon goBack"> <img  src="images/promo.png" class="back"> </a>-->
         </div>
      </div>
     
      </div>
      
      <div class="cont">
          <input type="text" placeholder="Search">
          <img src="images/searchIcon1-c3f810ad.png">
      </div>
      
      
      
      
      <div style="margin-top:10px" class="heading  md-3">
         <span></span>
      </div>
      <div class="contenor1">
         <span>Total Bet Amount: 0</span>
         <span style="float:right;padding-right:15px;">Total Rebate Amount: 0</span>
      </div>
      <div class="contenor">
         <div class="table">
            <?php 
               $userlevel1Data=mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' order by id desc");?>
            <table id="l1reportTable" class="table table-borderless" style="border-bottom: 1px solid #E5E9F2;">
               <thead>
                  <tr>
                     <th>UID</th>
                     <th>Nike Name</th>
                     <th>Turnover</th>
                     <th>Status</th>
                     <th>Operate</th>
                  </tr>
               </thead>
               <tbody>
                  <?php while($row=mysqli_fetch_array($userlevel1Data)){ 
                     ?>
                  <tr>
                     <td>
                        <?=$row['id']?>
                     </td>
                     <td>
                        <?php echo substr($row['username'],0,-6);?>..
                     </td>
                     <td>
                        <?php
                           $commisionl1 = mysqli_query($con,"SELECT sum(amount) as commision 
                               from tbl_betting where userid = '".$row['id']."' ");
                           $commision = mysqli_fetch_array($commisionl1);
                           echo round($commision['commision'],2);
                           ?>
                     </td>
                     <td><?php if($row['status'] == 1 ){echo "Enable";}else{echo "Disable";}?></td>
                     <td>Details</td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
            <?php   $total_bet1 = mysqli_query($con,"select *  from `tbl_user` where `code`='".$owncode."' ");
               $wagar_bet1=mysqli_fetch_array($total_bet1);
               if($wagar_bet1 > 0 ){echo ' <div style="text-align:center" class="mb-1"><span style="font-size:15px; color:#9697A6"> No More</span></div>';}else{echo '<div class="box">
                           <div class="cardview">
                              <img src="images/orderbg.png">
                              <div class="con">
                                 <span>No Data available</span>
                                 <p></p>
                              </div>
                           </div>
                        </div>';}?>
         </div>
      </div>
      <!--end-->
      <!-- appCapsule -->
      <?php include("include/footer.php");?>
      <!-- Jquery --> 
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <?php  include("include/pagestrick.php");?>
      <!--<script src="assets/js/jquery.dataTables.min.js"></script>--> 
      <script>
         $(function () {
           $('#l1reportTable').DataTable({
           "paging": true,
         "lengthChange": false,
         "searching": false,
         "ordering": false,
         "info": true,
         "autoWidth": false
           });
         });
         
      </script>
   </body>
</html>