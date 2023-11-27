<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Website Name</title>
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

		<div class="website-name">Website Name</div>

		<div class="button-container">
		<button>
			<img src="https://t3.ftcdn.net/jpg/02/59/39/46/360_F_259394679_GGA8JJAEkukYJL9XXFH2JoC3nMguBPNH.jpg" alt="Sign In">
		</button>

		<button class="cart-button">
			<img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Shopping-cart-transparent-icon.png" alt="Shopping Cart">
		</button>
		</div>

	</header>

	<main>

	<div class="product-grid">
            
		<div class="product">
			<img src="https://m.media-amazon.com/images/I/71OUch0LLPL._AC_SX679_.jpg" alt="Cozy Sweater">
			<h2>Cozy Sweater: $25.99</h2>
			<p>In Stock: 30</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>
            
		<div class="product">
			<img src="https://cdni.llbean.net/is/image/wim/507866_1207_41?hei=1095&wid
			=950&resMode=sharp2&defaultImage=llbprod/507866_1207_41" alt="Cozy Hat">
			<h2>Cozy Hat: $9.99</h2>
			<p>In Stock: 15</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://oldnavy.gap.com/webcontent/0052/403/869/cn52403869.jpg" alt="Jeans: $49.99">
			<h2>Jeans: $49.99</h2>
			<p>In Stock: 20</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 4">
			<h2>Product 4</h2>
			<p>In Stock: 0</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 5">
			<h2>Product 5</h2>
			<p>In Stock: 0</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 6">
			<h2>Product 6</h2>
			<p>In Stock: 0</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 7">
			<h2>Product 7</h2>
			<p>In Stock: 0</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 8">
			<h2>Product 8</h2>
			<p>In Stock: 0</p>
			<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 9">
			<h2>Product 9</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 10">
			<h2>Product 10</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 11">
			<h2>Product 11</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 12">
			<h2>Product 12</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>
		
		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 13">
			<h2>Product 13</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 14">
			<h2>Product 14</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 15">
			<h2>Product 15</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 16">
			<h2>Product 16</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 17">
			<h2>Product 17</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 18">
			<h2>Product 18</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 19">
			<h2>Product 19</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
	    	</div>

		<div class="product">
			<img src="https://st.depositphotos.com/2934765/53192/v/450/depositphotos_531920820
			-stock-illustration-photo-available-vector-icon-default.jpg" alt="Product 20">
			<h2>Product 20</h2>
			<p>In Stock: 0</p>
                	<button class="add-to-cart-button">Add to Cart</button>
		</div>
	</div>
	</main>
</body>
</html>
