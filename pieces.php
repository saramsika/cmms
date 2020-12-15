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
   <?php require_once("nav-bar.php"); ?>
  

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          
            <div class="btn-toolbar mb-2 mb-md-0">
          
              <div class="btn-group mr-2">
                
               <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Ajouter une commande</button>
              </div>
            
            </div>
          </div>

    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une commande</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
                                           <form action="pieceshuiles.php" method="post"  class="login-form" > 

                                                  <ul><div class="form-group">
                                                      <h6>Reference :</h6><input name="refmat">
                                                   </div></ul>
                                                  
                                                  <ul><div class="form-group">
                                                <label class="control-label" for="type"><h6>Type de commande :</h6></label><br> <select class="form-control for-control" id= "type">
                                                <option name="1">Huile</option>
                                                <option name="2">Pièces</option>
                                                </select></br>
                                               </div></ul>

                                               <label class="control-label" for="feedback_ok">
                                                    <ul><div class="form-group"> 
                                                     <h6>Reference Huile:</h6> <input  type = "text" name = "rfh"><br />
                                                 </div></ul>
                                                  </label>
                                                    <label class="control-label" for="feedback_ok">
                                                    <ul><div class="form-group"> 
                                                     <h6>Reference Pièce:</h6> <input  type = "text" name = "rfp"><br />
                                                 </div></ul>
                                                  </label>
                                            

                                             
                                                  <label class="control-label" for="feedback_ok">
                                                    <ul><div class="form-group"> 
                                                     <h6>Quantité de litres:</h6> <input  type = "text" name = "qtl"><br />
                                                 </div></ul>
                                                  </label>

                                                  <label class="control-label" for="feedback_bad">
                                                  <ul><div class="form-group"> 
                                                     <h6>Nombre de pièces:</h6> <input  type = "text" name = "nbp"><br />
                                                 </div></ul>
                                                  </label>

                                                    
                                               <div class="modal-footer">
                                      
                                                <input class="btn btn-danger btn-primary" type = "submit" value = "Envoyer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            
                                    
                                               </div>
                                 
                                          </form>


        </div>
        
      
      




            </div>


         </div>
    </div>


          <h2>Stock</h2>
          <?php require_once("nav.php"); ?>


 <?php require_once("nav.php"); ?>


 <div class="col-wrap">
        <div  id="first">
          <div class="info-block">


           <ul class="nav nav-tabs">
              <li class="nav-item"><a class="nav-link active" href="#users" data-toggle="tab">Huiles/Liquides</a></li>
              <li class="nav-item"><a class="nav-link" href="#devices" data-toggle="tab">Pièces</a></li>
   
            </ul>

 <div class="tab-content">
<div class="tab-pane active" id="users">
<table class="table">
 
      
  <thead class="bg-primary">
    <tr>
      <th scope="col">Code d'huile</th>
       <th scope="col">Quantité de litres</th>
    </tr>
  </thead>
  <tbody>


<?php

require_once "db-con.php";

$response=$pdo->query("SELECT * FROM huilesliquides");  
      

while($row=$response-> fetch(PDO::FETCH_ASSOC))
{
    $num = $response->rowCount();
    
if($num>0){


    extract($row);


    echo "<tr>";
        echo "<th>{$CodeHuile}</th>";
        echo "<th>{$qtlitres}</th>";
        
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

                    <div class="tab-pane hide-when-small" id="devices"><table class="table">
 
      
  <thead class="bg-primary">
    <tr>
      <th scope="col">Réference de la pièce</th>
       <th scope="col">Désignation</th>
      <th scope="col">En stock</th>
    </tr>
  </thead>
  <tbody>


<?php

require_once "db-con.php";

$response=$pdo->query("SELECT * FROM piecrechange");  
      

while($row=$response-> fetch(PDO::FETCH_ASSOC))
{
    $num = $response->rowCount();
    
if($num>0){


    extract($row);


    echo "<tr>";
        echo "<th>{$CodePiece}</th>";
        echo "<th>{$designation}</th>";
        echo "<th>{$enstock}</th>";
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

</div>
   </div>  
             
</div>
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

    <script>

$( document ).ready(function() { //wait until body loads

    var testimonial_ok=false; //keeps track of whether the testimonial box is filled out
    
         
    
    //Wrappers for all fields
    var bad = $('#live_form option[name="1"]').parent();
    var ok = $('#live_form option[name="2"]').parent();
    
    rating.change(function(){ //when the rating changes
      var value=this.value;           
      all.addClass('hidden'); //hide everything and reveal as needed
      
      if (value == 'Bad'){
        bad.removeClass('hidden'); //show feedback_bad          
      }
      else if (value == 'ok'){
        ok.removeClass('hidden'); //show feedback_ok  
      }   
     
      }
    }); 
});
</script>
  
 






  </body>





</html>
