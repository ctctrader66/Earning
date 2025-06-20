<?php
error_reporting(0);
require_once('config.php');
require_once('checksum.php');
// Set the timezone to Asia/Kolkata
date_default_timezone_set("Asia/Kolkata");

$servername = "localhost"; // replace with your server name
$username = "gameonly_91club"; // replace with your username
$password = "gameonly_91club"; // replace with your password
$dbname = "gameonly_91club"; // replace with your database name

$con = mysqli_connect($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// database 

$verifySignature = null;
$array = array();
$paramList = array();

$secret = '6uT8ljPDkU'; // Your Secret Key.
$status = $_POST['status']; // Payment Status Only, Not Txn Status.
$message = $_POST['message']; // Txn Message.
$cust_Mobile = $_POST['cust_Mobile']; // Txn Message.
$cust_Email = $_POST['cust_Email']; // Txn Message.
$hash = $_POST['hash']; // Encrypted Hash / Generated Only SUCCESS Status.
$checksum = $_POST['checksum']; // Checksum verifySignature / Generated Only SUCCESS Status.

// Payment Status.
if ($status == "SUCCESS") {
    $paramList = hash_decrypt($hash, $secret);
    $verifySignature = RechPayChecksum::verifySignature($paramList, $secret, $checksum);

    // Checksum verify.
    if ($verifySignature) {
        $array = json_decode($paramList);

        // Store the payment response in variables
        $paymentStatus = $status;
        $paymentMessage = $message;
        $paymentHash = $hash;
        $paymentChecksum = $checksum;
        $customerMobile = $cust_Mobile;      //cust mobile SAVE
        $customerEmail = $cust_Email;        //cust email save
        $senderNote = $array->sender_note;   // Store the sender note
        $amount = $array->txnAmount;         // Store the transaction amount
        $orderId = $array->orderId;          // Store the orderId
        $txnStatus = $array->txnStatus;      // Store the transaction status
        $resultInfo = $array->resultInfo;    // Store the result information
        $txnId = $array->txnId;              // Store the transaction ID
        $bankTxnId = $array->bankTxnId;      // Store the bank transaction ID
        $paymentMode = $array->paymentMode;  // Store the payment mode
        $txnDate = $array->txnDate;          // Store the transaction date
        $utr = $array->utr;                  // Store the UTR
        $senderVpa = $array->sender_vpa;     // Store the sender VPA
        $payeeVpa = $array->payee_vpa;       // Store the payee VPA

        // Payment Response
        echo "<pre>";
        echo "Payment Status: $paymentStatus<br>";
        echo "Payment Message: $paymentMessage<br>";
        echo "Customer Mobile: $customerMobile<br>";
        echo "Customer Email: $customerEmail<br>";
        echo "Payment hash: $paymentHash<br>";
        echo "Payment Checksum: $paymentChecksum<br>";
        echo "Order ID: $orderId<hr>";
        echo "Sender Note: $senderNote<hr>";
        echo "Transaction Amount: $amount<hr>";
        echo "Transaction Status: $txnStatus<hr>";
        echo "Result Info: $resultInfo<hr>";
        echo "Transaction ID: $txnId<hr>";
        echo "Bank Transaction ID: $bankTxnId<hr>";
        echo "Payment Mode: $paymentMode<hr>";
        echo "Transaction Date: $txnDate<hr>";
        echo "UTR: $utr<hr>";
        echo "Sender VPA: $senderVpa<hr>";
        echo "Payee VPA: $payeeVpa<hr>";

        $updateQuery = "UPDATE tbl_wallet SET amount = amount + '$amount' WHERE userid = '$senderNote'";
        $updateResult = mysqli_query($con, $updateQuery);

        if ($updateResult) {
            echo "Amount updated successfully.";

            // Insert values into tbl_order
            $insertQuery = "INSERT INTO tbl_order (userid, transactionid, amount, status) VALUES ('".$senderNote."','".$orderId."','".$amount."','1')";
            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                echo "Order details inserted successfully.";

                // Insert values into tbl_walletsummery
                $today = date("Y-m-d H:i:s");
                $walletSummaryQuery = "INSERT INTO tbl_walletsummery (userid, orderid, amount, type, actiontype, createdate) VALUES ('".$senderNote."','".$orderId."','".$amount."','credit','recharge','".$today."')";
                $walletSummaryResult = mysqli_query($con, $walletSummaryQuery);
                
                if ($walletSummaryResult) {
                    echo "Wallet summary details inserted successfully.";

                    // Insert values into deposits
                    $depositsQuery = "INSERT INTO deposits (status, uid, amount, ref_num, email, date) VALUES ('2', '".$senderNote."', '".$amount."', '".$orderId."', '".$customerEmail."', '".$today."')";
                    $depositsResult = mysqli_query($con, $depositsQuery);

                    if ($depositsResult) {
                        echo "Deposit details inserted successfully.";

                        // Show SweetAlert2 success message
                        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
                        echo '<script>
                            Swal.fire({
                                icon: "success",
                                title: "Amount added successfully",
                                showConfirmButton: true
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "/main.php";
                                }
                            });
                        </script>';
                    } else {
                        echo "Error inserting deposit details: " . mysqli_error($con);
                    }
                } else {
                    echo "Error inserting wallet summary details: " . mysqli_error($con);
                }
            } else {
                echo "Error inserting order details: " . mysqli_error($con);
            }
        } else {
            echo "Error updating amount: " . mysqli_error($con);
        }
    } else {
        // Payment Response
        echo "<pre>";
        echo "Payment Status: $status<br>";
        echo "Payment Message: $message<br>";
        echo '<h2><b style="color:red">Checksum Invalid!</b></h2>';
    }
} else {
    // Payment Response
    echo "<pre>";
    echo "Payment Status: $status<br>";
    echo "Payment Message: $message<br>";
    echo '<h2><b style="color:red">Payment Failed!</b></h2>';
}
?>
