<?php


                  
include 'config.php';

error_reporting(0);

session_start();
$phone='';
$qua = '';
$amt='';



                
              function random(){
    $characters = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 25; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $pin = $randomString;
    
} 




if(isset($_SESSION["loggedin"])  && $_SESSION["loggedin"] === true){
 

$phone = $_SESSION["phone"];


if (isset($_POST['register'])) {
    $ran=random();
    $qua = $_POST["qua"];
    $amt=$_POST['amt1'];
	$otp = $_POST['code'];
	$mobile = $_SESSION["phone"];
	$sessionotp = $_SESSION["signup_otp"];
	$otp_exp_time = $_SESSION["otp_exp_time"];
	$curr_time = date('Y-m-d H:i:s');



	 if (strlen($sessionotp !== $otp)) {
	//if ($otp !== $otp) {
		echo "<script>alert('wrong_otp2 ')</script>";
	} else {
	    
	    		if ($otp_exp_time < $curr_time) {
	    		    	echo "<script>alert('step2')</script>";
// 		if (a==b) {
			echo "<script>alert('OTP expired2')</script>";
		} else {
			$_SESSION["signup_mobilematched"] = $_SESSION["signup_mobile"];
				
		 
                
                    
                       
                    $data="";
                   
                    $amount =$amt/$qua;

                    $time= round(microtime(true) * 1000);
                    
                	$amtt=$amt/$qua;
                	
                	echo "<script>alert($ran)</script>";
             
                
                        //Insert data into the table, users is the table name
                        //  $sql = "INSERT INTO lifafa (amount, tqua, qua, time, random, uid)
                        // VALUES ('$amt', '$qua', '$qua'  '$time', '$ran', '6')";
                        
                        $sql = "INSERT INTO lifafa (amount, tqua, qua, time, random, phone)
                        VALUES ('$amtt', '$qua', '$qua',  '$time', '$ran', '$phone')";
                        
                        if ($mysql->query($sql) === TRUE) {
                            
                            $update =mysqli_query($con, "UPDATE usertable SET point= point - $amt WHERE phone='$phone'");
                            echo "$random";
                                unset($_SESSION["signup_mobile"]);
                    			unset($_SESSION["signup_otp"]);
                    			unset($_SESSION["otp_exp_time"]);
                    			unset($_SESSION['resend_otp_in']);
                            
                            header("Location: /demo/?reward=$ran");
                            exit;
                        
                        
                        } else  {
                        
                        	echo "<script>alert('Error')</script>";
                        }
                        
                
            
           

		


				



				


                            
						}
					
				
			}
		}
	



}else{
     header("location: login.php");
    exit;
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
	background-color: #ffb300 !important;
	color: white;
	font-size:1.1rem;
	font-weight:600;
	width:75%;
	margin-top: 1rem;
	
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
<div class="bg-white d-flex shadow-sm px-3 py-2">
<img src="images/left-chevron.png" class="img-fluid cus-img" alt="">
<h4 class="text-center w-100">Red-Envelope</h4>
</div>
	
<div class=" bg-white m-3 d-flex align-items-center mt-5">
<p class="m-3 fw">Fixed red envelope</p>
</div>

	<form action="" method="POST"  id="form1">
	   
<div class=" bg-white m-3 d-flex align-items-center mt-2 mb-2">
<p class="m-3 fw">Total Bonus in Red Envelope</p>
<input class="wd fw bg1 p-2" id="amt1" type="number" name="amt1"  placeholder="Enter Amount" value="<?php echo $amt1; ?>" required>
</div>
	
<div class=" bg-white m-3 d-flex align-items-center ">
<p class="m-3 fw">Numbers Of Red-Envelope &nbsp;</p>
<input class="wd fw bg1 p-2" type="number" id="qua" name="qua"  placeholder="Enter Number" value="<?php echo $qua; ?>" required>
</div>
	
<div class=" bg-white m-3 d-flex align-items-center ">

<input class=" fw w1 bg-white p-3 m-1 w-75" type="phone" name="code" value="<?php echo $code; ?>" required placeholder="Please enter verification code">
<button id="submit" class="btn1 bg-success border-0 p-2 px-3 rounded text-white fw"  type="button">OTP</button>
</div>
			<input type="tel" placeholder="Phone Number" maxlength="10" name="phone" class="d-none" id="phone" value="<?php echo $phone; ?>" required readonly/>
<div class=" m-3 d-flex align-items-center ">
<button id="btn"  type="submit" name="register" class="btn rounded-pill mx-auto">Put In</button>
</div>
		
</form>
	
	


	
				<!-- <a href="javascript:void(0)" class="btn1" id="submit">SEND OTP</a> value="<?php echo $code; ?>" -->
				
	
</div>
	
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<!--owl carousel--> 
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
				
		
				console.log(user_amount);
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
				 console.log("user_amount");
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
</body>
</html>