
<!DOCTYPE HTML>
<html>
<head>
    <title>Catalogue des produits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/product/css/glyphicon.css">
    <link rel="stylesheet" href="/product/css/stylebody.css">
    <link rel="stylesheet" href="../bootstrap-4.0.0/dist/css/bootstrap.min.css">
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php require_once("menubts.php"); ?>
    <br>
    <div class="container">
        <?php
// include database connection
require_once 'db-con.php';
 

$response = $pdo->query("SELECT productID, name, price FROM products");


while($row=$response-> fetch()) //tant qu'il y a des colonnes dans le tableau products, il y a aura un affichage du tableau 
{
    $num = $response->rowCount();
if($num>0){
 
    echo "<table class='table table-light'>";//tableau du catalogue des produits 

    echo "<thead class='thead-dark'>";
    echo "<tr>";
    
        echo "<th>ID</th>";
        echo "<th>Name</th>";
        echo "<th>Price</th>";
        echo "<th class='d-flex justify-content-around'>Action</th>";
        
    echo "</tr>";
    echo "</thead>";
    
    echo "<tbody>";
     

while ($row = $response->fetch(PDO::FETCH_ASSOC)){
   
    extract($row);
     
   
    echo "<tr>"; //contenu du tableau pris de la base de données : tableau products
        echo "<td>{$productID}</td>";
        echo "<td>{$name}</td>";
        echo "<td>&#36;{$price}</td>";
        echo "<td>";
           
            echo "<div class='d-flex justify-content-around'>";
            echo "<a title='Supprimer' href='deleteproduct.php?id={$productID}'><span style='color:red' class='glyphicon  glyphicon-trash action='supprimer'></a>";
            echo "<a title='Editer' href='update.php?id={$productID}'><span class='glyphicon glyphicon-edit action='supprimer'></a>";
            echo "</div>";
        echo "</td>";
    echo "</tr>";
}

echo "</tbody>";
 
// end table
echo "</table>";
     

   

}

 
// si les données sont introuvables, un message sera affiché
else{
    echo "<div class='alert alert-danger'>No records found.</div>";
}



}

?>

<a href="create.php" class=" btn btn-danger" role="button">Créer un nouveau produit</a>
    </div> <!-- end .container -->

</body>
</html>