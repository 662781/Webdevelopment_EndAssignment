<?php

require __DIR__ . '/controller.php';

class LoginController extends Controller{

    public function index(){
        // echo "You've reached the index method of the login controller";
        include '../view/login/login.php';
        // $this->displayView("model");
    }
}