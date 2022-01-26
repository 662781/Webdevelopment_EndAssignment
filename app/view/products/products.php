<?php
require_once __DIR__ . '/../../model/product.php';
require_once __DIR__ . '/../../model/cart.php';
require_once __DIR__ . '/../../model/cart-item.php';
require_once __DIR__ . '/../../service/productservice.php';

session_start();

$username = "";
$product = new Product();
$cart;
$products = array();
$pro_serv = new ProductService();

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

if(isset($_POST["add-item"])){
    $product->setName($_POST["product-name"]);
    $product->setPrice((float) $_POST["product-price"]);
    $product->setIngredients($_POST["product-ingredients"]);

    $cartItem = new CartItem($product);
    $cartItem->setAmount($_POST["amount"]);

    $cart->addItem($cartItem);

    header("location: cart");
}



//Get the products from the db and put them in an array
// $products_db = $pro_serv->getAll();

//Convert every product from the db to a Product object
// foreach($products_db as $product){
//     $newProduct = new Product();
//     $newProduct = $product;
//     $newProduct->setId($product->getId());
//     $newProduct->setName($product->getName());
//     $newProduct->setCat_Id($product->getCat_Id());
//     $newProduct->setPrice($product->getPrice());
//     $newProduct->setIngredients($product->getIngredients());
//     array_push($products, $newProduct);
// }

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
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <form action="products" method="post">
                        <div class="card shadow-sm">
                            <img src="images/pizza-margarita.png" alt="pizza margarita" class="product-image">
                            <div class="card-body">
                                <h3 class="product-header" name="product-name">Pizza Margherita</h3>    
                                <h4>€</h4><h4 class="product-price" name="product-price">5.00</h4>
                                <p class="card-text" name="product-ingredients">Tomato, Basil & Cheese</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="submit" name="add-item" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                    </div>
                                    <input type="number" class="product-amount" name="amount" value="1" min="1" max="10">
                                    <small class="text-muted">Order Now & Ready + Delivered in 30 min.</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/pizza-rustica.png" alt="pizza rustica" class="product-image">
                        <div class="card-body">
                            <h3 class="product-header">Pizza Rustica</h3>
                            <h4 class="product-price">€5,00</h4>
                            <p class="card-text">Tomato, Mozzarella, Spicy Minced Meat, Red Pepper</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                </div>
                                <input type="number" class="product-amount" name="amount" min="1" max="10">
                                <small class="text-muted">Order Now & Ready + Delivered in 30 min.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/pizza-quattro-formaggi.png" alt="pizza quattro formaggi" class="product-image">
                        <div class="card-body">
                            <h3 class="product-header">Pizza Quattro Formaggi</h3>
                            <h4 class="product-price">€5,00</h4>
                            <p class="card-text">Gouda Cheese, Provolone, Gorgonzola, Parmesan</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                </div>
                                <input type="number" class="product-amount" name="amount" min="1" max="10">
                                <small class="text-muted">Order Now & Ready + Delivered in 30 min.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="product-type">Pasta</h1>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/pasta-bolognese.png" alt="bolgnese" class="product-image">
                        <div class="card-body">
                            <h3 class="product-header">Pasta Bolognese</h3>
                            <h4 class="product-price">€5,00</h4>
                            <p class="card-text">Bolognese (Meat Sauce), Parmesan & Parsley</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                </div>
                                <input type="number" class="product-amount" name="amount" min="1" max="10">
                                <small class="text-muted">Freshly made & Delivered within 60 min.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/pasta-conpolpette.png" alt="con polpette" class="product-image">
                        <div class="card-body">
                            <h3 class="product-header">Pasta Con Polpette</h3>
                            <h4 class="product-price">€5,00</h4>
                            <p class="card-text">Tomato, Cherry Tomato, Little Spicy Meatballs, Cream Sauce, Basil, Parsley, Garlic & Parmesan</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                </div>
                                <input type="number" class="product-amount" name="amount" min="1" max="10">
                                <small class="text-muted">Freshly made & Delivered within 60 min.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="images/pasta-funghi.png" alt="funghi" class="product-image">
                        <div class="card-body">
                            <h3 class="product-header">Pasta Funghi</h3>
                            <h4 class="product-price">€5,00</h4>
                            <p class="card-text">Cream Sauce, Mushrooms, Parmesan, Garlic & Parsley</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">Add to cart</button>
                                </div>
                                <input type="number" class="product-amount" name="amount" min="1" max="10">
                                <small class="text-muted">Freshly made & Delivered within 60 min.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include_once '../view/footer/footer.php'; ?>
    <script src="/js/products.js"></script>
</body>

</html>