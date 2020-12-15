




<?php
require_once 'db-con.php';
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Entrez le nom d'utilisateur.";
    } 
    else{
        // Prepare a select statement
        $sql = "SELECT code FROM technicien WHERE nomtech = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->fetch();
                if($stmt->rowCount()== 1){
                    $username_err = "Le nom d'utilisateur est déjà utilisé.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
         unset($stmt);
    }
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Entrez le mot de passe.";
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Le mot de passe doit contenir au moins 6 caractères.";
    } else{
        $password = trim($_POST['password']);
    }
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Confirmez le mot de passe.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Le mot de passe ne correspond pas au mot de passe défini.';
        }
    }
    // Check input errors before inserting in database
        if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO technicien (nomtech, mdp) VALUES (?, ?)";
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
           // Set parameters
            $param_username=$username;
            $param_password = $password; // Creates a password hash
            // Attempt to execute the prepared statement
            if($stmt->execute([$param_username, $param_password])){
                // Redirect to login page
                header("location: acceuiladmin.php");
            } else{
                echo "Veuillez réessayer plus tard.";
            }
        }
        // Close statement
          unset($stmt);
           }
    // Close connection
    unset($pdo);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nouveau compte</title>
    <link rel="stylesheet" href="/GMAO/dist/css/boosted.css">
    <link rel="stylesheet" href="/GMAO/dist/css/orangeIcons.css">
    <link rel="stylesheet" href="/GMAO/css/glyphicon.css">
 

</head>
<body>

<?php require_once("nav.php"); ?>





<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
       
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Créer un nouveau compte</h3>
                        </div>
                        <div class="card-body">   
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Utilisateur:<sup>*</sup></label>
            <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Mot de passe:<sup>*</sup></label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Confirmez le mot de passe:<sup>*</sup></label>
            <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Valider">
            <input type="reset" class="btn btn-default" value="Réinitialser">
               

        </div>
      
    </form>

 <div class="btn-group mr-2">
                           <a href="/GMAO/test.php"> <button class="btn btn-sm btn-outline-secondary">Retour</button></a>
                          
                        



            </div>
    </div>

  </div>


  </div>


                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->


</body>

</html>