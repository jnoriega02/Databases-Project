<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>

        body
        {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
        }

        main
        {
                padding: 20px;
        }

        h1
        {
                color: #333;
        }

        .product-container
        {
                display: flex;
        }

        img
        {
                max-width: 400px;
                height: auto;
                margin-right: 20px;
                display: block;
        }

        .product-detail
        {
                flex: 1;
        }

        p
        {
                color: #555;
        }

        .box
        {
                border: 1px solid #ddd;
                padding: 20px;
                background-color: #f9f9f9;
        }

        button
        {
                background-color: #4CAF50;
                color: white;
                padding: 8px 16px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
        }

        header
        {
                background-color: #fff;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
        }

        .button-container
        {
                display: flex;
                gap: 10px;
        }

        .button-container button
        {
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
                overflow: hidden;
                outline: none;
        }

        .button-container img
        {
                max-width: 50px;
                height: auto;
        }

        .website-name
        {
                flex-grow: 1;
                text-align: left;
                font-size: 30px;
                font-weight: bold;
        }

        .cart-button
        {
                background: none;
                border: none;
                cursor: pointer;
                padding: 0;
                overflow: hidden;
                outline: none;
        }

        .cart-button img
        {
                max-width: 50px;
                height: auto;
        }

        </style>
</head>
<body>
        <header>
                <div class="website-name">Clothing Store</div>

                <div class="button-container">
                <a href="login.php">
                <button>
                        <img src="https://t3.ftcdn.net/jpg/02/59/39/46/360_F_259394679_GGA8JJAEkukYJL9XXFH2JoC3nMguBPNH.jpg" alt="Sign In">
                </button>
                </a>

                <a href="cart.php">
                <button class="cart-button">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Shopping-cart-transparent-icon.png" alt="Shopping Cart">
                </button>
                </a>
                </div>

        </header>

        <main>
                <h1>Cozy Sweater</h1>

                <div class="product-container">

                <img src="https://m.media-amazon.com/images/I/71OUch0LLPL._AC_SX679_.jpg" alt="Product 1">

                <div class="product-details box">

                        <p>Price: $29.99</p>
                        <p>In Stock: 30</p>

                        <p>
                                This sweater is perfect for winter weather and is one size fits all.
                        </p>

                        <label for="quantity-product-1">Quantity:</label>
                        <select id="quantity-product-1" class="quantity-dropdown">

                        <?php for ($i = 1; $i <= 100; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>

                        </select>

                        <button class="add-to-cart-button" onclick="addToCart('product1')">Add to Cart</button>

                </div>
        </main>
</body>
</html>
