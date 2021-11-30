<!-- Deze inhoud zet je in je VIEW bestand -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/pizza_logo_ico.ico" type="image" sizes="16x16">
    <title>Pizza Time - Home</title>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php"><img class="logo" src="images/pizza_logo_ico.ico" alt="Pizza Time!"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="main_nav">
                            <ul class="nav me-auto">
                                <li class="nav-item active"><a class="nav-link link-dark px-2" href="index.php">Home </a> </li>
                                <li class="nav-item"><a class="nav-link link-dark px-2" href="#"> Pasta </a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link link-dark px-2 dropdown-toggle" data-bs-toggle="dropdown">Pizza</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Start creating!</a></li>
                                        <li><a class="dropdown-item" href="#">Our masterpieces</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav">
                                <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><img src="images/person-circle.svg" alt="login"> Login</a></li>
                                <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><img src="images/person-plus-fill.svg" alt="sign up"> Sign up</a></li>
                                <li class="nav-item"><a href="#" class="nav-link link-dark px-2"><img src="images/cart.svg" alt="cart"> Cart</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777"></rect>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-start">
                                <h1>Example headline.</h1>
                                <p>Some representative placeholder content for the first slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item active">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777"></rect>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption">
                                <h1>Another example headline.</h1>
                                <p>Some representative placeholder content for the second slide of the carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill="#777"></rect>
                        </svg>

                        <div class="container">
                            <div class="carousel-caption text-end">
                                <h1>One more for good measure.</h1>
                                <p>Some representative placeholder content for the third slide of this carousel.</p>
                                <p><a class="btn btn-lg btn-primary" href="#">Browse gallery</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-4">
                Something here
            </div>
            <div class="col col-md-8">
                Something there
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>