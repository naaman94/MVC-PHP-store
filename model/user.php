<?php


class user
{
    private $first_name;
    private $last_name;
    private $username;
    private $email;
    private $password;

    public function create($first_name, $last_name, $username, $email, $password, $conn)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        echo "you are in create new user";
        try {

            $sql = "INSERT INTO users (first_name,last_name,username, email,password)values ('$first_name','$last_name','$username','$email','$password')";
            $conn->exec($sql);
            //            echo "<script type='text/javascript'>alert('Record deleted successfully');</script>";
        } catch (PDOException $e) {

            echo $sql . "<br>" . $e->getMessage();
        }


    }
    public function check_username($username, $conn)

    {
        $this->username = $username;
        try {
            $stmt = $conn->query("SELECT * FROM users where username='$username'");
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $row;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }
}


