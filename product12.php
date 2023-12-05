<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product Details - Corduroy Pants</title>
        <style>

        header
        {
                display: flex;
                align-items: center;
                justify-content: space-between;
                text-align: left;
                margin-top: 20px;
                margin-bottom: 20px;
                padding: 0 10px;
                font-size: 30px;
                color: #000000;
                font-weight: bold;
                border-bottom: 1px solid #ccc;
        }

        main
        {
                padding: 20px;
        }

        h1
        {
                color: #000000;
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

<?php

session_start();
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";

try
{
        $sn = "mysql:host=$serv;dbname=$d";
        $pdo = new PDO($sn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $productName = 'Corduroy Pants';

        echo "<div class='products-container'>";
        $stmt = $pdo->prepare("SELECT * FROM PRODUCT WHERE Name = :productName");
        $stmt->bindParam(':productName', $productName, PDO::PARAM_STR);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
		$productPrice = $row['Cost'];
                $productAmount = $row['Amount'];
        }
}
catch (PDOException $e)
{
        echo "Connection failed: " . $e->getMessage();
}

?>

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
                <h1>Corduroy Pants</h1>

                <div class="product-container">

		<img src="https://img1.shopcider.com/product/1670824945000-pHSAya.jpg?x-oss-process=image
		/resize,w_1050,m_lfit/quality,Q_80/interlace,1" alt="Corduroy Pants">

                <div class="product-details box">

                        <?php echo "<p>Price: $" . htmlspecialchars($productPrice) . "</p>"; ?>
			<?php echo "<p>In Stock: " . htmlspecialchars($productAmount) . "</p>"; ?>

                        <p>
                                Brown corduroy pants good for the fall.
                        </p>

                </div>
        </main>
</body>
</html>
