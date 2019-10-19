<?php include "../layout/header.php" ;?>
<?php
if ((isset($_SESSION["login"])))
{
echo "<a  style=' margin: 100px 0px 20px 200px' class='btn btn-primary' href='/MVC/view/prodect/create_prodect.php'>Create New Prodects</a>";
include "table.php" ;
}else{
    echo "<h1  style=' margin-top: 100px; text-align: center'>You should Login first</h1> ";

}
include "../layout/footer.php" ?>
