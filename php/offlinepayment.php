<?php
    session_start();
    include 'connect.php';

    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
    }

    $sql = "SELECT * FROM cart_data WHERE userId = :userId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();

    $cartItems = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $cartItems[] = array(
            'legoId' => $row['legoId'],
            'quantity' => $row['quantity'],
        );
    }

    function generateInvoiceNumber($length = 7) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $invoiceNumber = '';
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $invoiceNumber .= $characters[random_int(0, $max)];
        }

        return $invoiceNumber;
    }
    $invoiceNumber = generateInvoiceNumber();

    foreach ($cartItems as $item) {
        $legoId = $item['legoId'];
        $quantity = $item['quantity'];

        $sql = "INSERT INTO pending_data (userId, legoId, quantity, invoiceNumber) VALUES (:userId, :legoId, :quantity, :invoiceNumber)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':legoId', $legoId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':invoiceNumber', $invoiceNumber);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $sql = "DELETE FROM cart_data WHERE userId = :userId";
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(':userId', $userId);
            $stmt ->execute();
        }
    }

    header('location: cart.php');
?>