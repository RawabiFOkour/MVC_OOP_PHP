
<?php
session_start();
$id= $_SESSION["id"];
//echo $_SESSION["id"];
//echo $id;

include ('../../database/Database.php');
include ('../../Model/Products.php');
$conn = new Database();
$connection=$conn->connect();

$product = new Products();
$arrayProduct=$product->getProductById($connection,$id);
//print_r($arrayProduct);
//echo $arrayProduct['id'];

if(isset($_POST['update'])){
    $product2 = new Products();
    $product2->setName($_POST['name']);
    $product2->setDescription($_POST['description']);
    $product2->setPrice($_POST['price']);
    $product2->update($connection, $id);
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
                <h2 class="title">Edit Product</h2>
                <form method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Name" name="name" value="<?php echo $arrayProduct['name'];
                        ?>">
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" type="text" placeholder="Description" name="description" value="<?php echo $arrayProduct['description'];
                        ?>">
                    </div>
                    <div class="input-group">
                        <input class="input--style-2" min="1" type="number" placeholder="Price" name="price" value="<?php echo $arrayProduct['price'];
                        ?>">
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
                        <button class="btn btn--radius add bg-danger" type="submit" name="update">Edit Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('../Layout/footer.php')?>
</body>

</html>

