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
      <title>Admin Panel | Manage Recharge Finished</title>
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
      <link rel="stylesheet" href="css/app.css" id="maincss">
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
            <section class="content-header">
                  <h4 class="table_bg ">Manage Recharge Finished</h4>
               <br></br>
               <ol class="breadcrumb">
                  <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li class="active">Manage Recharge Finished</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="box">
                        <div class="box-header box-header2">
                           <div class="col-xs-6 text-right">
                              <h3 class="box-title"><?php 
                                 if(isset($_GET['msg'])=="updt") 
                                 { ?>
                                 <font size="+1" color="#FF0000">Update Successfully...</font>
                                 <?php  } ?>
                              </h3>
                           </div>
                           <div class="col-sm-6">
                              <div class="pull-right">&nbsp;</div>
                           </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="overflow-x:auto;">
                           <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                              <!--<div class="table-responsive"> -->
                              <table id="example1" class="table table-striped">
                              
                                 <thead>
                                    <tr>
                                       <th>Sr.No</th>
                                       <th>User ID</th>
                                       <th>Payment ID</th>
                                       <!--<th>Amount</th>-->
                                       <th>Pay Amount</th>
                                       <th>Network Type</th>
                                       <th>Status</th>
                                       <th>Date</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                      
                                       $Query=mysqli_query($con,"select * from `nowpayment` where `payment_status`='finished' order by id desc ");
                                       $i=0;
                                       $total=0; 
                                       while($row=mysqli_fetch_array($Query)){$i++;
                                       $total+=$row['amount'];?>  
                                    <tr>
                                       <td><?php echo @$row["id"]; ?></td>
                                       <td><?php echo @$row["userid"]; ?></td>
                                       <td><?php echo @$row["payment_id"]; ?></td>
                                       <!--<td><?php echo @$row["price_amount"]; ?></td>-->
                                       <td><?php echo @$row["actual_pay"]; ?></td>
                                       <td><?php echo @$row["pay_currency"]; ?></td>
                                       <td><?php echo @$row["payment_status"]; ?></td>
                                       <td><?php echo @$row["created_at"]; ?></td>
                                      
                                
                           </tr>
                           <?php }?>
                           </tbody>
                           </table>
                           <!--</div>-->
                           <div class="box-header box-header2" style="margin-bottom: 10px;">&nbsp; </div>
                           <div class="row">
                              <div class="col-sm-6"></div>
                              <div class="col-sm-6 text-right">
                                 <!-- <strong>Total Request Amount: <i class="red_txt"><?php echo number_format($total,2);?></i></strong> -->
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
         <?php include("include/footer.inc.php");?>
      </div>
      <!-- ./wrapper -->
      <script>
         $(function () {
           $('#example1').DataTable({
             "paging": true,
             "lengthChange": false,
             "searching": true,
             "ordering": false,
             "info": true,
             "autoWidth": true,
          "pageLength": 100
           });
         });
      </script>
   </body>
</html>