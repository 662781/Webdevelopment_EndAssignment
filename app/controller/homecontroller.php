<?php

class HomeController{

    public function index(){
        // echo "You've reached the index method of the home controller";
        include '../view/home/home.php';
        // $this->displayView();
    }

    public function about(){
        echo "You've reached the about method of the home controller";
    }
}