<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    body {
      background: url('./images/loginbg.jpg') !important;
    }
    .textbox{
    width: 100%;
    height: 48px;
    display: flex;
    flex-direction: row;
    align-items: center;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    padding: 0 12px;
    box-sizing: border-box;
    line-height: 48px;
    background: #fff;
    border-radius: 2px;
    margin-bottom: 35px;
    }
    
      .btn1 { width: 100%;
     
    height: 44px;
    text-align: center;
    line-height: 44px;
    background: #009688;
    font-size: 16px;
    color: #fff;
    border: 0;
    border-radius: 2px;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);
    transition: .3s cubic-bezier(.25,.8,.5,1),color 1ms;
    
}
.btndiv
      {
          padding: 15px 0 0 0;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
      }
      .inner-addon .icon{
        padding:15px 12px;
        font-size: 22px;
    }
         .inner-addon.left-addon.kk{
        position:absolute;
        left:44px;
        top:14px;
        font-size:16px;
    }
    .qq{
        position:absolute;
        left:44px;
        top:14px;
        font-size:16px;
    }
    .btn-login:hover{
        color:#fff;
    }
    .inner-addon{
        color:#757575;
        position:relative;
    }
    .left-addon input{
        padding-left:45px;
    }
    .inner-addon{
        margin-bottom:30px;
    }
      .number-img img{
        position: absolute;
        width: 100%;
        height: 100%;
        max-width: 20px;
        max-height: 20px;
        top: 15px;
        left: 13px
    }
     </style>
</head>

<body class="hold-transition login-page">
  <div class="">
    <div class="login-box">
     
      

      <!-- /.login-logo -->
      <div class="">

        <h3 style="color:white" class="login-box-msg">Admin Login</h3>
   <p style="color:white" class="text-center">Please enter your credentials to login.</p>

     <br>
        <form action="validateAdmin.php" method="post">
             
            <div class="inner-addon left-addon custom-left">
              <div class="number-img">
                  <img src="./images/mobile-img.png">
              </div>
         
          <input type="text" class="form-control textbox" value="" placeholder="Username" name="admin_id" >
          </div>
             <div class="inner-addon left-addon custom-left">
         
             <div class="number-img">
                  <img src="./images/key-img.png">
              </div>
            <input type="password" class="form-control textbox" value=""  placeholder="Password" name="password_admin">
              <input type="hidden" name="login" value="login" >
          </div>
          <div class="text-center btndiv">
              <button type="submit" class="btn1 ">Login</button>
            </div>
        </form>

        <!--<a href="#">I forgot my password</a>-->
<div class="login-logo">
        <h5> <?php if (isset($_GET['err']) == "ture") { ?>
            <span class="red_txt">Check your username or password</span>
          <?php  } ?>
          <?php if (isset($_GET['msg1']) == "notauthorized") { ?>
            <span class="red_txt">Wrong Action Performed By User</span>
          <?php  } ?>
          <?php if (isset($_GET['logout']) == "sucess") { ?>
            <span class="red_txt">You Are Logged Out Sucessfully</span>
          <?php  } ?>
        </h5>
      </div>

      </div>
      <!-- /.login-box-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery 2.2.0 -->
  <script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function() {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
    });
  </script>
</body>

</html>