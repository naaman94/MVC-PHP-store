<?php

class Product
{
    private $name;
    private $description;
    private $price;
    private $category_id;

    public function delete_product($conn, $id)
    {
        try {

            $sql = "DELETE FROM products WHERE id =$id";

            $conn->exec($sql);
            //            echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;

    }

    public function get_all_data($conn)
    {
        try {

            $stmt = $conn->query("SELECT products.id, products.name, products.description, products.price, categories.name_cat
    FROM products
    INNER JOIN categories ON products.category_id=categories.id;");
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function get_by_id($conn, $id)
    {
        try {

            $stmt = $conn->query("SELECT * FROM products where id=$id");
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function create($name, $description, $price, $category_id, $conn)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        echo "you are in create";
        try {
            $sql = "INSERT INTO products (name, description, price, category_id)VALUES('$name','$description',$price,$category_id)";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }


    public function edit_prod($id, $name, $description, $price, $category_id, $conn)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category_id = $category_id;
        echo "you are in edit";

        try {

            $sql = "UPDATE products SET name='$name', description='$description', price=$price, category_id=$category_id WHERE products.id=$id";
            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

    }
}

?>


