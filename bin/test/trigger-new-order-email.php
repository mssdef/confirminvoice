<?php

include 'app/Mage.php';
Mage::app('german');

$oid = '17';

$_order = Mage::getModel('sales/order')->load($oid);
$_order->setEmailSent('0');
$_order->save();

$_order->sendNewOrderEmail();

// var_dump($_order);

// Trigger email queue
$a = new Mage_Core_Model_Email_Queue();
$a->send();

echo "\nFinished\n";