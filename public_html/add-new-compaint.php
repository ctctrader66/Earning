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
      <title>Add new complaint</title>
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
         border-radius: 5px 5px 5px 5px;
         border: 0.5px solid white;
         color: white;
         transition: 0.5s;
         }
         label{
         color:#7d7d7d;
         font-weight:400;
         font-size:14px;
         }
         .btnn{
         width: 65%;
         padding: 12px 0;
         text-align: center;
         border: 0;
         border-radius: 2px;
         color: #fff;
         font-size: 14px;
         background: #009688;
         box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
         }
         .textarea{
         background: transparent;
         font-size: 16px;
         border: 0;
         border-bottom: 1px solid #919191;
         }
         .form-control{box-shadow:none; border-bottom:#ccc solid 1px; height:26px; margin-bottom:3px;}
         .form-group{margin-bottom:0px;}
         .form-group.>label {
         bottom: 34px;
         left: 8px;
         position: relative;
         background-color: white;
         padding: 0px 5px 0px 5px;
         font-size: 1.1em;
         transition: 0.1s;
         pointer-events: none;
         font-weight: 500 !important;
         transform-origin: bottom left;
         }
         label{
         padding-top:10px;
         color:#7d7d7d;
         font-weight:400;
         font-size:14px;
         }
           .sumbitbtn{
         border-radius: 5px; height:45px; font-weight: 400; font-size: 14px;  
         width: 320px;
         margin: 0 auto;
         border: 1px solid #FE3B3B;
         color: #fff;
         background-color: #FE3B3B;
         box-shadow: 0 0 0px 0px rgb(92 186 71 / 60%);
         }
         .sumbitbtn:focus{
             outline:none;
         }
         select:focus{
             outline:none;
         }
      </style>
      <script> function myFunction() {
         document.getElementById("whatsapp").value = "";
          }
      </script>
   </head>
   <body>
      <?php
         include("include/connection.php");
         $userid = $_SESSION['frontuserid']; ?>
      <!-- Page loading -->
      <?php include('loading.php'); ?>
      <!-- * Page loading -->
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="#" class="icon goBack" onClick="goBack();"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Add Complaints & Suggestion</div>
      </div>
      <!-- appCapsule -->
      <div id="appCapsule" class="pb-2">
         <div class="appContent1 pb-5">
            <form action="" id="complaint-form">
               <input type="hidden" name="userid" value="<?php echo $userid ?>">
               <div class="form-group mb-2">
                  <label for="">Type: </label>
                  <select required name="type" id="" class="textarea">
                     <option value="">Select</option>
                     <option value="suggestion">Suggestion</option>
                     <option value="consult">Consult</option>
                     <option value="recharge">Recharge Problem</option>
                     <option value="withdraw">Withdraw Problem</option>
                     <option value="parity">Parity Problem</option>
                     <option value="gift">Red Envelope Problem</option>
                     <option value="other">Other</option>
                  </select>
               </div>
               <div class="form-group mb-2">
                  <label for="">Your Name</label>
                  <input type="text" required class="form-control textarea" name="outid">
               </div>
               <div class="form-group mb-2">
                  <label for="">Whatsapp</label>
                  <input type="tel" maxlegnth="13" onfocus="myFunction()" class="form-control textarea" required id="whatsapp" name="whatsapp">
               </div>
               <div class="form-group mb-2">
                  <label for="">Description</label>
                  <textarea name="description" required minlegnth="10" class="form-control textarea" cols="10" rows="3"></textarea>
               </div>
               <p  class="text-center">Service: 10:00~17:00, Mon~Fri about 1~5 business days</p>
               <div class="text-center mt-3">
                  <button type="submit" class="sumbitbtn"> Continue </button>
               </div>
            </form>
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
      <script>
         $(document).ready(function() {
             $('#example').DataTable();
         });
         
         $("#complaint-form").submit(function(e) {
             e.preventDefault()
         
             var data = new FormData(this)
         
             $.ajax({
                 method: "post",
                 url: "add-complaint-now.php",
                 data: data,
                 contentType: false,
                 processData: false,
                 success: function(response) {
                     if (response == 1) {
                         alert("Complaint Sent");
                         window.location.replace("complaint.php")
                     }else {
                         alert("Something went wrong!")
                     }
                 }
             });
         })
      </script>
   </body>
</html>