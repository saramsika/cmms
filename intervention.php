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
   <script>
      function showUser(str) {
          if (str == "") {
              document.getElementById("txtHint").innerHTML = "";
              return;
          } else { 
              if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
              } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                      document.getElementById("txtHint").innerHTML = this.responseText;
                  }
              };
              xmlhttp.open("GET","intervention.php?q="+str,true);
              xmlhttp.send();
          }
      }

      function ref (str)
      {
        
          window.location.href = "http://localhost/gmao/intervention.php?q="+str;
        
      }
      </script>
  </head>

  <body>

   <?php require_once("nav.php"); ?>
  
   <?php require_once("nav-bar.php"); ?>
 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    
            <div class="btn-toolbar mb-2 mb-md-0">
            



             <div class="btn-group btn-sm mr-2">
                           <a href="/GMAO/export.php"> <button class="btn btn-sm btn-outline-secondary">Exporter</button></a>
                           <a> <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">  Ajouter une intervention</button></a>
                            <a><form>
                            <!-- <select name="users" onchange="showUser(this.value)"> -->
                            <select class="form-control" name="users" onchange="ref(this.value)">
                            <option value="">Selectionner un engin</option>
                            <?php require_once "db-con.php"; $response=$pdo->query("SELECT nref FROM locotracteur"); 
                              while ($row=$response->fetch())
                              { 
                              $ref=$row["nref"];
                              echo " <option value='".$ref."'>";
                              echo "".$ref."";
                              echo "</option>"; 
                               }
                              ?>
                              
                      
                            </select>
                            </form></a> 
             </div>             
 
                           
                            

    <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ajouter une intervention</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          
                                           <form action="interventionform.php" method="post"  class="login-form" > 

                                            <ul><div class="form-group">
                                                <h6>Reference :</h6><input name="refmat">
                                             </div></ul>

                                             <ul><div class="form-group">
                                                <label for="type"><h6>Type d'intervention :</h6></label><br> <select class="form-control" class="for-control" name="type" >
                                                <option value="préventive">préventive</option>
                                                <option value="curative">curative</option>
                                                </select></br>
                                             </div></ul>

                                            <div >
                                             <ul><div class="form-group">
                                                <h6>Date de dernière intervention :</h6> <input   type = "text" name = "date"><br />
                                             </div></ul>

                                              <ul><div class="form-group">
                                                  <h6>Observation:</h6> <input   type = "text" name = "obs"><br />
                                             </div></ul>
                                            </div>
                                            
                              
                                             <ul><div class="form-group"> 
                                                 <h6>Réference de la pièce utilisée :</h6> <input  type = "text" name = "codep"><br />
                                             </div></ul>

                                                  <ul><div class="form-group"> 
                                                     <h6>Nombre de pièces:</h6> <input  type = "text" name = "nbp"><br />
                                                 </div></ul>
                                                 <ul><div class="form-group"> 
                                                     <h6>Huile utilisée:</h6> <input  type = "text" name = "cdh"><br />
                                                 </div></ul>

                                                  <ul><div class="form-group"> 
                                                     <h6>Quantité de litres:</h6> <input  type = "text" name = "qtl"><br />
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


          
<table class="table">
  <caption>Interventions</caption>
      
  <thead class="bg-primary">
    <tr>
      <th scope="col">Réference</th>
       <th scope="col">Type d'intervention</th>
      <th scope="col">Date de dernière intervention</th>
      <th scope="col">Observation</th>
      <th scope="col">Référence de la pièce</th>
       <th scope="col">Nombre de pièces</th>
       <th scope="col">Référence d'huile</th>
      <th scope="col">Code huile</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

<?php
require_once "db-con.php";

if (isset($_GET['q']))
{
  //$q = intval($_GET['q']);
  //echo "hhhh  ".$q;
  $response = $pdo->query("SELECT nref, typeinter, dateinter, observation, CodePiece, nbpiece, CodeHuile,qtlitres FROM intervention WHERE nref = '".$_GET['q']."'");

  while($row=$response-> fetch(PDO::FETCH_ASSOC))
  {
    $num = $response->rowCount();
    if($num>0)
    {
      extract($row);
      echo "<tr>";
      echo "<td>{$nref}</td>";
      echo "<td>{$typeinter}</td>";
      echo "<td>{$dateinter}</td>";
      echo "<td>{$observation}</td>";
      echo "<td>{$CodePiece}</td>";
      echo "<td>{$nbpiece}</td>";
      echo "<td>{$CodeHuile}</td>";
      echo "<td>{$qtlitres}</td>";
      echo "<td>";       
      echo "<div class='d-flex justify-content-around'>";
      echo "<a title='Supprimer' href='deleteproduct.php?id={$nref}'><span style='color:red' class='glyphicon  glyphicon-trash' action='supprimer'></a>";
      echo "</div>";    
      echo "</td>";   
      echo "</tr>";
    }

    else
    {
      echo "<div class='alert alert-danger'>No records found.</div>";
    }

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
