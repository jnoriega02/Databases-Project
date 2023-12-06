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

    $cartID = isset($_SESSION['cartID']) ? $_SESSION['cartID'] : md5(uniqid(rand(), true));
    $_SESSION['cartID'] = $cartID;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ProdID']) && isset($_POST['Amount'])) {
        $prodID = $_POST['ProdID'];
        $amountToAdd = $_POST['Amount'];

        $stockQuery = $pdo->prepare("SELECT Amount, Cost FROM PRODUCT WHERE ProdID = ?");
        $stockQuery->execute([$prodID]);
        $stockResult = $stockQuery->fetch(PDO::FETCH_ASSOC);

        if ($stockResult && $stockResult['Amount'] >= $amountToAdd) {
            $newAmount = $stockResult['Amount'] - $amountToAdd;
            $updateStock = $pdo->prepare("UPDATE PRODUCT SET Amount = ? WHERE ProdID = ?");
            $updateStock->execute([$newAmount, $prodID]);

            $totalCost = $stockResult['Cost'] * $amountToAdd;
            if (isset($_SESSION['cart'][$prodID])) {
                $_SESSION['cart'][$prodID]['qty'] += $amountToAdd;
                $_SESSION['cart'][$prodID]['total'] += $totalCost;
            } else {
                $_SESSION['cart'][$prodID] = ['qty' => $amountToAdd, 'total' => $totalCost];
            }

            $pdo->beginTransaction();

            foreach ($_SESSION['cart'] as $id => $item) {
                $checkCart = $pdo->prepare("SELECT * FROM Cart WHERE CartID = ? AND ProdID = ?");
                $checkCart->execute([$cartID, $id]);

                if ($checkCart->rowCount() > 0) {
                    $updateCart = $pdo->prepare("UPDATE Cart SET Amount = ?, Total = ? WHERE CartID = ? AND ProdID = ?");
                    $updateCart->execute([$item['qty'], $item['total'], $cartID, $id]);
                } else {
                    $insertCart = $pdo->prepare("INSERT INTO Cart (CartID, ProdID, Amount, Total) VALUES (?, ?, ?, ?)");
                    $insertCart->execute([$cartID, $id, $item['qty'], $item['total']]);
                }
            }

            $pdo->commit();
            echo "Items successfully added to the Cart table.";

        } else {
            echo "Not enough stock available.";
        }
    }
} catch (PDOException $ex) {
    $pdo->rollback();
    echo "Connection to database failed: " . $ex->getMessage();
}

header('Location: homepage.php');
exit;
?>
