<?php

class RegisterController
{

    public function index()
    {

        require_once __DIR__ . '/../model/user.php';
        require_once __DIR__ . '/../service/userservice.php';

        $userService = new UserService();
        $error = "";

        if (isset($_POST["register"])) {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if ($_POST["username"] && $_POST["password"] != "") {
                $user = new User();
                $user->setUsername($_POST["username"]);
                $user->setEmail($_POST["email"]);;
                $user->setPassword($_POST["password"]);

                if ($userService->getByUsername($user->getUsername()) != null) {
                    $error = "Sorry, the chosen username is already in use!";
                } else {
                    $userService->insert($user);
                    header("location: login");
                }
            } else {
                $error = "Please fill in all fields before submitting!";
            }
        }

        include '../view/register/register.php';
    }
}
