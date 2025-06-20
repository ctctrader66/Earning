<?php $urlpage= basename($_SERVER['PHP_SELF']);
$active='';

?>
<style>
    .appBottomMenu {
	min-height:56px;
	position:fixed;
	z-index:9999;
	bottom:0;
	left:0;
	right:0;
	/*background:#FFF;*/
	background: url(/images/fotter.webp) no-repeat center center/cover;
	display:-webkit-box;
	display:flex;
	-webkit-box-align:center;
	align-items:center;
	-webkit-box-pack:center;
	justify-content:center;
	padding-bottom:env(safe-area-inset-bottom);
	-webkit-box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
	box-shadow: 0 3px 14px 2px rgba(0, 0, 0, .12);
}
.appBottomMenu .item {
	width:35%;
	text-align:center;
	height:56px;
	display:-webkit-box;
	display:flex;
	-webkit-box-align:center;
	align-items:center;
	-webkit-box-pack:center;
	justify-content:center
}
.appBottomMenu .item>a {
	width:100%;
	height:56px;
	display:-webkit-box;
	display:flex;
	-webkit-box-align:center;
	align-items:center;
	padding:0;
	-webkit-box-pack:center;
	justify-content:center;
	color:#FFC8C8 !important;
	position:relative
}
.appBottomMenu .item p {
	margin:0
}
.appBottomMenu .item i {
	font-size:26px;
	line-height:0;
	margin-bottom:17px;
	display:block
}
.appBottomMenu .item span {
	display:block;
	font-size:14px;
	font-size:400;
	position:absolute;
	left:0;
	bottom:2px;
	right:0
}
.appBottomMenu .item.active {
	position:relative
}
/*.appBottomMenu .item.active:after {
	content:'';
	height:2px;
	border-radius:0 0 10px 10px;
	display:block;
	background:#C00203;
	position:absolute;
	left:0;
	top:0;
	right:0
}*/
.appBottomMenu .item.active>a {
	color:#C00203 !important
}
.appBottomMenu.iconed .item i {
	margin-bottom:0
}
.appBottomMenu.color-light {
	border-top:0
}
.appBottomMenu.color-light .item>a {
	color:rgba(255, 255, 255, 0.7) !important
}
.appBottomMenu.color-light .item.active:after {
	background:transparent
}
.appBottomMenu.color-light .item.active>a {
	color:#FFF !important
}
.fotterimg{
    height:55px;
    margin-top:-40px;
    border-radius:30px;
    background:white;
    border:5px solid white;
}
.fotterim{
    height:26px;
    margin-top:-15px;
}
.act{
    color:#fb6360 !important;
}

</style>

<div class="appBottomMenu">
 <?php if(isset($_SESSION['frontuserid'])){?>
     <div class="item <?php if($urlpage=='game.php'){echo'active';}?>"> <a href="game">
    <p class="<?php if($urlpage=='game.php'){echo'act';}?> " ><?php if($urlpage=='game.php'){echo' <img class="fotterim" src="images/h.png" >';}else{echo'<img class="fotterim" src="images/hn.png"> ';}?> 
    <span>HOME</span> </p>
    </a> </div>
    
     <div class="item <?php if($urlpage=='activity.php'){echo'active';}?>"> <a href="activity">
    <p class="<?php if($urlpage=='activity.php'){echo'act';}?> "> <?php if($urlpage=='activity.php'){echo' <img class="fotterim" src="images/act.png" >';}else{echo'<img class="fotterim" src="images/actn.png"> ';}?> 
    <span>ACTIVITY</span> </p>
    </a> </div>
    
     <div class="item <?php if($urlpage=='promotion.php'){echo'active';}?>"> <a href="promotion">
    <p class="<?php if($urlpage=='promotion.php'){echo'act';}?> "> <img class="fotterimg" src="images/fotter/promotion.png">
        <span>PROMOTION</span> </p>
    </a> </div>
    
    <div class="item <?php if($urlpage=='wallet.php'){echo' ';}?>"> <a href="wallet">
    <p class="<?php if($urlpage=='wallet.php'){echo'act';}?> "> <?php if($urlpage=='wallet.php'){echo' <img class="fotterim" src="images/wf.png" >';}else{echo'<img class="fotterim" src="images/wfn.png"> ';}?>
     <span>WALLET</span> </p>
    </a> </div>
    
     <div id="fuser" class="item <?php if($urlpage=='main.php'){echo'active';}?>"> <a href="main">
    <p class="<?php if($urlpage=='main.php'){echo'act';}?> "> <?php if($urlpage=='main.php'){echo' <img class="fotterim" src="images/ac.png" >';}else{echo'<img class="fotterim" src="images/acn.png"> ';}?>
        
         <span >CENTER</span> </p>
    </a> </div>
     
    <?php }else{?>
      <div class="item <?php if($urlpage=='game.php'){echo'active';}?>"> <a href="game">
    <p><?php if($urlpage=='game.php'){echo' <img class="fotterim" src="images/fotter/redhome.png" >';}else{echo'<img class="fotterim" src="images/fotter/home.png"> ';}?> 
    <span>HOME</span> </p>
    </a> </div>
    
     <div class="item <?php if($urlpage=='activity.php'){echo'active';}?>"> <a href="activity">
    <p> <?php if($urlpage=='activity.php'){echo' <img class="fotterim" src="images/fotter/redkeys.png" >';}else{echo'<img class="fotterim" src="images/fotter/keys.png"> ';}?> 
    <span>ACTIVITY</span> </p>
    </a> </div>
    
     <div class="item <?php if($urlpage=='promotion.php'){echo'active';}?>"> <a href="promotion">
    <p> <img class="fotterimg" src="images/fotter/promotion.png">
        <span>PROMOTION</span> </p>
    </a> </div>
    
    <div class="item <?php if($urlpage=='wallet.php'){echo'active';}?>"> <a href="wallet">
    <p> <?php if($urlpage=='wallet.php'){echo' <img class="fotterim" src="images/wf.png" >';}else{echo'<img class="fotterim" src="images/wfn.png"> ';}?>
     <span>WALLET</span> </p>
    </a> </div>
    
     <div id="fuser" class="item <?php if($urlpage=='main.php'){echo'active';}?>"> <a href="main">
    <p > <?php if($urlpage=='main.php'){echo' <img class="fotterim" src="images/fotter/reduser.png" >';}else{echo'<img class="fotterim" src="images/fotter/user.png"> ';}?>
        
         <span >CENTER</span> </p>
    </a> </div>
    <?php }?>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>