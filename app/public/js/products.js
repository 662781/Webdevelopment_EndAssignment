fetch('http://localhost/api/products') // Call to api end-point
    .then(result => result.json()) // Get result as json
    .then(products => {
        products.forEach(product => { // Create a product-card for each product
            if (product.category_id == 2) {
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
                img.setAttribute('src', product.img_path)
                img.setAttribute('alt', product.name)

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
            }
        })
    })

