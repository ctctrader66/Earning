<?php
   ob_start();
   session_start();
  if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();} ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include 'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="assets/DataTables/datatables.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <style>
         .btn .error {
         margin-top: 55px;
         }
         .btn-group {
         box-shadow: none;
         }
         #alert h4 {
         font-size: 1rem;
         }
         #alert p {
         font-size: 13px;
         margin-top: 20px;
         }
         #alert .modal-content {
         border-radius: 3px
         }
         #alert .modal-dialog {
         padding: 20px;
         margin-top: 130px;
         }
         #confirm .modal-dialog {
         padding: 20px;
         margin-top: 130px;
         }
         .inner-addon select.error {
         font-size: 16px;
         position: unset;
         }
         .dropdown-menu {
         background: grey;
         top: -15px;
         left: -145px;
         border: none;
         border-radius: 0px;
         -webkit-box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
         box-shadow: 0 3px 1px -2px rgba(0, 0, 0, .2), 0 2px 2px 0 rgba(0, 0, 0, .14), 0 1px 5px 0 rgba(0, 0, 0, .12);
         }
         .appHeader1 .right {
         right: 20px;
         }
         .dropdown-item {
         padding: .75rem 1.5rem;
         }
         .btn {
         background-image: linear-gradient(#1a5684,
         #1a5684);
         border-radius: 5px 5px 5px 5px;
         border: 0.5px solid white;
         color: white;
         transition: 0.5s;
         }
         .dataTables_wrapper .dataTables_length {
         float: left !important;
         }
         .dataTables_wrapper .dataTables_filter {
         float: right !important;
         }
         div.dataTables_wrapper div.dataTables_filter input {
         display: block;
         }
         div.dataTables_wrapper div.dataTables_length select {
         display: block;
         }
         div.dataTables_wrapper div.dataTables_filter input {
         margin-left: 0;
         }
         h3 {
         font-weight:normal;
         }
         .tdtext{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .tdtext2{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .tdtext3{ font-size:16px !important; color:#000000 !important; font-weight:normal; text-align:right;}
         .text small{ font-size:14px; color:#000000;}
         .listView .listItem {
         color: #757575;
         font-size:14px;
         font-weight:400;
         padding: 0px 55px 0px 0px;
         }
         .listView .listItem .text {
         font-size: 16px;
         }
         .null_data{
         height: 33px;
         line-height: 33px;
         font-size: 12px;
         text-align: center;
         margin:0 auto;
         }
         .nav-tabs {
         background-image: linear-gradient(90deg,#cd0103,#f64841);
         color: #fff;
         font-size:14px;
         font-weight:400;
         padding:5px 3px 0px 3px
         }
         .nav-tabs .nav-item {
         text-align:center
         }
         .nav-tabs .nav-item i {
         font-size:20px;
         margin-bottom:-15px
         }
         .nav-tabs.iconed .nav-item i {
         margin-right:8px
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
         color:#fff;
         padding:0 16px;
         border-top:none;
         border-bottom:none;
         border-left:none;
         border-right:none;
         border-radius:0px;
         margin:0 !important;
         font-weight:500;
         font-size: 14px;
         }
         .nav-tabs .nav-link.active {
         color: #ffffff;
         font-size:14px;
         font-weight:500;
         background:transparent;
         border-bottom: 5px solid #ffffff;
         }
         .nav-tabs.size1, .nav-tabs.size2, .nav-tabs.size3, .nav-tabs.size4, .nav-tabs.size5 {
         display:-webkit-box;
         display:flex;
         -webkit-box-align:center;
         align-items:center;
         -webkit-box-pack:center;
         justify-content:center
         }
         .nav-tabs.size1 .nav-item {
         width:100%
         }
         .nav-tabs.size2 .nav-item {
         width:50%
         }
         .nav-tabs.size3 .nav-item {
         width:33.333333333333%
         }
         .nav-tabs.size4 .nav-item {
         width:25%
         }
         .nav-tabs.size5 .nav-item {
         width:20%
         }
         td{padding:15px 0px;}
         .imga{height:25px;width:25px;}
         .textcol{
         font-size:14px;
         color:#000;
         font-weight:400;
         }
         p {color:#000;}
         .tdtext{ font-size:14px !important; color:#757575 !important; font-weight:400; text-align:right;}
         .tdtext2{ font-size:14px !important; color:#757575 !important; font-weight:400; text-align:right;}
         .tdtext3{ font-size:14px !important; color:#757575 !important; font-weight:400; text-align:right;}
         .text small{ font-size:14px; color:#757575;}
         .listView .listItem {
         color: #757575;
         font-size:14px;
         font-weight:400;
         padding: 0px 55px 0px 0px;
         }
         .listView .listItem .text {
         color: #757575;
         font-size:14px;
         font-weight:400;;
         }
         .btnn{color:white;background:#DD1D1C;padding:2px 10px;}
         .imngg {height:5;width:15;}
         .content{padding:30px; 20px}
         .box{vertical-align:middle;margin:0;justify-content:center;}
         .box .cardview{background:transparent; justify-content:center; text-align:center;border-radius:15px;padding:20px;}
         .box .cardview img{height:240px;}
         .con{justify-content:center;text-align:center;}
         .con span{font-weight:400; font-size:18px; color:#A39799;}
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         $userid = $_SESSION['frontuserid']; ?>
      <!-- Page loading -->
      <?php include('loading.php'); ?>
      <!-- * Page loading -->
      <!-- App Header -->
      <div id="header">
       <div class="appHeader1">
         <div class="left">
            <a href="main.php" class="icon goBack" onClick="goBack();"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Complaint Records</div>
         <div class="right">
            <a href="add-new-compaint.php" class="text-white" style="font-size:20px"><img class="imga" src="images/plus.png"></a>
         </div>
      </div>

      <!-- appCapsule -->
      <ul class="nav nav-tabs size2" id="myTab3" role="tablist">
         <li class="nav-item"> 
            <a class="nav-link active" id="home-tab3" data-toggle="tab" href="#level1" role="tab">COMPLETED</a> 
         </li>
         <li class="nav-item"> 
            <a class="nav-link" id="profile1-tab3" data-toggle="tab" href="#level2" role="tab">WAIT</a>
         </li>
      </ul></div>
      <!--table-->
      <div style="margin-top:100px" id="appCapsule">
         <div class="mt-1">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade active show" id="level1" role="tabpanel">
                  <div id="appCapsule" style="background:white">
                     <div class=" ">
                        <table id="example1" class="table table-borderless" style="">
                           <thead>
                              <tr style="display:none;">
                                 <th></th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 @$userid=$_SESSION['frontuserid'];
                                    $summery=mysqli_query($con,"select * from `tbl_complaints` where `userid`='".$userid."' and status = 2 order by id desc");
                                 $summeryRows=mysqli_num_rows($summery);
                                 if($summeryRows!=''){
                                  while($summeryResult=mysqli_fetch_array($summery)){
                                 $post_date = $summeryResult['timestamps'];
                                 $post_date2 = strtotime($post_date);
                                 $convert=date('H:i d-m-Y ',$post_date2);
                                 $convert1=date('YmdHm',$post_date2);
                                  
                                 
                                 ?>
                              <tr>
                                 <td><?php echo $summeryResult['type'] ?>
                                    <br>Whatsapp: <?php echo $summeryResult['whatsapp'] ?><br>  <?php $new = $summeryResult['id'];
                                       $char = 'BCAFS';
                                            
                                             echo $convert1; echo $new;  echo $char;
                                             ?> 
                                 </td>
                                 <td class="tdtext"><?php echo $convert;?><br> Status: <?php if ($summeryResult['status'] == 0) {
                                    echo "Pending";
                                    } elseif ($summeryResult['status'] == 1) {
                                    echo "Open";
                                    } elseif ($summeryResult['status'] == 2) {
                                    echo "Closed";
                                    }
                                    ?><br><a class="btnn" href="complaint_details.php?id=<?php echo $summeryResult['id'] ?>">Check</a></td>
                              </tr>
                              <?php }}else{?>
                              <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                              <?php }?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--=========================tab-1 end========================================-->
               <!--=========================tab-2========================================-->
               <div class="tab-pane fade" id="level2" role="tabpanel">
                  <div id="appCapsule" style="background:white">
                     <div class=" ">
                        <table id="example2" class="table table-borderless" style="">
                           <thead>
                              <tr style="display:none;">
                                 <th></th>
                                 <th></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                                 @$userid=$_SESSION['frontuserid'];
                                    $summery=mysqli_query($con,"select * from `tbl_complaints` where `userid`='".$userid."' and status < 2 order by id desc");
                                 $summeryRows=mysqli_num_rows($summery);
                                 if($summeryRows!=''){
                                  while($summeryResult=mysqli_fetch_array($summery)){
                                 $post_date = $summeryResult['timestamps'];
                                 $post_date2 = strtotime($post_date);
                                 $convert=date('H:i d-m-Y ',$post_date2);
                                 $convert1=date('YmdHm',$post_date2);
                                  
                                 
                                 ?>
                              <tr>
                                 <td><?php echo $summeryResult['type'] ?>
                                    <br>Whatsapp: <?php echo $summeryResult['whatsapp'] ?><br>  <?php $new = $summeryResult['id'];
                                       $char = 'BCAFS';
                                            
                                             echo $convert1; echo $new;  echo $char;
                                             ?> 
                                 </td>
                                 <td class="tdtext"><?php echo $convert;?><br> Status: <?php if ($summeryResult['status'] == 0) {
                                    echo "Pending";
                                    } elseif ($summeryResult['status'] == 1) {
                                    echo "Open";
                                    } elseif ($summeryResult['status'] == 2) {
                                    echo "Closed";
                                    }
                                    ?><br><a class="btnn" href="complaint_details.php?id=<?php echo $summeryResult['id'] ?>">Check</a></td>
                              </tr>
                              <?php }}else{?>
                              <tr>
                              <td>
                                 <div class="box">
                                    <div class="cardview">
                                       <img src="images/orderbg.png">
                                       <div class="con">
                                          <span>No Data available</span>
                                          <p></p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                              <?php }?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <!--=========================tab-2 end========================================-->
            </div>
         </div>
      </div>
      <?php include("include/footer.php"); ?>
      <!-- Jquery -->
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap-->
      <script src="assets/js/lib/popper.min.js"></script>
      <script src="assets/js/lib/bootstrap.min.js"></script>
      <!-- Owl Carousel -->
      <script src="assets/js/plugins/owl.carousel.min.js"></script>
      <!-- Main Js File -->
      <script src="assets/js/app.js"></script>
      <script src="assets/js/addbankcard.js"></script>
      <script src="assets/js/jquery.dataTables.min.js"></script>
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
         $('#example2').DataTable({
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