<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:login.php");exit();}

error_reporting(E_ALL);
ini_set('display_errors', 1);

$userid =$_SESSION['frontuserid'];

include("include/connection.php");

function address($con, $column, $userid) {
    $query = "SELECT $column FROM tbl_bankdetail WHERE userid = $userid";
    $result = mysqli_query($con, $query);
    
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row[$column];
    }
    
    return "Unknown";
}

$withdrawalSuccess = false;
$insufficientBalance = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $userId = $_SESSION['frontuserid'];
    $withdrawalAmount = $_POST['userammount'];
    $withdrawalAddress = $_POST['address'];

    $checkBalanceQuery = "SELECT amount FROM tbl_wallet WHERE userid = $userid";
    $result1 = mysqli_query( $con,$checkBalanceQuery);
    $row1 = mysqli_fetch_assoc($result1);
    $balance = $row1['amount'];
    
    $checkrecharge = "SELECT * FROM nowpayment WHERE userid = $userid AND amount_status = 1";
    $result2 = mysqli_query($con, $checkrecharge);
    $rowCount = mysqli_num_rows($result2);
    
    $checkrechargea = "SELECT SUM(price_amount) AS total_amount FROM nowpayment WHERE userid = $userid AND amount_status = 1 ";
    $result3 = mysqli_query($con, $checkrechargea);
    $rowam = mysqli_fetch_assoc($result3);

    $totalAmount = $rowam['total_amount'];
    
    $checkbet = "SELECT SUM(amount) AS total_betamount FROM spots WHERE user_id = $userid  ";
$result4 = mysqli_query($con, $checkbet);
$rowbam = mysqli_fetch_assoc($result4);

$totalbetamount = $rowbam['total_betamount'];
$remaining = 0.3 * $totalAmount - $totalbetamount ;
    
  if ($rowCount < 1) {
    echo "
        <div id='alert-container' class='alert-container'>
            <div class='alert alert-danger' role='alert'>
                You need to make a minimum deposit.
            </div>
        </div>";
    //     header("Location: recharge.php");
    // exit();
} else if ($totalbetamount < 0.3 * $totalAmount) {
    echo "
        <div id='alert-container' class='alert-container'>
            <div class='alert alert-danger' role='alert'>
                You need to complete bet volume of $remaining .
            </div>
        </div>";
    //     header("Location: game.php");
    // exit();
} else if ($balance >= $withdrawalAmount) {
    $today = date("Y-m-d H:i:s");
    $newBalance = $balance - $withdrawalAmount;
    $updateBalanceQuery = "UPDATE tbl_wallet SET amount = $newBalance WHERE userid = $userid";
    $con->query($updateBalanceQuery);

    $insertWithdrawQuery = "INSERT INTO tbl_withdrawal (userid, amount, address, status, createdate) VALUES ($userid, $withdrawalAmount, '$withdrawalAddress' , 1 ,'$today')";
    $con->query($insertWithdrawQuery);
    
    $actiontype="withdraw~";
    $sql3= mysqli_query($con,"INSERT INTO `tbl_walletsummery`(`userid`,`amount`,`type`,`actiontype`) VALUES ('".$userid."','".$withdrawalAmount."','debit','$actiontype')");
    $sql= mysqli_query($con,"INSERT INTO `tbl_order`(`userid`,`transactionid`,`amount`,`status`) VALUES ('".$userid."','withdraw','".$withdrawalAmount."','1')");
    
    echo "
        <div id='alert-container' class='alert-container'>
            <div class='alert alert-success' role='alert'>
                Withdrawal successfully submitted!
            </div>
        </div>";
    $withdrawalSuccess = true;
} else {
    echo "
        <div id='alert-container' class='alert-container'>
            <div class='alert alert-danger' role='alert'>
                Insufficient balance.
            </div>
        </div>";
    $insufficientBalance = true;
}
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Bitter Mobile Template">
<meta name="keywords" content="bootstrap, mobile template, bootstrap 4, mobile, html, responsive" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
 <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--<title>Document</title>-->
    <script>
    // Wait for the DOM to be ready
    document.addEventListener("DOMContentLoaded", function() {
        // Automatically close the alert after 3 seconds
        setTimeout(function() {
            var alertContainer = document.getElementById('alert-container');
            if (alertContainer) {
                alertContainer.style.display = 'none'; // or remove the element from DOM
            }
        }, 3000); // 3000 milliseconds = 3 seconds
    });
</script>

    
    <style>
        
        body{
    background: #fff;
}
.appHeader1 {
    	/*background-image: url("bg.jpg");*/
    	background:#cd0103;
    	
}
.appHeader1 .pageTitle {
    text-align: center;
}
.table td, .table th {
    border-top: 1px solid #E5E9F2;
    color: #fff;
    font-size: 13px;
}
.text-primary {
    color: #fff !important;
}
.listView .listItem .text strong {
    color: aliceblue;
    font-weight: normal;
    display: block;
}
h3 {
	font-weight:normal;
}
.tdtext{ font-size:16px !important; color:#090 !important; font-weight:normal; text-align:right;}
.tdtext2{ font-size:16px !important; color:#f00 !important; font-weight:normal; text-align:right;}
.tdtext3{ font-size:16px !important; color:#FFB400 !important; font-weight:normal; text-align:right;}

.text small{ font-size:12px; color:#888;}
.listView .listItem {
   padding: 0px 55px 0px 0px;
}
.listView .listItem .text {
    font-size: 16px;
}
.appHeader1 {
	/*background-image: url("bg.jpg");*/

}
.bg-success {
    background: #197b47 !important;
}
.bg-danger {
    background: #863242 !important;
}
.image{
    display:none;
}
.listView .listItem {
    padding: 0px 0px 0px 12px;
}
.table td, .table th {
    padding-right: 20px;
    border-top: 1px solid #E5E9F2;
    color: #fff;
    font-size: 13px;
}
.table td, .table th {
    border-top: 1px solid #E5E9F2;
    color: #fff;
    font-size: 13px;
    padding: 2px 20px;
}
       .main{
            width: 100%;
            height: 100%;
        }
        form{
            display: flex;
            flex-direction: column;
            /*padding: 20px;*/
            /*margin-top: 20px;*/
        }
        input{
            margin-top: 20px;
            height: 45px;
            border-radius: 10px;
            border: none;
            background: aliceblue;
        }
        
        .alert-container {
    position: fixed;
    top: 50px;
    left: 0;
    right: 0;
    z-index: 9999;
    padding: 10px;
    text-align: center;
}
.butn{
        text-align: center;
    position: fixed;
    bottom: 0;
    width: 100%;
    padding: 24px 10px;
    background: #131728;
    border-top: 1px solid #f77d19;
}
.alert-danger {
    color: #721c24;
    background-color: #f77d19 !important;
    border-color: #f5c6cb;
}
.lbl{
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}
.lbl input{
    margin-top: 0px;
}
label{
    color: aliceblue;
}
.ntwrk{
    margin-top: 20px;
}
.trc{
        width: fit-content;
    padding: 10px;
    margin-left: 10px;
    color: aliceblue;
    border: 1px solid #f77d19;
}
hr {
    /* margin-top: 1rem; */
    /* margin-bottom: 1rem; */
    border: 0;
    border-top: 1px solid rgb(247 125 25);
    margin: 16px 0px;
}
.box{
    padding: 16px;
    background: #313544;
        margin-top: 12px;
}
.fee{
    COLOR: aliceblue;
    display: flex;
    justify-content: space-between;
}
ul {
    /*margin-top: 40px;*/
    margin-bottom: 1rem;
    color: aliceblue;
    padding-left: 15px;
}
.submit{
      border-radius: 25px; height:45px; font-weight: 400; font-size: 18px;  
         width: 80%;
         margin: 0 auto;
         border: 1px solid #cd0103;
         color: #fff;
         background-color: #cd0103;
         box-shadow: 0 0 4px 3px rgb(207 0 69 / 20%);
}

    </style>
    
    <script>
    function goBack() {
        window.history.back();
    }
</script>
</head>
<body>
<div class="appHeader1">
<div class="left">
             <a href="main.php" onClick="goBack();" class="icon goBack"> <img  src="assets/img/back.png" class="back"> </a>
           
        </div> <center>  <div style="color:#FFFFFF" class="pageTitle">Withdrawal</div> </center>
 <div class="right"> 
 
  <a  href="withdrawalrecord.php" role="button" style="font-size:20px;">
    <i style="color:#FFFFFFk" class="icon ion-md-paper"></i></a>
</div></div>

<div class="main">
     <?php if (isset($withdrawalSuccess) && $withdrawalSuccess) { ?>
            <p>Withdrawal successful!</p>
        <?php } elseif (isset($insufficientBalance) && $insufficientBalance) { ?>
            <p>Insufficient balance.</p>
        <?php } ?>
        <form action=" " method="post">
            
            
            <div class="box">
                <div class="lbl">
                      <label>Withdrawal Address</label>
                      <input style="padding-left: 25px;" type="text"id="address" name="address" minlength="1"  value="<?php echo address($con,'account',$userid);?>" >
                </div>
                <label class="ntwrk">Withdrawal Network</label>
                <div class="trc">TRC 20</div>
                <hr>
                <div class="fee">
                    <span> Network Fees</span>
                    <span> 1 TRX</span>
                </div>
            </div>
           
            
            <div class="box" style="margin-top: 10px;">
                <div class="lbl" style="margin-top: 0px;">
                    <label>Withdrawal Amount</label>
                     <input style="padding-left: 25px;" type="number" name="userammount" id="userammount" min="10" minlength="1" placeholder="Input amount">
                </div>
           
            </div>
           
            <input style="padding-left: 25px;" type="hidden" id="mobile" name="mobile" minlength="1" disabled value="<?php echo user($con,'mobile',$userid);?>">
            
            <div class="butn">
                <input  style="width: 85%;    " type="submit" class="btn submit" value="Withdraw Now">
            </div>
            
            
        <div class="box" style="margin-bottom: 100px;">
            <ul>
                       <li>The minimum withdrawal amount is: 10 TRX (TRC20).</li>
                       <li>In order to ensure the safety of funds, when your account security policy is changed or your password is changed, we will manually review the withdrawals. Please be patient and wait for the staff to contact you by phone or email.</li>
                       <li>If the withdrawal has not arrived within 10 minutes, please contact the management customer service.（Manual review for you quickly）</li>
                       <li> Please make sure that your computer and browser are safe to prevent information from being altered or leaked.</li>
           </ul>
        </div>




        </form>
    </div>
    
     <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal content structure ... -->
            </div>
        </div>
    </div>
    
    
     <!-- Bootstrap and other scripts ... -->
     <!-- Bootstrap and other scripts ... -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  





</body>
</html>