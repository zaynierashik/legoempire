<?php
    session_start();
    include 'connect.php';

    if (isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }

    $sql = "SELECT COUNT(itemId) AS item_count FROM cart_data WHERE userId = :userId";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(':userId', $userId);
    $stmt ->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $itemCount = $result['item_count'];
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
    <div class="container">
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
                            <a href="cart.php" class="nav-link pe-0">
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
                
                <h4 class="fw-bold">Shopping Cart</h4>
                <p>You currently have <?php echo $itemCount; ?> item(s) in your cart.</p>

                <div class="row">
                    <div class="col">
                        <table class="table">
                            <tr class="text-start">
                                <td class="fw-bold text-center">Item</td>
                                <td class="fw-bold">Lego Name</td>
                                <td class="fw-bold">Unit Price</td>
                                <td class="fw-bold">Quantity</td>
                                <td class="fw-bold">Sub Total</td>
                            </tr>

                            <?php
                                $count = 1;
                                $total = 0;
                                $charge = 5;

                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
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
                                        echo '<td class="ps-4">' . $quantity . '</td>';
                                        echo '<td>' . '$' . $subTotal . '</td>';
                                    echo '</tr>';
            
                                    $count++;
                                }
                            ?>
                        </table>

                        <div class="mt-5">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="userpage.php" class="nav-link btn cart-btn py-2 fw-bold" role="button"><i class="fa-solid fa-chevron-left fa-2xs me-1"></i>Continue Shopping</a>
                                </div>
                                <div class="col text-end">
                                    <button class="btn cart-btn px-5 py-2 fw-bold">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 border-start border-2">
                        <div class="order-summary">
                            <table class="table text-start">
                                <tr>
                                    <td class="fw-bold text-center" colspan="2">Order Summary</td>
                                </tr>
                                <tr>
                                    <td>Order Subtotal</td>
                                    <td><?php echo '$' . $total; ?></td>
                                </tr>
                                <tr>
                                    <td>Delivery Cost</td>
                                    <td><?php echo '$' . $charge; ?></td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Total</td>
                                    <td class="fw-bold"><?php echo '$' . $cartTotal; ?></td>
                                </tr>
                            </table>

                            <div class="mt-5">
                                <a href="checkout.php" class="nav-link btn cart-btn py-2 fw-bold" role="button">Checkout</a>
                            </div>
                        <div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->

        <div class="container mb-1 fixed-bottom" style="height: 6vh; background-color: black; color: white;">
            <div class="w-100 h-100 d-inline-block ps-3 pt-3">
                <div class="row" style="font-size: 0.77rem;">
                    <div class="col-7">
                        <p>© TheLegoEmpire, All rights reserved 2023.</p>
                    </div>
                    
                    <div class="col text-end">
                        <a href="https://www.facebook.com/" target="_blank" style="margin-right: 1vw;"><i class="fa-brands fa-facebook-f" style="color: #ffffff;"></i></a>
                        <a href="https://www.instagram.com/" target="_blank" style="margin-right: 1vw;"><i class="fa-brands fa-instagram" style="color: #ffffff;"></i></a>
                        <a href="https://www.twitter.com/" target="_blank" style="margin-right: 1vw;"><i class="fa-brands fa-x-twitter" style="color: #ffffff;"></i></a>
                        <a href="https://www.youtube.com/" target="_blank" style="margin-right: 1vw;"><i class="fa-brands fa-youtube" style="color: #ffffff;"></i></a>
                    </div>                
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="text-end fixed-top-container" id="top-container">
        <a href="" id="scroll-to-top">
            <i class="fa-solid fa-angle-up" style="background-color: black; color: #ffffff; padding: 13px; font-size: larger;"></i>
        </a>
    </div>

    <script>
        if( window.history.replaceState ){
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <script src="../js/userscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>