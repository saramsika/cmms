<?php
include("db-con.php");
// on teste la déclaration de nos variables
if (isset($_POST['date']) &&isset($_POST['refmat']) && isset($_POST['type'])) 

{
	$response = $pdo-> query("INSERT INTO intervention(nref,typeinter,dateinter,observation,CodePiece,nbpiece,CodeHuile,qtlitres)
	 VALUES ('".$_POST['refmat']."','".$_POST['type']."','".$_POST['date']."','".$_POST['obs']."','".$_POST['codep']."',".$_POST['nbp'].",
	 '".$_POST['cdh']."',".$_POST['qtl'].")");
	 
	$response1= $pdo->query("SELECT * FROM intervention WHERE nref ='".$_POST['refmat']."'");
	$response2= $pdo->query("SELECT * FROM piecrechange WHERE CodePiece ='".$_POST['codep']."'");
	$response3= $pdo->query("SELECT * FROM huilesliquides WHERE CodeHuile ='".$_POST['cdh']."'");

	while($row=$response1-> fetch())
	{
		$type = $row["typeinter"];
		
	}


		while($row=$response2-> fetch())
	{
		$stock = $row["enstock"];
		

	}


    $stock=$stock-intval($_POST['nbp']); 
  

    $rep=$pdo->query("UPDATE piecrechange SET enstock=".$stock." WHERE CodePiece ='".$_POST['codep']."'");

	

	while($row=$response3-> fetch())
	{
		$huile= $row["qtlitres"];
		
	}


	
	$huile=$huile-intval($_POST['qtlitres']); 


    $repp=$pdo->query("UPDATE huilesliquides SET qtlitres=".$huile." WHERE CodeHuile ='".$_POST['cdh']."'");
     
     

	if($type=='préventive')
	{
		$response4= $pdo->query("UPDATE locotracteur SET dateint='".$_POST['date']."' WHERE nref ='".$_POST['refmat']."'");
	}




	


	header('Location: intervention.php'); 
}


?>