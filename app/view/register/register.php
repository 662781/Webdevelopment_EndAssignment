<?php
require_once __DIR__ . '/../../model/user.php';
require_once __DIR__ . '/../../service/userservice.php';

$username = $email = $password = "";

$userService = new UserService();

if(isset($_POST["register"])){

    $user = new User();
    $user->setUsername($_POST["username"]);
    $user->setEmail($_POST["email"]);;
    $user->setPassword($_POST["password"]);

    if($userService->getByUsername($username) != null){
        echo "Sorry, the chosen username already in use!";
    }
    else{
        $userService->insert($user);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="icon" href="images/pizza_logo_ico.ico" type="image" sizes="16x16">
    <title>Pizza Time - Register</title>
</head>

<body class="text-center">
    <div class="container">
        <main class="form-signin">

            <figure class="logo-figure">
                <a href="home"><img class="mb-4 logo" src="images/pizza_logo.png" alt="Pizza time?"></a>
                <figcaption>It's Pizza Time!</figcaption>
            </figure>

            <form action="register" method="post">
                <h1 class="h3 mb-3 fw-normal title">Register a new account</h1>
                <div class="form-floating">
                    <input type="username" class="form-control" id="username" name="username" placeholder="fluffyunicorn420">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    <label for="email">E-mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="newsletter"> I would like to recieve the newsletter weekly
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="register" id="submit">Register</button>
                <label class="login"><a href="login">Already an account? Login here</a></label>
                <p class="mt-5 mb-3 text-muted">© 2021–2022</p>
            </form>
        </main>
    </div>
</body>

</html>