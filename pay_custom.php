<?php 

include("inc/client-token.php");

$section = "shirts";
$pageTitle = "DropIn";
include("inc/header.php"); ?>

		<div class="section page">

			<div class="wrapper">

				<div class="shirt-details">
			
					<h1><span class="price">$10</span></h1>
					
						<form id="checkout" action="bt-payment.php" method="post">
                          <input data-braintree-name="number" value="4111111111111111">
                          <input data-braintree-name="expiration_date" value="10/20">
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
				</div>
				
			</div>
		</div>
<?php include("inc/footer.php"); ?>