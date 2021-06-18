<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">  
   </head>
    <body style="font-family: 'Oswald', sans-serif;">
        <?php
            ini_set('display_errors', 1);

            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $product_id = $_GET['product_id'];
            
                $conn = new mysqli('localhost', 'root', '', 'exp');
                $result = $conn -> query("SELECT * FROM products WHERE pid=".$product_id) or die($conn -> error);
                $row = $result -> fetch_assoc();
                
            } else {
                $p_id = $_POST['pid'];
                $p_name = $_POST['pname'];
                $p_category = $_POST['pcategory'];
                $p_stock = $_POST['pstock'];
                $p_weight = $_POST['pweight'];
                $p_price = $_POST['pprice'];

                $conn = new mysqli('localhost', 'root', '', 'exp'); 
                $result = $conn -> query("UPDATE products SET 
                    pname='$p_name',
                    pcategory='$p_category',
                    pstock='$p_stock',
                    pweight='$p_weight',
                    pprice='$p_price' WHERE pid='$p_id'
                ") or die($conn -> error); 
            }
        ?>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-5" method="POST" action="/dbms-crud/update_product.php" autocomplete="off">
                    <div style="" class="form-group">
                        <h1 class="text">Update</h1>
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pid" type="text" value="<?php echo isset($row['pid']) ? $row['pid'] : ""; ?>" placeholder="ID" readonly>
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pname" type="text" value="<?php echo isset($row['pname']) ? $row['pname'] : ""; ?>" placeholder="Name">
                    </div>
                
                    <div class="form-group ">
                        <input class="form-control" name="pcategory" type="text" value="<?php echo isset($row['pcategory']) ? $row['pcategory'] : ""; ?>" placeholder="Category">
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pstock" type="text" value="<?php echo isset($row['pstock']) ? $row['pstock'] : ""; ?>" placeholder="Stock">
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pweight" type="text" value="<?php echo isset($row['pweight']) ? $row['pweight'] : ""; ?>" placeholder="Weight">
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pprice" type="text" value="<?php echo isset($row['pprice']) ? $row['pprice'] : ""; ?>" placeholder="Price">
                    </div>
                    
                    <div class="form-group ">
                        <input class="btn btn-warning" type="submit" value="Update Details">
                        <a href="/dbms-crud/products.php?session=teamwork&user=teamwork"class="btn btn-primary">Back</a>
                    </div>

                    <div style="margin-top: 20px;" class="form-group">
                        <?php
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                if ($result === TRUE) {
                                    echo '<h3 style="color: #28A745;"> 1 product updated successfully. </h3>';
                                }
                            }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>