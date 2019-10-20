<?php
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";
include "../../database/Database.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$cat = new Category();


if (isset($_POST["submit"])) {
//    echo $_POST["name"] . " " . $_POST["description"] . " " . $_POST["price"] . " " . $_POST["catigory"] . "<br>";
    $create_new_product = new Product();
    $create_new_product->create($_POST["name"], $_POST["description"], $_POST["price"], $_POST["catigory"], $conn);
    header('Location: /MVC/view/prodect/index.php');

}
?>

<div style="margin-top: 100px" class="container w-75">
    <h3>Create New Items</h3>
    <form style="margin-top: 20px" method="POST" action='<?php echo $_SERVER["PHP_SELF"] ?>'>

        <div class="form-group">
            <label for="item name">Item name</label>
            <input name="name" type="text" class="form-control" id="item name" placeholder="item name">
        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <input name="description" type="text" class="form-control" id="Description" placeholder="Description">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="text" class="form-control" id="price" placeholder="price">
        </div>


        <div class="form-group">
            <label for="catigory">categories</label>
            <select name="catigory" class="form-control" id="catigory">
                <?php
                $cat_arr = $cat->get_all_categories($conn);
                foreach ($cat_arr as $category) {
                    $cat_id = $category['id'];
                    $cat_name = $category['name_cat'];
                    echo "<option value='$cat_id'>$cat_name</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../layout/footer.php" ?>
