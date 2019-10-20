<?php
include "../layout/header.php";
include "../../model/Product.php";
include "../../model/Category.php";
include "../../database/Database.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$cat = new Category();
$edit_product = new Product();
if(isset($_POST["edit_product_id"]))
{
    $id=$_POST["edit_product_id"];
//    echo $id ."------------------------";
    $data = $edit_product->get_by_id($conn,$id);
    $data= $data[0];

}

if (isset($_POST["id"])) {
//    echo $_POST['id'].$_POST["name"]. $_POST["description"]. $_POST["price"]. $_POST["catigory"];
    $edit_product->edit_prod($_POST['id'],$_POST["name"], $_POST["description"], $_POST["price"], $_POST["catigory"], $conn);
    header('Location: /MVC/view/prodect/index.php');

}
?>
<div style="margin-top: 100px" class="container w-75">
    <h3>Edit Items</h3>
    <form style="margin-top: 20px" method="POST" action='<?php echo $_SERVER["PHP_SELF"] ?>'>

        <input type='hidden' name='id' value="<?php echo $data['id'];?>"/>
        <div class="form-group">
            <label for="item name">Item name</label>
            <input name="name" type="text" class="form-control" id="item name" placeholder="item name" value="<?php echo $data['name'];?>"  >
        </div>

        <div class="form-group">
            <label for="Description">Description</label>
            <input name="description" type="text" class="form-control" id="Description" placeholder="Description" value='<?php echo $data['description'];?>'>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input name="price" type="text" class="form-control" id="price" placeholder="price" value='<?php echo $data['price'];?>'>
        </div>


        <div class="form-group">
            <label for="catigory">categories</label>
            <select name="catigory" class="form-control" id="catigory"  >

                <?php
                $cat_arr = $cat->get_all_categories($conn);
                foreach ($cat_arr as $category) {
                    $cat_id = $category['id'];
                    $cat_name = $category['name_cat'];
                    if($cat_id===$data['category_id']){
                        echo "<option value='$cat_id' selected>$cat_name</option>";
                    }else{
                        echo "<option value='$cat_id'>$cat_name</option>";
                    }
                }
                ?>
            </select>
        </div>

        <button type="submit" name="edit_prod" value="0" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php include "../layout/footer.php" ?>