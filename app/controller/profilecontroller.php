<?php

require __DIR__ . '/controller.php';

class ProfileController extends Controller{

    public function index(){
        // echo "You've reached the index method of the profile controller";
        include '../view/profile/profile.php';
        // $this->displayView("model");   
    }
}