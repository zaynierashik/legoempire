<?php
    session_start();

    $cartTotal = 0;
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $product) {
            $price = $product['price'];
            $quantity = $product['quantity'];
            $totalPrice = $price * $quantity;
            $cartTotal += $totalPrice;
        }
    }

    $_SESSION['cartTotal'] = $cartTotal;
?>