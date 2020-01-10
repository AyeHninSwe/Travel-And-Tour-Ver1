<?php

	$AgencyId=$_GET['AgencyId'];
	session_start();
		$_SESSION['AgencyId']=$AgencyId;
		header('Location: visitAgencyGUI.php');
?>