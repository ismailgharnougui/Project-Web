<?php
	include '../Controller/MannequinC.php';
	$MannequinC=new MannequinC();
	$MannequinC->supprimerMannequin($_GET["idM"]);
	header('Location:afficherListeMannequins.php');
?>