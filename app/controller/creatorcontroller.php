<?php

class CreatorController
{

    public function index()
    {

        require_once __DIR__ . '/../model/user.php';
        session_start();

        $user;

        //Set user if the session variable exists
        if (isset($_SESSION["user"])) {
            $user = $_SESSION["user"];
        }

        //If the logout btn is clicked, check if the session variable "loggedin" exists, set it to false & redirect user to the home page
        if (isset($_POST["logout"])) {
            if (isset($_SESSION["loggedin"])) {
                $_SESSION["loggedin"] = false;
                header("location: home");
            }
        }

        if (isset($_SESSION["loggedin"])) {
            // Check if the user not logged in, then redirect them to the login page
            if (!isset($_POST["logout"]) &&  $_SESSION["loggedin"] !== true) {
                header("location: login");
                exit;
            }
        }

        include '../view/creator/creator.php';
    }
}
