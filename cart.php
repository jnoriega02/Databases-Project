<!DOCTYPE html>
<html>
<head>
        <title>Cart Page</title>
        <style>

		.return-to-cart{
                        text-align: center;
                        margin-bottom: 20px;
                }

                .return-button{
                        background-color: #0000000;
                        display: inline-block;
                        font-weight: bold;
                        font-size: 17px;
                        margin-bottom: 10px;
                }

		.header{
                        text-align: left;
                        margin-top: 20px;
                        margin-bottom: 20px;
                        font-size: 30px;
                        color: #000000;
                        font-weight: bold;
                        border-bottom: 1px solid #ccc;
                        padding-bottom: 10px;
		}


		.right-column{
                        display: flex;
                        flex-direction: column;
		}


                .order-summary li {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 10px;
                }


		.box {
                        width: 500px;
                        padding: 20px;
                        border: 1px solid #ddd;
                        border-radius: 5px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                        margin-bottom: 10px;
                        box-sizing: border-box;
                        margin-right: 15px;
		}

	</style>
</head>
<body>

 <div class="header">
                Store Name Checkout

        </div>



        <div class="return-cart-button">
                <a href="homepage.php" class="return-button"> < Return to Cart</a>
        </div>



<div clas="right-column">
                <div class="box">
                        <h2>Order Summary</h2>
                        <ul class="order-summary">
                                <li><span class="label">Number of Items:</span> <span class="value">3</span></li>
                                <li><span class="label">Shipping:</span> <span class="value">$5.00</span></li>
                                <li><span class="label">Estimated Taxes:</span> <span class="value">$2.50</span></li>
                                <li><span class="label">Order Total:</span> <span class="value">$27.50</span></li>

				<a href="checkout.php"><button class="my-button">checkout</button></a>

                        </ul>
                </div>
        </div>

<?php



$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";
try { // if something goes wrong, an exception is thrown
$sn = "mysql:host=$serv;dbname=$d";
$p = new PDO($sn, $user, $pass);
$p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOexception $ex) { // handle that exception
echo "Connection to database failed: " . $ex->getMessage();
}
// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    echo "Your cart is empty.";
} else {
    // Assuming $p is your PDO connection
    $totalCost = 0;
    foreach ($_SESSION['cart'] as $prodID => $quantity) {
        $stmt = $p->prepare("SELECT Name, Cost FROM PRODUCT WHERE ProdID = :ProdID");
        $stmt->bindParam(':ProdID', $prodID);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo "<li>" . htmlspecialchars($product['Name']) . " - $" . htmlspecialchars($product['Cost']) . " x " . htmlspecialchars($quantity) . "</li>";
            $totalCost += $product['Cost'] * $quantity;
        }
    }

    // Display total cost
    echo "<li>Total Cost: $" . htmlspecialchars($totalCost) . "</li>";
}
?>
