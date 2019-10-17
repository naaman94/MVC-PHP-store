<?php


class Category
{
    private $name;

    public function delete_category($conn,$id)
    {
        try {

            $sql = "DELETE FROM categories WHERE id =$id";

            $conn->exec($sql);
//            echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;

    }


    public function get_all_categories($conn)
    {
        try {
            $stmt = $conn->query("SELECT * FROM categories");
            $cat_row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cat_row;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function create($name,$conn)
    {
        $this->name = $name;
        echo "category was create"."<br>";
        try {
            $sql = "INSERT INTO categories (name_cat)VALUES('$name')";
            // use exec() because no results are returned
            $conn->exec($sql);
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }


    }

    public function edit_cat($id, $name, $conn)
    {
//        echo "you are in edit cat";
        try {

            $sql = "UPDATE categories SET name_cat='$name' WHERE categories.id=$id";
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


    public function get_by_id($conn, $id)
    {
        try {
            $stmt = $conn->query("SELECT * FROM categories where id=$id");
            $cat_row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $cat_row;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


}
?>