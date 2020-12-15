<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>Statistiques</title>
    <!-- Boosted core CSS -->
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/GMAO/dist/css/boosted.css">
  <link rel="stylesheet" href="/GMAO/dist/css/orangeIcons.css">
  <link rel="stylesheet" href="/GMAO/css/glyphicon.css">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="/GMAO/js/bootstrap.min.js"></script>
  <script src="/GMAO/dist/js/Chart.js"></script>
  
  
  </head>

  <body>

   <?php require_once("nav.php"); ?>
   <?php require_once("nav-bar.php"); ?>
 

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Disponibilité (%)</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            
            




         </div>
    </div>
           <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

</main>

 <script>
      feather.replace()
    </script>


 <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: [<?php require_once "db-con.php" ; $response=$pdo->query("select * from locotracteur");while ($row=$response->fetch()){echo '"' .$row["nref"].'",';}?>],
          datasets: [{
           data: [<?php require_once "db-con.php" ;$response=$pdo->query("select * from locotracteur");while ($row=$response->fetch()){echo '"' .(($row["nbjrarret"]*100)/30).'",';}?>],
            lineTension: 0,
            backgroundColor: 'orange',
            borderColor: 'orange',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>



</body>
</html>
