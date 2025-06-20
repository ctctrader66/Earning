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
         h3 {
         font-weight: normal;
         font-size: 20px;
         }
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
         padding: 12px 25;
         text-align: center;
         border: 0;
         border-radius: 10px;
         color: #fff;
         font-size: 14px;
         background: #009688;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         }
         .textarea {
         box-shadow: 0px 0px;
         height: auto;
         width: 300;
         color: #fff;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 17px;
         font-weight: 400;
         margin: 0px 0;
         cursor: pointer;
         transition: all 0.4s ease;
         }
         button:focus {
         outline: none;
         color:#fff;
         }
      </style>
   </head>
   <body>
      <?php
         include("include/connection.php");
         
         $userid = $_SESSION['frontuserid'];
         
         $compid = $_GET['id'];
         
         ?>
      <!-- Page loading -->
      <?php include('loading.php'); ?>
      <!-- * Page loading -->
      <!-- App Header -->
       <div class="appHeader1">
         <div class="left">
            <a href="#" class="icon goBack" onClick="goBack();"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Complaint Conversation</div>
      </div>
      <!-- appCapsule -->
      <div id="appCapsule" class="pb-2">
         <div class="appContent1 pb-5">
            <div class="" style=" text-align:center; border-bottom: 1px solid #ccc; padding:10px 0px;">
               <?php $getdata = mysqli_query($con, "SELECT * FROM tbl_complaints WHERE id='$compid'");
                  $fetch = mysqli_fetch_array($getdata); ?>
               <table id="example" class="display" style="width:100%;">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Details</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td><?php echo $fetch['compid'] ?></td>
                        <td>
                           <p>Type: <?php echo ucfirst($fetch['type']) ?></p>
                        </td>
                        <td><?php if ($fetch['status'] == 0) {
                           echo "Pending";
                           } elseif ($fetch['status'] == 1) {
                           
                           echo "Open";
                           } elseif ($fetch['status'] == 2) {
                           
                           echo "Closed";
                           }
                           
                           ?></td>
                     </tr>
                     </tfoot>
               </table>
            </div>
            <div class="row mt-3" style="margin-bottom:-32px;">
               <div class="col-12 mb-2" style="border-bottom: 1px solid #ccc; padding: 5px 10px;">
                  <p style="margin:0 ;"><b><?php echo ucfirst($fetch['description']) ?></b></p>
                  <p style="margin:0 ;"><small>
                     User (<?php
                        $date = date_create($fetch['timestamps']);
                        
                        echo date_format($date, "d/M/Y H:i:s") ?>)
                     </small>
                  </p>
               </div>
            </div>
            <div class="row mt-3">
               <?php
                  $compid = $fetch['compid'];
                  
                  $getdata = mysqli_query($con, "SELECT * FROM complaint_chats WHERE compid='$compid'");
                  
                  ?>
               <?php
                  foreach ($getdata as $items) {
                  
                  ?>
               <?php
                  if ($items['usertype'] == 'admin') { ?>
               <div class="col-12 mb-2" style="border-bottom: 1px solid #ccc; padding: 5px 10px;text-align:right;color:#009688">
                  <p style="margin:0 ;"><b><?php echo ucfirst($items['message']) ?></b></p>
                  <p style="margin:0 ; color:#000000"><small >
                     Admin (<?php
                        $date = date_create($items['date']);
                        
                        echo date_format($date, "d/M/Y H:i:s") ?>)
                     </small>
                  </p>
               </div>
               <?php }
                  ?>
               <?php
                  if ($items['usertype'] == 'user') { ?>
               <div class="col-12 mb-2" style="border-bottom: 1px solid #ccc; padding: 5px 10px;">
                  <p style="margin:0 ;"><b><?php echo ucfirst($items['message']) ?></b></p>
                  <p style="margin:0 ;"><small>
                     User (<?php
                        $date = date_create($items['date']);
                        
                        echo date_format($date, "d/M/Y H:i:s") ?>)
                     </small>
                  </p>
               </div>
               <?php }
                  ?>
               <?php }
                  ?>
            </div>
            <?php if ($fetch['status'] == 1) {
               ?>
            <div class="">
               <form action="" id="complaintReply">
                  <input type="hidden" name="compid" value="<?php echo $fetch['compid'] ?>">
                  <div class="form-group">
                     <textarea name="message" placeholder="Enter a Message" cols="20" rows="3" required class="form-control textarea"></textarea>
                  </div>
                  <div class="form-group">
                     <button class="btn " >Send Reply</button>
                  </div>
               </form>
            </div>
            <?php } else {
               echo "<div class='col-lg-12'><h3 style='text-align:center; margin: 30px 0 0;'>Reply are closed due to complaint is closed!</h3></div>";
               } ?>
         </div>
      </div>
      <?php include("include/footer.php"); ?>
      <div id="alert" class="modal fade" role="dialog">
         <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
               <div class="modal-body" id="alertmessage"> </div>
               <div class="text-center pb-1">
                  <a type="button" class="text-info" data-dismiss="modal">OK</a>
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
      <script src="assets/js/addbankcard.js"></script>
      <script src="assets/DataTables/datatables.min.js"></script>
      <?php  include("include/pagestrick.php");?>
      <script>
         $(document).ready(function() {
         
             $('#example').DataTable();
         
         });
         
         
         
         $("#complaintReply").submit(function(e) {
         
             e.preventDefault()
         
         
         
             var data = new FormData(this)
         
             $.ajax({
         
                 url: "do_complaint_reply.php",
         
                 data: data,
         
                 method: "POST",
         
                 processData: false,
         
                 contentType: false,
         
                 success: function(res) {
         
                     if (res == 1) {
         
                         alert("Reply sent")
         
                         window.location.reload()
         
                     } else {
         
                         alert("Something went wrong!")
         
                     }
         
                 },
         
                 error: function(err) {
         
                     alert("Something went wrong!")
         
                 }
         
             })
         
         })
      </script>
   </body>
</html>