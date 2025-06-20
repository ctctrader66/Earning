<?php

include("include/connection.php");

// Get current timestamp
$current_timestamp = time();

// Convert the timestamp to UTC time
$current_time_utc = gmdate('Y-m-d H:i:s', $current_timestamp);

echo $current_time_utc;

// Convert the timestamp to UTC time
$current_time = $current_time_utc;
// Get the current time



// Calculate the time before 2 hours
$two_hours_before = strtotime('-2 hours', $current_time);

// Format the result as a readable date/time
$formatted_time = date('Y-m-d H:i:s', $two_hours_before);

// Display the result
echo "Current Time: " . date('Y-m-d H:i:s', $current_timestamp) . "<br>";
echo "Two Hours Before: " . $formatted_time .'<br>';


      $summery=mysqli_query($con,"select * from `nowpayment` where `payment_status`='waiting' order by id desc");

	  echo $formattedDate.'<br>' ;
	  
	  if ($summery) {
    while ($summeryResult = mysqli_fetch_array($summery)) {
        $cdate = $summeryResult['created_at'];

       
        echo $cdate . '<br>';
       
    }
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}

// Don't forget to close the database connection when you're done
//  $cdate is assumed to be in the format 'Y-m-d H:i:s'
$modifiedDate = date('Y-m-d H:i:s', strtotime($current_time . ' -2 hours'));

// SQL query to delete rows
$deleteQuery = "DELETE FROM nowpayment WHERE created_at <= '$modifiedDate' and `payment_status`='waiting' ";

// Execute the delete query
$result = mysqli_query($con, $deleteQuery);

if ($result) {
    $rowsAffected = mysqli_affected_rows($con);
    echo "Deleted $rowsAffected rows where created_at is older than 2 hours.";
} else {
    // Handle the case where the query fails
    echo "Query failed: " . mysqli_error($con);
}

// Don't forget to close the database connection when you're done
mysqli_close($con);
?>








	  
 
 
?>
