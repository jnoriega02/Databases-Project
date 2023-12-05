<!DOCTYPE html>
<html>

<head>
    <title>Cart Page</title>
    <style>
        .return-to-cart {
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

        .return-button {
            background-color: #0000000;
            display: inline-block;
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .header {
            text-align: left;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 30px;
            color: #000000;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .right-column {
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
            margin-left: auto;
            text-align: right;
        }

        .clear-cart-button {
            text-align: center;
            margin-top: 10px;
        }

        .quantity-input {
            width: 50px;
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

    <div class="right-column">
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

            if (isset($_POST['clearCart'])) {
                // Clear the cart
                foreach ($_SESSION['cart'] as $prodID => $quantity) {
                    // Retrieve product info
                    $stmt = $pdo->prepare("SELECT Amount FROM PRODUCT WHERE ProdID = ?");
                    $stmt->execute([$prodID]);
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($product) {
                        // Update product amount in the database
                        $newAmount = $product['Amount'] + $quantity;
                        $updateStmt = $pdo->prepare("UPDATE PRODUCT SET Amount = ? WHERE ProdID = ?");
                        $updateStmt->execute([$newAmount, $prodID]);
                    }
                }

                // Clear the cart session
                $_SESSION['cart'] = array();
            }

            if (!empty($_SESSION['cart'])) {
                // Handle quantity updates
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['prodID']) && isset($_POST['quantity'])) {
                    $prodID = $_POST['prodID'];
                    $newQuantity = $_POST['quantity'];

                    // Fetch current stock
                    $stockQuery = $pdo->prepare("SELECT Amount FROM PRODUCT WHERE ProdID = ?");
                    $stockQuery->execute([$prodID]);
                    $stockResult = $stockQuery->fetch(PDO::FETCH_ASSOC);

                    if ($stockResult && $newQuantity <= $stockResult['Amount']) {
                        // Update session cart
                        $_SESSION['cart'][$prodID] = $newQuantity;

                        // Update product amount in the database
                        $updateStmt = $pdo->prepare("UPDATE PRODUCT SET Amount = ? WHERE ProdID = ?");
                        $updateStmt->execute([$newQuantity, $prodID]);
                    } else {
                        echo "Invalid quantity or not enough stock available.";
                    }
                }

                // Display order summary
                $totalCost = 0;
                $totalItems = 0;

                echo "<div class='box'>";
                echo "<h2>Order Summary</h2>";
                echo "<form method='post' action='cart.php'>";
                echo "<input type='submit' name='clearCart' value='Clear Cart' class='clear-cart-button'>";
                echo "</form>";
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

                        echo "<li>";
                        echo htmlspecialchars($product['Name']) . " - $" . htmlspecialchars($product['Cost']) . " x ";
                        echo "<form method='post' action='cart.php'>";
                        echo "<input type='hidden' name='prodID' value='$prodID'>";
                        echo "<input type='number' name='quantity' value='$quantity' min='1' max='{$product['Amount']}' class='quantity-input' onchange='this.form.submit()'>";
                        echo "</form>";
                        echo "<span class='product-total'>  $" . htmlspecialchars(number_format($itemCost, 2)) . "</span>";
                        echo "</li>";
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
            } else {
                echo "Your cart is empty.";
            }
        } catch (PDOException $ex) {
            echo "Connection to the database failed: " . $ex->getMessage();
        }
        ?>
    </div>
</body>

</html>