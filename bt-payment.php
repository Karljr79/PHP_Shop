<?php
$section = "payment";
$pageTitle = "payment";
include("inc/header.php");
include("inc/client-token.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nonce = $_POST['payment_method_nonce'];
    }
    else {
        echo '<p>No Nonce Was Received</p>';
    }
  
      if (isset($nonce)) {
        $result = Braintree_Transaction::sale(array(
          'orderId' => "xyz",
          'amount' => 25.00,
          'paymentMethodNonce' => $nonce,
          'options' => array(
            'submitForSettlement' => true
          )
        ));
      
        if ($result->success) {
          $txn = $result->transaction;
          
          echo '<div class="section shirts latest">';
			    echo '<div class="wrapper">';
				  echo '<h2>Transaction Details</h2>';
          echo '<p>For your order ID <code>' . $orderId . '</code>, ' . 
               'the Braintree Sandbox transaction ID is <code>' . $txn->id . '</code>.</p>';
          echo '</div>';
          echo '</div>';
          
        }
        else {
            echo var_dump($result);
        }
      }
?>
