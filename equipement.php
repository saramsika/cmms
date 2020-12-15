<html>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/GMAO/dist/css/orangeHelvetica.css">
<!-- Copyright © 2016 Orange SA. All rights reserved -->

<link rel="stylesheet" href="/GMAO/dist/css/boosted.css">
<link rel="stylesheet" href="/GMAO/dist/css/orangeIcons.css">
     

     <script src="/GMAO/dist/js/boosted.js"></script>
   <script src="/GMAO/dist/js/boosted.js"></script>
    
</head>


<body>

 <?php require_once("nav.php"); ?>


 <?php

require_once "db-con.php";

$response = $pdo->query("SELECT nref, HeureUti, dateint FROM locotracteur");

echo "<div class='overflow-x:auto'>";

echo "<br>";
  echo "<div class='row'>";

echo "<table class='table-responsive table-light' >";
  echo "<thead class='bg-primary'>";

     
   
    echo "<tr>";
        echo "<th>Ref</th>";
        echo "<th>Heures d'utilisation</th>";
        echo "<th>Dernière date d'intervention</th>";
    echo "</tr>";
    
 echo "</thead>";

echo "</table>";

echo "</div>";
echo "</br>";
echo "</div>";
      

while($row=$response-> fetch(PDO::FETCH_ASSOC))
{
    $num = $response->rowCount();
    
if($num>0){
echo "<div class='overflow-x:auto'>";
    echo "<div class='row'>";
 
    echo "<table class='table'>";//start table
 
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
echo "<tbody>";
     
    // creating new table row per record
    echo "<tr>";
        echo "<th>{$nref}</th>";
        echo "<th>{$HeureUti}</th>";
        echo "<th>{$dateint}</th>";
    echo "</tr>";


echo "</tbody>";


 
// end table
echo "</table>";
echo "</div>";
echo "</div>";

}

 
// if no records found
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}

}

?>



</div>


</body>
</html>
