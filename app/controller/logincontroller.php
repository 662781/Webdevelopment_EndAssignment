<?php

class LoginController
{

    public function index()
    {

        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../service/userservice.php';

        session_start();
        // Check if the user is already logged in, if yes then redirect them to the home page
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: home");
            exit;
        }

        $userService = new UserService();
        $error = "";

        if (isset($_POST["sign-in"])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($_POST["username"] && $_POST["password"] != "") {

                $username = $_POST["username"];
                $password = $_POST["password"];

                $user = $userService->getByUsername($username);

                if (password_verify($password, $user->getPassword())) {
                    $_SESSION["loggedin"] = true;
                    $_SESSION["user"] = $user;
                    header("location: home");
                    // echo "You are in Mr. KlaasDeTester2!";
                } else {
                    $error = "The entered password doesn't match the username, sorry.";
                }
            } else {
                $error = "Please fill in all fields before submitting!";
            }
        }


        include '../view/login/login.php';
    }
}
