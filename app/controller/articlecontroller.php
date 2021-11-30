<?php
require __DIR__ . '/../service/articleservice.php';
require __DIR__ . '/controller.php';

class ArticleController extends Controller{

    private $articleService;

    function __construct(){
            $this->articleService = new ArticleService();
    }

    function index (){
        $model = $this->articleService->getAll();

        $this->displayView($model);
    }
}