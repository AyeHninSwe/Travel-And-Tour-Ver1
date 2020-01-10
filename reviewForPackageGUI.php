<?php 
	$id=$_GET['ReviewPackageId'];
	session_start();
	$_SESSION['ReviewPackageId']=$id;
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="design.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="reviewForPackageSave.js"></script>
</head>
<body style="overflow-y: scroll;"><div style="height:250px;">
<form action="" id="SaveReviews">
 <ul class="rate-area">
 	<input type="radio" name="rating" id="5-star" value="Amazing">
 	<label for="5-star" title="Amazing"></label>
 	<input type="radio" name="rating" id="4-star" value="Good">
 	<label for="4-star" title="Good"></label>
 	<input type="radio" name="rating" id="3-star" value="Average">
 	<label for="3-star" title="Average"></label>
 	<input type="radio" name="rating" id="2-star" value="Not Good">
 	<label for="2-star" title=" Not Good"></label>
    <input type="radio" name="rating" id="1-star" value="Bad">
 	<label for="1-star" title="Bad"></label>
 </ul>
 <div class="textarea-margin">
 <textarea name="description" cols="30" rows="5"></textarea><br>
 <input type="submit" name="submit" value="Post" class="buttons">
</div>
 </form>
<br><br>

<div id="message"></div>

 </div>

<div>
<?php
	
	$activePage="Cust_Reviews_Show.html";
	if (isset($activePage)){
 		include $activePage;
	}
?>
</div>

</body>
</html>