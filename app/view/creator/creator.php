<?php
require_once '/app/repository/userrepository.php';
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
    <title>Pizza Time - Creator</title>
</head>

<body>
    <? include_once '../view/navbar/navbar.php'; ?>
    <div class="container">
        <div class="row" id="pizza_result">
            <div class="col col-md-8">
                <h2 id="creator-header">Create your pizza!</h2>
                <img id="empty-pizza" src="images/empty-pizza.png" alt="empty pizza">
            </div>
            <div class="col col-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled="" checked="">
                    <label class="form-check-label" for="disabledFieldsetCheck">Tomato Sauce</label>
                </div>

                <h3>Vegetables</h3>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Bell Pepper</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Red Pepper</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Mushrooms</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Zucchini</label>
                </div>

                <h3>Meat</h3>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Spicy Minced Meat</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Pulled Pork</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Shawarma (Lamb)</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Chicken</label>
                </div>

                <h3>Herbs</h3>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Basil</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Parsley</label>
                </div>

                <h3>Cheese</h3>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Gouda Cheese</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Provolone</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Gorgonzola</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Parmesan</label>
                </div>
                <div class="form-check">
                    <input id="ingredient1" name="ingredient1" type="checkbox" class="form-check-input" required="">
                    <label class="form-check-label" for="credit">Mozzarella</label>
                </div>

                <button class="btn btn-primary btn-lg mt-5 btn-creator"><a href="cart">Add to cart</a></button>
            </div>
        </div>
    </div>
    <? include_once '../view/footer/footer.php'; ?>
</body>

</html>