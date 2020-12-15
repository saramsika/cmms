
        <nav class="col-md-2 d-none d-md-block " style="float: right">
          <div class="sidebar-sticky">
            <ul class="nav flex-column flex-end " style="float: right">
               


           
            
  <?php
  require_once "db-con.php";
  $response=$pdo->query("SELECT nref,HeureUti,lastint FROM locotracteur where HeureUti>=50 or HeureUti=20");
                echo "<h2>Alertes</h2>";
              while($row=$response-> fetch())
              {
                 $loco=$row["nref"];
                 $heure=$row["HeureUti"];
                 $last=$row["lastint"];

                 if(($heure>$last+20 || $heure==20) && $heure!=100 && $heure!=200)

                 {   echo" <li class='nav-item alert alert-danger'>";
                      //echo" <a class='nav-link '>";
                          echo "Le locotracteur ".$loco." nécessite une intervention de 200 heures.";
                  
                    // echo"</a>";
                    echo"</li>";
                  }

               

              } 
 $response1=$pdo->query("SELECT nref,HeureUti,lastint FROM locotracteur where HeureUti>=100 or HeureUti=50");
              
              while($row=$response-> fetch())
              {
                 $loco=$row["nref"];
                 $heure=$row["HeureUti"];
                 $last=$row["lastint"];

                 if(($heure>=$last+50 || $heure==50) && $heure!=20  && $heure!=200)

                 {   echo" <li class='nav-item alert alert-danger'>";
                      //echo" <a class='nav-link '>";
                          echo "Le locotracteur ".$loco." nécessite une intervention de 500 heures.";
                  
                    // echo"</a>";
                    echo"</li>";
                  }


              } 
 $response1=$pdo->query("SELECT nref,HeureUti,lastint FROM locotracteur where (HeureUti>=20 or HeureUti=100)");
              
              while($row=$response-> fetch())
              {
                 $loco=$row["nref"];
                 $heure=$row["HeureUti"];
                 $last=$row["lastint"];

                 if(($heure>=$last+100 || $heure==100) &&  $heure!=200)

                 {   echo" <li class='nav-item alert alert-danger'>";
                      //echo" <a class='nav-link '>";
                          echo "Le locotracteur ".$loco." nécessite une intervention de 1000 heures.";
                  
                    // echo"</a>";
                    echo"</li>";
                  }

                  

              } 
 $response2=$pdo->query("SELECT nref,HeureUti,lastint FROM locotracteur where HeureUti=200 ");
              
              while($row=$response-> fetch())
              {
                 $loco=$row["nref"];
                 $heure=$row["HeureUti"];
                 $last=$row["lastint"];

                 if($heure>=$last+200 or $heure=200)

                 {   echo" <li class='nav-item alert alert-danger'>";
                      //echo" <a class='nav-link '>";
                          echo "Le locotracteur ".$loco." nécessite une intervention de 2000 heures.";
                  
                    // echo"</a>";
                    echo"</li>";
                  }

                

              } 


?>
               

    
  
  </ul>
  </div>
  </nav>
