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
						  
						  <form id="checkout" method="post" action="bt-payment.php">
						  <p><div id="paypal-button"></div></p>
						  <p><input type="submit" value="Pay"></p>
						</form>
						<script src='https://js.braintreegateway.com/v2/braintree.js'></script>
						<script type="text/javascript">
						  braintree.setup(
							'<?php echo $btClientToken; ?>', 
							'paypal', {
							  container: 'paypal-button'
							 });
						  </script>
					<p class="note-designer">* All shirts are designed by Karl.</p>
				</div>
				
			</div>
		</div>
<?php include("inc/footer.php"); ?>