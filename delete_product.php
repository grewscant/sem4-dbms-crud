<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">  
   </head>
    <body style="font-family: 'Oswald', sans-serif;">
        <?php 
            $product_id = $_GET['product_id'];
            
            $conn = new mysqli('localhost', 'root', '', 'exp');
            $result = $conn -> query("DELETE FROM products WHERE pid = '$product_id'") or die($conn -> error);
        ?>

        <div style="margin-top: 200px; " class="row justify-content-center">
            <div class="form-group">
                <?php
                    if ($result === TRUE) {
                        echo '<h3 style=" font-size: 35px;"> 1 product deleted successfully. </h3>';
                        echo '<div class="form-group"></div>';
                        echo '<a href="/dbms-crud/products.php?" class="btn btn-warning">Back to Products Page</a>';
                    }
                ?>
            </div>
        </div>  
    </body>
</html>