
<?php

$server = "localhost";
$user = "root";
$pw = "";
$db = "blk";
$con = mysqli_connect($server,$user,$pw,$db);

if(!$con){
	die("con die : " . mysqli_connect_error());
} else{
echo "con suc";	
}

// mysqli_close($con);
?>