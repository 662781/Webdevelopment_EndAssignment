<!-- Dit is het enige wat er in dit bestand moet (aangezien de link naar hier in het nginx bestand staat). 
Zo hoef je niet meer perse de index als 1e pagina te gebruiken en staat je URL niet meer vol met .php dingen. 
Ook gebruik je 1 router class. De PatternRouter is de handigste en meest dynamische.-->
<?php
    // require __DIR__ . '/../switchrouter.php';
    require __DIR__ . '/../patternrouter.php';

    $uri = trim($_SERVER['REQUEST_URI'], '/');

    // $router = new SwitchRouter();
    $router = new PatternRouter();
    $router->route($uri)
?>