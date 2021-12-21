<?php

require __DIR__ . '/controller.php';

class RegisterController extends Controller{

    public function index(){
        // echo "You've reached the index method of the register controller";
        include '../view/register/register.php';
        // $this->displayView("model");
    }
}