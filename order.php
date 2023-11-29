<!DOCTYPE html>
<html>
<head>
	<style>

order-confirmation {
    font-size: 20px;
    color: green;
}

.shipping-info {
    font-weight: bold;
}

.customer-name {
    text-transform: uppercase;
}








<?php
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";

	try {
		$sn = "mysql:host=$serv;dbname=$d";
		$p = new PDO($sn, $user, $pass);
		$p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}catch(PDOexception $ex) {
		echo "Connection to database failed: " . $ex->getMessage();
	}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$CardNumber = $_POST['CardNumber'];
	$Name = $_POST['Name'];
	$Address = $_POST['Address'];
	$ZipCode = $_POST['ZipCode'];
	$SecurityCode = $_POST['SecurityCode'];

	try {
        	$stmt = $p->prepare("INSERT INTO PaymentInfo (CardNumber, Name, Address, ZipCode, SecurityCode) VALUES (:CardNumber, :Name, :Address, :ZipCode, :SecurityCode)");
		$stmt->bindParam(':CardNumber', $CardNumber);
        	$stmt->bindParam(':Name', $Name);
        	$stmt->bindParam(':Address', $Address);
        	$stmt->bindParam(':ZipCode', $ZipCode);
        	$stmt->bindParam(':SecurityCode', $SecurityCode);
               	$stmt->execute();


		$status = 'Placed';
		$total = 6;
		$date = date('Y-m-d H:i:s');
		$empID = 6;

	        $stmt = $p->prepare("INSERT INTO ORDERS (Status, ShipAddress, Total, CardNumber, EmpID, Date, CustName) VALUES (:Status, :ShipAddress, :Total, :CardNumber, :EmpID, :Date, :CustName)");
        	$stmt->bindParam(':Status', $status);
        	$stmt->bindParam(':ShipAddress', $Address);
        	$stmt->bindParam(':Total', $total);
        	$stmt->bindParam(':CardNumber', $CardNumber);
       	 	$stmt->bindParam(':EmpID', $empID);
        	$stmt->bindParam(':Date', $date);
        	$stmt->bindParam(':CustName', $Name);
        	$stmt->execute();

        	 $lastOrderId = $p->lastInsertId();


       		echo "Order placed, thanks!<br>";
        	echo "<hr>";
        	echo "Shipping to: $Name, $Address<br>";
        	echo "Order Confirmation Number: $lastOrderId<br>";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

