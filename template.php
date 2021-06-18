<?php
$servername = "localhost";

$dbname = "exp";

$username = "root";
$password = "";

$value1 = $value2 = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn-> connect_error);
        }
  
        $sql = "INSERT INTO products VALUES (
            '$p_id', '$p_name', '$p_category', '$p_stock', '$p_weight', '$p_price'
        )";

        if ($conn-> query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
}

else {
    echo "No data posted with HTTP POST.";
}


