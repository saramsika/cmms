<!DOCTYPE html>
<html lang="en">
<head>
  <title>Historique</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/GMAO/css/bootstrap.min.css">
  <link rel="stylesheet" href="/GMAO/css/glyphicon.css">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="/GMAO/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $('#datepicker').datepicker({
        weekStart: 1,
        daysOfWeekHighlighted: "6,0",
        autoclose: true,
        todayHighlight: true,
    });
    $('#datepicker').datepicker("setDate", new Date());
</script>
</head>
<body>

 <?php require_once("nav.php"); 

 ?>
<div class="container">





  <!-- Button to Open the Modal -->
  <div class="row">

  <form class="form-inline my-2 my-lg-0">
<input class="form-control mr-sm-2" type="text" placeholder="Search">
<button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
</form>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Ajouter à l'historique
  </button>
  </div>

  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter dans l'historique</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
               <form action="histoform.php" method="post"  class="login-form" > 

                <ul><div class="form-group">
                    <h6>Date :</h6><input name="date" data-date-format="dd/mm/yyyy" id="datepicker">
                 </div></ul>

                 <ul><div class="form-group">
                    <h6>Conducteur :</h6> <input type = "text" name = "conduc"><br />
                 </div></ul>

                <div id="matierepremiere">
                 <ul><div class="form-group">
                    <h6>Heures :</h6> <input   type = "text" name = "heures"><br />
                 </div></ul>

                  <ul><div class="form-group">
                      <h6>Référence du matériel :</h6> <input   type = "text" name = "refmat"><br />
                 </div></ul>
                </div>
                
  
                 <ul><div class="form-group"> 
                     <h6>Quantité de litres:</h6> <input  type = "text" name = "qtlitres"><br />
                 </div></ul>

                  <ul><div class="form-group"> 
                     <h6>Observation:</h6> <input  type = "text" name = "obs"><br />
                 </div></ul>

                
                   <div class="modal-footer">
          
            <input class="btn btn-danger btn-primary" type = "submit" value = "Envoyer">
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                
        
      </div>
     
       </form>


        </div>
        
      
      
    </div>
  </div>
  
</div>
<?php

require_once "db-con.php";

$response = $pdo->query("SELECT nref,qtelitres FROM conduite");

echo "<table class='table table-light'>";
  echo "<thead class='thead-dark'>";
    echo "<tr>";
        echo "<th>Matériel</th>";
        echo "<th>Janvier</th>";
        echo "<th>Février</th>";
        echo "<th>Mars</th>";
        echo "<th>Avril</th>";
        echo "<th>Mai</th>";
        echo "<th>Juin</th>";
         echo "<th>Juillet</th>";
         echo "<th>Août</th>";
         echo "<th>Septembre</th>";
         echo "<th>Octobre</th>";
         echo "<th>Novembre</th>";
         echo "<th>Décembre</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "</table>";

while($row=$response-> fetch(PDO::FETCH_ASSOC))
{
    $num = $response->rowCount();
    
if($num>0){
 
    echo "<table class='table table-light'>";//start table
 
    // extract row
    // this will make $row['firstname'] to
    // just $firstname only
    extract($row);
     
    // creating new table row per record
    echo "<tr>";
        echo "<td>{$nref}</td>";
        echo "<td>{$Heures}</td>";
        echo "<td>{$conducteur}</td>";
        echo "<td>{$datec}</td>";
        echo "<td>{$qtelitres}</td>";

            
             
        echo "<td>";
           
            echo "<div class='d-flex justify-content-around'>";
            echo "<a title='Supprimer' href='deleteproduct.php?id={$nref}'><span style='color:red' class='glyphicon  glyphicon-trash' action='supprimer'></a>";
            echo "<a title='Editer' href='update.php?id={$nref}'><span class='glyphicon glyphicon-edit' action='supprimer'></a>";
            echo "</div>";
        echo "</td>";
       
    echo "</tr>";


echo "</tbody>";
 
// end table
echo "</table>";
     
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