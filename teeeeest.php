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
    <link rel="stylesheet" href="/GMAO/css/bootstrap.min.css">
  <script src="jquery-3.3.1.min.js"></script>
  <script src="/GMAO/js/bootstrap.min.js"></script>
  </head>
           

  <body>
<form name="frmSearch" method="post" action="index.php">
  <div class="search-box">
  <p>
  <input type="text" placeholder="Name" name="search[name]" class="demoInputBox" value="<?php echo $name; ?>" />
  <input type="text" placeholder="Code" name="search[code]" class="demoInputBox" value="<?php echo $code; ?>" />
  <input type="submit" name="go" class="btnSearch" value="Search">
  <input type="reset" class="btnSearch" value="Reset">
  </p>
  </div>
</form>


<script>
function getresult(url) {    
$.ajax({
  url: url,
  type: "POST",
  data:  {rowcount:$("#rowcount").val(),name:$("#name").val(),code:$("#code").val()},
  success: function(data){ $("#toys-grid").html(data); $('#add-form').hide();}
   });
}
</script>

</body>
</html>