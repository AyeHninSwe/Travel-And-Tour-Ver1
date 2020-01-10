<?php
	session_start();
	$Id=$_SESSION["Id"];
    $host="localhost";
    $user="root";
    $pass="";
    $database="traveldb";
    $connection=mysqli_connect($host,$user,$pass)or die("Couldn't connect to datbase");
    mysqli_select_db($connection,$database);
    $query="select * from package order by PackageDate Desc";
    $ret=mysqli_query($connection,$query);
	
    /*$num_result=mysqli_num_rows($ret);*/
	
	
	
	
	
//<!--	$sql = "SQL TO GET NEWS FEED";
//
//$result = mysql_query($sql);-->

while($feedItem = mysqli_fetch_assoc($ret))
{
	$query1="select * from agency where AgencyId='".$Id."'";
	$CustomerInfo=mysqli_query($connection,$query1);
	while($row = mysqli_fetch_assoc($CustomerInfo)) {
   		$id = $row['AgencyId'];
		if($id==$feedItem['AgencyId']){
			$name = $row['Name']; 
			$pic = $row['Picture'];
		
	echo '<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"/>
</head>
<body>';
    echo "<center><div class='feedItem' style='border-style:solid; border-color:dodgerblue; background-color:white; border-radius:25px; justify-content: center; width: 600px;'><div style='padding:10px 16px;'>";
	echo "<div style'clear:both'><div class='CustPic' align='left' style='position: relative; float:left; overflow: hidden; border-radius: 50%;'>"."<img src='agencyImg/".$pic."' width='50' height='50'/>" ."</div>";
    echo "<div style='padding: 4px 10px; float: left;'><div class='agencyName' style='font-size:20px;' ><b>" . $name . "</b></div>";
	echo "<div align='left' class='PackageDate' style='font-size: 10px;'>" . $feedItem['PackageDate'] . "</div></div></div><br><br><br>";
	echo "<div align='left' class='TripName' style='font-size:18px;'><b>" . $feedItem['Name'] . "</b></div><br>";
	echo "<div align='left' style=''><div class='PackagePicture'><img src='uploads/". $feedItem['Picture'] . "' width='200' height='100'/></div>";
	echo "<div align='left' class='TripName'><b>Price : " . $feedItem['Price'] . "</b></div>";
	echo "<div align='left' class='TripName'><b>Duration : " . $feedItem['Duration'] . "</b></div><br>";
    echo "<div class='PackageDescription'>" . $feedItem['Description'] . "</div><br>";

    echo "</div></div></div></center><br>";
	echo "</body></html>";
		}
	}
}
?>