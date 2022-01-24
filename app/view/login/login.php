<?php
session_start();
require_once __DIR__ . '/../../model/user.php';
require_once __DIR__ . '/../../service/userservice.php';

$userService = new UserService();

if(isset($_POST["sign-in"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $userService->getByUsername($username);

    if(password_verify($password, $user->getPassword())){
        echo "Je bent binnen Klaas!";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-style.css">
    <link rel="icon" href="images/pizza_logo_ico.ico" type="image" sizes="16x16">
    <title>Pizza Time - Login</title>
</head>

<body class="text-center">
    <div class="container">
        <main class="form-signin">
            <figure class="logo-figure">
                <a href="home"><img class="mb-4 logo" src="images/pizza_logo.png" alt="Pizza time?"></a>
                <figcaption>It's Pizza Time!</figcaption>
            </figure>
            <form>
                <h1 class="h3 mb-3 fw-normal title">Please sign in</h1>

                <div class="form-floating">
                    <input type="username" class="form-control" id="username" name="username" placeholder="fluffyunicorn420">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="sign-in">Sign in</button>
                <label class="register"><a href="register">No account? Register here</a></label>
                <p class="mt-5 mb-3 text-muted">© 2021–2022</p>
            </form>
        </main>
    </div>
</body>

</html>