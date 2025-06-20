<?php
$con = @mysqli_connect('localhost', 'gameonly_91club', 'gameonly_91club', 'gameonly_91club');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
date_default_timezone_set("Asia/Calcutta");

if (!function_exists('encryptor')) {
    function encryptor($action, $string)
    {
        $output = false;
        
        $encrypt_method = "AES-256-CBC";
        // set your unique hashing key
        $secret_key     = 'menhibatunga';
        $secret_iv      = 'muni123';
        
        // hash
        $key = hash('sha256', $secret_key);
        
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        
        // do the encyption given text/string/number
        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        // decrypt the given text/string/number
        else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        
        return $output;
    }
    
}

if (!function_exists('refcode')) {
    function refcode()
    {
        $characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $pin = $randomString;
    }
}
function username()
{
    $characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
}
function generateOTP()
{
    $characters       = '123456789';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < 4; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
}

function user($a, $field, $id)
{
    $selectruser = mysqli_query($a, "select `$field` from `tbl_user` where `id`='" . $id . "'");
    $userresult  = mysqli_fetch_array($selectruser);
    return $userresult["$field"];
}

function wallet($a, $field, $id)
{
    if (!$a || $a->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $selectwallet = mysqli_query($a, "SELECT `$field` FROM `tbl_wallet` WHERE `userid`='".$id."'");
    if (!$selectwallet) {
        die("Query failed: " . mysqli_error($a));
    }
    $walletResult = mysqli_fetch_array($selectwallet);
    if (!$walletResult) {
        die("No rows returned");
    }
    return $walletResult["$field"];
}


function bonus($a, $field, $id)
{
    $selectwallet = mysqli_query($a, "select `$field` from `tbl_bonus` where `userid`='" . $id . "'");
    $walletResult = mysqli_fetch_array($selectwallet);
    return $walletResult["$field"];
}
function gameid($a)
{
    $selectruser = mysqli_query($a, "select `gameid` from `tbl_gameid1` order by id desc limit 1");
    $userresult  = mysqli_fetch_array($selectruser);
    return $userresult["gameid"];
}

function content($a, $page)
{
    $sql_page    = "select `$page` from `content` where `id`='1'";
    $query_page  = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return $page_result["$page"];
}
function minamountsetting($a, $page)
{
    $sql_page    = "select `$page` from `tbl_paymentsetting` where `id`='1'";
    $query_page  = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return $page_result["$page"];
}
function truncate($mytext)
{
    //Number of characters to show  
    $chars  = 610;
    $mytext = substr($mytext, 0, $chars);
    $mytext = substr($mytext, 0, strrpos($mytext, ' '));
    return $mytext;
}
function truncate2($mytext)
{
    //Number of characters to show  
    $chars  = 220;
    $mytext = substr($mytext, 0, $chars);
    $mytext = substr($mytext, 0, strrpos($mytext, ' '));
    return $mytext;
}
function setting($a, $page)
{
    $sql_page    = "select `$page` from `site_setting` where `id`='1'";
    $query_page  = mysqli_query($a, $sql_page);
    $page_result = mysqli_fetch_array($query_page);
    return $page_result["$page"];
}


function winner($con, $periodid, $tab, $column)
{
    $query  = mysqli_query($con, "SELECT 
( SUM(amount)-SUM(amount)/100*2)as tradeamountwithtax,
 SUM(amount)as tradeamount,
    SUM(CASE
        WHEN type = 'button' THEN amount
    END) button,
    SUM(CASE
        WHEN value = 'Green' THEN amount
    END) as green,
    
    (SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*2))*2 as greenwinamount,
    
    (SUM(CASE
        WHEN value = 'Green' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Green' THEN amount
    END)/100*2))*1.5 as greenwinamountwithviolet,
    
    SUM(CASE
        WHEN value = 'Violet' THEN amount
    END) violet,
    
    (SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Violet' THEN amount
    END)/100*2))*4.5 as violetwinamount,
    
    SUM(CASE
        WHEN value = 'Red' THEN amount
    END) red,
    
    (SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*2 as redwinamount,
    (SUM(CASE
        WHEN value = 'Red' THEN amount
    END)-(SUM(CASE
        WHEN value = 'Red' THEN amount
    END)/100*2))*1.5 as redwinamountwithviolet,
    
    SUM(CASE
        WHEN type = 'number' THEN amount
    END) number,
    SUM(CASE
        WHEN value = '0' THEN amount
    END) `zero`,
    (SUM(CASE
        WHEN value = '0' THEN amount
    END)-(SUM(CASE
        WHEN value = '0' THEN amount
    END)/100*2))*9 as zerowinamount,
    
    SUM(CASE
        WHEN value = '1' THEN amount
    END) `one`,
    (SUM(CASE
        WHEN value = '1' THEN amount
    END)-(SUM(CASE
        WHEN value = '1' THEN amount
    END)/100*2))*9 as onewinamount,
    
    SUM(CASE
        WHEN value = '2' THEN amount
    END) `two`,
    (SUM(CASE
        WHEN value = '2' THEN amount
    END)-(SUM(CASE
        WHEN value = '2' THEN amount
    END)/100*2))*9 as twowinamount,
    
    SUM(CASE
        WHEN value = '3' THEN amount
    END) `three`,
    (SUM(CASE
        WHEN value = '3' THEN amount
    END)-(SUM(CASE
        WHEN value = '3' THEN amount
    END)/100*2))*9 as threewinamount,
    
    SUM(CASE
        WHEN value = '4' THEN amount
    END) `four`,
    (SUM(CASE
        WHEN value = '4' THEN amount
    END)-(SUM(CASE
        WHEN value = '4' THEN amount
    END)/100*2))*9 as fourwinamount,
    
    SUM(CASE
        WHEN value = '5' THEN amount
    END) `five`,
    (SUM(CASE
        WHEN value = '5' THEN amount
    END)-(SUM(CASE
        WHEN value = '5' THEN amount
    END)/100*2))*9 as fivewinamount,
    
    SUM(CASE
        WHEN value = '6' THEN amount
    END) `six`,
    (SUM(CASE
        WHEN value = '6' THEN amount
    END)-(SUM(CASE
        WHEN value = '6' THEN amount
    END)/100*2))*9 as sixwinamount,
    
    SUM(CASE
        WHEN value = '7' THEN amount
    END) `seven`,
    (SUM(CASE
        WHEN value = '7' THEN amount
    END)-(SUM(CASE
        WHEN value = '7' THEN amount
    END)/100*2))*9 as sevenwinamount,
    
    SUM(CASE
        WHEN value = '8' THEN amount
    END) `eight`,
    (SUM(CASE
        WHEN value = '8' THEN amount
    END)-(SUM(CASE
        WHEN value = '8' THEN amount
    END)/100*2))*9 as eightwinamount,
    
    SUM(CASE
        WHEN value = '9' THEN amount
    END) `nine`,
    (SUM(CASE
        WHEN value = '9' THEN amount
    END)-(SUM(CASE
        WHEN value = '9' THEN amount
    END)/100*2))*9 as ninewinamount
        
FROM
    `tbl_betting` where `periodid`='$periodid' and `tab`='$tab'");
    $result = mysqli_fetch_array($query);
    return $result["$column"];
    
}
$numbermappings = array(
    "zero",
    "one",
    "two",
    "three",
    "four",
    "five",
    "six",
    "seven",
    "eight",
    "nine"
);

function userpromocode($a, $userid, $code, $tradeamount, $periodid)
{
    $today            = date("Y-m-d H:i:s");
    $commissionQuery  = mysqli_query($a, "select * from `tbl_paymentsetting` where `id`='1'");
    $commissionResult = mysqli_fetch_array($commissionQuery);
    $level1commission = $commissionResult['level1'];
    $level2commission = $commissionResult['level2'];
    $level3commission = $commissionResult['level3'];
    $level4commission = $commissionResult['level4'];
    $level5commission = $commissionResult['level5'];
    $level6commission = $commissionResult['level6'];
    
    $level1 = (floatval($tradeamount) * floatval($level1commission) / 100);
    $level2 = (floatval($tradeamount) * floatval($level2commission) / 100);
    $level3 = (floatval($tradeamount) * floatval($level3commission) / 100);
    $level4 = (floatval($tradeamount) * floatval($level4commission) / 100);
    $level5 = (floatval($tradeamount) * floatval($level5commission) / 100);
    $level6 = (floatval($tradeamount) * floatval($level6commission) / 100);
    
    $userlevel1Query  = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$code')level1id,(select `code` from `tbl_user` where `owncode`='$code')level1code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel1Result = mysqli_fetch_array($userlevel1Query);
    $level1id         = $userlevel1Result['level1id'];
    $level1code       = $userlevel1Result['level1code'];
    //===============================================================================================
    $userlevel2Query  = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$level1code')level2id,(select `code` from `tbl_user` where `owncode`='$level1code')level2code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel2Result = mysqli_fetch_array($userlevel2Query);
    $level2id         = $userlevel2Result['level2id'];
    $level2code       = $userlevel2Result['level2code'];
    //===============================================================================================
    $userlevel3Query  = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$level2code')level3id,(select `code` from `tbl_user` where `owncode`='$level2code')level3code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel3Result = mysqli_fetch_array($userlevel3Query);
    $level3id         = $userlevel3Result['level3id'];
    $level3code       = $userlevel3Result['level3code'];
    //=================================================================================================
    $userlevel4Query  = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$level3code')level4id,(select `code` from `tbl_user` where `owncode`='$level3code')level4code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel4Result = mysqli_fetch_array($userlevel4Query);
    $level4id         = $userlevel4Result['level4id'];
    $level4code       = $userlevel4Result['level4code'];
    //=================================================================================================
    $userlevel5Query  = mysqli_query($a, "select `code`,(select `id` from `tbl_user` where `owncode`='$level4code')level5id,(select `code` from `tbl_user` where `owncode`='$level4code')level5code from `tbl_user` where `id`='" . $userid . "'");
    $userlevel5Result = mysqli_fetch_array($userlevel5Query);
    $level5id         = $userlevel5Result['level5id'];
    $level5code       = $userlevel5Result['level5code'];
    //=================================================================================================
    $userlevel6Query  = mysqli_query($a, "select `id` from `tbl_user` where `owncode`='" . $level5code . "'");
    $userlevel6Result = mysqli_fetch_array($userlevel6Query);
    $level6id         = $userlevel6Result['id'];
    //=================================================================================================
    $selectwallet=mysqli_query($a,"select * from `tbl_wallet` where `userid`='".$userid."'");
    $walletResult=mysqli_fetch_array($selectwallet);
   $sql= mysqli_query($a,"INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level3id`,`level4id`,`level5id`,`level6id`,`level1amount`,`level2amount`,`level3amount`,`level4amount`,`level5amount`,`level6amount`,`tradeamount`,`createdate`) VALUES ('".$userid."','".$periodid."','".$level1id."','".$level2id."','".$level3id."','".$level4id."','".$level5id."','".$level6id."','".$level1."','".$level2."','".$level3."','".$level4."','".$level5."','".$level6."','".$tradeamount."','".$today."')");
    
 
    $sqlbonuslevel1 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level1,`level1` = level1+$level1 WHERE `userid`= $level1id");
    $sqlbonuslevel2 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level2,`level2` = level2+$level2 WHERE `userid`= $level2id");
    $sqlbonuslevel3 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level3,`level3` = level3+$level3 WHERE `userid`= $level3id");
    $sqlbonuslevel4 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level4,`level4` = level4+$level4 WHERE `userid`= $level4id");
    $sqlbonuslevel5 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level5,`level5` = level5+$level5 WHERE `userid`= $level5id");
    $sqlbonuslevel6 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = amount+$level6,`level6` = level6+$level6  WHERE `userid`= $level6id");
    
    $sqlbonuslevel7=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level1 WHERE `userid`= '".$level1id."'");
    $sqlbonuslevel8=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level2 WHERE `userid`= '".$level2id."'");
    $sqlbonuslevel9=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level3 WHERE `userid`= '".$level3id."'");
    $sqlbonuslevel10=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level4 WHERE `userid`= '".$level4id."'");
    $sqlbonuslevel11=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level5 WHERE `userid`= '".$level5id."'");
    $sqlbonuslevel12=mysqli_query($a,"UPDATE `tbl_wallet` SET `amount` = amount+$level6 WHERE `userid`= '".$level6id."'");
    
}
function invitebonus($a, $userid, $refcode)
{
    $chksummery    = mysqli_query($a, "select * from `tbl_walletsummery` where `userid`='$userid' and `actiontype`='recharge'");
    $chksummeryRow = mysqli_num_rows($chksummery);
    if ($chksummeryRow == '1') {
        $userQuery        = mysqli_query($a, "select `id` from `tbl_user` where `owncode`='$refcode'");
        $userResult       = mysqli_fetch_array($userQuery);
        $refuserid        = $userResult['id'];
        $selectwallet     = mysqli_query($a, "select `amount` from `tbl_bonus` where `userid`='" . $refuserid . "'");
        $walletResult     = mysqli_fetch_array($selectwallet);
        $availableBalance = $walletResult['amount'];
        
        $sqlbonus          = mysqli_query($a, "select `bonusamount` from `tbl_paymentsetting` where `id`='1'");
        $bonusResult       = mysqli_fetch_array($sqlbonus);
        $bonusAmount       = $bonusResult['bonusamount'];
        $finalbonusbalance = $availableBalance + $bonusAmount;
        $today             = date("Y-m-d H:i:s");
        
        $sqlbonuslevel1 = mysqli_query($a, "UPDATE `tbl_bonus` SET `amount` = '" . $finalbonusbalance . "',`level1` = '" . $finalbonusbalance . "' WHERE `userid`= '" . $refuserid . "'");
      $sql= mysqli_query($a,"INSERT INTO `tbl_bonussummery`(`userid`,`periodid`,`level1id`,`level2id`,`level3id`,`level4id`,`level5id`,`level6id`,`level1amount`,`level2amount`,`level3amount`,`level4amount`,`level5amount`,`level6amount`,`tradeamount`,`createdate`) VALUES ('".$userid."','0','".$refuserid."','0','0','0','0','0','110','0','0','0','0','0','0','".$today."')");
    }
}

function getBaseUrl()
{
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF'];
    
    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath);
    
    // output: localhost
    $hostName = $_SERVER['HTTP_HOST'];
    
    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
    
    // return: http://localhost/myproject/
    return $protocol . $hostName . $pathInfo['dirname'] . '/';
}
?>