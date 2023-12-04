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
                <h1>Green Flannel</h1>

                <div class="product-container">

		<img src="https://www.legendarywhitetails.com/on/demandware.static/-/Sites
		-master-us/default/dw5faed3bc/images/6170_MVBU_MAIN_FRONT.jpg" alt="Green Flannel">

                <div class="product-details box">

                        <p>Price: $19.99</p>
                        <p>In Stock: </p>

                        <p>
                                A green flannel to wear on crisp days.
                        </p>

                </div>
        </main>
</body>
</html>
