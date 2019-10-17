<?php
include "../../database/Database.php";
include "../../model/Product.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$get_data = new Product();
$data = $get_data->get_all_data($conn);

if (isset($_POST['delete_product'])) {
//    echo
//    "<script type='text/javascript'>alert({$_POST['delete_product_id']})</script>";
//        "delete = ".$_POST['delete_product_id'];
    $get_data->delete_product($conn,$_POST['delete_product_id']);
    $data = $get_data->get_all_data($conn);
}

?>
<table class="table  container col-10">
    <thead class="thead-dark">
    <tr>
        <th scope="col">Item name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">category</th>
        <th scope="col">...</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($data as $value) {
        echo "<tr><th scope='row'>{$value["name"]}</th><td>{$value["description"]}</td><td>{$value["price"]}</td><td>{$value["name_cat"]}</td>
<td>

<form style='display: inline-block' method='post' action='edit.php'>
<input style='display: inline-block' type='hidden' name='edit_product_id' value='{$value["id"]}'/>
<button  name='edit_product' type='submit' style=' width: 30px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px ' class='btn btn-success btn-lg'>Edit</button>
</form>

<form style='display: inline-block'method='post'  >
<input style='display: inline-block' type='hidden' name='delete_product_id' value='{$value["id"]}'/>
<button  name='delete_product' type='submit' style=' width: 30px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px ' class='btn btn-warning btn-circle btn-lg'>X</button>
      </form>
      
      </td></tr>";
    } ?>
    </tbody>
</table>
