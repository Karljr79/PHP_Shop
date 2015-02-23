<?php 

include("inc/client-token.php");

$section = "shirts";
$pageTitle = "DropIn";
include("inc/header.php"); ?>

		<div class="section page">

			<div class="wrapper">

				<div class="shirt-details">
			
					<h1><span class="price">$10</span></h1>
					
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
				</div>
				
			</div>
		</div>
<?php include("inc/footer.php"); ?>