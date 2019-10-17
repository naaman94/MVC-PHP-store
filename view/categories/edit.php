<?php
include "../layout/header.php";
include "../../model/Category.php";
include "../../database/Database.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$edit_Category = new Category();

if(isset($_POST["edit_cat_id"]))
{
    $id=$_POST["edit_cat_id"];
    $data = $edit_Category->get_by_id($conn,$id);
    $data= $data[0];

}

if (isset($_POST["id"])) {
    $edit_Category->edit_cat($_POST['id'],$_POST["name_cat"], $conn);
    header('Location: /MVC/view/categories/index.php');

}


?>
    <div style="margin-top: 100px" class="container w-75">
        <h3>Create New category</h3>

        <form style="margin-top: 20px" method="POST" action='<?php echo $_SERVER["PHP_SELF"] ?>'>

            <input type='hidden' name='id' value="<?php echo $data['id'];?>"/>
            <div class="form-group">
                <label for="item name">Category name : </label>
                <input name="name_cat" type="text" class="form-control" id="item name" placeholder="item name" value="<?php echo $data['name_cat'];?>" >
            </div>



            <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php include "../layout/footer.php" ?>