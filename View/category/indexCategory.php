<?php include('../Layout/header.php')?>
<?php
include ('../../database/Database.php');
include ('../../Model/Category.php');
$conn = new Database();
$connection=$conn->connect();
if(isset($_POST['edit'])){
    echo "uuu";
    session_start();
    $_SESSION["id"] = $_POST['edit'];
    header("Location: edit_category.php");
}

if(isset($_POST['add'])){
    echo "ggggg";
    header("Location: create_category.php");
}
if(isset($_POST['delete'])){
    $Category= new Category();
    $Category->delete($connection,$_POST['delete']);
}
?>
    <br/>
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        <div class="d-flex justify-content-end mr-5">
        <button class="btn btn-info" type="submit" name="add" >Add Category </button>
        </div>
    </form>
    <br/>
    <br/>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">created</th>
            <th scope="col">modified</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $select = $connection->query("SELECT * FROM categories");
        while ($row = $select->fetch()) { ?>
            <tr>
                <th  scope='row'><?php echo $row['id'] ?></th>
                <td ><?php echo $row['name'] ?></td>
                <td><?php echo $row['created'] ?></td>
                <td><?php echo $row['modified'] ?></td>
                <td>
                    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                        <button class="btn btn-danger" type="submit" name="delete" value="<?php echo $row['id'] ?>">Delete</button>
                    </form>
                    <br/>
                    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
                        <button class="btn btn-info" type="submit" name="edit" value="<?php echo $row['id'] ?>">Edit</button>
                    </form>
                </td>
            </tr>
        <?php  } ?>
        </tbody>
    </table>
<?php include('../Layout/footer.php')  ?>