<?php include("inc/products.php"); ?><?php 
$pageTitle = "Karl's Full Catalog of Shirts";
$section = "shirts";
include('inc/header.php'); ?>

    <div class="section shirts page">
        
        <div class="wrapper">
            
            <h1>Karl&rsquo;s full catalog of shirts</h1> 
            
            <ul class="products">
                <?php foreach($products as $product_id => $product) { 
							echo get_list_view_html($product_id, $product);
						}
				?>
            </ul>
            
        </div>
        
    </div>
    
<?php include('inc/footer.php'); ?>