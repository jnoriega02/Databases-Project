
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clothing Store</title>
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

	.cart-button img
	{
		max-width: 50px;
		height: auto;
        }
	
	.button-container img
	{
		max-width: 50px;
		height: auto;
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
		
	.cart-button
	{
		background: none;
		border: none;
		cursor: pointer;
		padding: 0;
		overflow: hidden;
		outline: none;
	}

	.products-container
	{
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 20px; 
		margin: 0 auto; 
		padding: 10px;
		max-width: 1200px;
	}

	.product-box
	{
		border: 1px solid #ddd;
		padding: 16px;
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-between;
		background-color: #fff;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
		transition: box-shadow 0.3s ease-in-out;
	}

	.product-box img
	{
		max-width: 100%; 
		height: auto; 
		margin-bottom: 8px; 
	}

	.product-box:hover 
	{
		box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
	}

	.product-details
	{
		display: flex;
    		flex-direction: column;
    		justify-content: space-around; 
    		align-items: center; 
    		height: 100px; 
        }

	.product-details h2, .product-details p
	{
		margin: 4px 0;
	}

	.product-box form
	{
		margin-top: 15px;
	}

	</style>
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



<?php

//session_start();

$user = "z1917876";
$pass = "2002Dec08";
$serv = "courses";
$d = "z1917876";
        
$productImages = array
(
	"Cozy Sweater" => "https://m.media-amazon.com/images/I/71OUch0LLPL._AC_SX679_.jpg",

	"Cozy Hat" => "https://cdni.llbean.net/is/image/wim/507866_1207_41?hei=1095&wid=950
	&resMode=sharp2&defaultImage=llbprod/507866_1207_41",

	"Jeans" => "https://img.freepik.com/premium-photo/female-jeans-mom-fit-isolated-white
	-background-jeans-with-high-waist-casual-style_125869-2331.jpg",

	"Converse" => "https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/-
	/Sites-cnv-master-catalog/default/dw34a014b4/images/a_107/162050C_A_107X1.jpg?sw=964",

	"Cream Sweater" => "https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1691181329
	-71q57DvX2RL.jpg?crop=1.00xw:0.814xh;0,0.104xh&resize=980:*",

	"Boots" => "https://media.kohlsimg.com/is/image/kohls/5850895_Black_Fabric?wid=805&hei=805&op_sharpen=1",

	"Sweatshirt" => "https://jiffyshirts.imgix.net/f9447d7b5ba227.png?ixlib=rb-0.3.5&auto
	=format&fit=fill&fill=solid&trim-color=FFFFFF&trim=color&trim-tol=8&w=307&h=480&q=80&dpr=2",

	"Beanie" => "https://m.media-amazon.com/images/I/71iHxbJXPBL._AC_SX679_.jpg",

	"Mushroom Sweater" => "https://m.media-amazon.com/images/I/61ByLPJnfyL.jpg",

	"Platform Converse" => "https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/
	-/Sites-cnv-master-catalog/default/dw1fc8d527/images/a_08/560845C_A_08X1.jpg?sw=406",

	"Skirt" => "https://img1.shopcider.com/product/1694662290000-tTBidp.jpg?x-oss-process=image
	/resize,w_1050,m_lfit/quality,Q_80/interlace,1",

	"Corduroy Pants" => "https://img1.shopcider.com/product/1670824945000-pHSAya.jpg?x-oss
	-process=image/resize,w_1050,m_lfit/quality,Q_80/interlace,1",

	"Black Turtleneck" => "https://static.halsbrook.com/media/catalog/product/majestic-blackmodalturtlenecktop-1413386443-product.jpg",

	"Brown Turtleneck"=> "https://cdni.llbean.net/is/image/wim/521085_46577_41?hei=804&wid
	=700&resMode=sharp2&defaultImage=llbprod/521085_46577_41",

	"Flannel Jacket"=> "https://www.legendarywhitetails.com/on/demandware.static/-/Sites
	-master-us/default/dwd621b640/images/6624_RGRP_MAIN_FRONT.jpg",

	"Mountain Jacket"=> "https://www.marinelayer.com/cdn/shop/files/M_H1_Archive_Andes_Sherpa
	_Pullover_Mountain_Scene_4230103092265-Final-Web_700x.jpg?v=1697148787",

	"Green Flannel"=> "https://www.legendarywhitetails.com/on/demandware.static/-/Sites-master
	-us/default/dw5faed3bc/images/6170_MVBU_MAIN_FRONT.jpg",

	"Winter Sweater"=> "https://img.kwcdn.com/garner-api/transfer/2023-10-13/037fed16b064005058647a746be3f868.jpg?imageView2/2/w/800/q/70",

	"Cozy Socks"=> "https://cdni.llbean.net/is/image/wim/206990_2089_41?hei=804&wid=700&resMode=sharp2&defaultImage=llbprod/206990_2089_41",

	"Winter Socks"=> "https://oldnavy.gap.com/webcontent/0054/226/614/cn54226614.jpg"
);
    

    $user = "z1917876";
    $pass = "2002Dec08";
    $serv = "courses";
    $d = "z1917876";

    try {
        $pdo = new PDO("mysql:host=$serv;dbname=$d", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ProdID']) && isset($_POST['Amount'])) {
            $prodID = $_POST['ProdID'];
            $amount = $_POST['Amount'];

            $stmt = $pdo->prepare("SELECT Cost, Amount FROM PRODUCT WHERE ProdID = ?");
            $stmt->execute([$prodID]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($product && $product['Amount'] >= $amount) {
                if (isset($_SESSION['cart'][$prodID])) {
                    $_SESSION['cart'][$prodID] += $amount;
                } else {
                    $_SESSION['cart'][$prodID] = $amount;
                }

                $newAmount = $product['Amount'] - $amount;
                $updateStmt = $pdo->prepare("UPDATE PRODUCT SET Amount = ? WHERE ProdID = ?");
                $updateStmt->execute([$newAmount, $prodID]);
            }
        }

        echo "<div class='products-container'>";
        $stmt = $pdo->query("SELECT * FROM PRODUCT");

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productName = $row['Name'];
            $productCost = $row['Cost'];
            $productAmount = $row['Amount'];
            $productID = $row['ProdID'];
            $imageUrl = $productImages[$productName] ?? 'default_image.jpg';

            echo "<div class='product-box'>";
            echo "<img src='" . htmlspecialchars($imageUrl) . "' alt='" . htmlspecialchars($productName) . "'>";
            echo "<div class='product-details'>";
            echo "<h2>" . htmlspecialchars($productName) . ": $" . htmlspecialchars($productCost) . "</h2>";
            echo "<p>In Stock: " . htmlspecialchars($productAmount) . "</p>";

            echo "<form action='homepage.php' method='post'>";
            echo "<input type='hidden' name='ProdID' value='" . htmlspecialchars($productID) . "'>";
            echo "<label for='quantity" . htmlspecialchars($productID) . "'>Quantity:</label>";
            echo "<select name='Amount' id='quantity" . htmlspecialchars($productID) . "'>";
            for ($i = 1; $i <= $productAmount; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            echo "</select>";
            echo "<button type='submit'>Add to Cart</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
        }
        echo "</div>";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</body>
</html>
