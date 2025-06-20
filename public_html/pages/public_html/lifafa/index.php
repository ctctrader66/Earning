<?php

include 'config.php';

error_reporting(0);
session_start();


echo '<script type="text/javascript">';
echo 'function clk(){
    document.getElementById("phone").style.display = "none";
    document.getElementById("msg").style.display = "block";
    };';
    
echo 'function clk1(){ 
document.getElementById("phone").style.display = "block";
document.getElementById("msg").style.display = "none";
    };';
    
echo '</script>';



       


date_default_timezone_set("Asia/Kolkata");

$data = $_GET['reward'];

   if ($data==''){
    
    header("location: login.php");
    exit;
    }else{

        $getinfo = "select * from lifafa where random = '$data'  ";
        
                if ($result = $mysql->query($getinfo))
                {
                    while ($row = $result->fetch_object())
                    {
                        $id = $row->id;
                        $tqua = $row->tqua;
                        $qua = $row->qua;
                        $amt = $row->amount;
        
                    }
                    
                 
        
                }else{
                     header("location: login.php");
                         exit;
                }
        
        
       
            if($_SESSION['frontuserid'] !="") {
            $id = $_SESSION["frontuserid"];
            
            // echo "<script>alert('login')</script>";
            
            
            $l = true;
            $chkuser = mysqli_query($conn, "select * from `tbl_user` where id = $id ");
                       // $userRow = mysqli_num_rows($chkuser);
                        $player = mysqli_fetch_assoc($chkuser);
                        $phone = $player['mobile'];
                        
            
           $new = substr($phone, 0,-8);
             $new1 = substr($phone, 4);
            $na=$new.'**'.$new1;
        
            $sql = "SELECT * FROM lifafa_his WHERE phone = '{$phone}' AND l_id= '{$data}' ";
                    $result = mysqli_query($conn, $sql) or die("Query Failed");
            
                    if (mysqli_num_rows($result) > 0)
                    {
                        
                        $getinfo = "SELECT * FROM lifafa_his WHERE phone = '{$phone}' AND l_id= '{$data}'  ";
            
                    if ($result = $mysql->query($getinfo))
                    {
                        while ($row = $result->fetch_object())
                        {
                            $a = $row->amt;
                            $msg = $a. ".00";
                            
            
                        }
                        
                    }
            
                  
                    
                           // echo "<script>alert($msg)</script>";
                       ?>
                        <style>
                          #mainDiv1{
                             display:none;
                          }  
                          #mainDiv2{
                             display:block;
                          }  
                          #mainDiv3{
                             display:block;
                          }  
                            
                        </style>
                          <?php 
                            
                    }
                    else
                    {
                      
                          if($qua > 0){
                              
                              ?>
                                <style>
                                  #mainDiv2{
                                     display:none;
                                  }  
                                  #mainDiv3{
                                 display:none;
                                    }  
                                  #mainDiv1{
                                     display:block;
                                  }  
                                    
                                </style>
                                  <?php 
                                  $msg = 'Welcome User: '. $na;
                                    echo '<BODY onLoad="clk()">';
                                    
                              
                          }else{
                           
                           ?>
                            <style>
                              #mainDiv1{
                                 display:none;
                              }  
                              #mainDiv2{
                                 display:block;
                              }  
                              #mainDiv3{
                                 display:block;
                              }   
                            </style>
                              <?php 
                              $msg = "FINISHED".  "</br>". "I'm sorry you're late!";
                              
                              
                          }
                        
                    }
        
        
        }else{
          //  echo "<script>alert('notlogin')</script>";
            $phone = ($_POST['phone']);
           $new = substr($phone, 0,-8);
             $new1 = substr($phone, 4);
            $na=$new.'**'.$new1;
            $chkuser = mysqli_query($conn, "select * from `tbl_user` where `mobile`= $phone");
                   // $userRow = mysqli_num_rows($chkuser);
                    $player = mysqli_fetch_assoc($chkuser);
                    $id = $player['id'];
                    
            echo '<BODY onLoad="clk1()">';
          
                          if($qua > 0){
                          
                          
                                 ?>
                            <style>
                              #mainDiv1{
                                 display:block;
                              }  
                              #mainDiv2{
                                 display:none;
                              }  
                             
                            </style>
                              <?php 
                                  
                                
                          
                      }else{
                       
                           ?>
                            <style>
                              #mainDiv1{
                                 display:none;
                              }  
                              #mainDiv2{
                                 display:block;
                              }  
                               
                            </style>
                              <?php 
                              $msg = "FINISHED". "</br>". "I'm sorry you're late !";
                          
                          
                      }
              
            
        }
        
        
            
         
               
               
               
            
        
        
        
        
        
            
                    if (isset($_POST['submit']))
                {
                    
                    
                // echo "<script> document.getElementById('myModal').style.display = 'block';  </script>";
                
                
                    
                
                    
                       $chkuser = mysqli_query($conn, "select * from `tbl_user` where `mobile`= $phone");
                   
                       if (mysqli_num_rows($chkuser) > 0)
                        {
                        
                
                         
                        $time=  date('d-m-Y h:i:s');
                        $sql = "SELECT * FROM lifafa_his WHERE phone = '{$phone}' AND l_id= '{$data}' ";
                        $result = mysqli_query($conn, $sql) or die("Query Failed");
                
                        if (mysqli_num_rows($result) > 0)
                        {
                            
                             $getinfo = "SELECT * FROM lifafa_his WHERE phone = '{$phone}' AND l_id= '{$data}'  ";
                
                        if ($result = $mysql->query($getinfo))
                        {
                            while ($row = $result->fetch_object())
                            {
                                $a = $row->amt;
                               $msg = $a. ".00";
                                
                
                            }
                            
                        }
                
                          //  echo "<script>alert('You Already Claimed Reward')</script>";
                          ?>
                            <style>
                              #mainDiv1{
                                 display:none;
                              }  
                              #mainDiv2{
                                 display:block;
                              }  
                              #mainDiv3{
                                 display:block;
                              }  
                                
                            </style>
                              <?php 
                                
                        }
                        else
                        {
                
                            if ($qua > 0)
                            {
                
                                $update = "UPDATE tbl_wallet SET  amount = amount + $amt WHERE userid ='$id'";
                
                                if ($mysql->query($update) === true)
                                {
                
                                    $update1 = "UPDATE lifafa SET  qua = qua - 1 WHERE random ='$data'";
                
                                    if ($mysql->query($update1) === true)
                                    {
                
                                    //     $sql = "INSERT INTO usertable ( userid, orderid, amount, type, actiontype )
                                    // 	VALUES (  '$uid', '$uid', '$amt', 'credit', 'lifafa' )";
                
                                    //     $result = mysqli_query($conn, $sql);
                                    //     if ($result)
                                    //     {
                
                                            $sql1 = "INSERT INTO lifafa_his ( l_id, phone, amt, time, name, userid)
                                            	VALUES (  '$data', '$phone', '$amt', '$time', '$na', '$id')";
                
                                            $result1 = mysqli_query($conn, $sql1);
                                            if ($result1)
                                            {
                                                $sql2 =mysqli_query($conn, "INSERT INTO tbl_walletsummery ( userid, orderid, amount, type, actiontype)
                                            	VALUES (  '$id', '$id', '$amt', 'credit', 'lif' )");
                                            	
                                                // echo "<script>alert('Reward added into your wallet')  </script>";
                                                mysqli_close($conn);
                                                echo "<script>alert('Redeem Lifafa Successfully')</script>";
                                              
                                                $phone = "";
                
                                            }
                                            else
                                            {
                                                echo "<script>alert('Woops! Something Wrong Went.')</script>";
                                            }
                
                                        // }
                                        // else
                                        // {
                
                                        //     echo "<script>alert($result->error)</script>";
                
                                        // }
                
                                    }
                                    else
                                    {
                
                                        echo "<script>alert($update1->error)</script>";
                
                                    }
                
                                }
                                else
                                {
                                    //   echo "error" . $mysql->error;
                                    echo "<script>alert('error1')</script>";
                                }
                
                            }
                            else
                            {
                                 echo "<script>alert('Limit Excedded')</script>";
                                // echo '<BODY onLoad="clk1()">';
                            }
                
                        }
                
                    
                  
                }else{
                    echo "<script>alert('Number Not Registered')</script>";
                }
                        
                    } //post submit end

    }  


    


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Lifafa</title>

<!-- cstm css only -->
<link rel="stylesheet" href="css/style.css">
<!-- bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- google Poppins font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
<link rel="stylesheet" href="font/droid-font/stylesheet.css">
<!-- fontawesome link here --> 
<script src="https://kit.fontawesome.com/d2dea1ff6b.js"></script>
<style>
body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, Helvetica Neue, Helvetica, Segoe UI, Arial, Roboto, PingFang SC, miui, Hiragino Sans GB, Microsoft Yahei, sans-serif;
}
.van-nav-bar__title {
    max-width: 60%;
    margin: 0 auto;
    color: #323233;
    font-weight: 500;
    font-size: 16px;
}
.van-ellipsis {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}
.van-nav-bar {
    position: relative;
    z-index: 1;
    line-height: 22px;
    text-align: center;
    background-color: #fff;
    -webkit-user-select: none;
    user-select: none;
}

element.style {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}
.record-box[data-v-3d96fb60] {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
}
.envelope-context .records[data-v-3d96fb60] {
    margin: 0 15px 15px;
    background: #fff;
    border-radius: 7px;
    text-align: center;
    box-shadow: 1px 2px 1px 0.5px #eee;
}
.envelope-context .records .record-box .image img[data-v-3d96fb60] {
    width: 100%;
}
img {
    max-width: 100%;
    display: block;
}
.envelope-context .records[data-v-3d96fb60] {
    margin: 0 15px 15px;
    background: #fff;
    border-radius: 7px;
    text-align: center;
    box-shadow: 1px 2px 1px 0.5px #eee;
}


.navbar {
  overflow: hidden;
  display:flex;
  justify-content:center;
  align-items:center;
  background-color: #65A765;
  position: fixed; /* Set the navbar to fixed position */
  top: 0; /* Position the navbar at the top of the page */
  width: 100%; /* Full width */
}
.cus-img{
		width: 1.6rem;
		height:1.6rem;
	}
</style>
</head>

<!-- main nav code here -->

<body>
<div data-v-31a77878="" class="layout-content"><!---->
  <div data-v-3d96fb60="" class="envelope-context">
    <div data-v-3d96fb60="" class="nav-bar__transparent van-nav-bar van-nav-bar--fixed">
      <div class="van-nav-bar__content">
        
        <div class="bg-success d-flex shadow-sm px-3 py-2">
            <a href="/myaccount.php">
<img  src="images/left-chevron.png" class="img-fluid cus-img" alt=""></a>
<h4 class="text-center w-100">Red Envelope</h4>
</div>
      </div>
    </div>
    <div data-v-3d96fb60="">
      <div data-v-3d96fb60="" class="top"><img data-v-3d96fb60="" src="images/red-001.jpg"></div>
      <div data-v-3d96fb60="" class="main-red ">Red Envelope</div>
      <div data-v-3d96fb60="" class="main-box" id="mainDiv1" >
        <div data-v-3d96fb60="" class="bottom" > <span data-v-3d96fb60="" id="msg" class="center"><?php echo $msg ?></span>
          <form action="" method="POST"  > <div  style="position: absolute; right: 0px; margin-right: 12px;"> <a href="javascript:void(0)"  style="display: block; padding: 12px; color: rgb(154, 154, 151); text-align: center;" onclick="copyToClipboard()">Copy Link</a> </div>
            <input data-v-3d96fb60="" type="tel" name="phone" id="phone"  maxlength="10" placeholder="Enter Phone Number" autocomplete="off"  value="<?php echo $phone; ?>" >
            <button data-v-3d96fb60="" name="submit" class="open" >OPEN ENVELOPE</button>
          </form>
        </div>
       
      </div>
      
      
      <!--second data start-->
      
      <div  class="" id="mainDiv2" data-v-3d96fb60=""><div data-v-3d96fb60=""  class="redpacket-collection main-box " ><span data-v-3d96fb60="">
                    <?php echo $msg; ?>
                </span> <!----></div> <div data-v-3d96fb60="" class="redpacket-collection-content "><button data-v-3d96fb60="" style="margin-bottom: 15px;">MY RED ENVELOPES</button></div>
                <?php
                  
                  $summery=mysqli_query($con,"select * from `lifafa_his` where l_id= '$data' order by id desc");
            	  $summeryRows=mysqli_num_rows($summery);
            	  if($summeryRows!=''){
            		  while($summeryResult=mysqli_fetch_array($summery)){
            		      $nam = $summeryResult['name'];
            		      $tim = $summeryResult['time'];
            		      $amtt = $summeryResult['amt'];
                             $time=  date('h:i:s A d-m-Y');
                          
                          
		      
		      ?>
                <div data-v-3d96fb60="" id="mainDiv3" class="record-box  bg-white" style="display: flex; justify-content: center; align-items: center; padding: 15px;">
          
          
          
          
          <div data-v-3d96fb60="" class="record-box__left">
              <div data-v-3d96fb60="" class="image">
                  <img data-v-3d96fb60="" src="user-1.png">
                  </div></div> 
                  
                  
                  
                  
                  
                  
                  <div data-v-3d96fb60="" class="record-box__center ms-3"><div data-v-3d96fb60="" class="info">
                      <span data-v-3d96fb60="" class="name"> <?php echo $nam; ?></span> <span data-v-3d96fb60="" class="time d-block"> <?php $bonus=mysqli_query($con,"select * from `lifafa_his` WHERE phone = '{$phone}' AND l_id= '{$data}' ");
	$bonusadd=mysqli_fetch_array($bonus);
	$refbonus = $bonusadd['time']; echo $refbonus; ?></span>
                      </div></div> 
                      <div data-v-3d96fb60="" class="record-box__right"><span data-v-3d96fb60="" style="font-size: 16px; color: rgb(122, 196, 140);">₹  <?php echo $amtt; ?></span>
                      </div></div>
                      
                      <?php
            		  }
            	  }
            		  ?>
                    
                </div>
      <!--second data end-->
      <!--listdata strat-->
      
      <!----></div>
    <!----></div>
</div>
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-154573245-1"></script> 
<script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-154573245-1');
    </script> 
<script type="text/javascript" src="/chunk.corejs.def07d02.js"></script><script type="text/javascript" src="/chunk.vantjs.def07d02.js"></script><script type="text/javascript" src="/chunk.vendor.def07d02.js"></script><script type="text/javascript" src="/main.def07d02.js"></script> 
<script>
    // function Copy(){
    //     var abc = window.location.href;
    //     navigator.clipboard.writeText(abc.value);
    // }
function copyToClipboard(text) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value = window.location.href;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);
alert("URL Copied.");
}

function copy() {
  var copyText = window.location.href;
  copyText.select();
  document.execCommand("copy");
}

document.querySelector("#copy").addEventListener("click", copy);

</script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--owl carousel--> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
