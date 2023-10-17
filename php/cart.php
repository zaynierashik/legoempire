<?php
    session_start();
    include 'connect.php';
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
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body>
    <div class="container">

    <div class="background-img">
    <nav class="navbar navbar-expand-lg">
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
                        <a href="login.php" class="nav-link btn px-4 login-btn" role="button">LOGIN</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="background-container">
        <div class="backgroundImgWrapper">
            <div class="text-overlay"></div>
        </div>
    </div>

    </div>

    <div class="container text-center mt-4 pt-2">
        <i class="fa-solid fa-cart-shopping fa-xl" style="color: #000000;"></i>
        <div class="mt-3">
            <h5 class="fw-bold">You don't have anything in your cart.</h5>
            <p>Login to see your cart and get shopping!</p>
        </div>
    </div>

    <div class="container sale-container mt-5">
        <h3 class="fw-bold">Recommended For You</h3>
        <div class="slider">
            <div class="slider-container">
            <?php
                $sql = "SELECT * FROM lego_data ORDER BY RAND() LIMIT 8";
                $stmt = $conn->query($sql);
                if($stmt->rowCount() > 0){
                    while($row = $stmt->fetch()){
                        echo '<div class="card slider-card" style="width: 18.75rem; border-radius: 0; margin-left: 0.85vw; margin-right: 1vw;">
                            <a href="legodetails.php?legoId=' .$row['legoId']. '" class="nav-link">
                                <img src="../lego-images/' .$row['main-image']. '" class="card-img-top my-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-6">' .$row['title']. '</h5>
                            </a>
                                    <div>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                    </div>
                                    <p class="card-text mt-1"><span class="text-decoration-line-through">$7.00</span> <span class="fw-bold">$' .$row['price']. '</span></p>
                                    <a class="nav-link btn cart-btn mt-1 py-2 fw-bold" role="button">Add to Cart</a>
                                </div>
                            </div>';
                    }
                }else{
                    echo "<div class='container'>No Products Found.</div>";
                }
            ?>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <div class="container mt-3" style="height: 6vh; background-color: black; color: white;">
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

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function(){
            const exploreDeals = document.querySelector("#exploredeals");
            const successToast = new bootstrap.Toast(document.getElementById("userSuccessToast"));

            exploreDeals.addEventListener("click", function(event){
                event.preventDefault();
                successToast.show();
            });
        });
    </script> -->
    
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>