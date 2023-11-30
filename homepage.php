<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Clothing Store</title>
	<style>

	body 
	{
		font-family: Arial, sans-serif;
		margin: 0;
		padding: 0;
	}

	header
	{
		background-color: #fff;
            	padding: 10px;
            	display: flex;
            	justify-content: space-between;
            	align-items: center;
	}

	.button-container
	{
            	display: flex;
            	gap: 10px;
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

	.button-container img
	{
            	max-width: 50px;
            	height: auto;
	}

	.website-name
	{
            	flex-grow: 1;
            	text-align: left;
            	font-size: 30px;
            	font-weight: bold;
        }

	main
	{
		padding: 20px;
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

	.cart-button img
	{
		max-width: 50px;
            	height: auto;
        }

	.product-grid
	{
		display: grid;
		grid-template-columns: repeat(4, 1fr);
		gap: 20px;
	}

	.product
	{
		border: 1px solid #ddd;
		padding: 10px;
		text-align: center;
	}

	.product img
	{
		max-width: 100%;
		height: auto;
		margin-bottom: 10px;
	}

	.add-to-cart-button
	{
		background-color: #4CAF50;
		color: white;
		padding: 8px 16px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		font-size: 14px;
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

	<main>

	<div class="product-grid">

		<div class="product">
    			<a href="product1.php">
        			<img src="https://m.media-amazon.com/images/I/71OUch0LLPL._AC_SX679_.jpg" alt="Cozy Sweater">
			</a>

    			<div class="product-details">
        		<h2>Cozy Sweater: $29.99</h2>
        		<p>In Stock: </p>
        		<label for="quantity-product-1">Quantity:</label>
			<select id="quantity-product-1" class="quantity-dropdown">

            		<?php for ($i = 1; $i <= 100; $i++) { ?>
                		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            		<?php } ?>

        		</select>
    			</div>
    			<button class="add-to-cart-button" onclick="addToCart('product1')">Add to Cart</button>
		</div>
            
		<div class="product">
			<a href="product2.php">
				<img src="https://cdni.llbean.net/is/image/wim/507866_1207_41?hei=1095&wid
				=950&resMode=sharp2&defaultImage=llbprod/507866_1207_41" alt="Cozy Hat">
			</a>

			<div class="product-details">
			<h2>Cozy Hat: $9.99</h2>
			<p>In Stock: </p>
			<label for="quantity-product-1">Quantity:</label>
			<select id="quantity-product-1" class="quantity-dropdown">

            		<?php for ($i = 1; $i <= 100; $i++) { ?>
                		<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            		<?php } ?>

        		</select>
    			</div>
    			<button class="add-to-cart-button" onclick="addToCart('product2')">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://img.freepik.com/premium-photo/female-jeans-mom-fit-isolated
			-white-background-jeans-with-high-waist-casual-style_125869-2331.jpg" alt="Jeans">
			<h2>Jeans: $49.99</h2>
			<p>In Stock: </p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static
			/-/Sites-cnv-master-catalog/default/dw34a014b4/images/a_107/162050C_A_107X1.jpg?sw=964" alt="Converse">
			<h2>Converse: $59.99</h2>
			<p>In Stock: </p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://hips.hearstapps.com/vader-prod.s3.amazonaws.com/1691181329
			-71q57DvX2RL.jpg?crop=1.00xw:0.814xh;0,0.104xh&resize=980:*" alt="Cream Sweater">
			<h2>Cream Sweater: $29.99</h2>
			<p>In Stock: 15</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://media.kohlsimg.com/is/image/kohls/5850895_Black_Fabric?wid=805&hei=805&op_sharpen=1" alt="Boots">
			<h2>Boots: $40.99</h2>
			<p>In Stock: </p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://jiffyshirts.imgix.net/f9447d7b5ba227.png?ixlib=rb-0.3.5&auto=format&fit=
			fill&fill=solid&trim-color=FFFFFF&trim=color&trim-tol=8&w=307&h=480&q=80&dpr=2" alt="Sweatshirt">
			<h2>Sweatshirt: $25.99 </h2>
			<p>In Stock: </p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://m.media-amazon.com/images/I/71iHxbJXPBL._AC_SX679_.jpg" alt="Beanie">
			<h2>Beanie: $12.99</h2>
			<p>In Stock: </p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://m.media-amazon.com/images/I/61ByLPJnfyL.jpg" alt="Mushroom Sweater">
			<h2>Mushroom Sweater: $25.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://www.converse.com/dw/image/v2/BCZC_PRD/on/demandware.static/-/Sites-cnv-master
			-catalog/default/dw1fc8d527/images/a_08/560845C_A_08X1.jpg?sw=406" alt="Platform Converse">
			<h2>Platform Converse: $79.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://m.media-amazon.com/images/I/71kK6NxG-rL._AC_SY741_.jpg" alt="Skirt">
			<h2>Skirt: $14.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://img1.shopcider.com/product/1662119464000-Sdfhkn.jpg?x-oss
			-process=image/resize,w_350,m_lfit/quality,Q_80/interlace,1" alt="Corduroy Pants">
			<h2>Corduroy Pants: $39.99</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>
		
		<div class="product">
			<img src="https://static.halsbrook.com/media/catalog/product/majestic-blackmodalturtlenecktop-1413386443-product.jpg"
			 alt="Black Turtleneck">
			<h2>Black Turtleneck: $14.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://www.alexmill.com/cdn/shop/files/WW206-3171-WALNUT-25382_1440x1920
			_crop_center.jpg?v=1691089211" alt="Brown Turtleneck">
			<h2>Brown Turtleneck: $19.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://www.legendarywhitetails.com/on/demandware.static/-/Sites-master
			-us/default/dwd621b640/images/6624_RGRP_MAIN_FRONT.jpg" alt="Flannel Jacket">
			<h2>Flannel Jacket: $39.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://www.marinelayer.com/cdn/shop/files/M_H1_Archive_Andes_Sherpa
			_Pullover_Mountain_Scene_4230103092265-Final-Web_700x.jpg?v=1697148787" alt="Mountain Jacket">
			<h2>Mountain Jacket: $29.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://www.legendarywhitetails.com/on/demandware.static/-/Sites-master
			-us/default/dw5faed3bc/images/6170_MVBU_MAIN_FRONT.jpg" alt="Green Flannel">
			<h2>Green Flannel: $19.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://cdnimg.emmiol.com/E/202211/img_original-VCK0192TO-210206123.jpg" alt="Winter Sweater">
			<h2>Winter Sweater: $49.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://cdni.llbean.net/is/image/wim/206990_2089_41?hei=804&wid=
			700&resMode=sharp2&defaultImage=llbprod/206990_2089_41" alt="Cozy Socks">
			<h2>Cozy Socks: $9.99</h2>
			<p>In Stock: </p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://www.bostongeneralstore.com/cdn/shop/products/mens
			-wool-fair-isle-socks-207953_1200x.jpg?v=1696872294" alt="Winter Socks">
			<h2>Winter Socks: $11.99</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>
	</div>
	</main>
</body>
</html>

