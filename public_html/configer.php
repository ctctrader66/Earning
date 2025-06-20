<script>
    <?php include("/include/connection.php");
    
    $data=mysqli_query($con,"select * from `website`");
	$fetch=mysqli_fetch_array($data);
	$link = $fetch['web_link'];
	$name = $fetch['web_name'];
	$appname = $fetch['app_name'];
    $apikey = $fetch['otp_key'];
    
     
    ?>
    
</script>