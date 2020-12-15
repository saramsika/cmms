<?php
include("db-con.php");
// on teste la déclaration de nos variables
if (isset($_POST['date']) &&isset($_POST['refmat']) && isset($_POST['heures']) && isset($_POST['obs']) && isset($_POST['qtlitres']) && isset($_POST['conduc'])) 

{
	$response = $pdo-> query("INSERT INTO conduite(nref,Heures,datec,conducteur,qtelitres,observation) VALUES ('".$_POST['refmat']."',".$_POST['heures'].",'".$_POST['date']."','".$_POST['conduc']."',".$_POST['qtlitres'].",'".$_POST['obs']."')");
	 
	$response1= $pdo->query("SELECT * FROM locotracteur WHERE nref ='".$_POST['refmat']."'");

	while($row=$response1-> fetch())
	{
		$heures = $row["HeureUti"];
	}
	//quantité ajoutée à la quantité déjà disponible au stock

	$heures=$heures+intval($_POST['heures']); 
	$response2= $pdo->query("UPDATE locotracteur SET HeureUti=".$heures." WHERE nref ='".$_POST['refmat']."'");


	for($x=1; $x<13; $x++)
	{
		
        $response3= $pdo->query('SELECT sum(qtelitres) "somme" FROM conduite where MONTH(datec)='.$x.' and  `nref` ="'.$_POST['refmat'].'"');
		
		while($row=$response3-> fetch())
		{
			$gasoil = $row["somme"];
		}

		if (!is_null($gasoil))
		{
			
			$response4= $pdo->query('UPDATE `gasoil` SET `'.$x.'`='.$gasoil.' WHERE `nref`="'.$_POST['refmat'].'"');
		}
		#strval($x)
		
	}

     $response5=$pdo->query("select MAX(datec) 'datemax' from conduite where nref='".$_POST['refmat']."'");
     $response6=$pdo->query("select MAX(dateinter) 'dateintermax' from intervention where nref='".$_POST['refmat']."'");
     $responsee6=$pdo->query("select nbjrarret from locotracteur where nref='".$_POST['refmat']."'");
	
			while($row=$response5-> fetch())
				{
					$jrs = $row["datemax"];
					
				}

				
	        while($row=$response6-> fetch())
				{
					$arret = $row["dateintermax"];
				}
      

          while($row=$responsee6-> fetch())
				{
					
					$nb=$row["nbjrarret"];
				}

      $jrsarret=$nb + date_diff(new DateTime($arret),new DateTime($jrs));
      

      $response7=$pdo->query("UPDATE locotracteur SET nbjrarret=".$jrsarret." WHERE nref ='".$_POST['refmat']."'");


for($x=1;$x<13;$x++)
    {
    	if(date("d")=="01" && date('n')=="'".$x."'")
    	{
    		 $response8=$pdo->query("UPDATE locotracteur SET nbjrarret=0");
    	}
    }

	header('Location: historiqueadmin.php'); //Redirection vers la table des matières pour voir la quantité après la mise à jour
}


?>