<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: home.php");
  exit;
}
 
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Molimo unesite korisničko ime.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Molimo unesite lozinku.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "Upisana lozinka nije ispravna.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "Korisničko ime ne postoji.";
                }
            } else{
                echo "Došlo je do pogreške.Pokušajte ponovno!";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 

<!DOCTYPE html>
<!-- This comment line needed for bootstrap to work on mobile devices -->
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Temperaturni nadzor - Prijava</title>
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
</head>
<body>
    <div class="okvir">
        <header>
		
            <div class="logo">
                <img src="img/logo.png">
            </div>
			
            <h1>TEMPERATURNI NADZOR</h1>
        </header>
		
		</br>
		</br>
        <main>
		
		</br>
		<div align = "center">
				
            <div>
               
               <h2>Prijava</h2>
        <p>Molimo prijavite se kako biste pristupili stranici.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label><b>Korisničko ime</b></label>
				</br>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
			</br>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label><b>Lozinka</b></label>
				</br>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
			</br>
            <div class="form-group">
                <input type="submit" class="loginbutt" value="Prijavi se">
            </div>
			</br>
            <p>Nemate korisnički račun? <a class="ina" href="" title="Kontaktirajte administratora!">Registrirajte se</a>.</p> <!--"register"-->
        </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
        </main>
		</br>
		</br>
		<span class="msg">Za poteškoće pri prijavi, izmjenu lozinke, dodavanje korisničkog računa molimo kontaktirajte administratora!</span>
    <footer>
        
        <p>Čistimir d.o.o. Zagreb, Croatia | Čistimir d.o.o. © 2019. All rights reserved. | <a href="https://www.cistimir.hr" target="_blank">www.cistimir.hr</a></p>
    </footer>
	</div>
</body>
</html>
