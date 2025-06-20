<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	
include ("include/connection.php");

if(isset($_POST['submit'])=='Submit'){
	$telegram=($_POST['telegram']);
	$telegramc=($_POST['telegramc']);
	$interest=($_POST['interest']);


	
$sql= "UPDATE `setting` SET `telegram` = '$telegram',`interest` = '$interest'  WHERE `id`= '1'";
$query=mysqli_query($con,$sql);
if($query){
	
	header("location:setting.php?msg=updt");
	
	}

	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | Website Setting</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition skin-yellow-light sidebar-mini">
<div class="wrapper">
<?php include ("include/header.inc.php");?>
 <?php include ("include/navigation.inc.php");
 $sql="select* FROM `tbl_paymentsetting` WHERE id='1'";
$query=mysqli_query($con,$sql);
$role=mysqli_fetch_array($query);

 ?> 
 
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- Main content -->

  <section class="content">

  
    

                        
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12 text-center">
          
          <?php if(isset($_GET['msg'])=="updt"){ ?>
              <span class="text-center red_txt">Update Successfully......</span><?php  } ?></div>
        <div class="col-xs-12">
          <div class="box">
          
      <form  method="post" action="" enctype="multipart/form-data">
            <div class="box-body">
<div class="clearfix"></div>

<div class="col-sm-6">
              <div class="form-group">
              <label>Telegram Channel ID</label>
              <input type="text" class="form-control"  name="telegram" id="telegram" required value="<?php $telegram=mysqli_query($con,"select * from `setting`");
	$link=mysqli_fetch_array($telegram);
	$ready = $link['telegram']; echo $ready;?>">
              </div>
              </div>
          
 <div class="col-sm-6">
              <div class="form-group">
              <label>Interest Notice</label>
              <input type="text" class="form-control"  name="interest" id="interest" required value="<?php $telegram=mysqli_query($con,"select * from `setting`");
	$link=mysqli_fetch_array($telegram);
	$ready = $link['interest']; echo $ready;?>">
              </div>
              </div> 
             <div class="clearfix"></div>   
              <div class="form-group">
              <div class="text-center">
  
 <input type="submit" class="btn btn-primary" value="Submit"  name="submit" ></div>
                </div> 
               </div>
                <div class="clearfix"></div>
             
 

          </form>
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
  
<?php include("include/footer.inc.php"); ?>
</div>

</body>
</html>
