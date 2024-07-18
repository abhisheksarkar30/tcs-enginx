<?php
$con = mysqli_connect("mysql.hostinger.in","u955773656_root","creditcrunchers@123","u955773656_addi2");
$sql = "select * from per2sons";
$res = mysqli_query($con,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,array('Name'=>$row[0],'CarNo'=>$row[1],'Lat'=>$row[2],'Lng'=>$row[3],'Status'=>$row[4]));
}
echo json_encode(array("result"=>$result));
mysqli_close($con);
?>