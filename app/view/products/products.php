<?php
require_once __DIR__ . '/../../model/product.php';
require_once __DIR__ . '/../../model/cart.php';
require_once __DIR__ . '/../../model/cart-item.php';
require_once __DIR__ . '/../../service/productservice.php';
require_once __DIR__ . '/../../model/user.php';

session_start();

$user;
$productId;
$product;
$productList = array();
$cart;
$productService = new ProductService();

$productList = $productService->getAll();

foreach ($productList as $prod) {
    $price = $prod->getPrice();
    $prod->setPrice($price);
}

if (isset($_SESSION["cart"])) {
    $cart = $_SESSION["cart"];
}

if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
}

if (isset($_POST["logout"])) {
    $_SESSION["loggedin"] = false;
    header("location: home");
}

if (isset($_POST["add-item"])) {
    $productId = $_POST["product-id"];

    $product = $productService->getByProductId($productId);

    if ($product !== null) {
        $cartItem = new CartItem($product);
        $cartItem->setAmount($_POST["amount"]);

        $cart->addItem($cartItem);

        header("location: cart");
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
    <title>Pizza Time - Products</title>
</head>

<body>
    <? include_once '../view/navbar/navbar.php'; ?>
    <div class="album py-5 bg-light">
        <div class="container">
            <h1 class="product-type">Pizza</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="pizzas">
                <!-- JS adds these -->
            </div>

            <h1 class="product-type">Pasta</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($productList as $prod) {
                    if ($prod->getCatId() == 1) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src=<? echo $prod->getImgPath() ?> alt="<? $prod->getName() ?>" class="product-page-image">
                                <div class="card-body">
                                    <h3 class="product-header"><? echo $prod->getName() ?></h3>
                                    <h4 class="product-price">€<? echo $prod->getPrice() ?></h4>
                                    <p class="card-text"><? echo $prod->getIngredients() ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="products" method="post">
                                            <div class="btn-group">
                                                <button type="submit" name="add-item" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                            </div>
                                            <input type="hidden" name="product-id" value=<?php echo $prod->getId() ?>>
                                            <input type="number" class="product-amount" name="amount" value="1" min="1" max="10">
                                        </form>
                                        <small class="text-muted">Freshly made & Delivered within 60 min.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <? include_once '../view/footer/footer.php'; ?>
    <script>
        function loadProducts() {
            fetch('http://localhost/api/products') // Call to api end-point
                .then(result => result.json()) // Get result as json
                .then(products => {
                    products.forEach(product => { // Create a product-card for each product
                        console.log('test');
                        // if (product.category_id == 2) {
                            //Create all the elements for a product-card

                            //Get the main div element to place all child elements in
                            var mainDiv = document.getElementById("pizzas");

                            //Create child elements
                            var colDiv = document.createElement("div");
                            colDiv.className = "col";

                            var cardShadow = document.createElement("div");
                            cardShadow.className = "card shadow-sm";

                            var img = document.createElement("img");
                            img.className = "product-page-image";
                            // img.setAttribute('src', product.img_path)
                            img.src = product.img_path;
                            // img.setAttribute('alt', product.name)
                            img.alt = product.name;

                            var cardBody = document.createElement("div");
                            cardBody.className = "card-body";

                            var cardHeader = document.createElement("h3");
                            cardHeader.className = "product-header";
                            cardHeader.innerHTML = product.name;

                            var productPrice = document.createElement("h4");
                            productPrice.className = "product-price";
                            productPrice.innerHTML = product.price;

                            var ingredients = document.createElement("p");
                            ingredients.className = "card-text";
                            ingredients.innerHTML = product.ingredients;

                            var cardActions = document.createElement("div");
                            cardActions.className = "d-flex justify-content-between align-items-center";

                            var form = document.createElement("form");
                            form.setAttribute('action', 'products')
                            form.setAttribute('method', 'post')

                            var btnGroup = document.createElement("div");
                            btnGroup.className = "btn-group";

                            var btnAddToCart = document.createElement("button");
                            btnAddToCart.className = "btn btn-sm btn-outline-primary";
                            btnAddToCart.setAttribute('type', 'submit');
                            btnAddToCart.setAttribute('name', 'add-item');
                            btnAddToCart.innerHTML = "Add to cart";

                            var inputProductId = document.createElement("input");
                            inputProductId.setAttribute('type', 'hidden');
                            inputProductId.setAttribute('name', 'product-id');
                            inputProductId.setAttribute('value', product.id);

                            var inputAmount = document.createElement("input");
                            inputAmount.setAttribute('type', 'number');
                            inputAmount.setAttribute('name', 'amount');
                            inputAmount.setAttribute('value', '1');
                            inputAmount.setAttribute('min', '1');
                            inputAmount.setAttribute('max', '10');
                            inputAmount.className = "product-amount";

                            var btmCaption = document.createElement("small");
                            btmCaption.className = "text-muted";
                            btmCaption.innerHTML = "Order Now & Ready + Delivered in 30 min.";

                            btnGroup.appendChild(btnAddToCart);
                            form.appendChild(btnGroup, inputProductId, inputAmount);

                            cardActions.appendChild(form, btmCaption);

                            cardBody.appendChild(cardHeader, productPrice, ingredients, cardActions);

                            cardShadow.appendChild(img, cardBody);

                            colDiv.appendChild(cardShadow);

                            mainDiv.appendChild(colDiv);
                        // }
                    })
                })
        }

        loadProducts();
    </script>
</body>

</html>