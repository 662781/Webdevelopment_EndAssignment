<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ARTICLES!</h1>

    <?php

    foreach ($model as $article){
        echo "<h2> $article->title</h2>";
        echo "<p> $article->content</p>";
    }
    ?>
</body>
</html>