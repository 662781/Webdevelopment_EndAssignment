<?php
class HomeController{

    public function index(){
        echo "You've reached the index method of the home controller";
    }

    public function home(){
        include_once "/../view/home/home.php";
    }

    public function about(){
        echo "You've reached the about method of the home controller";
    }
}