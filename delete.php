<?php 

if (isset($_GET['ligne'])&&isset($_GET['conduc'])&&isset($_GET['refmat']) &&isset($_GET['date']) &&isset($_GET['qte']) &&isset($_GET['heure'])  ) 
{
	
	require_once 'db-con.php';

    $mydate=$_GET['date'];
    $month=date('n',strtotime($mydate));

  
    

	$response2 = $pdo->query("DELETE FROM conduite WHERE N=".$_GET['ligne']);

	$response = $pdo->query("SELECT * FROM locotracteur where nref='".$_GET['refmat']."'");

	while($row=$response-> fetch())
	{

		$heure=$row["HeureUti"];

	}


    $heure=$heure-intval($_GET["heure"]);

	$response3 = $pdo->query("UPDATE locotracteur SET HeureUti=".$heure." WHERE nref='".$_GET['refmat']."'"); 


	

	$response4 = $pdo->query("SELECT `".$month."` FROM gasoil where nref='".$_GET['refmat']."'");

	while($row=$response4-> fetch())
	{

		$gasoil=$row[$month];
		
	}

    $gasoil=$gasoil-intval($_GET["qte"]);


	$response5 = $pdo->query("UPDATE gasoil SET `".$month."`=".$gasoil." WHERE nref='".$_GET['refmat']."'");   



	 $rep1=$pdo->query("select MAX(datec) 'datemax' from conduite where nref='".$_GET['refmat']."'");
     $rep2=$pdo->query("select MAX(dateinter) 'dateintermax' from intervention where nref='".$_GET['refmat']."'");
     $rep3=$pdo->query("select nbjrarret from locotracteur where nref='".$_GET['refmat']."'");
			while($row=$rep1-> fetch())
				{
					$jrs = $row["datemax"];
					
				}

				
	        while($row=$rep2-> fetch())
				{
					$arret = $row["dateintermax"];
				}

			while($row=$rep3-> fetch())
				{
					
					$nb = $row["nbjrarret"];
				}

             
      $jrsarret=$nb + date_diff(new DateTime($arret),new DateTime($jrs));
     
      $response7=$pdo->query("UPDATE locotracteur SET nbjrarret=".$jrsarret." WHERE nref ='".$_GET['refmat']."'");


    for($x=1;$x<13;$x++)
    {
    	if(date("d")=="01" && date('n')=="'".$x."'")
    	{
    		 $response8=$pdo->query("UPDATE locotracteur SET nbjrarret=0");
    	}
    }
     

	header('Location: historiqueadmin.php'); //redirection vers le catalogue des produits pour vérifier que le produit à bien été supprimé


}

?>