<?php
@$userid = $_POST['userid'];
include("include/connection.php");

$trx_balance = number_format(wallet($con, 'amount', $userid), 2);
//$usdt_balance = number_format(wallet($con, 'amountusdt', $userid), 2);

echo json_encode(array('trx_balance' => $trx_balance));
?>
