<?php

require __DIR__ . '/controller.php';

class HomeController extends Controller{

    public function index(){
        // echo "You've reached the index method of the home controller";
        include '../view/home/home.php';
        // $this->displayView("model");
    }

    public function home(){
        include_once "/../view/home/home.php";
    }

    public function about(){
        echo "You've reached the about method of the home controller";
    }
}