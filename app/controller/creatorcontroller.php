<?php

require __DIR__ . '/controller.php';

class CreatorController extends Controller{

    public function index(){
        // echo "You've reached the index method of the creator controller";
        include '../view/creator/creator.php';
        // $this->displayView("model");
    }

    public function about(){
        echo "You've reached the about method of the creator controller";
    }
}