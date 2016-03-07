<?php

$host_name = "localhost";
$host_username = "arman";
$host_pass = "arman";
$db_name = "maskanyar";

$con = mysqli_connect($host_name,$host_username,$host_pass);

mb_internal_encoding('UTF8');
mysqli_set_charset($con,'UTF8');
mysqli_select_db($con,$db_name);
mysqli_query($con,"SET NAMES 'UTF8'");
mysqli_query($con,"SET CHARACTER SET 'UTF8'");
mysqli_query($con,"SET character_set_connection = 'UTF8'");

if($con)
{
	$myquery = "select * from sepordeh where tarikh <= 201634 ;";
	$temp = mysqli_query($con,$myquery);
	$response = array();
	
	if($temp)
	{
		while($row = mysqli_fetch_array($temp))
		{
			array_push($response,array("id"=>$row[0],"name"=>$row[1],"formol"=>$row[2],"matn"=>$row[3],"sod"=>$row[5]));
		}
	
		echo json_encode(array("server_res"=>$response),JSON_UNESCAPED_UNICODE);	
	}
}

?>