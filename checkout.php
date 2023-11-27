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
                        display: inline-black;
                        background-color #333;
                        text-decoration: none;
                        font-weight: bold;
                        transition: background-color 0.3s;
                        font-size: 17px;
                        color: #000000;
                        margin-bottom; 10px
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

                input[type="text"], input[type="email"], input[type="search"], input[type="num                                                                                               ber"] {
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
                <a href="return_to_cart_page" class="return-button"> < Return to Cart</a>
        </div>



        <div class="flex-container">
                <div class="left-column">
                        <div class="box">
                                <h2>Items to Ship</h2>
                                <form action="process_shipping.php" method="post">
                                        <label for="address">Enter Your Address:</label><br>
                                        <input type="search" id="address" name="address" requi                                                                                               red><br>
                                        <input type="submit" value="Search">
                                </form>
                        </div>
                        <div class="box payment-box">
                                <h2>Pay $27.50</h2>
                                <div class="payment-option">Credit Card or Debit Card</div>
                                <div class="card-images">
                                                <img src="path_to_visa_logo.png" alt="Visa" st                                                                                               yle="width:50px; height:30px; margin-right: 5px;">
                                                <img src="path_to_mastercard_logo.png" alt="Ma                                                                                               sterCard" style="width:50px; height:30px; margin-right: 5px;">
                                                <img src="path_to_discover_logo.png" alt="Disc                                                                                               over" style="width:50px; height:30px; margin-right: 5px;">
                                                <img src="path_to_amex_logo_png" alt="Amex" st                                                                                               yle="width:50px; height:30px; margin-right: 5px;">
                                </div>
                                <form action="process_payment.php" method="post">
                                        <label for="cardNumber">Card Number:</label><br>
                                        <input type="number" id="cardNumber" name="cardNumber"                                                                                                required><br>

                                        <div class="flex-row">
                                                <div class="flex-column">
                                                        <label for="zipcode">ZipCode:</label><                                                                                               br>
                                                        <input type="number" id="zipcode" name                                                                                               ="zipcode" requied>
                                                </div>

                                                <div class="flex-columm">
                                                        <label for="securityCode">Security Cod                                                                                               e:</label>
                                                        <input type="number" id="securityCode"                                                                                                name="securityCode" required>
                                                </div>
                                        </div>

                                        <label for="cardName">Name on Card:</label><br>
                                        <input type="text" id="cardName" name="cardName" requi                                                                                               red><br>

                                        <label for="address">Address:</label><br>
                                        <input type="text" id="address" name="address" require                                                                                               d><br>

                                        <input type="submit" value="Submit Payment">
                                </form>
                        </div>
                </div>

        <div clas="right-column">
                <div class="box">
                        <h2>Order Summary</h2>
                        <ul class="order-summary">
                                <li><span class="label">Number of Items:</span> <span class="v                                                                                               alue">3</span></li>
                                <li><span class="label">Shipping:</span> <span class="value">$                                                                                               5.00</span></li>
                                <li><span class="label">Estimated Taxes:</span> <span class="v                                                                                               alue">$2.50</span></li>
                                <li><span class="label">Order Total:</span> <span class="value                                                                                               ">$27.50</span></li>
                        </ul>
                </div>
        </div>
</div>


</body>
</html>
