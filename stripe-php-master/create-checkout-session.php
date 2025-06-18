<?php
require 'config.php';
require_once __DIR__ . '/stripe-php-17.1.1/init.php';
// Path to the SDK folder you just extracted

\Stripe\Stripe::setApiKey($secretkey);

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'inr',
            'product_data' => [
                'name' => 'ISKCON Donation',
            ],
            'unit_amount' => 5000, // 500 paisa = ₹5
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://yourdomain.com/success.php',
    
]);

header("Location: " . $session->url);
exit();
