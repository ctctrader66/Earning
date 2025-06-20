<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
  header("location:index.php?msg1=notauthorized");
  exit();
}
  ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Active Game Report</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <link rel="stylesheet" href="css/app.css" id="maincss">

</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
<?php include ("include/connection.php");?>
<?php include ("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include ("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

    <!-- Main content -->
   
      <section class="content">
            <div class="row">
                <div class="col-xs-12">


                    <div class="box">
                       
                        <!-- /.box-header -->
                        <div class="box-body" style="overflow-x:auto;">
                            <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                                <!--<div class="table-responsive"> -->
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                        <th>User ID</th>
                        
                        <th>Mobile</th>
                        <th>IP Address</th>
                       
                         <th>Own Code</th>
                         <th>Ref. By</th>
                       <th>Wallet</th>
                        <th>Recharge</th>
                         <th>Withdrawal</th>
                          <th>Reward</th>
                          <th>Comission</th>
                          <th>Bonus Wallet</th>
                        <th>Action</th>
                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $Query=mysqli_query($con,"select * FROM tbl_wallet where amount > 5 limit 5000 ");
                                    $i=0;
                                    while($row=mysqli_fetch_array($Query)){$i++;?>


                                    <tr>
                    
                      
              <td><?php echo @$row["userid"]; ?></td>
            
              <td><?php $userid = $row["userid"];
			$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
             $sqlgetresult = mysqli_fetch_array($sqlget);
            $mobilenew = $sqlgetresult['mobile'];  echo $mobilenew;             ?></td>
             <td><?php $userid = $row["userid"];
			$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
             $sqlgetresult = mysqli_fetch_array($sqlget);
            $mobilenew = $sqlgetresult['ip'];  echo $mobilenew;             ?></td>
            
             <td><?php $userid = $row["userid"];
			$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
             $sqlgetresult = mysqli_fetch_array($sqlget);
            $mobilenew = $sqlgetresult['owncode'];  echo $mobilenew;             ?></td>
             <td><?php $userid = $row["userid"];
			$sqlget = mysqli_query($con,"SELECT * FROM tbl_user WHERE id  =  $userid");
             $sqlgetresult = mysqli_fetch_array($sqlget);
            $mobilenew = $sqlgetresult['code'];  echo $mobilenew;             ?></td>
            <td><?php echo round($row["amount"],2); ?></td>
           
             <td><?php $userid = $row["userid"];
             
           $totalrecharge=mysqli_query($con,"select sum(`amount`)as total from  `tbl_recharge` where `userid`='".$row["userid"]."' and `status`='1'");
	$totalResult=mysqli_fetch_array($totalrecharge);
	$recharge = number_format($totalResult['total'],2);  echo $recharge;             ?></td>
            
               <td><?php $userid = $row["userid"];
             
            $totalwithdrawal=mysqli_query($con,"select sum(`amount`)as total from  `tbl_withdrawal` where status = 0 and `userid`='".$row["id"]."'");
	$totalResult=mysqli_fetch_array($totalwithdrawal);
	$withdrawal = number_format($totalResult['total'],2);  echo $withdrawal;             ?></td>
	
	
                         <td><?php $userid = $row["userid"];
             
            	$totalreward=mysqli_query($con,"select sum(`amount`)as total from  `tbl_walletsummery` where `userid`='".$row["id"]."' and `actiontype`='reward'");
	$totalResult=mysqli_fetch_array($totalreward);
	$reward = number_format($totalResult['total'],2);  echo $reward;             ?></td>
                          <td><?php $userid = $row["userid"];
             
            	$telegram=mysqli_query($con,"select sum(level1+level2+level3+level4+level5) as total from `tbl_bonus` where userid = '".$row["id"]."'");
	$link=mysqli_fetch_array($telegram);
	$ready = number_format($link['total'],2);  echo $ready;             ?></td>
                         <td><?php $userid = $row["userid"];
             
            	$total_bonus = mysqli_query($con,"SELECT sum(amount) as total FROM `tbl_bonus` where amount > 0 AND userid = '".$row["id"]."'");
		$totalResult=mysqli_fetch_array($total_bonus);
$totalbonus =  number_format($totalResult['total'],1);  echo $totalbonus;             ?></td>
           
			  
			  
			   <td>
              
              <a href="user-details.php?user=<?= $row["userid"]; ?>"  target="_blank" class="update-person" style="background-color: darkorange; color:white; font-size:12px; padding: 5px;" title="User Detail">User Detail</a>
       
       </td>
			  
              <td><?php echo @date('d-m-Y', strtotime($row['createdate']));?></td>
              
			 
                </tr>
                                    <?php }?>


                                    </tbody>

                                </table>
                                <!--</div>-->
                                <div class="box-header box-header2" style="margin-bottom: 10px;">&nbsp; </div>
                                <div class="row">
                                    <div class="col-sm-10"></div>
                                    <div class="col-sm-2">
                                        &nbsp;
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php include("include/footer.inc.php");?></div>
<!-- ./wrapper -->
 <script>
    $(function () {
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "pageLength": 100
        });
    });
</script>
</body>
</html>
