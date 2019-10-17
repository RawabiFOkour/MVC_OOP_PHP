<?php
class Category {

    private $name;
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
        $sql="INSERT INTO categories(name,created)
           VALUES('$this->name','$this->created')";
        //var_dump($sql);
        if($connection->exec($sql)){
            var_dump($sql);
            echo "add product ";
        }else{
            echo "Failed ..try again";
        }
    }
    public function delete($connection,$id){
        $sql="DELETE FROM categories WHERE ID=$id";
        $connection->exec($sql);
    }
    public function getProductById($connection,$id){
        $select = $connection->query("SELECT * FROM categories WHERE ID=$id");
        $result=$select->fetch();
//        print_r($result);
        return($result);
    }

    public function update($connection, $id){
        $sql = "UPDATE categories SET name='$this->name' WHERE ID=$id";
        $update = $connection->prepare($sql);
        $update->execute();
        header("Location: indexCategory.php");
    }

}
?>



