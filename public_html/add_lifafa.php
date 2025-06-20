<?php

ob_start();
session_start();
if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
                  
include 'config.php';

error_reporting(0);

session_start();
$phone='';
$qua = '';
$amt1='';


                
              function random(){
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
    
} 




if($_SESSION['frontuserid'] !="") {
$id = $_SESSION["frontuserid"];

$chkuser = mysqli_query($conn, "select * from `tbl_user` where `id`='" . $id . "'");
           // $userRow = mysqli_num_rows($chkuser);
            $player = mysqli_fetch_assoc($chkuser);
            $phone = $player['mobile'];


 //echo "<script>alert($phone)</script>";

if (isset($_POST['register'])) {
    $ran=random();
    $qua = $_POST["qua"];
    $amt=$_POST['amt1'];
	$otp = $_POST['code'];
	$mobile = $_SESSION["phone"];
	$sessionotp = $_SESSION["signup_otp"];
	$otp_exp_time = $_SESSION["otp_exp_time"];
	$curr_time = date('Y-m-d H:i:s');



	 if ($sessionotp !== $otp) {
	//if ($otp !== $otp) {
		echo "<script>alert('wrong_otp ')</script>";
	} else {
	    
	    		if ($otp_exp_time < $curr_time) {
	    		    	echo "<script>alert('step2')</script>";
// 		if (a==b) {
			echo "<script>alert('OTP expired2')</script>";
		} else {
			$_SESSION["signup_mobilematched"] = $_SESSION["signup_mobile"];
 $data="";
                   
                                      $amount =$amt/$qua;

                  
                    
                	$amtt=$amt/$qua;
                	
                	$chkuser = mysqli_query($con, "select * from tbl_wallet where userid = '$id' ");
                    $player = mysqli_fetch_assoc($chkuser);
                    $a = $player['amount'];
                    if ($a >= $amt ) {
             
                
                        
                        $sql = "INSERT INTO lifafa (amount, tqua, qua, time, random, phone, userid, status)
                        VALUES ('$amtt', '$qua', '$qua',  '$curr_time', '$ran', '$phone', '$id', '$status')";
                        
                     
                        
                              echo "<script>alert('Lifafa Create Successfully')</script>";
                        if ($mysql->query($sql) === TRUE) {
                            
                            
                        
                            	echo "<script>alert($ran)</script>";
                            
                            $update =mysqli_query($con, "UPDATE tbl_wallet SET amount= amount - $amt WHERE userid='$id'");
                            echo "$random";
                                unset($_SESSION["signup_mobile"]);
                    			unset($_SESSION["signup_otp"]);
                    			unset($_SESSION["otp_exp_time"]);
                    			unset($_SESSION['resend_otp_in']);
                            
                            
                            
                            // header("Location: lifafa/?reward=$ran");
                            echo "<script>window.location.href = 'lifafa/?reward=$ran'</script>";
                            exit;
                        
                        
                        } else  {
                        
                        	echo "<script>alert('Error')</script>";
                        }
                        
                
            
                    }else{
                        	echo "<script>alert('Insufficient balance')</script>";
                    }
		    
		    
		    
		}}	}


}else{
     header("location: login.php");
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php include'head.php' ?>
<link rel="stylesheet" href="assets/css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Wingo">
<meta name="keywords" content="Wingo" />
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Red Envelope</title>


<!-- bootstrap CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- google Poppins font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

<!-- fontawesome link here --> 
<script src="https://kit.fontawesome.com/d2dea1ff6b.js"></script>
<style>
	.cus-img{
		width: 1.6rem;
		height:1.6rem;
	}
	body{
	background-color: #F0F0F0 !important;
	}
	.fw{
	font-weight: 500;
	font-size: 0.8rem;
	}
	.wd{
	width:40%;
	border: none;
    background-color: transparent;
    resize: none;
    outline: none;
	}
	.w1{
	border: none;
    background-color: transparent;
    resize: none;
    outline: none;
	}
	.btn{
	background-color: #009688 !important;
	color: white;
    
	font-weight:600;
	width:75%;

	
	}
	.btn-sm {
    height: 35px;
    padding: 0px 12px;
}
.btnn{
    width: 65%;
    padding: 12px 0;
    text-align: center;
    border: 0;
    border-radius: 2px;
    color: #fff;
    font-size: 14px;
    background: #009688;
    box-shadow: 0 3px 1px -2px rgb(0 0 0 / 20%), 0 2px 2px 0 rgb(0 0 0 / 14%), 0 1px 5px 0 rgb(0 0 0 / 12%);

}
.textarea{
     font-size: 16px;
    border: 0;
    font-weight:400;
    border-bottom: 1px solid #919191;
    width: 100%;
}
label{
    padding-top:10px;
     color:#7d7d7d;
    font-weight:400;
    font-size:14px;
}
</style>
<script>
    // window.load(function(){
    //     document.getElementById("form").ge
    // })
</script>
</head>



<body>

<div class="container bg1  px-0 pb-3">
<div class="appHeader1">
<div class="left">
            <a href="/redenvelope.php" style="text-decoration: none;" onClick="goBack();" class="icon goBack">
                <i class="icon ion-md-arrow-back"></i>
            </a>
            <div class="pageTitle">Add Red Envelope</div> 
            
        </div>
</div>
	


	<form action="" method="POST"  id="form1">
	   <div class=" m-3">
<div>
<label class="">Enter Amount</label>
<input class="wd fw bg1 p-2 textarea" min="1" max="200000" id="amt1" type="number" name="amt1"  placeholder="" value="<?php echo $amt1; ?>" required>
</div>

<div >
<label class="">Enter Shares</label>
<input class="wd fw bg1 p-2 textarea" type="number" id="qua" name="qua" value="<?php echo $qua; ?>" required>
</div>
	
<div class=" ">
<label class="">Verification Code</label>
<input class=" fw wd textarea p-2 w-75" type="phone" name="code" value="<?php echo $code; ?>" required placeholder="">
<button id="submit" class="btn1 bg-secondary border-0 p-2 px-3 rounded text-white fw"  type="button">OTP</button>
</div>
<input type="tel" placeholder="Phone Number" maxlength="10" name="phone" class="d-none" id="phone" value="<?php echo $phone; ?>" required readonly/>
<div class="text-center mt-5">
        <button id="btn"  type="submit" name="register"   class="btnn"> Create Envelope </button>
      </div>
	</div>	
</form>
	
	


	
				<!-- <a href="javascript:void(0)" class="btn1" id="submit">SEND OTP</a> value="<?php echo $code; ?>" -->
				
	
</div>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--owl carousel--> 

	<?php include("include/footer.php");?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		var sec = 60;
		// let tempSec = 0;
		function startTimer() {
			// tempSec = sec;
			console.log("hey")
			if (document.getElementById("submit") !== null) {
				document.getElementById("submit").id = "resend_otp";
			}
			var timer = setInterval(function() {
				document.getElementById('resend_otp').innerHTML = sec + ' Secs';
				document.getElementById("resend_otp").setAttribute("disabled","")
				// document.getElementById("resend_otp").classList.remove("d-none");
				sec--;
				if (sec < 0) {
					clearInterval(timer);
					document.getElementById("resend_otp").removeAttribute("disabled");
					document.getElementById('resend_otp').innerHTML = "RESEND OTP"

				}
			}, 1000);
		}


		$("#submit").click(function() {
			// console.log("hi")
			let user_amount = $("#amt1").val();
				if(user_amount!=''){
			    
			
			
			
			if(document.getElementById("submit") !== null){
				let phone_number = $("#phone").val();
				
		
				//console.log(user_amount);
				$.ajax({
					type: "POST",
					url: "otp.php",
					data: {
						phone_number: phone_number,
						send_otp: "send_otp",
						amt:user_amount
					},
					success: function(res) {
						// console.log(res)
						if (res == "invalid_number") {
							alert("enter correct number")
						} else if (res == "user_already_exist") {
							alert("user already exists");
						} else if (res == "otp_sent") {
							startTimer()
						} else {
							alert(res);
						}
					}
				})
			}
			else{
				sec = 60;
				let phone = $("#phone").val();
				let user_amount = $("#amt1").val();
			 //console.log("hi")
				// console.log("user_amount");
				$.ajax({
					type: "POST",
					url: "otp.php",
					data: {
						phone_number: phone,
						resend_otp: "resend_otp",
						amt:user_amount
					},
					success: function(res) {
						if (res == "wait") {
							alert("wait")
						} else if (res == "invalid_number") {
							alert("enter correct number")
						} else if (res == "user_already_exist") {
							alert("user already exists");
						} else if (res == "otp_sent") {
							startTimer()
						} else {
							alert(res);
						}
					}
				})
			}
			
				
			
			// preventDefault();


				}else{
				alert('Enter Amount');
				}
		})


		$("#resend_otp").click(function() {
			
				
			
		})
	</script>
	
<script src="assets/js/lib/jquery-3.4.1.min.js"></script> 
<!-- Bootstrap--> 
<script src="assets/js/lib/popper.min.js"></script> 
<script src="assets/js/lib/bootstrap.min.js"></script> 
<!-- Owl Carousel --> 
<script src="assets/js/plugins/owl.carousel.min.js"></script> 
	
</body>
</html>