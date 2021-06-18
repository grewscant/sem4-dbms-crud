<head>
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">  
</head>
<?php

// The servername remains localhost for the most part. No change needed.
$servername = "localhost";

// Your database name goes here
$dbname = "exp";

// These are the default login details. Change them only if required.
$username = "root";
$password = "";

$login_username = $login_password = "";

ini_set('display_errors', 1);

// This if statement is only checking whether your form did a POST Request or GET. Just to be sure.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        // When you created that form, your input fields had an id that you gave them
        $login_username = isset($_POST['l_username']) ? $_POST['l_username'] : "e_username";
        $login_password = isset($_POST['l_password']) ? $_POST['l_password'] : "e_password";

        $hashed_password = password_hash($login_password, PASSWORD_BCRYPT);

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Did the connection fail? Please print the error message.
        if ($conn -> connect_error) {
            die("Connection failed: " . $conn-> connect_error);
        }
  
        // Oh, so it didn't fail, eh? Let's go ahead and select that data from our database.
        $sql = "SELECT password FROM login_details WHERE username = '$login_username'";
        $result = $conn->query($sql);

        if ($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
                $user_password = $row["password"];

                if (password_verify($login_password, $user_password)) {
                    echo 'Passwords match.';
                    header("Location: https://localhost/dbms-crud/products.php");
                    exit();
                } else {
                    echo '<h1 style="font-family: Oswald; color: red;">Wrong Password</h1>';
                    exit();
                }
            }
        } else {
            echo "0 results";
        }
        
        // We're done. Close the connection to the database. 
        $conn->close();
}

// Wait, the HTML form didn't send a POST request? Sorry we can't proceed.
else {
    echo "No data posted with HTTP POST.";
}


