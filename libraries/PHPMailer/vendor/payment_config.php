<?php
require_once 'autoload.php';
require 'stripe-php-master/init.php';
// require_once '../secrets.php';

$_SESSION['public_key'] = 'pk_test_51N5v2kGL55vsTkOsfn6N1pXjwr4BWehLkrGFytJxB3tLEIrDG4yIChXXP7kBTyVpXbx1zkcdW7lilbdENs7Ykp5L000nDyd4ed';
$secret_key = 'sk_test_51N5v2kGL55vsTkOsGRhD5teDRpeF9nxA5IREPtvW3KWSD2I52ZltEoljYgHO15ik8qhFFYLlsyXqdyuAs9ILRXGg00BhxU6Q4l';



\Stripe\Stripe::setApiKey($secret_key);

?>