<?php
    error_reporting(E_ALL);
    // require __DIR__ . '/../switchrouter.php';
    require __DIR__ . '/../patternrouter.php';

    $uri = trim($_SERVER['REQUEST_URI'], '/');

    // $router = new SwitchRouter();
    $router = new PatternRouter();
    $router->route($uri)
?>