<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">  
    </head>
    <body style="font-family: 'Oswald', sans-serif;">
        <?php 
            ini_set('display_errors', 1);

            //$pass_result = $conn -> query("SELECT password FROM login_details WHERE username = '$_GET['user']'") or die($conn -> error); 
            //$login_details = $pass_result -> fetch_assoc(); 

            if (!isset($_GET['user'])) {
                echo '

                <div class="container h-100">
                    <div class="row h-100 align-items-center justify-content-center">
                        <form>
                            <div class="form-group">
                                <h2>Please login to view all products</h2>
                            </div>

                            <div class="form-group justify-content-center">
                                <a href="/dbms-crud/index.php"class="btn btn-warning">Login</a>
                            </div>
                        </form>  
                    </div>
                </div>
                ';
                exit();
            }

            $conn = new mysqli('localhost', 'root', '', 'exp');
            $product_result = $conn -> query("SELECT * FROM products") or die($conn -> error);
        ?>

        <div style="margin: 10px;" class="justify-content-center">
            <div style="margin-left: -14px;" class="col form-group">
                <h1 style="font-size: 45px;">All Products</h1>
                <a href="/dbms-crud/add_product.php" style="font-size: 18px;" class="btn btn-primary">Add New Product</a>
            </div>

            <table class="table table-striped" style="font-size: 18px;">
                <thead style="background-color: #FFC107; font-size: 20px;">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php while($row = $product_result -> fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['pid']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['pcategory']; ?></td>
                            <td><?php echo $row['pstock']; ?></td>
                            <td><?php echo $row['pweight']; ?></td>
                            <td><?php echo $row['pprice']; ?></td>
                            <td> 
                                <a href="/dbms-crud/update_product.php?product_id=<?php echo $row['pid']; ?>"
                                    class="btn btn-outline-success">Edit</a>
                            </td>
                            <td> 
                                <a href="/dbms-crud/delete_product.php?product_id=<?php echo $row['pid']; ?>"
                                    class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                <?php endwhile; ?>
            </table>

        </div>
    </body>
</html>