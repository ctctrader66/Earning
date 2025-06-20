<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
// ob_start();
// session_start();
// if ($_SESSION['frontuserid'] == "") {
//     header("location:login.php");
//     exit();
// }
$userid = $_SESSION['frontuserid'];
include 'include/conn.php';

// Assuming you have already established a database connection

// Fetch level 1 members
$sqlLevel1 = "SELECT t1.id, t1.code, t1.owncode, t1.mobile
              FROM tbl_user t1
              WHERE t1.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)";

$resultLevel1 = mysqli_query($conn, $sqlLevel1);
$countLevel1 = mysqli_num_rows($resultLevel1);



// Fetch level 2 members
$sqlLevel2 = "SELECT t3.id, t3.code, t3.owncode, t3.mobile
              FROM tbl_user t3
              WHERE t3.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))";

$resultLevel2 = mysqli_query($conn, $sqlLevel2);
$countLevel2 = mysqli_num_rows($resultLevel2);

// Fetch level 3 members
$sqlLevel3 = "SELECT t5.id, t5.code, t5.owncode, t5.mobile
              FROM tbl_user t5
              WHERE t5.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)))";

$resultLevel3 = mysqli_query($conn, $sqlLevel3);
$countLevel3 = mysqli_num_rows($resultLevel3);

// Fetch level 4 members
$sqlLevel4 = "SELECT t7.id, t7.code, t7.owncode, t7.mobile
              FROM tbl_user t7
              WHERE t7.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))))";

$resultLevel4 = mysqli_query($conn, $sqlLevel4);
$countLevel4 = mysqli_num_rows($resultLevel4);

// Fetch level 5 members
$sqlLevel5 = "SELECT t9.id, t9.code, t9.owncode, t9.mobile
              FROM tbl_user t9
              WHERE t9.code IN (SELECT t10.owncode FROM tbl_user t10 WHERE t10.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid)))))";

$resultLevel5 = mysqli_query($conn, $sqlLevel5);
$countLevel5 = mysqli_num_rows($resultLevel5);

// Fetch level 6 members
$sqlLevel6 = "SELECT t11.id, t11.code, t11.owncode, t11.mobile
              FROM tbl_user t11
              WHERE t11.code IN (SELECT t12.owncode FROM tbl_user t12 WHERE t12.code IN (SELECT t10.owncode FROM tbl_user t10 WHERE t10.code IN (SELECT t8.owncode FROM tbl_user t8 WHERE t8.code IN (SELECT t6.owncode FROM tbl_user t6 WHERE t6.code IN (SELECT t4.owncode FROM tbl_user t4 WHERE t4.code = (SELECT t2.owncode FROM tbl_user t2 WHERE t2.id = $userid))))))";

$resultLevel6 = mysqli_query($conn, $sqlLevel6);
$countLevel6 = mysqli_num_rows($resultLevel6);



$almemberlv3=$countLevel1+$countLevel2+$countLevel3+$countLevel4+$countLevel5+$countLevel6 ;

echo $almemberlv3;

?>
<!-- Level 1 Members Table -->
<!--<table>-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th>ID</th>-->
<!--      <th>Code</th>-->
<!--      <th>OwnCode</th>-->
<!--      <th>Mobile</th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
<!--    <?php while ($rowLevel1 = mysqli_fetch_assoc($resultLevel1)) { ?>-->
<!--      <tr>-->
<!--        <td><?php echo $rowLevel1['id']; ?></td>-->
<!--        <td><?php echo $rowLevel1['code']; ?></td>-->
<!--        <td><?php echo $rowLevel1['owncode']; ?></td>-->
<!--        <td><?php echo maskMobileNumber($rowLevel1['mobile']); ?></td>-->
<!--      </tr>-->
<!--    <?php } ?>-->
<!--  </tbody>-->
<!--</table>-->

<!-- Level 2 Members Table -->
<!--<table>-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th>ID</th>-->
<!--      <th>Code</th>-->
<!--      <th>OwnCode</th>-->
<!--      <th>Mobile</th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
<!--    <?php while ($rowLevel2 = mysqli_fetch_assoc($resultLevel2)) { ?>-->
<!--      <tr>-->
<!--        <td><?php echo $rowLevel2['id']; ?></td>-->
<!--        <td><?php echo $rowLevel2['code']; ?></td>-->
<!--        <td><?php echo $rowLevel2['owncode']; ?></td>-->
<!--        <td><?php echo maskMobileNumber($rowLevel2['mobile']); ?></td>-->
<!--      </tr>-->
<!--    <?php } ?>-->
<!--  </tbody>-->
<!--</table>-->

<!-- Level 3 Members Table -->
<!--<table>-->
<!--  <thead>-->
<!--    <tr>-->
<!--      <th>ID</th>-->
<!--      <th>Code</th>-->
<!--      <th>OwnCode</th>-->
<!--      <th>Mobile</th>-->
<!--    </tr>-->
<!--  </thead>-->
<!--  <tbody>-->
<!--    <?php while ($rowLevel3 = mysqli_fetch_assoc($resultLevel3)) { ?>-->
<!--      <tr>-->
<!--        <td><?php echo $rowLevel3['id']; ?></td>-->
<!--        <td><?php echo $rowLevel3['code']; ?></td>-->
<!--        <td><?php echo $rowLevel3['owncode']; ?></td>-->
<!--        <td><?php echo maskMobileNumber($rowLevel3['mobile']); ?></td>-->
<!--      </tr>-->
<!--    <?php } ?>-->
<!--  </tbody>-->
<!--</table>-->

<?php
// Function to mask mobile number
function maskMobileNumber($mobile)
{
    $maskedMobile = substr($mobile, 0, -5) . str_repeat('*', 5);
    return $maskedMobile;
}
?>

<!-- Count of Level 1, Level 2, and Level 3 members -->
<?php
// echo "Level 1 Members Count: " . $countLevel1 . "<br>";
// echo "Level 2 Members Count: " . $countLevel2 . "<br>";
// echo "Level 3 Members Count: " . $countLevel3 . "<br>";
?>
