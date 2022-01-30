<?php
require __DIR__ . '/../service/userservice.php';

class RegisterController{

    // private $userService; 

    // // initialize services
    // function __construct() {
    //     $this->userService = new UserService();
    // }

    public function index(){

        // $users = $this->userService->getAll();
        
        include '../view/register/register.php';
        // $this->displayView($users);
    }
}