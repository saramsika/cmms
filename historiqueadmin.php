<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    
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
            
            <div class="btn-toolbar mb-2 mb-md-0">
            
           
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Exporter</button>
                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Ajouter à l'historique  </button>
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




            </div>
          </div>


          <h2>Historique de conduite</h2>
         


 <table class="table">
  <caption>Equipement</caption>
      
  <thead class="bg-primary">
    <tr>
   
      <th scope="col">Réference</th>
      <th scope="col">Heures d'utilisation de l'engin</th>
      <th scope="col">Conducteur</th>
      <th scope="col">Date</th>
      <th scope="col">Quantité de litres</th>
      <th scope="col">Observation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
<?php

require_once "db-con.php";

$response = $pdo->query("SELECT * FROM conduite");

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
         echo "<td>{$Heures}</td>";
         echo "<td>{$conducteur}</td>";
         echo "<td>{$datec}</td>";
         echo "<td>{$qtelitres}</td>";
         echo "<td>{$observation}</td>";
   


    echo "<td>";
           
            echo "<div class='d-flex justify-content-around'>";
            echo "<a title='Supprimer' href='delete.php?ligne={$N}&refmat={$nref}&heure={$Heures}&conduc={$conducteur}&date={$datec}&qte={$qtelitres}'><span style='color:red' class='glyphicon  glyphicon-trash' action='supprimer'></a>";
     echo "</td>";

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



</div>
        </main>
      </div>
    </div>

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
