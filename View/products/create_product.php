<?php
include ('../../database/Database.php');
include ('../../Model/Products.php');
$conn = new Database();
$connection=$conn->connect();
if(isset($_POST['submit'])){
    $product= new Products();
    $product->setName($_POST['name']);
    $product->setPrice($_POST['price']);
    $product->setDescription($_POST['description']);
    $product->setCategoryId($_POST['category']);
    $product->create($connection);
    header("Location: indexProduct.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Add Product</title>

    <!-- product CSS-->
    <link rel="stylesheet" type="text/css" href="/MVC_OOP_PHP/Public/CSS/create_product.css">
</head>
<body>
<?php include('../Layout/header.php')?>
<div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
    <div class="wrapper wrapper--w960">
        <div class="card card-2">
            <div class="card-heading"></div>
            <div class="card-body">
                <h2 class="title">Add New Product</h2>
                <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Name" name="name">
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Description" name="description">
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" min="1" type="number" placeholder="Price" name="price">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="category">
                            <option disabled selected>Select Category</option>
                          <?php
                          $select = $connection->query("SELECT * FROM categories");
                          var_dump($select);
                          $count =0;
                          while ($row = $select->fetch()) {
                              $id=$row['id'];
                              echo "<br/>".$id ."<br/>";
                              $name=$row['name'];
                              echo $name ."<br/>";
                              $count ++ ;
                          echo "<option value=$id >  $name </option>";
                          }
                          var_dump(" <br/> count:  $count");
                          ?>
                        </select>
                    </div>
                    <div class="p-t-30">
                        <button class="btn btn--radius add bg-danger" type="submit" name="submit">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../Layout/footer.php')?>
</body>
</html>
