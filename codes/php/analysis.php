<?php
$connect=mysqli_connect("mysql.hostinger.in","u955773656_root","creditcrunchers@123","u955773656_addi2");
	ini_set('max_execution_time', 0);
	for(;;){
	$qry="SELECT * from per2sons";
	$result = mysqli_query($connect,$qry) or die ("no query");
	$name_result_array = array();
	$carNo_result_array = array();
	$lat_result_array=array();
	$lon_result_array=array();
	$status_result_array=array();
	while($row = mysqli_fetch_assoc($result))
	{
		$name_result_array[] = $row["Name"];
		$carNo_result_array[] = $row["CarNo"];
		$lat_result_array[] = $row["Latitude"];
		$lon_result_array[] = $row["Longitude"];
		$status_result_array[] = $row["Status"];
	}
	for($i=0;$i<count($lat_result_array);$i++){
		for($j=$i+1;$j<count($lat_result_array);$j++){
			if($lat_result_array[$i]!=null && $lon_result_array[$j]!=null){
			if(((abs($lat_result_array[$i]-$lat_result_array[$j])>=0.0002) && abs($lat_result_array[$i]-$lat_result_array[$j])<=0.0004) || (abs($lon_result_array[$i]-$lon_result_array[$j])>=0.0002 && abs($lon_result_array[$i]-$lon_result_array[$j])<=0.0004)){
				$x="Yes";
				$qry2="UPDATE per2sons SET `Status`='$x' WHERE `Name`='$name_result_array[$i]'";
				$qry3="UPDATE per2sons SET `Status`='$x' WHERE `Name`='$name_result_array[$j]'";
				mysqli_query($connect,$qry2);
				mysqli_query($connect,$qry3);
			}
			else
			{
				echo"Sorry";
				echo"<br/>
			}
			}
		}
	}
	}
?>