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

<body>
    <? include_once '../view/navbar/navbar.php'; ?>
    <div class="container mt-2">
        <div class="row">
            <h2>Login</h2>
            <p>Please fill in your credentials</p>

            <form action="login.php">
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username"><br>
                <label for="password">Password:</label><br>
                <input type="text" id="password" name="password"><br>
                <input type="submit" value="Login">
            </form>
        </div>

    </div>
</body>

</html>