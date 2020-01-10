<?php
echo '<html>
<head>
	<title>Visit Agency Page</title>
	 <link rel="stylesheet" type="text/css" href="design.css" /> 
</head>
<body><div class="myheader"><div class="header-right"><br><a href="welcomeCust.php" class="buttons">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>';
  include("db.php");
	session_start();
	$AgencyId=$_SESSION['AgencyId'];

	
	
	
/*	$getId="Select * from package";
               $resultId=mysqli_query($con,$getId);
			   $num_resultId=mysqli_num_rows($resultId);
			   $rowId=mysqli_fetch_array($resultId);
			   $AgencyId=$rowId['AgencyId'];*/
			   
     $sql="Select * from agency where AgencyId='".$AgencyId."'";
               $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
			$_SESSION['AgencyId']=$AgencyId;
   $st="
    <table><tr><td>Phone:</td><td>";
    $st.= $row['Phone'] ;
    $st.="</td></tr><tr><td>Email:</td><td>";
    $st.= $row['Email'] ;
    $st.="</td></tr><tr><td>Address:</td><td>";
    $st.= $row['Address'] ;
    $st.="</td></tr></table><br>";
    
    echo "$st";
    mysqli_close($con); 
	
				
	 echo '<div class="topnav" align="center">';
 $items = array("Packages", "Reviews");

 foreach ($items as $item)
{
    if (isset($_GET['page']) && $_GET['page'] == $item)
    {
        echo '<a id="nav" href="?page=' . $item . '.php" class="active"> ' . $item . '</a>';
        $activePage ="VisitAgency_". $item . ".html";
    }
    else
    {
        echo '<a id="nav" href="?page=' . $item . '"> ' . $item . '</a>';
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