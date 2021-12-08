<?php

class Controller {

    protected function displayView($model){
        $directory = substr(get_class($this), 0, -10);
        $file = debug_backtrace()[1]['function'];

        require __DIR__ . "/../view/$directory/$file.php";
    }
}