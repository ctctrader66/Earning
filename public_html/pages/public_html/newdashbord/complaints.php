<?php
ob_start();
session_start();
if ($_SESSION['userid'] == "") {
    header("location:index.php?msg1=notauthorized");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adminsuit | Manage Complaints Request</title>
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
    <link href="css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/app.css" id="maincss">

</head>

<body class="hold-transition skin-yellow-light sidebar-mini">
    <div class="wrapper">
        <?php include("include/connection.php"); ?>
        <?php include("include/header.inc.php"); ?>
        <?php include("include/navigation.inc.php"); ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Manage Complaints Request</h1>
                <ol class="breadcrumb">
                    <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Manage Complaints Request</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header box-header2">
                                <div class="col-xs-6 text-right">
                                    <h3 class="box-title"><?php
                                                            if (isset($_GET['msg']) == "updt") { ?>
                                            <font size="+1" color="#FF0000">Update Successfully...</font>
                                        <?php  } ?>
                                    </h3>
                                </div>
                                <div class="col-sm-6">
                                    <div class="pull-right">&nbsp;</div>
                                </div>

                            </div>
                            <div class="box-body">
                                <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>User Mobile</th>
                                                <th>Complaint Id</th>
                                                <th>Type</th>
                                                <th>Outid</th>
                                                <th>Whatsapp</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $kyc = mysqli_query($con, "SELECT * FROM `tbl_complaints`");
                                            $user = mysqli_query($con, "SELECT * FROM `tbl_user`");

                                            ?>
                                            <?php
                                            $i = 1;
                                            foreach ($kyc as $items) {
                                                $mobile = "";
                                                foreach ($user as $items2) {
                                                    if ($items2['id'] == $items['userid']) {
                                                        $mobile = $items2['mobile'];
                                                    }
                                                }
                                            ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><a href="user-details.php?user=<?php echo $items['userid']; ?>"  target="_blank"><?php echo $items['userid'] ?></a></td>
                                                    <td><?php echo $items['compid'] ?></td>
                                                    <td><?php echo ucfirst($items['type']) ?></td>
                                                    <td><?php echo $items['outid'] ?></td>
                                                    <td><?php echo $items['whatsapp'] ?></td>
                                                    <td><?php echo $items['description'] ?></td>


                                                    <td>
                                                        <a href="complaint-details.php?id=<?php echo $items['id'] ?>" class="btn btn-warning">Check</a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($items['status'] == 0) {
                                                        ?>
                                                            <span class="status-text">Pending</span>
                                                        <?php } elseif ($items['status'] == 1) {
                                                        ?>
                                                            <span class="status-text">Open</span>
                                                        <?php } elseif ($items['status'] == 2) {
                                                        ?>
                                                            <span class="status-text">Closed</span>
                                                        <?php }
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            } ?>
                                        </tbody>
                                    </table>
                                  
                                 
                                  
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

        <?php include("include/footer.inc.php"); ?>
    </div>
    <!-- ./wrapper -->
    <script>
        $(function() {
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

        $(".update-kyc").click(function(e) {
            e.preventDefault()

            var id = $(this).data("id");
            var status = $(this).data("status");

            var data = {
                id: id,
                status: status
            }

            $.ajax({
                url: "do_complaint.php",
                data: data,
                dataType: 'json',
                method: "POST",
                success: function(res) {
                    if (res.status == 1) {
                        alert("Status Updated")
                        window.location.reload()
                    } else {
                        alert("Something went wrong!")
                    }
                },
                error: function(err) {
                    alert("Something went wrong!")
                }
            })
        })
    </script>
</body>

</html>