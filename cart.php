<!DOCTYPE html>
<html>
<head>
        <title>Cart Page</title>
        <style>

		.return-to-cart{
                        text-align: center;
                        margin-bottom: 20px;
                }

                .order-summary li {
                        display: flex;
                        justify-content: space-between; 
                        margin-bottom: 10px;
                }

                .order-value {
                        margin-left: auto; 
                        text-align: right; 
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

                .product-total {
                        margin-left: auto; /* Pushes the total to the right side of the container */
                        text-align: right; /* Aligns the total number to the right */
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
<?php
     
     session_start();

// Database connection variables
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";

try {
    $pdo = new PDO("mysql:host=$serv;dbname=$d", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty.";
    } else {
        $totalCost = 0;
        $totalItems = 0;

        echo "<div class='box'>";
        echo "<h2>Order Summary</h2>";
        echo "<ul class='order-summary'>";

        foreach ($_SESSION['cart'] as $prodID => $quantity) {
            $stmt = $pdo->prepare("SELECT Name, Cost, Amount FROM PRODUCT WHERE ProdID = ?");
            $stmt->execute([$prodID]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product) {
                // Adjust the quantity if it exceeds available stock
                $quantity = min($quantity, $product['Amount']);
                $_SESSION['cart'][$prodID] = $quantity; // Update the session cart

                $itemCost = $product['Cost'] * $quantity;
                $totalCost += $itemCost;
                $totalItems += $quantity;

                echo "<li>" . htmlspecialchars($product['Name']) . " - $" . htmlspecialchars($product['Cost']) . " x " . htmlspecialchars($quantity) . "<span class='product-total'>  $" . htmlspecialchars(number_format($itemCost, 2)) . "</span></li>";
            }
        }



        // Calculating additional charges
        $taxRate = 0.0635; // 6.35%
        $taxes = $totalCost * $taxRate;

        $shippingRate = 0.08; // 8%
        $shipping = $totalCost * $shippingRate;

        $finalTotal = $totalCost + $shipping + $taxes;

        echo "<li><span class='label'>Number of Items:</span> <span class='order-value'>" . $totalItems . "</span></li>";
        echo "<li><span class='label'>Shipping:</span> <span class='order-value'>$" . number_format($shipping, 2) . "</span></li>";
        echo "<li><span class='label'>Estimated Taxes:</span> <span class='order-value'>$" . number_format($taxes, 2) . "</span></li>";
        echo "<li><span class='label'>Order Total:</span> <span class='order-value'>$" . number_format($finalTotal, 2) . "</span></li>";
        echo "</ul>";
        echo "</div>";
    }
} catch(PDOException $ex) {
    echo "Connection to database failed: " . $ex->getMessage();
}
