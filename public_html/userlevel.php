<?php
//user level 1
ob_start();
session_start();
 if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}

include("include/connection.php");

$userid = $_SESSION['frontuserid'];



// level 1

$user           = mysqli_query($con, "select * from `tbl_user` where `id`='" . $userid . "'");
$userRows       = mysqli_num_rows($user);
$userResult     = mysqli_fetch_array($user);
$owncode        = $userResult['owncode'];
$userlevel1     = mysqli_query($con, "select * from `tbl_user` where `code`='" . $owncode . "' order by id asc");
$userlevel1Rows = mysqli_num_rows($userlevel1);



//level 2

if ($userlevel1Rows != '') {
    $num = 0;
    $lvl3 = 0;
    while ($userlevel2Result = mysqli_fetch_array($userlevel1)) {
        $lvl2user = mysqli_query($con, "select * from `tbl_user` where `code`='" . $userlevel2Result['owncode'] . "'");
        while ($userlvl2Result = mysqli_fetch_array($lvl2user)) {
            $num++;
            // echo '<pre>';
            // echo 'id : '.$userlvl2Result['id'].' - '.' code : '.$userlvl2Result['code'];
            $level2user           = mysqli_query($con, "select * from `tbl_user` where `id`='" . $userlvl2Result['id'] . "'");
            while($user2 = mysqli_fetch_array($level2user)){
                $lvl2user = mysqli_query($con, "select * from `tbl_user` where `code`='" . $user2['owncode'] . "'");
                $lvl3 = $lvl3 + mysqli_num_rows($lvl2user);
                echo $user2['id'].'<br>';
                echo $lvl3.'<br>';
                exit('testing lvl3');
                
            }
        }
    }
}



echo "Level-1 = $userlevel1Rows<br>";
echo "Level-2 = $num<br>";
echo "Level-3 = ?<br>";
echo "Level-4 = ?<br>";
echo "Level-5 = ?<br>";
echo "Level-6 = ?<br>";

exit;

?>