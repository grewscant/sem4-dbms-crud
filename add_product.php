<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">  
   </head>
    <body style="font-family: 'Oswald', sans-serif;">
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $p_id = $_POST['pid'];
                $p_name = $_POST['pname'];
                $p_category = $_POST['pcategory'];
                $p_stock = $_POST['pstock'];
                $p_weight = $_POST['pweight'];
                $p_price = $_POST['pprice'];

                $conn = new mysqli('localhost', 'root', '', 'exp'); 
                $result = $conn -> query("INSERT INTO products VALUES (
                    '$p_id', '$p_name', '$p_category', '$p_stock', '$p_weight', '$p_price'
                )") or die($conn -> error); 
            }
        ?>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <form class="col-5" method="POST" action="/dbms-crud/add_product.php" autocomplete="off">

                    <div style="" class="form-group">
                        <h1 class="text">Add Product</h1>
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="pid" type="text" placeholder="ID">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="pname" type="text" placeholder="Name">
                    </div>
                
                    <div class="form-group">
                        <input class="form-control" name="pcategory" type="text" placeholder="Category">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="pstock" type="text" placeholder="Stock">
                    </div>

                    <div class="form-group">
                        <input class="form-control" name="pweight" type="text" placeholder="Weight">
                    </div>

                    <div class="form-group ">
                        <input class="form-control" name="pprice" type="text" placeholder="Price">
                    </div>
                    
                    <div class="form-group ">
                        <input class="btn btn-warning" type="submit" value="Add Product">
                        <a href="/dbms-crud/products.php?session=teamwork&user=teamwork"class="btn btn-primary">Back</a>
                    </div>

                    <div style="margin-top: 20px;" class="form-group">
                        <?php
                            if ($result === TRUE) {
                                echo '<h3 style="color: #28A745;"> 1 product added successfully. </h3>';
                            }
                        ?>
                    </div>   
                </form>
            </div>
        </div>
    </body>
</html>