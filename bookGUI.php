<!DOCTYPE html>
<html>
<head>
	<title>Book Page</title>
    <link rel="stylesheet" type="text/css" href="design.css"/>
     <script type="text/javascript" src="ajaxBook.js"></script>   
</head>
<body><center><div class="centerPage"><br>
<?php
  include("db.php");
	session_start();
	$_SESSION["PackageID"]=$_GET['PackageId'];
     $sql="Select * from agency where AgencyId=".$_GET['AgencyId'];
		       $result=mysqli_query($con,$sql);
		       $num_result=mysqli_num_rows($result);

			$row=mysqli_fetch_array($result);
 
   $st="
   	Check-In Date:<input type='date' name='check-InDate' id='txtdate'><br>
   	To contact the agency<br>
   	<table><tr><td>Phone:</td><td>";
   	$st.= $row['Phone'] ;
   	$st.="</td></tr><tr><td>Email:</td><td>";
   	$st.= $row['Email'] ;
   	$st.="</td></tr><tr><td>Address:</td><td>";
   	$st.= $row['Address'] ;
   	$st.="</td></tr></table>&nbsp;&nbsp;&nbsp;&nbsp;<div id='ajaxDiv'></div><div><input type='submit' id='btnOrder' value='Order' onclick='orderFunction()' class='buttons'>
   	</div>";
    
    echo $st;
				mysqli_close($con);	
   ?>
   <br></div></center>
</body>
</html>