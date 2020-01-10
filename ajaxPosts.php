<?php
    $host="localhost";
    $user="root";
    $pass="";
    $database="traveldb";
    $connection=mysqli_connect($host,$user,$pass)or die("Couldn't connect to datbase");
    mysqli_select_db($connection,$database);
    $query="select * from post order by PostDate Desc";
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
	
    echo "<center><div class='feedItem' style='border-style:solid; border-color:dodgerblue; background-color:white; border-radius:25px; justify-content: center; width: 600px;'><div style='padding:10px 16px;'>";
	echo "<div style'clear:both'><div class='CustPic' align='left' style='position: relative; float:left; overflow: hidden; border-radius: 50%;'>"."<img src='custImg/".$pic."' width='50' height='50'/>" ."</div>";
    echo "<div style='padding: 4px 10px; float: left;'><div class='custName' style='font-size:20px;' ><b>" . $name . "</b></div>";
	echo "<div align='left' class='PostDate' style='font-size: 10px;'>" . $feedItem['PostDate'] . "</div></div></div><br><br><br><br>";
	
    echo "<div align='left' style='margin-left:20px;' class='PostDescription'><b>" . $feedItem['Description'] . "</b></div>";
	echo "<div align='center' style=''><div class='PostPicture'><br><img src='uploads/". $feedItem['ImgUrl'] . "'/></div><br>";
    echo "</div></div></div></center><br>";
}

?>