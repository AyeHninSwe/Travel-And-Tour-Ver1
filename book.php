 <?php
    session_start();
	$PackageId=$_SESSION["PackageID"];
	$CustomerId=$_SESSION["Id"];
	
    $host="localhost";
    $user="root";
    $pass="";
    $database="traveldb";
    $connection=mysqli_connect($host,$user,$pass)or die("Couldn't connect to datbase");
    mysqli_select_db($connection,$database);
	
    $checkInDate = $_GET['checkInDate'];
    //$checkInDate = mysqli_real_escape_string($checkInDate);

$sql="SELECT * FROM ordertb WHERE CheckIn_date= '".$checkInDate."'";
$result = mysqli_query($connection,$sql);
$checkInDatedb="";
while($feedItem = mysqli_fetch_assoc($result)){
	$checkInDatedb=$feedItem['CheckIn_date'];
	}
  if($checkInDatedb==$checkInDate){
  	echo "This Package can't be ordered. Change Check in date or try other packages..";
  }else{
	$orderDate=date("Y/m/d");
   // $PackageId=;
   // $CustomerId=;


	$query="INSERT INTO ordertb(CustomerId,PackageId,Order_date,CheckIn_date) VALUES
	       ('$CustomerId','$PackageId','$orderDate','$checkInDate')";
    $ret=mysqli_query($connection,$query);
   	 if($ret) 
		{
			echo "Booking the package is done! Please wait for Agency's response...";
		}
   	 else 
		{
            			echo "<p>Something went wrong: ". mysqli_error($connection)."</p>";
		}
    mysqli_close($connection);
}


 ?>