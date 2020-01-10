<?php
	session_start();
	$packageId=$_SESSION['ReviewPackageId'];
    $host="localhost";
    $user="root";
    $pass="";
    $database="traveldb";
    $connection=mysqli_connect($host,$user,$pass)or die("Couldn't connect to datbase");
    mysqli_select_db($connection,$database);
    $query="select * from reviews where PackageOrAgencyId='".$packageId."' and reviewTypeId='2'";
    $ret=mysqli_query($connection,$query);
	
    /*$num_result=mysqli_num_rows($ret);*/
	
	
	
	
	
//<!--	$sql = "SQL TO GET NEWS FEED";
//
//$result = mysql_query($sql);-->

while($feedItem = mysqli_fetch_assoc($ret))
{
	$query1="select * from customer where CustomerId='".$feedItem['CustomerId']."'";
	$CustomerInfo=mysqli_query($connection,$query1);
	while($row = mysqli_fetch_assoc($CustomerInfo)) {
   		$id = $row['CustomerId'];
		if($id==$feedItem['CustomerId']){
			$name = $row['Name']; 
			$pic = $row['Picture'];
		}
   		
   
	}
	
    echo "<div class='feedItem' style='border-style:solid; border-color:dodgerblue; background-color:white; border-radius:25px; width: 600px; height:150px;'><div style='padding:10px 16px;'>";
	echo "<div style'clear:both'><div class='CustPic' align='left' style='position: relative; float:left; overflow: hidden; border-radius: 50%;'>"."<img src='custImg/".$pic."' width='50' height='50'/>" ."</div>";
    echo "<div style='padding: 4px 10px; float: left;'><div class='custName' style='font-size:20px;' ><b>" . $name . "</b></div><br><br>";
    echo "<div class='PostDescription'>" . $feedItem['Description'] . "</div><br>";
    echo "</div></div></div></div><br>";
}

?>