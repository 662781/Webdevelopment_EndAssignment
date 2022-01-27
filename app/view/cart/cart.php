<?php
require_once __DIR__ . '/../../model/cart.php';
require_once __DIR__ . '/../../model/cart-item.php';
session_start();

$username = "";
$cart;
$product_id;
$total_price = 0;

if (isset($_SESSION["cart"])) {

    $cart = $_SESSION["cart"];

    foreach ($cart->getItems() as $item) {
        $total_price += ($item->getProduct()->getPrice() * $item->getAmount());
    }
}

if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
}

if (isset($_POST["logout"])) {
    $_SESSION["loggedin"] = false;
    header("location: home");
}

if (isset($_POST["del-item"])) {
    $product_id = $_POST["product-id"];
    foreach ($cart->getItems() as $item) {
        if ($item->getProduct()->getId() == $product_id) {
            $cart->delItem($item);
            header("location: cart");
        }
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
                        <span class="badge bg-primary rounded-pill"><? echo count($cart->getItems()) ?></span>
                    </h4>
                    <ul class="list-group mb-3" id="cart">
                        <?php foreach ($cart->getItems() as $item) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <img src=<? echo $item->getProduct()->getImgPath() ?> alt="<? $item->getProduct()->getName() ?>" class="product-image">
                                <div>
                                    <h6 class="my-0"><? echo $item->getProduct()->getName() . " " . "(x"  . $item->getAmount() . ")" ?></h6>
                                    <div class="ingredients">
                                        <small class="text-muted"><i><? echo $item->getProduct()->getIngredients() ?></i></small>
                                    </div>
                                </div>
                                <div>
                                    <strong>€<? echo $item->getProduct()->getPrice() * $item->getAmount(); ?></strong>
                                    <form class="mt-5" action="cart" method="post">
                                        <div class="btn-group">
                                            <input type="hidden" name="product-id" value="<? echo $item->getProduct()->getId() ?>">
                                            <button type="submit" name="del-item" class="btn btn-sm btn-danger btn-delete">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </li>
                        <?php } ?>
                        <?php if ($cart->getItems() == null) { ?>
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                Your cart is empty
                            </li>
                        <?php } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (EUR)</span>
                            <strong>€ <?php echo $total_price ?></strong>
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
    </div>

    <? include_once '../view/footer/footer.php'; ?>

    <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
    <script src="/js/products.js"></script>

</body>

</html>