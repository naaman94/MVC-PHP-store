<?php include "../view/layout/header.php" ?>
<h1 style="margin-top: 200px">
    <?php echo "h1 hello <br>";
    include "../database/Database.php";
    $connect_db= new Database();
    $connect_db->connect();
    ?>

</h1>
<?php include "../view/layout/footer.php" ?>