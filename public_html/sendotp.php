<?php

// POST Data
$data['mobile'] = $_POST['mobile'];
$data['email'] = $_POST['email'];
 
$con = @mysqli_connect('localhost', 'a21lu917_akash', 'a21lu917_akash', 'a21lu917_akash');
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
                                                    Enter the OTP (One time password) to login your account on my-wingo.com
                                                </td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="text-center content-block" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    <a href="" class="btn-primary" style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; color: #FFF; text-decoration: none; line-height: 2em; font-weight: bold; text-align: center; cursor: pointer; display: inline-block; border-radius: 5px; text-transform: capitalize; background-color: #f1556c; margin: 0; border-color: #f1556c; border-style: solid; border-width: 8px 16px;">'.$token.'</a>
                                                </td>
                                            </tr>
                                            <tr style="font-family: Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                <td class="content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                                    Thanks for choosing <b>my-wingo.com</b> Admin.
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
                                    <td class="aligncenter content-block" style="font-family:Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 12px; vertical-align: top; color: #999; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">my-wingo.com
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
                            
                            
                          
                            $textversion= 'One Time Password - noreply@91clubs.live';
                            
                             
                            $email_to = $cust_email;
                            $fromserver = "noreply@91clubs.live"; 
                            
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                            $mail->Host       = 'hosting.secureserver.net';                   // Set the SMTP server to send through
                            $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'noreply@91clubs.live';              // SMTP username
                            $mail->Password   = '91club@123';                             // SMTP password
                            //$mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            

                            $mail->setFrom('noreply@91clubs.live', 'my-wingo.com');
                            $mail->addAddress($email_to);               // Name is optional
                            $mail->isHTML(true);
                            $mail->Subject = 'One Time Password - noreply@91clubs.live';
                            $mail->Body    = $output;
                            $mail->AltBody = $textversion;

                            if(!$mail->Send()){
                            //echo "Mailer Error: " . $mail->ErrorInfo;
                            echo '0';
                            }else{
                                
                            $sql= mysqli_query($con,"INSERT INTO `tbl_otp` (`otp`, `mobile`) VALUES ('".$token."','".$cust_email."')");    
                            echo '1';
                            
                            }
                             
                             
   }
   
   
   exit;


?>