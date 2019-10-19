<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/blog-post.css" rel="stylesheet">
    <title>Store</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/MVC/public/index.php">MVC STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class='nav-item'>
                    <a class='nav-link' href='/MVC/view/layout/about.php'>About</a>
                </li>


                <?php $x=session_start();

                if ((isset($_SESSION["login"]))) {
                    echo "
                <li class='nav-item'>
                    <a class='nav-link' href='/MVC/view/categories/index.php'>Categories </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/MVC/view/prodect/index.php'>prodects</a>
                </li><li class='nav-item'>
                <a class='nav-link' href='/MVC/view/login/log_out.php'>logout</a></li>";
                } else{
                    echo "
                <li class='nav-item'>
                    <a class='nav-link' href='/MVC/view/login/login.php'>Login </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='/MVC/view/login/sign_up.php'>Sign up</a>
                </li>";}
                ?>

            </ul>
        </div>
    </div>
</nav>



