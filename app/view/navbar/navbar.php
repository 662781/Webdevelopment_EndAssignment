<div class="m-2">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home"><img class="logo" src="images/pizza_logo_ico.ico" alt="Pizza Time!">PizzaTime!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main_nav">
                <ul class="nav me-auto">
                    <li class="nav-item active"><a class="nav-link link-dark px-2" href="home">Home </a> </li>
                    <li class="nav-item"><a class="nav-link link-dark px-2" href="products"> Pasta </a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link link-dark px-2 dropdown-toggle" data-bs-toggle="dropdown">Pizza</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="creator">Start creating!</a></li>
                            <li><a class="dropdown-item" href="products">Our masterpieces</a></li>
                        </ul>
                    </li>
                </ul>
                <?php
                if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo '<ul class="nav">
                    <li class="nav-item"><a href="profile" class="nav-link link-dark px-2"><img src="images/person-circle.svg" alt="profile">' . " " . $user->getUsername() . '</a></li>
                    <li class="nav-item"><a href="cart" class="nav-link link-dark px-2"><img src="images/cart.svg" alt="cart"> Cart</a></li>
                    <li class="nav-item"><form function="home" method="post"><button type="submit" name="logout" class="btn logout-btn">Logout<img src="images/arrow-bar-right.svg" alt="logout"></button></form></li>
                    </ul>';
                } 
                else {
                    echo '<ul class="nav">
                    <li class="nav-item"><a href="login" class="nav-link link-dark px-2"><img src="images/person-circle.svg" alt="login"> Login</a></li>
                    <li class="nav-item"><a href="register" class="nav-link link-dark px-2"><img src="images/person-plus-fill.svg" alt="sign up"> Register</a></li>
                    <li class="nav-item"><a href="cart" class="nav-link link-dark px-2"><img src="images/cart.svg" alt="cart"> Cart</a></li>
                    </ul>';
                }
                ?>

            </div>
        </div>
    </nav>
</div>