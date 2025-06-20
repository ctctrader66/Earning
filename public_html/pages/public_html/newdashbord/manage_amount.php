<?php 

ob_start();

session_start();

if($_SESSION['userid']=="")

{

	header("location:index.php");

	exit();

}



include ("include/connection.php");




?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Admin Panel | Amount Setting</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/font-awesome.min.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

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

  <!--[if lt IE 9]>

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <![endif]-->

  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="css/app.css" id="maincss">
<style>
#confirm h4{font-size: 1rem;}
#confirm p{font-size: 13px; margin-top:20px;}
#confirm .modal-content{border-radius:3px}
#confirm .modal-dialog{padding:20px; margin-top:130px;}
</style>


</head>

<body class="hold-transition skin-yellow-light sidebar-mini">

<div class="wrapper">

<?php include ("include/header.inc.php");?>

 <?php include ("include/navigation.inc.php");


 ?>

   

  <div class="content-wrapper">

    



  <!-- Main content -->

  <section class="content">

   <section class="content-header">
      <h1>Website Setup</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Amount Setup</li>
      </ol>
    </section>

    


    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-12 text-center">
          
          <?php if(isset($_GET['msg'])=="updt"){ ?>
              <span class="text-center red_txt">Update Successfully......</span><?php  } ?></div>
        <div class="col-xs-12">
          

          <div class="box">
            
            <!-- /.box-header -->



          
 <?php  

            
 $sql="select* FROM `tbl_paymentsetting` WHERE id='1'";

$query=mysqli_query($con,$sql);

$role=mysqli_fetch_array($query);

if(isset($_POST['site_setting'])=='Submit'){

  $mra=($_POST['mra']);

  $mwa=($_POST['mwa']);

  $ib=($_POST['ib']);

  $rb=($_POST['rb']);
  
  $rc=($_POST['rc']);
  
  $wagar=($_POST['wagar']);

  $level1=($_POST['level1']);

  $level2=($_POST['level2']);
  
  $level3=($_POST['level3']);
  
 


  $withdrawal_status = ($_POST['withdrawal_status']);

  $regbonus=($_POST['regbonus']);

  

$sql= "UPDATE `tbl_paymentsetting` SET `rechargeamount` = '$mra',`withdrawalamount` = '$mwa',`interest` = '$ib',`rechargebonus` = '$rb',`level1` = '$level1',`level2` = '$level2' ,`level3` = '$level3' ,`withdrawal_status` = '$withdrawal_status',`bonusamount` = '$regbonus' WHERE `id`= '1'";

$query=mysqli_query($con,$sql);

if($query){

  

   echo '<script>
        alert("Setting Updating...");
        window.location.href="manage_amount.php";
        </script>' ;

  }



  } ?>
      <form id="formID" name="formID" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">

            <div class="box-body">

<div class="clearfix"></div>



<div class="col-sm-6">

              <div class="form-group">

              <label>Minium Recharge Amount</label>

              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="mra" id="mra" required value="<?php echo $role['rechargeamount'];?>">

              </div>

              </div>

  <div class="col-sm-6">

              <div class="form-group">

              <label>Minimum Withdrawal Amount</label>

              <input type="text" class="form-control" onkeypress="return isNumber(event)" name="mwa" id="mwa" required value="<?php echo $role['withdrawalamount'];?>">

              </div>

              </div>          

 <div class="col-sm-6">

              <div class="form-group">

              <label>Interest Rate <i class="red_txt">[in %]</i></label>

              <input type="text" class="form-control"  name="ib" id="ib" required value="<?php echo $role['interest'];?>">

              </div>

              </div>

<div class="col-sm-6">

              <div class="form-group">

              <label>Recharge Bonus <i class="red_txt">[in %]</i></label>

              <input type="number" class="form-control" onkeypress="return isNumber(event)" name="rb" id="rb" required value="<?php echo $role['rechargebonus'];?>">

              </div>

              </div>




 <div class="col-sm-6">

              <div class="form-group">

              <label>Level1 Commission Percent <i class="red_txt">[in %]</i></label>

              <input type="text" class="form-control" name="level1" id="level1" required value="<?php echo $role['level1'];?>">

              </div>

              </div>

<div class="col-sm-6">

              <div class="form-group">

              <label>Level2 Commission Percent <i class="red_txt">[in %]</i></label>

              <input type="text" class="form-control"  name="level2" id="level2" required value="<?php echo $role['level2'];?>">

              </div>

              </div>
              
              <div class="col-sm-6">

              <div class="form-group">

              <label>Level3 Commission Percent <i class="red_txt">[in %]</i></label>

              <input type="text" class="form-control"  name="level3" id="level3" required value="<?php echo $role['level3'];?>">

              </div>

              </div>
              
              
            

  <div class="col-sm-6">

              <div class="form-group">

              <label>Sign Up Bonus</label>

              <input type="text" class="form-control"  name="regbonus" id="regbonus" required value="<?php echo $role['bonusamount'];?>">

              </div>

              </div>  



 <div class="col-sm-6">

              <div class="form-group">

              <label>Withdrawal Status </label>

             
<select class="form-control" name="withdrawal_status">





  <?php if ($role['withdrawal_status'] == 'on')
{
echo '<option value="on" selected>On</option>';

echo '<option value="off">Off</option>';

}


if ($role['withdrawal_status'] == 'off')
{

  echo '<option value="on" >On</option>';
echo '<option value="off" selected>Off</option>';


}


   ?>

  
    
  
  


 

</select>

              </div>

              </div> 






              



             <div class="clearfix"></div>   

              <div class="form-group">

              <div class="text-center">

  

 <input type="submit" class="btn btn-warning" value="Submit"  name="site_setting" ></div>

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

  

<?php  include("include/footer.inc.php");?></div>

<script>

 

	

$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({

      checkboxClass: 'icheckbox_minimal-blue',

      radioClass: 'iradio_minimal-blue'

    });

  $(function () {

	  $(".checkbox-toggle").click(function () { 

      var clicks = $(this).data('clicks');

      if (clicks) {

        //Uncheck all checkboxes

        $("input[type='checkbox']").iCheck("uncheck");

        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');

      } else {

        //Check all checkboxes

        $("input[type='checkbox']").iCheck("check");

        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');

      }

      $(this).data("clicks", !clicks);

    });

    //$("#example1").DataTable();

    $('#example1').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": false,

      "info": true,

      "autoWidth": true

    });

  });

</script>

<script type="text/javascript">

 function cancel() {

 var strconfirm = confirm("Are you sure you want to cancel ?");

           if (strconfirm == true) {

           window.location = 'manage_amount.php'; 

           }



       }

	 

</script> 



<!--sucess modal-->

<div id="confirm" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content" style="padding:8px;">
      <div class="modal-body text-center">Are you sure you want to Distribute?</div>
<input type="hidden" id="id" name="id" value="">
<input type="hidden" id="type" name="type" value="">
      <div class="text-center">
    <a type="button" class="btn btn-sm btn-success text-light" target="_blank" onclick="location.href='/dis-int.php';">&nbsp;YES&nbsp;</a>&nbsp;
    <a type="button" class="btn btn-sm btn-danger text-light" data-dismiss="modal">&nbsp;NO&nbsp;</a>
    </div> 
    </div>
  </div>
</div>



</body>

</html>

