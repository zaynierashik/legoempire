<?php
    session_start();
    include 'connect.php';

    $cartTotal = 0;

    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }

    $sql = "SELECT COUNT(itemId) AS item_count FROM cart_data WHERE userId = :userId";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(':userId', $userId);
    $stmt ->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $itemCount = $result['item_count'];

    if(isset($_POST['delete']) && isset($_POST['legoId'])){
        $legoId = $_POST['legoId'];

        $stmt = $conn->prepare("DELETE FROM cart_data WHERE userId = :userId AND legoId = :legoId");
        $stmt ->bindParam(':userId', $userId);
        $stmt ->bindParam(':legoId', $legoId);
        $stmt ->execute();

        header('location: cart.php');
        exit();
    }

    if (isset($_POST['update-cart'])) {
        if (isset($_POST['quantity']) && is_array($_POST['quantity'])) {
            $quantities = $_POST['quantity'];
    
            foreach ($quantities as $legoId => $newQuantity) {
                $legoId = intval($legoId);
                $newQuantity = intval($newQuantity);
    
                if($newQuantity <= 0){
                    $stmt = $conn->prepare("DELETE FROM cart_data WHERE userId = :userId AND legoId = :legoId");
                    $stmt ->bindParam(':userId', $userId);
                    $stmt ->bindParam(':legoId', $legoId);
                    $stmt ->execute();
                }else{
                    $stmt = $conn->prepare("UPDATE cart_data SET quantity = :quantity WHERE userId = :userId AND legoId = :legoId");
                    $stmt ->bindParam(':userId', $userId);
                    $stmt ->bindParam(':legoId', $legoId);
                    $stmt ->bindParam(':quantity', $newQuantity);
                    $stmt ->execute();
                }
            }
    
            header('location: cart.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Lego Empire</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/louis-george-cafe" rel="stylesheet">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
    <div class="cart-container">
    <div class="container" style="box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25);">
        <?php
            if(isset($_SESSION['username'])){
                echo '<nav class="navbar navbar-expand-lg sticky-top">
                <div class="container">
                    <a class="navbar-brand" href="homepage.php">
                        <img src="../images/logo.png" alt="The Lego Empire" width="175">
                    </a>
        
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link pe-1">
                                <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size: 1.1rem;"></i>
                            </a>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>';
            }else{
                echo '<nav class="navbar navbar-expand-lg">
                <div class="container">
                    <a class="navbar-brand" href="homepage.php">
                        <img src="../images/logo.png" alt="The Lego Empire" width="175">
                    </a>
        
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-4">
                            <a href="cart.php" class="nav-link pe-0">
                                <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size: 1.1rem;"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="login.php" class="nav-link btn px-4 login-btn" role="button">LOGIN</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </nav>';
            }
        ?>

        <div class="mt-5">
            <div class="cart-content p-3">
                <?php 
                    $sql = "SELECT * FROM cart_data WHERE userId = :userId";
                    $stmt = $conn->prepare($sql);
                    $stmt ->bindParam(':userId', $userId);
                    $stmt ->execute();
                ?>
                
                <h4 class="fw-bold">My Orders</h4>
                <p>You currently have <?php echo $itemCount; ?> item(s) in your cart.</p>

                <div class="row">
                    <div class="col">
                        <table class="table">
                            <tr>
                                <td class="fw-bold text-center">Item</td>
                                <td class="fw-bold">Lego Name</td>
                                <td class="fw-bold">Unit Price</td>
                                <td class="fw-bold text-center">Quantity</td>
                                <td class="fw-bold">Sub Total</td>
                                <td></td>
                            </tr>

                            <?php
                                $count = 1;
                                $total = 0;
                                $charge = 5;

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $legoId = $row['legoId'];
                                    $title = $row['title'];
                                    $price = $row['price'];
                                    $quantity = $row['quantity'];

                                    $subTotal = $price * $quantity;
                                    $total += $subTotal;
                                    $cartTotal = $total + $charge;
            
                                    echo '<tr>';
                                        echo '<td class="text-center">' . $count . '</td>';
                                        echo '<td>' . $title . '</td>';
                                        echo '<td>' . '$' . $price . '</td>';
                                        echo '<td class="text-center quantity-change px-5"><input type="number" class="form-control text-center p-0" name="quantity[]" value="'. $quantity .'"></td>';
                                        echo '<td>' . '$' . $subTotal . '</td>';
                                        echo '<td>
                                            <form method="POST" action="">
                                                <input type="hidden" name="legoId" value="' . $legoId . '">
                                                <i class="fa-solid fa-trash" style="color: #cfcfcf; cursor: pointer" id="showDeleteConfirmation" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"></i>
                                            <!-- </form> -->
                                        </td>';
                                    echo '</tr>';
            
                                    $count++;
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
    <script src="../js/userscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>