<?php include "../layout/header.php";
include "../../database/Database.php";
include "../../model/user.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$user_check = new user();

if (empty($_POST['first_name'])) {
    $username_from = "";
    $message = "";
}
if (isset($_POST['login'])) {
    $username_from = $_POST['username'];
    $password_from = $_POST['password'];
    $check_user = $user_check->check_username($username_from, $conn);

    if (count($check_user) !== 0) {
        if ($password_from === $check_user[0]["password"]) {
            $_SESSION["login"] = $username_from;
            header('Location: /MVC/view/prodect/index.php');
        }
    } else {
        $message = "Username or Password is incorrect";
    }
}

?>


<div style="margin-top: 5%" class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">

                <div class="card-body">
                    <h3 class="card-title text-center">Sign In</h3>

                    <form class="form-signin" method="post">

                        <div class="input-group mb-3">
                            <input required type="text" class="form-control"
                                   value="<?php echo $username_from ?>"
                                   name="username" placeholder="Username" aria-label="Username"
                                   aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <input required type="password" class="form-control" name="password"
                                   placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        </div>

                        <?php
                        if ($message !== "") {
                            echo '<label class="text-danger">' . $message . '</label>';
                        }
                        ?>

                        <hr class="my-4">
                        <button name="login" value="submit" class="btn btn-lg btn-success btn-block text-uppercase"
                                type="submit">Sign in
                        </button>
                    </form>
                    <hr class="style-four my-4">

                    <a class="btn btn-lg btn-primary btn-block text-uppercase" href="sign_up.php">Create Account</a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include "../layout/footer.php" ?>
