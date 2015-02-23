<?php 

include("inc/products.php"); 
include("inc/client-token.php");

if (isset($_GET["id"])) {
	$product_id = $_GET["id"];
	if (isset($products[$product_id])) {
		$product = $products[$product_id];
	}
}
if (!isset($product)) {
	header("Location: shirts.php");
	exit();
}

$section = "shirts";
$pageTitle = $product["name"];
include("inc/header.php"); ?>

		<div class="section page">

			<div class="wrapper">

				<div class="breadcrumb"><a href="shirts.php">Shirts</a> &gt; <?php echo $product["name"]; ?></div>

				<div class="shirt-picture">
					<span>
						<img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>">
					</span>
				</div>

				<div class="shirt-details">
			
					<h1><span class="price">$<?php echo $product["price"]; ?></span> <?php echo $product["name"]; ?></h1>
					
						<form id="checkout" method="post" action="bt-payment.php">
						  <p><div id="dropin"></div></p>
						  <p><input type="submit" value="Pay"></p>
						</form>
						<script src='https://js.braintreegateway.com/v2/braintree.js'></script>
						<script type="text/javascript">
						  braintree.setup(
							'<?php echo $btClientToken; ?>', 
							'dropin', {
							  container: 'dropin'
							 });
						  </script>
						  
					<h1><span class="price">PayPal Only</h1>
					
						<form id="checkout" method="post" action="bt-payment.php">
						  <p><div id="paypal-button"></div></p>
						  <p><input type="submit" value="Pay"></p>
						</form>
						<script src='https://js.braintreegateway.com/v2/braintree.js'></script>
						<script type="text/javascript">
						  braintree.setup(
							'<?php echo $btClientToken; ?>', 
							'paypal', {
							  container: 'paypal-button',
							  enableShippingAddress: true,
							  onSuccess: function (email, nonce, shippingAddress) {
							      document.forms["checkout"].elements["shippingName"].value = shippingAddress.recipient_name;
							      document.forms["checkout"].elements["streetAddress"].value = shippingAddress.street_address;
							      document.forms["checkout"].elements["postalCode"].value = shippingAddress.postal_code;
							      document.forms["checkout"].elements["countryCode"].value = shippingAddress.country_code_alpha_2;
                                }
							 }
							 );
						  </script>
						  
						  <h1><span class="price">Custom</h1>
					
							<form id="checkout" action="bt-payment.php" method="post">
	                          <input data-braintree-name="number" value="4111111111111111">
	                          <input data-braintree-name="expiration_date" value="10/20">
	                          <input data-braintree-name="cvv" value="100">
	                          <input data-braintree-name="postal_code" value="94107">
	                          <input type="submit" id="submit" value="Pay">
	                        </form>
							<script src='https://js.braintreegateway.com/v2/braintree.js'></script>
							<script type="text/javascript">
							  braintree.setup(
								'<?php echo $btClientToken; ?>', 
								'custom', {
								  id: 'checkout'
								 });
							  </script>
						  
					<p class="note-designer">* All shirts are designed by Karl.</p>
				</div>
				
			</div>
		</div>
<?php include("inc/footer.php"); ?>