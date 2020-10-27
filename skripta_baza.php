<?php
$MyUsername = "root";  // enter your username for mysql
$MyPassword = "";  // enter your password for mysql
$MyHostname = "localhost";      // this is usually "localhost" unless your database resides on a different server
$MyDatabase = "cistimir_temperatura";

$conn = mysqli_connect($MyHostname , $MyUsername, $MyPassword, $MyDatabase);



for($i = 1; $i<=390; $i++) {
	$avrgid=$i;

	$sql="INSERT INTO avrgtemp (avrgid,date_time,atemp1,atemp2,atemp3) 
	VALUES 
	('$avrgid',(SELECT DATE_ADD('2018-12-31 23:59:59', INTERVAL $i DAY)),(SELECT FLOOR(RAND()*(30-20+1))+20),(SELECT FLOOR(RAND()*(30-20+1))+20),(SELECT FLOOR(RAND()*(30-20+1))+20))";
    if (mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	} 
	else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


mysqli_close($conn);
?>