<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Acceuil</title>
    <!-- Boosted core CSS -->
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/GMAO/dist/css/boosted.css">
  <link rel="stylesheet" href="/GMAO/dist/css/orangeIcons.css">
  <link rel="stylesheet" href="/GMAO/css/glyphicon.css">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="/GMAO/js/bootstrap.min.js"></script>
  </head>

  <body>

   <?php require_once("nav.php"); ?>
   <?php require_once("test2.php");?>
   <?php require_once("nav-bar.php"); ?>
 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Acceuil</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            
            <?php 
            if (!empty($_SESSION['username']))  
            {  echo" <div class='btn-group mr-2'>";
                 echo" <button class='btn btn-sm btn-outline-secondary'>Edit</button>";
                 echo" </div>";
            }
            ?>



             <div class="btn-group mr-2">
                           <a href="/GMAO/export.php"> <button class="btn btn-sm btn-outline-secondary">Exporter</button></a>
                          
                        



            </div>


         </div>
    </div>


          <h2>Equipement</h2>
        


<table class="table">
  <caption>List of users</caption>
      
  <thead>
    <tr>
      <th scope="col">Réference</th>
      <th scope="col">Date de dernière intervention</th>
      <th scope="col">Heures d'utilisation</th>
      <th scope="col">Heures du dernier entretien</th>
    </tr>
  </thead>
  


<?php

require_once "db-con.php";

$response = $pdo->query("SELECT nref, HeureUti, dateint,lastint FROM locotracteur");

while($row=$response-> fetch(PDO::FETCH_ASSOC))
{
    $num = $response->rowCount();
    
if($num>0){

 
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
echo "<tbody>";
     
    // creating new table row per record
    echo "<tr>";
        echo "<th scope='row'>{$nref}</th>";
        echo "<td>{$dateint}</td>";
        echo "<td>{$HeureUti}</td>";
         echo "<td>{$lastint}</td>";
    echo "</tr>";




}

 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}

}




?>

  
  </tbody>
</table>


</main>
    

    <!-- Boosted core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/boosted.min.js"></script>

    <!-- Icons -->
  <script src="/GMAO/feather.min.js"></script>">
    <script>
      feather.replace()
    </script>

    
  
  </body>
</html>



