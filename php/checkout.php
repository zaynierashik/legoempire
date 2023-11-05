<?php
    session_start();
    include 'connect.php';

    if(isset($_SESSION['userId'])){
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
            <div class="checkout-content p-3">
                <h4 class="fw-bold">Checkout</h4>
                <h6>Payments Options</h6>

                <div class="row row-gap-4 text-center py-3">
                    <div class="col-md-4">
                        <a href="" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-regular fa-credit-card fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">Credit Card</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="offlinepayment.php" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-solid fa-file-invoice fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">Payment Invoice</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">Cash on Delivery</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-brands fa-paypal fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">PayPal</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-brands fa-stripe fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">Stripe</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="" class="nav-link border rounded pt-2">
                            <div>
                                <i class="fa-solid fa-wallet fa-xl" style="color: #000000;"></i>
                                <h6 class="fw-bold mt-2">Wallet</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        
        <div class="container fixed-bottom mb-1 rounded" style="height: 6vh; background-color: black; color: white;">
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
            <i class="fa-solid fa-angle-up rounded" style="background-color: black; color: #ffffff; padding: 13px; font-size: larger;"></i>
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