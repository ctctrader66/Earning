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
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <meta name="description" content="Bitter Mobile Template">
      <meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
      <style>
         body{
         background:#F9FAFB;
         }
         .card {
         border: 1px solid #E5E9F2;
         border-radius: 3px;
         padding: 0px;
         }
         .card-title {
         margin-bottom: 7px;
         font-size:16px;
         font-weight:400;
         }
         .card-body {
         padding: .6rem;
         }
         td {
         padding: 3px;
         }
         .btn-sm {
         height: 26px;
         padding: 0px 12px;
         }
         #confirm h4 {
         font-size: 1rem;
         }
         #confirm p {
         font-size: 13px;
         margin-top: 20px;
         }
         #confirm .modal-content {
         border-radius: 3px
         }
         #confirm .modal-dialog {
         padding: 20px;
         margin-top: 130px;
         }
         .new{
         background:white;
         padding: 5px 10px;
         box-sizing: border-box;
         display: flex;
         flex-direction: row;
         justify-content: space-between;
         border-bottom: 5px solid #F9FAFB;
         }
         .left_icon{
         width: 13%;
         display: flex;
         justify-content: center;
         align-items: center;
         }
         .left_icon img{
         width: 40px;
         }
         .tz_close{
         display: flex;
         justify-content: flex-end;
         padding: 8px 5px 8px 15px;
         box-sizing: border-box;
         }
         .tz_close button {
         color: #00897b;
         font-size: 14px;
         padding: 5px 10px;
         border: 0;
         background: transparent;
         margin-left: 10px;
         }
         .tz_title{
         font-size: 24px;
         padding: 15px;
         font-weight:400;
         color:#000;
         }
         .signinInfo .signinfo{
         padding: 10px 0 10px 20px;
         }
         .boxx{
         background:transparent;  
         margin:10px 10px;
         }
         .imga{height:25px;width:25px;}
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         $userid = $_SESSION['frontuserid']; ?>
      <!-- * Page loading -->
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="#" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Manage Accounts</div>
         <div class="right ">
            <a href="addbankdetail.php" class="icon goBack"> <img  src="images/plus.png" class="back"> </a>
         </div>
      </div>
      <!-- searchBox -->
      <!-- * searchBox -->
      <!-- * App Header -->
      <!-- App Capsule -->
      <div id="appCapsule" >
         <div class=" ">
            <div class="tab-content" id="myTabContent">
               <!--=========================tab-1========================================-->
               <div class="tab-pane fade active show" id="bank" role="tabpanel">
                  <?php
                     $selectBankQuery = mysqli_query($con, "select * from `tbl_bankdetail` where `userid`='" . $userid . "' and `type`=(('bank') OR ('upi'))");
                     $bankRows = mysqli_num_rows($selectBankQuery);
                     if ($bankRows != '') {
                       while ($bankResult = mysqli_fetch_array($selectBankQuery)) {
                     ?>
                  <div class="boxx">
                     <div class="new">
                        <div class="left_icon">  <img src="/images/bankardicon.png">                  </div>
                        <div style="margin-left:-40px;"class="col-7 mt-1">
                           <h5 class="card-title"><?php echo $bankResult['email']; ?></h5>
                           <span style="color: #757575; font-size: 14px; font-weight:400"><?php echo $bankResult['address']; ?></span>
                        </div>
                        <div class="col-2 p-2">
                           <a href="javascript:void(0);" class="text-muted pull-right" onClick="delete_row(<?php echo $bankResult['id']; ?>)" style="font-size: 22px"><i class="fa fa-trash"></i></a></p>
                        </div>
                     </div>
                  </div>
                  <?php }
                     } else { ?>
                  <?php } ?>
               </div>
               <!--=========================tab-1 end========================================-->
               <!--=========================tab-2========================================-->
               <?php
                  $selectupiQuery = mysqli_query($con, "select * from `tbl_bankdetail` where `userid`='" . $userid . "' and `type`='upi'");
                  $upiRows = mysqli_num_rows($selectupiQuery);
                  if ($upiRows != '') {
                    while ($upiResult = mysqli_fetch_array($selectupiQuery)) {
                  ?>
               <?php }
                  } else { ?>
               <!--<div class="card mb-3">-->
               <!--                <div class="card-body">-->
               <!--                    <h5 class="card-title text-info"><em>Not found....</em> </h5>-->
               <!--                    <p class="text-center"><a href="addupidetail" class="text-danger"><i class="fa fa-plus"></i> Add UPI</a></p>-->
               <!--                </div>-->
               <!--            </div>-->
               <?php } ?>
            </div>
         </div>
      </div>
      </div>
      <!-- appCapsule -->
      <?php include("include/footer.php"); ?>
      <div id="confirm" class="modal " role="dialog">
         <div class="modal-dialog modal-sm p-5" role="document">
            <div class="modal-content" style="padding:8px;">
               <div class="">
                  <h5 class="tz_title">Confirm</h5>
                  <div class="signinInfo">
                     <p class="signinfo">Do you want to delete?</p>
                  </div>
                  <input type="hidden" id="deleteid" name="deleteid" value="">
                  <div class="text-center pb-1">
                     <div class="tz_close layout"><button   style="color: rgb(136, 136, 136);" data-dismiss="modal">CANCEL</button>
                        <a href="manage_bankcard.php"><button onClick="deletedetail();">DELETE</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Jquery -->
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
      <!-- Bootstrap-->
      <script src="assets/js/lib/popper.min.js"></script>
      <script src="assets/js/lib/bootstrap.min.js"></script>
      <!-- Owl Carousel -->
      <script src="assets/js/plugins/owl.carousel.min.js"></script>
      <!-- Main Js File -->
      <script src="assets/js/app.js"></script>
      <script type="text/javascript">
         function delete_row(Id) {
           $('#confirm').modal({
             backdrop: 'static',
             keyboard: false
           })
           $('#confirm').modal('show');
           $('#deleteid').val(Id);
         
         }
         
         function deletedetail() {
           var Id = $('#deleteid').val();
           //alert(Id);
         
           $.ajax({
             type: "Post",
             data: "id=" + Id + "& type=" + "delete",
             url: "addbankcardNow.php",
             success: function(html) {
               // alert(html)
               if (html == 1) {
                 window.location = '';
               } else if (html == 0) {
                 alert("Some Technical Problem");
         
               }
             },
             error: function(e) {}
           });
         }
      </script>
   </body>
</html>