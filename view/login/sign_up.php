<?php include "../layout/header.php";
include "../../database/Database.php";
include "../../model/user.php";
$connect_db = new Database();
$conn = $connect_db->connect();
$new_user = new user();

if (empty($_POST['first_name'])) {
    $first_name = "";
    $last_name = "";
    $username_from = "";
    $email_form = "";
    $message_password = "";
    $message_username = "";
}


if (isset($_POST['sign_up'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username_from = $_POST['username'];
    $email_form = $_POST['email_form'];
    $password_from = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];
    $message_password = "";
    $message_username = "";
    $check_user = $new_user->check_username($username_from, $conn);


    if ($password_from === $repeat_password) {
        $message_password = "";
    } else {
        $message_password = "Password not Match";
    }

    if (count($check_user) === 0) {
        if ($message_password === "") {
            $new_user->create($first_name, $last_name, $username_from, $email_form, $password_from, $conn);
            $_SESSION["login"] = $username_from;
            header('Location: /MVC/view/prodect/index.php');
        }
    } else {
        $message_username = "Username is Used";
    }
}


?>


    <div style="margin-top: 5%" class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">

                    <div class="card-body">
                        <h4 class="text-center">Sign Up </h4>
                        <form class="form-signin" method="post">
                            <hr class="my-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $first_name ?>"
                                       name="first_name" placeholder="first name" aria-label="first name" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $last_name ?>"
                                       name="last_name" placeholder="Last name" aria-label="Last name" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="email" name="email_form" class="form-control"
                                       value="<?php echo $email_form ?>" placeholder="Email" aria-label="Email"
                                       aria-describedby="basic-addon1" required>
                            </div>

                            <div class="container" style="width:500px;">
                                <?php
                                if ($message_username !== "") {
                                    echo '<label class="text-danger">' . $message_username . '</label>';
                                }
                                ?>
                            </div>

                            <div class="input-group mb-3">
                                <input required type="text" class="form-control" value="<?php echo $username_from ?>"
                                       name="username" placeholder="Username" aria-label="Username"
                                       aria-describedby="basic-addon1">
                            </div>

                            <div class="container" style="width:500px;">
                                <?php
                                if ($message_password !== "") {
                                    echo '<label class="text-danger">' . $message_password . '</label>';
                                }
                                ?>
                            </div>

                            <div class="input-group mb-3">
                                <input required type="password" class="form-control" name="password"
                                       placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                            </div>


                            <div class="input-group mb-3">
                                <input required type="password" class="form-control" name="repeat_password"
                                       placeholder="Repeat Password" aria-label="Repeat Password"
                                       aria-describedby="basic-addon1">
                            </div>

                            <hr class="my-4">
                            <button type="submit" name="sign_up" value="submit" class="btn btn-primary">Create Account
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include "../layout/footer.php" ?>