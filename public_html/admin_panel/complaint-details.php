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

        <?php include("include/connection.php"); ?>

        <?php include("include/header.inc.php"); ?>

        <!-- Left side column. contains the logo and sidebar -->

        <?php include("include/navigation.inc.php"); ?>

        <?php $id = $_GET["id"]; ?>

        <?php

        $data = mysqli_query($con, "SELECT * FROM `tbl_complaints` where id='$id'");

        $fetch = mysqli_fetch_array($data);

        $user = mysqli_query($con, "SELECT * FROM `tbl_user`");



        ?>

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">

            <!-- Content Header (Page header) -->

            <section class="content-header">

                <h1>Manage Complaints Request for ID <?php echo $fetch['compid'] ?></h1>

                <ol class="breadcrumb">

                    <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>

                    <li class="active">Manage Complaints Request</li>

                </ol>

            </section>



            <!-- Main content -->

            <section class="content">

                <div class="row">

                    <div class="col-xs-12">

                        <div class="box">

                            <div class="box-header box-header2">

                                <div class="col-xs-2">

                                    <h5><b>Compaint Id: <?php echo $fetch['compid'] ?></b></h5>

                                </div>

                                <div class="col-xs-2">

                                    <h5><b>User Id: <?php echo $fetch['userid'] ?></b></h5>

                                </div>

                                <div class="col-xs-3">

                                    <h5><b>Complaint Type: <?php echo ucfirst($fetch['type']) ?></b></h5>

                                </div>

                                <div class="col-xs-2">

                                    <h5><b>Outid: <?php echo ucfirst($fetch['outid']) ?></b></h5>

                                </div>

                                <div class="col-xs-2">

                                    <h5><b>Whatsapp: <?php echo ucfirst($fetch['whatsapp']) ?></b></h5>

                                </div>



                                <div class="col-xs-1">

                                    <?php if ($fetch['status'] == 1) {

                                    ?>

                                        <span class="status-text btn btn-success" id="close" data-id="<?php echo $fetch['id'] ?>">Open</span>

                                    <?php } elseif ($fetch['status'] == 2) {

                                    ?>

                                        <span class="status-text btn btn-danger" id="open">Closed</span>

                                    <?php }

                                    ?>

                                </div>

                                <div class="col-xs-12">

                                    <h5><b>Message: </b> <?php echo ucfirst($fetch['description']) ?></h5>

                                </div>







                            </div>



                            <!-- /.box-header -->

                            <div class="box-body" style="padding: 20px">

                                <div class="row">

                                    <div class="col-lg-12 border">

                                        <h3>Complaint Conversation</h3>

                                        <br />

                                        <?php

                                        $compid = $fetch['compid'];

                                        $getdata = mysqli_query($con, "SELECT * FROM complaint_chats WHERE compid='$compid'");

                                        ?>

                                        <?php

                                        foreach ($getdata as $items) {

                                        ?>

                                            <?php

                                            if ($items['usertype'] == 'admin') { ?>

                                                <div class="col-12 mb-2" style="border-bottom: 1px solid #ccc; padding: 5px 10px;text-align:right">

                                                    <p style="margin:0 ;"><b><?php echo ucfirst($items['message']) ?></b></p>

                                                    <p style="margin:0 ;"><small>

                                                            Admin (<?php

                                                                    $date = date_create($items['date']);

                                                                    echo date_format($date, "d/M/Y H:i:s") ?>)

                                                        </small></p>



                                                </div>

                                            <?php }

                                            ?>





                                            <?php

                                            if ($items['usertype'] == 'user') { ?>

                                                <div class="col-12 mb-2" style="border-bottom: 1px solid #ccc; padding: 5px 10px;">

                                                    <p style="margin:0 ;"><b><?php echo ucfirst($items['message']) ?></b></p>

                                                    <p style="margin:0 ;"><small>

                                                            User (<?php

                                                                    $date = date_create($items['date']);

                                                                    echo date_format($date, "d/M/Y H:i:s") ?>)

                                                        </small></p>



                                                </div>

                                            <?php }

                                            ?>

                                        <?php }

                                        ?>

                                    </div>

                                    <?php if ($fetch['status'] == 1) {

                                    ?>

                                        <div class="col-lg-12">

                                            <h4>Send Reply</h4>



                                            <form action="" id="complaintReply">

                                                <input type="hidden" name="compid" value="<?php echo $fetch['compid'] ?>">



                                                <div class="form-group">

                                                    <textarea name="message" cols="30" rows="5" class="form-control"></textarea>

                                                </div>



                                                <div class="form-group">

                                                    <button class="btn btn-warning">Send Reply</button>

                                                </div>

                                            </form>

                                        </div>

                                    <?php } else {

                                        echo "<div class='col-lg-12'><h3 style='text-align:center; margin: 30px 0 0;'>Reply are closed due to complaint is closed!</h3></div>";
                                    } ?>

                                </div>

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



        $("#complaintReply").submit(function(e) {

            e.preventDefault()



            var data = new FormData(this)

            $.ajax({

                url: "do_complaint_reply.php",

                data: data,

                method: "POST",

                processData: false,

                contentType: false,

                success: function(res) {

                    if (res == 1) {

                        alert("Reply sent")

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



        $("#close").click(function() {

            var id = $(this).data("id")

            if (confirm("Are you sure want to close this complaint!")) {

                $.ajax({

                    url: "do_complaint_reply.php",

                    data: {

                        stat: 'close',

                        id: id,

                    },

                    method: "POST",

                    success: function(res) {

                        if (res == 1) {

                            alert("Complaint Closed")

                            window.location.reload()

                        } else {

                            alert("Something went wrong!")

                        }

                    },

                    error: function(err) {

                        alert("Something went wrong!")

                    }

                })

            }

        })
    </script>

</body>



</html>