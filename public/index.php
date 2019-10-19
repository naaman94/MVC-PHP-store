<?php include "../view/layout/header.php";
if ((isset($_SESSION["login"]))) {
    echo "<h1  style=' margin-top: 100px; text-align: center'>Hello welcome in MVC Store</h1> ";
}else
{
    header('Location: /MVC/view/login/login.php');
}

?>
<?php include "../view/layout/footer.php" ?>
