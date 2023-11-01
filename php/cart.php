<?php
    session_start();
    include 'connect.php';

    if (isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
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
    <div class="container">

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="homepage.php">
                <img src="../images/logo.png" alt="The Lego Empire" width="175">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container text-center mt-4 pt-2">
        <i class="fa-solid fa-cart-shopping fa-lg" style="color: #000000;"></i>
        <h5 class="fw-bold mt-2">Shopping Cart</h5>

        <div class="mt-3">
        <?php 
            $sql = "SELECT * FROM cart_data WHERE userId = :userId";
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(':userId', $userId);
            $stmt ->execute();
        ?>
            <div class="row">
                <div class="col">
                    <table class='table'>
                    <tr>
                        <td class="fw-bold">S.N.</td>
                        <td class="fw-bold">Lego ID</td>
                        <td class="fw-bold">Lego Name</td>
                        <td class="fw-bold">Unit Price</td>
                        <td class="fw-bold">Quantity</td>
                        <td class="fw-bold">Sub Total</td>
                    </tr>

                    <?php
                        $count = 1;
                        $total = 0;

                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $legoId = $row['legoId'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $quantity = $row['quantity'];

                            $subTotal = $price * $quantity;
                            $total += $subTotal;
    
                            echo '<tr>';
                            echo '<td>' . $count . '</td>';
                            echo '<td>' . $legoId . '</td>';
                            echo '<td class="text-start">' . $title . '</td>';
                            echo '<td>' . '$' . $price . '</td>';
                            echo '<td>' . $quantity . '</td>';
                            echo '<td>' . '$' . $subTotal . '</td>';
                            echo '</tr>';
    
                            $count++;
                        }
                    ?>

                    <tr>
                        <td colspan="4" class="fw-bold">Total</td>
                        <td class="fw-bold" colspan="2"><?php echo '$' . $total; ?></td>
                    </tr>
                    </table>
                </div>

                <div class="col">
                    <div class="card" style="width: 17rem; border-radius: 0">
                        <div class="card-header">
                            <h5 class="fw-bold">Order Summary</h5>
                        </div>

                        <table class='table text-start'>
                        <tr>
                            <td>Order Subtotal</td>
                            <td><?php echo '$' . $subTotal; ?></td>
                        </tr>
                        <tr>
                            <td>Delivery Cost</td>
                            <td>$5</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Total</td>
                            <td class="fw-bold"><?php echo '$' . $total; ?></td>
                        </tr>
                        </table>
                    </div>
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

    <div class="text-end fixed-top-container" id="top-container">
        <a href="" id="scroll-to-top">
            <i class="fa-solid fa-angle-up" style="background-color: black; color: #ffffff; padding: 13px; font-size: larger;"></i>
        </a>
    </div>
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