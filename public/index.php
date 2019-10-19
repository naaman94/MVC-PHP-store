<?php //include "../view/layout/header.php"
session_start();
if ((isset($_SESSION["login"]))) {
    session_destroy();
    include "../view/layout/header.php";
    echo "<h1>Hello welcome in MVC Store </h1>";
     include "../view/layout/footer.php" ;

}else
{
    header('Location: /MVC/view/login/login.php');
}

?>

<?php //include "../view/login/login.php";?>
<?php //include "../view/layout/footer.php" ?>
