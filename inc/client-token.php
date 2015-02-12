<?php
  require_once 'vendor/braintree/braintree_php/lib/Braintree.php';
   
  Braintree_Configuration::environment('sandbox');
  Braintree_Configuration::merchantId('pnw68ksp2qb7h39j');
  Braintree_Configuration::publicKey('tyyh5nmq3746bqhj');
  Braintree_Configuration::privateKey('9f094eabd9e0adffec2beaec8ca50142');
   
  $btClientToken = Braintree_ClientToken::generate();
?>
