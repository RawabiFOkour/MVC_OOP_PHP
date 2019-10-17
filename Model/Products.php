<?php
class Products
{
    private $name;
    private $description;
    private $price;
    private $category_id;
    private $created;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->category_id;
    }

    /**
     * @param mixed $category_id
     */
    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated()
    {
        $date=new DateTime();
        $created_datetime=$date->format('Y-m-d H:i:s');
        $this->created = $created_datetime;
    }
    public function create($connection){
        $this->setCreated();
        $sql="INSERT INTO products(name,description,price,category_id,created)
           VALUES('$this->name','$this->description','$this->price','$this->category_id','$this->created')";
        if($connection->exec($sql)){
            echo "add product ";
        }else{
            echo "Failed ..try again";
        }
    }
    public function delete($connection,$id){
        $sql="DELETE FROM products WHERE ID=$id";
        $connection->exec($sql);
    }
    public function getProductById($connection,$id){
        $select = $connection->query("SELECT * FROM products WHERE ID=$id");
        $result=$select->fetch();
//        print_r($result);
        return($result);
    }

    public function update($connection, $id){
        $sql = "UPDATE products SET name='$this->name', description='$this->description', price=$this->price WHERE ID=$id";
        $update = $connection->prepare($sql);
        $update->execute();
        header("Location: indexProduct.php");
    }
}
?>