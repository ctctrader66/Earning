    <?php   

  @$code=$_POST['address'];

  
if(isset($_POST['submit'])){

 $sqlget = mysqli_query($con,"SELECT * FROM lifafa_his");
     $sqlgetresult =mysqli_fetch_array($sqlget);
     $mobilenew =    $sqlgetresult['l_id'] ;

if($mobilenew == $code)
{
   echo "<script>
        window.location = './main.php';
    </script>";
}else{
      
           echo "<script>
        window.location = './win.php';
    </script>";
    }
}?>