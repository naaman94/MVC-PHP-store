<?php
include "../layout/header.php";
include "../../model/Category.php";
include "../../database/Database.php";

$connect_db = new Database();
$conn = $connect_db->connect();

$new_Category = new Category();

if (isset($_POST["submit"])) {
//    var_dump($_POST);
//    echo $_POST["name"] ."<br>";
    $new_Category->create($_POST["name"], $conn);
    header('Location: /MVC/view/categories/index.php');
}
?>

<div style="margin-top: 100px" class="container w-75">
    <h3>Create New category</h3>

    <form style="margin-top: 20px" method="POST" action='<?php echo $_SERVER["PHP_SELF"] ?>'>

        <div class="form-group">
            <label for="item name">Category name : </label>
            <input name="name" type="text" class="form-control" id="item name" placeholder="item name">
        </div>



        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../layout/footer.php" ?>
