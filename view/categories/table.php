<?php
include "../../database/Database.php";
include "../../model/Category.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$get_cat = new Category();
$data_cat = $get_cat->get_all_categories($conn);

if (isset($_POST['delete_cat'])) {

    $get_cat->delete_category($conn, $_POST['delete_cat_id']);
    $data_cat = $get_cat->get_all_categories($conn);
}
?>

<table class="table col-7 container">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Category Name</th>
        <th scope="col">...</th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($data_cat as $value) {
        echo "<tr><th scope='row'>{$value["name_cat"]}</th>
<td>

<form style='display: inline-block' method='post' action='edit.php'>
<input type='hidden' name='edit_cat_id' value='{$value['id']}'/>
<button name='edit_cat' type='submit' style=' width: 30px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px ' class='btn btn-success btn-lg'>Edit</button>
</form>

<form  style='display: inline-block' method='post'  >
<input type='hidden' name='delete_cat_id' value='{$value["id"]}'/>
<button name='delete_cat' type='submit' style=' width: 30px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px ' class='btn btn-warning btn-circle btn-lg'>X</button>
      </form>
      </td></tr>";
    }
    ?>
    </tbody>
</table>
