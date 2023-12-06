<?php
session_start()
?>

<!DOCTYPE html>
<html>
<form action="redirect.php" method="post">
    <input type="submit" value="Return to Homepage">
</form>
<head>
	<style>
		.order-confirmation {
    			font-size: 20px;
    			color: green;
		}

		.shipping-info {
    			font-weight: bold;
		}

		.customer-name {
    			text-transform: uppercase;
		}
	</style>
</head>
<body>




<?php
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$db = "z1917876";

try {
    $pdo = new PDO("mysql:host=$serv;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    echo "Connection to database failed: " . $ex->getMessage();
}

function getRandomAssociateEmpID($pdo) {
    $stmt = $pdo->prepare("SELECT EmpID FROM EMPLOYEE WHERE ROLE = 'associate' ORDER BY RAND() LIMIT 1");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result['EmpID'] : null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CardNumber = $_POST['CardNumber'];
    $Name = $_POST['Name'];
    $Address = $_POST['Address'];
    $ZipCode = $_POST['ZipCode'];
    $SecurityCode = $_POST['SecurityCode'];

    try {
        $stmt = $pdo->prepare("INSERT INTO PaymentInfo (CardNumber, Name, Address, ZipCode, SecurityCode) VALUES (:CardNumber, :Name, :Address, :ZipCode, :SecurityCode)");
        $stmt->bindParam(':CardNumber', $CardNumber);
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':Address', $Address);
        $stmt->bindParam(':ZipCode', $ZipCode);
        $stmt->bindParam(':SecurityCode', $SecurityCode);
        $stmt->execute();

        $status = 'Processing';
        $total = $_SESSION['totalCost'] ?? 0;
        $date = date('Y-m-d H:i:s');
        $empID = getRandomAssociateEmpID($pdo);

        $stmt = $pdo->prepare("INSERT INTO ORDERS (Status, ShipAddress, Total, CardNumber, EmpID, Date, CustName) VALUES (:Status, :ShipAddress, :Total, :CardNumber, :EmpID, :Date, :CustName)");
        $stmt->bindParam(':Status', $status);
        $stmt->bindParam(':ShipAddress', $Address);
        $stmt->bindParam(':Total', $total);
        $stmt->bindParam(':CardNumber', $CardNumber);
        $stmt->bindParam(':EmpID', $empID);
        $stmt->bindParam(':Date', $date);
        $stmt->bindParam(':CustName', $Name);
        $stmt->execute();

        $lastOrderId = $pdo->lastInsertId();

        echo "<div class='order-confirmation'>Order placed, thanks!</div><hr>";
        echo "<div class='shipping-info'>Shipping to: <span class='customer-name'>" . htmlspecialchars($Name) . "</span>, " . htmlspecialchars($Address) . "<br>";
        echo "Tracking Number: " . htmlspecialchars($lastOrderId) . "</div>";
        echo "Order Status: Processing<br>";
        echo "Amount Paid: $" . htmlspecialchars($total) . "</div>";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
