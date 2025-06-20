<?php 
ob_start();
session_start();
if (isset($_SESSION['frontuserid'])) {
       $frontUserId = $_SESSION['frontuserid'];}
  else{header("location:login.php");exit();}
include("include/connection1.php");
$userid=$_SESSION['frontuserid'];
$type=$_POST['type'];
$name=$_POST['name'];
?>
  
  <div class="container mt-1">
    <p class="left-text">Currency</p>
 <div class="right-group">
                      <label class="btn1 selected" id="trxLabel">
                        <input class="contract" type="radio" name="curradio" value="inr" checked onchange="changeLabelColor('trxLabel')">INR
                      </label>
    </div>
</div>
  <div class="container mt-1">
  <p class="left-text">Money</p>
  <div class="right-group">
      <label class="btn1 btn-secondary selecteds" onClick="contract(10);">
                          <input class="contract" type="radio" name="optradio" id="hoursofoperation" value="10" checked onchange="contracts()" >10</label>
      <label class="btn1 btn-secondary" onClick="contract(50);">
                          <input class="contract" type="radio" name="optradio" id="hoursofoperation" value="50"  onchange="contracts()" >50</label>
   <label class="btn1 btn-secondary" onClick="contract(100);">
                          <input class="contract" type="radio" name="optradio" id="hoursofoperation" value="100"  onchange="contracts()" >100</label>
    <label class="btn1 btn-secondary" onClick="contract(1000);">
                          <input type="radio" class="contract" name="optradio" id="hoursofoperation" value="1000" onchange="contracts()" >1000</label>
                       
  </div>
</div>

<div class="container">
  <p class="left-text">Multiply</p>
   <div class="def-number-input number-input ">
  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown(); addvalue();" class="minus"></button>
  <input class="quantity" min="1" name="amount" id="amount" value="1" type="number" onKeyUp="addvalue();">
  <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp(); addvalue();" class="plus"></button>
</div>

</div>

       <div style="margin: 10px 0px" class="container">
  <p style="color:white" class="left-text">.</p>
  <div class="right-group">
 <label class="btn1  btn-secondary">
                            <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="3">x3<br>
                          </label>
                          <label class="btn1  btn-secondary">
                            <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="5">x5<br>
                          </label>
                          <label class="btn1  btn-secondary">
                            <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="10">x10<br>
                          </label>
                           <label class="btn1  btn-secondary">
                            <input type="radio" name="browser" onclick="myFunction(this.value); addvalue();" value="20">x20<br>
                          </label>
                           
                          
  <script>
                          function myFunction(browser) {
                            document.getElementById("amount").value = browser;
                          }
                          </script>
  </div>
  
</div>
  <input type="hidden" id="contractmoney" name="contractmoney" value="1">   
<input type="hidden" name="userid" id="userid" class="form-control" value="<?php echo $userid;?>">
      <input type="hidden" name="type" id="type" class="form-control" value="<?php echo $type;?>">
    <input type="hidden" name="value" id="value" class="form-control" value="<?php echo $name;?>">
      <input type="hidden" name="counter" id="counter" class="form-control" >
      <input type="hidden" name="inputgameid" id="inputgameid" class="form-control" value="<?php echo sprintf("%03d",gameid($con));?>"> 
<div class="custom-control custom-checkbox m-2">
    <input type="checkbox" checked class="custom-control-input " id="presalerule" name="presalerule">
  <label class="custom-control-label text-muted " for="presalerule">I Agree <a data-toggle="modal" href="#privacy" data-backdrop="static" data-keyboard="false">Presale Rule</a></label>
                        </div>      
                        
                         <input type="hidden" name="finalamount" id="finalamount" value="10">
                            <div class="parent">
                     <div class="child">
                        <button  data-dismiss="modal">Cancel</button>
                     </div>
                     
                     <div  style="background:#<?php if($name == 'Green'){echo "3faa70";}elseif($name == 'Red'){echo "fc5050";}elseif($name == 'Violet'){echo "ca70ff";}elseif($name == 0){echo "fc5050";}elseif($name == 1){echo "3faa70";}elseif($name == 2){echo "fc5050";}elseif($name == 3){echo "3faa70";}elseif($name == 4){echo "fc5050";}elseif($name == 5){echo "3faa70";}elseif($name == 6){echo "fc5050";}elseif($name == 7){echo "3faa70";}elseif($name == 8){echo "fc5050";}elseif($name == 9){echo "3faa70";}?>" class="child1">
                        <button  id="type" type="submit">Total Price :    
                        <span id="showamount">10</span></button>
                     </div>
                  </div>
                 