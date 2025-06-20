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
         body{
         background:#FBFCFD;
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
         margin: 15px;
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
         .box{vertical-align:middle;margin:0;justify-content:center;}
         .box .cardview{background:transparent; justify-content:center; text-align:center;border-radius:15px;padding:20px;}
         .box .cardview img{height:240px;}
         .con{justify-content:center;text-align:center;}
         .con span{font-weight:400; font-size:18px; color:#A39799;}
      </style>
   </head>
   <body style="background:#F9FAFB">
      <?php
         include("include/connection.php");
         
            ?>
              <div  id="header">
      <div class="appHeader1">
         <div class="pageTitle">Promotion</div>
         <div class="right ">
            <a href="promotionrecord.php" class="icon goBack"> <img  src="images/promo.png" class="back"> </a>
         </div>
      </div>
      <ul class="nav nav-tabs size4">
         <li class="nav-item"> 
            <a class="nav-link " href="promotion.php" >Data</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link " href="team.php" >Team</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link active " href="#" >History</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link " href="tutorial.php" >Tutorial</a> 
         </li>
      </ul></div>
      <div style="margin-top:110px" class="row">
         <div class="col-12">
            <div class="contenor">
               <table id="example1" class="table table-borderless" style="border-bottom: 1px solid #E5E9F2;">
                  <thead>
                     <tr >
                        <th>Pick Up Time</th>
                        <th>Receive Amount</th>
                        <th>Operate</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        @$userid=$_SESSION['frontuserid'];
                           $summery=mysqli_query($con,"select `tbl_bonussummery`.*,`tbl_user`.mobile from `tbl_bonussummery` 
                           left join `tbl_user` on `tbl_user`.id = `tbl_bonussummery`.userid 
                           where `tbl_bonussummery`.`level1id`='".$userid."' order by `tbl_bonussummery`.id desc");
                        $summeryRows=mysqli_num_rows($summery);
                        if($summeryRows!=''){
                         while($summeryResult=mysqli_fetch_array($summery)){
                        $post_date = $summeryResult['createdate'];
                        $post_date2 = strtotime($post_date);
                        $convert=date('Y-m-d',$post_date2);
                        ?>
                     <tr>
                        <td>
                           <?php echo $convert;?>
                        </td>
                        <td><?php echo $summeryResult['level1amount'];?></td>
                        <td><a href="/team.php" style="color:#000">Details</a></td>
                     </tr>
                     <?php }}?>
                  </tbody>
               </table>
               <?php   $total_bet1 = mysqli_query($con,"SELECT * FROM `tbl_bonussummery` where level1id = '".$userid."' ");
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
      </div>
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
          <script>
         $(function () {
           $('#example1').DataTable({
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