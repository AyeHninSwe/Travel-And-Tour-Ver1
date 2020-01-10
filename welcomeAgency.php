<?php
session_start();
$id=$_SESSION["Id"];
$host="localhost";
$user="root";
$pass="";
$db="traveldb";
$con=mysqli_connect($host,$user,$pass) or die("Couldn�t connect to datbase");
mysqli_select_db($con,$db);
$query="Select * from agency where AgencyId='".$id."'";
		$result=mysqli_query($con,$query);	
		$num_rows= mysqli_fetch_assoc($result);
		$name=$num_rows['Name'];
		$_SESSION["Name"]=$name;
 echo '<html>
<head>
<link rel="stylesheet" type="text/css" href="design.css"/>
</head>
<body>';
 echo'<div class="myheader"><div class="header">
  <a href="agencyAccount.php" class="logo">'.$name.'</a>
  <div class="header-right">
    <a class="active" href="createPackageGUI.php">Create Package</a>
    <a href="logout.php">Log out</a>
    
  </div>
 </div><br><br><br>';
 echo '<div class="topnav" align="center">';
 $items = array("Orders", "Reviews","Travel Packages");

 foreach ($items as $item)
{
    if (isset($_GET['page']) && $_GET['page'] == $item)
    {
        echo '<a id="navAgency" href="?page=' . $item . '.php" class="active"> ' . $item . '</a>';
        $activePage ="welcomeAgency_". $item . ".html";
    }
    else
    {
        echo '<a id="navAgency" href="?page=' . $item . '"> ' . $item . '</a>';
    }
}

echo '</div></div><br><div class="myNewsFeed">';

if (isset($activePage))
{
    include $activePage;
	   
}

echo '</div></body>
</html>'; 	
?>


