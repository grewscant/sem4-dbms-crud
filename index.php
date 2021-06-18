<html lang="en" dir="ltr">

   <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">  
   </head>

   <body style="font-family: 'Oswald', sans-serif; font-size: 18px;">
        <?php 

            ini_set('display_errors', 1);

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $login_username = $_POST['l_username'];
                $login_password = $_POST['l_password'];


                $conn = new mysqli('localhost', 'root', '', 'exp'); 
                $result = $conn -> query("SELECT password FROM login_details WHERE username = '$login_username'") or die($conn -> error); 
                $row = $result -> fetch_assoc(); 
            }
        ?>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-4" method="POST" action="/dbms-crud/index.php" autocomplete="off">
                    <div class="form-group">
                        <h1 class="text">Login</h1>
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="l_username" type="text" placeholder="Username">
                    </div> 
                
                    <div class="form-group">
                        <input class="form-control" name="l_password" type="password" placeholder="Password">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if (password_verify($login_password, $row['password'])) {
                                    header("Location: https://localhost/dbms-crud/products.php?session=".$login_password."&user=".$login_username);
                                    exit();
                                } else {
                                    echo '<small id="l_passwordHelp" style="color: #DC3545;" class="form-text ">Please check your username or password and try again</small>';
                                }
                            }
                        ?>  
                    </div>                
                    <div class="form-group">
                        <input class="btn btn-warning" type="submit" value="Sign In">
                    </div>
                </form>
            </div>
        </div>
   </body>
</html>