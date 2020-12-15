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
</head>



<?php
require_once 'db-con.php';

echo "<ul class='pagination pull-left margin-zero mt0'>";

  //first page button
  if($page>1){
   $prev_page=$page-1; 
    
   echo"<li>";
      echo"<a href='{page_url}page={prev_page}'>";
         echo"<span style='margin:0 .5em;'>&laquo;</span>";
      echo "</a>";    
    echo"</li>";
  }

  //clickable page numbers

  $total_pages=ceil($total_rows/$records_per_page);
  $range=1;
  $initial_num=$page-$range;
  $condition_limit_num=($page+$range)+1;

  for($x=$initial_num; $x<$condition_limit_num; $x++)
  {
  	if(($x>0) && ($x<= $total_pages))
  	{
  		if($x==$page)
  		{
  			echo"<li class='active'>";
  			  echo "<a href='javascript::void();'>{$x}</a>";
  			echo "</li>";  
  		}

  		else 

  		{
  			echo "<li>"; 
  			     echo "<a href='{$page_url}page={$x}'>{$x}</a>";
            echo "</li>";  
  		}
  	}
  }

  //last page button
  if($page<$total_pages)
  {
  	$next_page=$page+1;

  	        echo "<li>"; 
  			     echo "<a href='{$page_url}page={$next_page}'>{$x}</a>";
  			     echo"<span style='margin:0 .5em;'>&raquo;</span>";
  			     echo"</a>";
            echo "</li>";  

  }







echo "</ul>";

?>

</html>