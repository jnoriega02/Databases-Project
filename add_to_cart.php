<?php
session_start();

$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";

try {
    $pdo = new PDO("mysql:host=$serv;dbname=$d", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ProdID']) && isset($_POST['Amount'])) {
        $prodID = $_POST['ProdID'];
        $amountToAdd = $_POST['Amount'];
        
        // Fetch current stock
        $stockQuery = $pdo->prepare("SELECT Amount FROM PRODUCT WHERE ProdID = ?");
        $stockQuery->execute([$prodID]);
        $stockResult = $stockQuery->fetch(PDO::FETCH_ASSOC);

        if ($stockResult && $stockResult['Amount'] >= $amountToAdd) {
            // Calculate total cost for the item
            $totalCost = $stockResult['Cost'] * $amountToAdd;

            // Update the stock in the database
            $newAmount = $stockResult['Amount'] - $amountToAdd;
            $updateStock = $pdo->prepare("UPDATE PRODUCT SET Amount = ? WHERE ProdID = ?");
            $updateStock->execute([$newAmount, $prodID]);

            // Update session cart
            if (isset($_SESSION['cart'][$prodID])) {
                $_SESSION['cart'][$prodID] += $amountToAdd;
            } else {
                $_SESSION['cart'][$prodID] = $amountToAdd;
            }

            // Add to cart logic here...
            // Since this is a simple example, the cart logic is omitted for brevity

            // Redirect to homepage without changing the page
            header('Location: homepage.php' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Not enough stock available.";
        }
    }
}
catch(PDOException $ex) {
    echo "Connection to database failed: " . $ex->getMessage();
}
?>
