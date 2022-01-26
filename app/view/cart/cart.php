<?php
require_once __DIR__ . '/../../model/cart.php';
require_once __DIR__ . '/../../model/cart-item.php';
session_start();

$username = "";
$cart;

if(isset($_SESSION["cart"])){
    $cart = $_SESSION["cart"];
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}

if (isset($_POST["logout"])) {
    $_SESSION["loggedin"] = false;
    header("location: home");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/pizza_logo_ico.ico" type="image" sizes="16x16">
    <title>Pizza Time - Cart</title>
</head>

<body>
    <? include_once '../view/navbar/navbar.php'; ?>
    <div class="container">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <span class="badge bg-primary rounded-pill">0</span>
                    </h4>
                    <ul class="list-group mb-3" id="cart">
                        <?php foreach($cart->getItems() as $item){?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0"><? $item->getProduct()->getName()?></h6>
                                <small class="text-muted"><i><? $item->getProduct()->getIngredients()?></i></small>
                            </div>
                            <h4>x<? $item->getAmount()?></h4>
                            <img src="images/pizza-margarita.png" alt="margherita" class="cart-item-img">
                            <span class="text-muted">€<? $item->getProduct()->getPrice()?></span>
                        </li>
                        <?php }?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (EUR)</span>
                            <strong>€0</strong>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form class="needs-validation" novalidate="">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="username" class="form-label">Username</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" id="username" placeholder="Username" required="">
                                    <div class="invalid-feedback">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                                <div class="invalid-feedback">
                                    Please enter a valid email address for shipping updates.
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Cloud St 4" required="">
                                <div class="invalid-feedback">
                                    Please enter your shipping address.
                                </div>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="zip" placeholder="1234AB" required="">
                                <div class="invalid-feedback">
                                    Postal Code required.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment</h4>

                        <div class="my-3">
                            <div class="form-check">
                                <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="" required="">
                                <label class="form-check-label" for="credit">IDEAL</label>
                            </div>
                            <div class="form-check">
                                <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="debit">PayPal</label>
                            </div>
                            <div class="form-check">
                                <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="paypal">Monopoly Money</label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Commence Payment</button>
                    </form>
                </div>
            </div>
        </main>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2021–2022 PizzaTime</p>
        </footer>
    </div>

    <? include_once '../view/footer/footer.php'; ?>

    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
    <script src="/js/products.js"></script>

</body>

</html>