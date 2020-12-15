<?php
require_once 'db-con.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Entrez votre mot de passe.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err))
    {
        // Prepare a select statement
        $sql = "SELECT nomtech, mdp FROM technicien WHERE nomtech = :username";
        
        if($stmt = $pdo->prepare($sql))
        {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute())
            {
                // Check if username exists, if yes then verify password
                if($stmt->rowCount() == 1)
                {
                    if($row = $stmt->fetch())
                    {
                        $hashed_password = $row['mdp'];
                        
                        if($password==$hashed_password){
                            /* Password is correct, so start a new session and
                            save the username to the session */
                            session_start();
                                    $_SESSION['username'] = $username;      
                                    header("location: acceuil.php");
                                    die();
                        } 

                        else{
                            // Display an error message if password is not valid
                            $password_err = 'Le mot de passe est invalide.';
                        }
                    }
                }
                 else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Compte introuvable.';
                     }
            } 
                 else{
                echo "Oops! Something went wrong. Please try again later.";
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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="/GMAO/css/bootstrap.min.css">
    <link rel="stylesheet" href="/product/css/glyphicon.css">
   <!--<link rel="stylesheet" href="/GMAO/css/stylebody.css">-->
   
    <script src="../bootstrap-4.0.0/dist/js/bootstrap.min.js"></script>
</head>



<body>

<?php require_once("nav.php"); ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-white mb-4">Gestion de maintenance</h2>
            <div class="row">
                <div class="col-md-6 mx-auto">

                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Compte technicien</h3>
                        </div>
                        <div class="card-body">       
                                <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label>Utilisateur</label>
                                        <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>    
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Mot de passe</label>
                                        <input type="password" name="password" class="form-control">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                    
                                </form>
       
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
</div>
<!--/container-->
</body>
</html>