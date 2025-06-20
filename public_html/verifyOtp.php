<?php
$con = @mysqli_connect('localhost', 'gameonly_91club', 'gameonly_91club', 'gameonly_91club');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
date_default_timezone_set("Asia/Calcutta");
    
    use PHPMailer\PHPMailer\PHPMailer;
    
    require ('vendor/autoload.php');
   
   if (isset($_POST['email'])) {
       
      
      $cust_email = $_POST['email'];
      
      
      
      $token = rand(100000,999999);
      
      
      session_start();
      
      $_SESSION['otp'] = $token;
      
      
    
      
    
    $mail = new PHPMailer;
    
                            $output = '<table class="body-wrap" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;" bgcolor="#f6f6f6">
    <tbody>
        <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;"
                valign="top">
                <div class="content" style="font-family: ,Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;"
                        bgcolor="#fff">
                        <tbody>
                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 16px; vertical-align: top; color: #fff; font-weight: 500; text-align: center; border-radius: 3px 3px 0 0; background-color: #38414a; margin: 0; padding: 20px;"
                                    align="center" bgcolor="#71b6f9" valign="top">
                                    <a href="#" style="font-size:32px;color:#fff;"> OTP</a> <br>
                                    <span style="margin-top: 10px;display: block;">Verify Your Account.</span>
                                </td>
                            </tr>
                            <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-wrap" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 20px;" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                        <tbody>
                                            <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    Valid for <strong style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">15
                                minutes</strong> only.
                                                </td>
                                            </tr>
                                            <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    Enter the OTP (One time password) to login your account on 7lottery.org
                                                </td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="text-center content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    <a href="" class="btn-primary" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f1556c; margin: 0; border-color: #f1556c; border-style: solid; border-width: 8px 16px;">'.$token.'</a>
                                                </td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    Thanks for choosing <b>7lottery.org</b> Admin.
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="footer" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; clear: both; color: #999; margin: 0; padding: 20px;">
                        <table width="100%" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                            <tbody>
                                <tr style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                    <td class="aligncenter content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">7lottery.org
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </td>
            <td style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
        </tr>
    </tbody>
</table>';
                            
                            
                          
                            $textversion= 'One Time Password - 7lottery.org';
                            
                             
                            $email_to = $cust_email;
                            $fromserver = "yourotp@91club.official-scripthub.fun"; 
                            
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                            $mail->Host       = 'smtp.hostinger.com';                   // Set the SMTP server to send through
                            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'yourotp@91club.official-scripthub.fun';              // SMTP username
                            $mail->Password   = 'xclubpro_shivang';                             // SMTP password
                            //$mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            

                            $mail->setFrom('yourotp@91club.official-scripthub.fun', '7lottery.org');
                            $mail->addAddress($email_to);               // Name is optional
                            $mail->isHTML(true);
                            $mail->Subject = 'One Time Password - yourotp@91club.official-scripthub.fun';
                            $mail->Body    = $output;
                            $mail->AltBody = $textversion;

                            if(!$mail->Send()){
                            echo "Mailer Error: " . $mail->ErrorInfo;
                            }else{
                            
                            
                             }
                             
    
    $sql= mysqli_query($con,"INSERT INTO `tbl_otp` (`otp`, `mobile`) VALUES ('".$token."','".$cust_email."')");                                   
                             
   }
   
   ?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <?php include'head.php' ?>
      <link rel="stylesheet" href="assets/css/style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
      <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
      <meta name="description" content="">
      <meta name="keywords" content="" />
      <style>
         .appContent3 .back{
         position: absolute;
         top: 5%;
         left: 0.6rem;
         height: 30px;
         }
         .appContent3 .logo{
         position: absolute;
         top: 45%;
         right: 1rem;
         height: 45px;
         }
         .appContent1{
         padding: 0.66667rem 0.8rem;
         background-color: #fff;
         }   
         .inner-addon{
         border: 2px solid #FBCCCA;
         border-radius:10px;
         }
         .inner-addon .icon{
         padding:15px 12px;
         font-size: 22px;
         }
         /*.left-addon.custom-left  input{*/
         /*    padding-left:40px;*/
         /*}*/
         .number-img img{
         position: absolute;
         height:22px;
         top: 12px;
         left: 13px
         }
         .textbox1{
         margin-left:30px;
         }
         .appHeader1 {
         width: 100%;
         background-image: linear-gradient(90deg,#E41A06,#E41A06);
         color: #fff;
         z-index: 999;
         padding: 0 24px;
         height:55px;
         text-align: center;
         }
         .appHeader1 .right{
         position: absolute;
         top: 1%;
         right: 0.6rem;
         height: 30px;
         }
         .appHeader1 .back{
         position: absolute;
         top: 23%;
         left: 0.6rem;
         height: 30px;
         }
         .appHeader1 .pageTitle {
         font-size: 21px;
         font-weight: 400;
         letter-spacing: .02em;
         color:#fff;
         }
         input::placeholder {
         color: #757575 !important;
         }
         .textbox{
         box-shadow: 0px 0px;
         height: auto;
         width:auto;
         color: #fff;
         outline: none;
         border: none;
         border-radius: 8px;
         font-size: 17px;
         font-weight: 400;
         cursor: pointer;
         transition: all 0.4s ease;
         }
         .textbox:focus{
         background:transparent;
         border:none;
         outline:none;
         }
         .login{
         border-radius: 5px; height:45px; font-weight: 400; font-size: 14px;  
         width:320px;
         margin: 0 auto;
         border: 2px solid #707070;
         color: #fff;
         background-color: #707070;
         }
         .submit{
          border-radius: 5px; height:45px; font-weight: 500; font-size: 14px;  
         width: 320px;
         margin: 0 auto;
         border: 1px solid #1BE18C;
         color: #fff;
         background-color: #1BE18C;
         box-shadow: 0 0 0px 0px rgb(207 0 69 / 15%);
         }
         .image{
         width:20px;
         }
         .parent{
         text-align:center;
         display: flex;
         width:100%;
         }
         .child{
         width: 50%;
         float: left;
         flex: 1;
         padding:15px 10px 0px 15px;
         font-size: 19px;
         border-top: 1.50px solid #f7f7f7;
         }
         button:focus{
         outline:none;
         }
         .child button {
         color: #2C3E50;
         border:none;
         padding:0 20px;
         font-weight:500;
         background: transparent;
         text-align:center;
         }
         .child .colour {
         color: #6ABE57;
         }
          .textbox1{
         margin-left:30px;
         }
         .appHeader1{
           color:#000;   
           width: 700px;
           height: 53px;  
           background:#151963;
         }
         .pageTitle{
             
          margin-right:300px;   
             
         }
         
      </style>
   </head>
   <body>
      <?php include("include/connection.php");?>
      <!-- App Header -->
      <div class="appHeader1">
         <div class="left">
            <a href="login.php" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
         </div>
         <div class="pageTitle">Register</div>
      </div>
      <div  id="appCapsule">
         <div style="background-color: #fff;
          background-image: linear-gradient(147deg, #fff 0%, #fff 74%); " class="appContent1 mb-2">
           <form action="registerNow.php" method="post" class="card-body" autocomplete="off">
               <p>OTP Sent to - <?php echo $cust_email;?></p>
                <p style="color:#959595; font-size:16px; font-weight:400;padding-bottom:10px;">OTP (One Time Password)</p>
               <div class="inner-addon left-addon custom-left">
                  <div class="number-img">
                     <img src="./images/mobile.png">
                  </div>
                  <span style="top: 12px;left: 30;position: absolute;font-weight:400;font-size: 17px;color: #f2413b;padding-left: 33px;">OTP</span>
                  <input type="hidden" name="mobile" id="mobile"  class="form-control textbox textbox1 "  placeholder="Mobile" value="<?php echo $_POST['mobile'];?>">
                  <input type="number" name="otp" id="otp"  class="form-control textbox textbox1 "  placeholder="Enter OTP" required>
               </div>
               
               
                  <input type="hidden" name="email" id="email"  class="form-control textbox"  placeholder="Email" value="<?php echo $_POST['email'];?>">
               
                  <input type="hidden" name="password" id="password" class="form-control textbox "  placeholder="Password" value="<?php echo $_POST['password'];?>">
               
                  <input type="hidden" name="rcode" id="rcode" class="form-control textbox "  placeholder="Referal Code" value="<?php echo $_POST['rcode'];?>">
               
               <input type="hidden" name="ip" value="<?php echo $_SERVER['REMOTE_ADDR']; ?>">
               <input type="hidden" name="action" value="register">
               <div class="form-group row mt-3 mb-3">
                  <div class="col-12">
                     <div class="custom-control custom-checkbox">
                        <input type="checkbox" style="background:red" checked class="custom-control-input" id="remember" name="remember">
                        <label  style="color:white" class="custom-control-label text-muted" for="remember">I Agree <a  style="color:#36688E" data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">PRIVACY POLICY</a></label>
                     </div>
                  </div>
               </div>
               <div>
                  <div class="text-center mt-3" style="">
                     <button type="submit" class="btn submit" value="register">Verify</button>
                  </div>
                  
               </div>
            </form>
         </div>
      </div>
      <!-- appCapsule -->
      <div id="registerthanksPopup" class="modal modalred fade" role="dialog" >
         <div class="modal-dialog regLog" role="document">
            <div class="modal-content regContent">
               <div class="modal-body">
                  <span class="text-center">Success</span>
               </div>
            </div>
         </div>
      </div>
      
      <div id="privacy" class="modal fade" role="dialog">
         <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 style="font-weight:normal;">Privacy Policy</h5>
               </div>
               <div class="modal-body responsive">
                  <?php echo content($con,"privacy");?>
               </div>
               <div class="modal-footer">
                  <a class="pull-left" data-dismiss="modal"><strong>CLOSE</strong></a>
               </div>
            </div>
         </div>
      </div>
      <!--account verification-->

      <style>
         .regLog{
         width: fit-content !important;
         margin: 0 auto !important;
         display: table !important;
         }
         .regContent {
         margin: 0 auto !important;
         padding: 1px 10px; !important;
         color: #fff !important;
         font-size: 10px !important;
         background-color: #FE3B3B !important;
         border-radius:7px !important;
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
         
         .modal{
         top:40%;
         }
         #accountVerificationform.modal{
         top:20%;
         }
      </style>
      <div id="alert" class="modal" role="dialog" >
         <div class="regLog" role="document">
            <div class=" regContent">
               <div class="" >
                  <div class="text-center" id="alertmessage">
                  </div>
               </div>
            </div>
         </div>
      </div>
       <div id="registertoast" class="modal" role="dialog" >
         <div class="regLog" role="document">
            <div class=" regContent">
               <div class="" >
                  <div class="text-center" id="regtoast">
                  </div>
               </div>
            </div>
         </div>
      </div>
  
      
      <!--end-->
      <script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
      <!-- Bootstrap--> 
      <script src="assets/js/lib/popper.min.js"></script> 
      <script src="assets/js/lib/bootstrap.min.js"></script> 
      <!-- Owl Carousel --> 
      <script src="assets/js/plugins/owl.carousel.min.js"></script> 
      <!-- Main Js File --> 
      <script src="assets/js/app.js"></script>
      <script src="assets/js/jquery.validate.min.js"></script>
      <script src="assets/js/account.js"></script>
   </body>
       
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
       <script>
         $(function(){
           $('#registertoast').on('show.bs.modal', function(){
               var registertoast = $(this);
               clearTimeout(registertoast.data('hideInterval'));
               registertoast.data('hideInterval', setTimeout(function(){
                   registertoast.modal('hide');
               }, 2000));
           });
         });
      </script>
</html>