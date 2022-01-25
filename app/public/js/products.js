function addToCart(){

    //Get the values of the product from products.php
    

    //Get the elements to build a cart-item from cart.php & add the right values to the inner html
    var cart = document.getElementById("cart");

    var listItem = document.createElement("li");
    listItem.className = "list-group-item d-flex justify-content-between lh-sm";

    var product = document.createElement("div");

    var productHeader = document.createElement("h6");
    productHeader.className = "my-0";

    var productContent = document.createElement("small");
    productContent.className = "text-muted";

    var productImage = document.createElement("img");
    productImage.className = "cart-item-img";

    var productPrice = document.createElement("span");
    productPrice.className = "text-muted";




    // <li class="list-group-item d-flex justify-content-between lh-sm">
    //                         <div>
    //                             <h6 class="my-0">Pizza Margherita</h6>
    //                             <small class="text-muted"><i>ingredients</i></small>
    //                         </div>
    //                         <img src="images/pizza-margarita.png" alt="margherita" class="cart-item-img">
    //                         <span class="text-muted">€5,00</span>
    //                     </li>

}