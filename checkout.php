<!DOCTYPE html>
<html>
<head>
        <title>Shipping and Payment Page</title>
        <style>
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

                .order-summary {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                }

                .order-summary li {
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 10px;
                }

                .label {
                        text-align: left;
                }



                .value {
                        text-align: right;
                }



                .payment-box{
                        margin-top: 20px;
                }



                .payment-option{
                        font-size: 16px;
                        margin-bottom: 10px;
                }



                .card-images{
                        marign-bottom: 15px;
                }



                .flex-container{
                        display: flex;
                        justify-content: center;
                        margin-width: 660px;
                        margin: auto;
                }

                .left-columm{
                        display: flex;
                        flex-direction: column;
                }

                .right-column{
                        display: flex;
                        flex-direction: column;
                }

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

                .flex-row{
                        display: flex;
                        justify-content: space-between;
                        margin-bottom: 10px;
                }

                .flex-column{
                        flex: 1;
                        margin-right: 10px;
                }

                input[type="text"], input[type="email"], input[type="search"], input[type="number"] {
                        width: 100%;
                        padding: 8px;
                        margin: 5px 0;
                        box-sizing: border-box;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                }

        </style>
</head>
<body>

        <div class="header">
                Store Name Checkout

        </div>



        <div class="return-cart-button">
                <a href="cart.php" class="return-button"> < Return to Cart</a>
        </div>



        <div class="flex-container">
                <div class="left-column">
                        <div class="box">
                                <h2>Items to Ship</h2>
                                <form action="process_shipping.php" method="post">
                                        <label for="address">Enter Your Address:</label><br>
                                        <input type="search" id="address" name="address" required><br>
                                        <input type="submit" value="Search">
                                </form>
                        </div>
                        <div class="box payment-box">
                                <h2>Pay $27.50</h2>
                                <div class="payment-option">Credit Card or Debit Card</div>
                                <div class="card-images">
                                                <img src="data:image/png;base64,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" alt="Visa" style="width:50px; height:30px; margin-right: 5px;">
                                                <img src="data:image/png;base64,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" alt="MasterCard" style="width:50px; height:30px; margin-right: 5px;">
                                                <img src="data:image/png;base64,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" alt="Discover" style="width:50px; height:30px; margin-right: 5px;">
                                                <img src="data:image/png;base64,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" alt="Amex" style="width:50px; height:30px; margin-right: 5px;">
                                </div>
                                <form action="order.php" method="post">
                                        <label for="CardNumber">Card Number:</label><br>
                                        <input type="number" id="CardNumber" name="CardNumber" required><br>

                                        <div class="flex-row">
                                                <div class="flex-column">
                                                        <label for="ZipCode">ZipCode:</label><br>
                                                        <input type="number" id="ZipCode" name="ZipCode" required>
                                                </div>

                                                <div class="flex-columm">
                                                        <label for="SecurityCode">Security Code:</label>
                                                        <input type="number" id="SecurityCode" name="SecurityCode" required>
                                                </div>
                                        </div>

                                        <label for="Name">Name on Card:</label><br>
                                        <input type="text" id="Name" name="Name" required><br>

                                        <label for="Address">Address:</label><br>
                                        <input type="text" id="Address" name="Address" required><br>

                                        <input type="submit" value="Submit Payment">
                                </form>
                        </div>
                </div>

        <div clas="right-column">
                <div class="box">
                        <h2>Order Summary</h2>
                        <ul class="order-summary">
                                <li><span class="label">Number of Items:</span> <span class="value">3</span></li>
                                <li><span class="label">Shipping:</span> <span class="value">$5.00</span></li>
                                <li><span class="label">Estimated Taxes:</span> <span class="value">$2.50</span></li>
                                <li><span class="label">Order Total:</span> <span class="value">$27.50</span></li>
                        </ul>
                </div>
        </div>
</div>


</body>
</html>

<?php

//connection established to our databases (tables) in mariaDB
$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";

try {
	$sn = "mysql:host=$serv;dbname=$d";
	$p = new PDO($sn, $user, $pass);
	$p->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOexception $ex) { // handle that exception
	echo "Connection to database failed: " . $ex->getMessage();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $ZipCode = $_POST['ZipCode'];
    $CardNumber = $_POST['CardNumber'];
    $SecurityOode = $_POST['SecurityCode'];
    $Address = $_POST['Address'];

    try{
        $stmt = $p->prepare("INSERT INTO PaymentInfo (Name, ZipCode, CardNumber, SecurityCode, Address) VALUES (:Name, :ZipCode, :CardNumber, :SecurityCode, :Address)");
        $stmt->bindParam(':Name', $Name);
        $stmt->bindParam(':ZipCode', $ZipCode);
        $stmt->bindParam(':CardNumber', $CardNumber);
        $stmt->bindParam(':SecurityCode', $SecurityCode);
        $stmt->bindParam(':Address', $Address);

        $stmt->execute();

        echo "Payment info inserted successfully.";
    } catch(PDOException $e) {
        echo "Error inserting payment info: " . $e->getMessage();
    }
}

?>
