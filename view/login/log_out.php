<?php
session_start();
session_unset();
header('Location: /MVC/view/login/login.php');
?>