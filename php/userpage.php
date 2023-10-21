<?php
    include 'connect.php';
    include 'carttotal.php'; 

    if(!isset($_SESSION['username'])){
        header('location: homepage.php');
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
    <div class="container">
    
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="userpage.php">
                <img src="../images/logo.png" alt="The Lego Empire" width="175">
            </a>
    
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    <li class="nav-item search-wrapper me-2">
                        <form action="datasearch.php" method="POST" id="search" class="d-flex" role="search">
                            <i class="fa fa-search"></i>
                            <input type="search" name="search" class="form-control d-flex search-bar" placeholder="Search..." aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link"><i class="fa-solid fa-cart-shopping" style="color: #000000;"></i><span class="fw-semibold" style="color: black;"> [$<?php echo $_SESSION["cartTotal"] ?>]</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link pe-0 fw-semibold" style="color: black;" aria-current="page">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="background-img">
        <div class="background-container">
            <div class="backgroundImgWrapper">
                <div class="text-overlay"></div>
            </div>
        </div>
    </div>

    <div class="container base-category mt-4 mb-3 text-center">
        <div class="image-container">
            <a href=""><img src="../images/marvel.png" class="img-fluid" alt="Marvel"></a>
            <div class="image-text fw-bold">MARVEL</div>
        </div>
        <div class="image-container">
            <a href=""><img src="../images/halloween.png" class="img-fluid" alt="Halloween"></a>
            <div class="image-text fw-bold">HALLOWEEN</div>
        </div>
        <div class="image-container">
            <a href=""><img src="../images/lego.png" class="img-fluid" alt="LEGO"></a>
            <div class="image-text fw-bold">LEGO</div>
        </div>
        <div class="image-container">
            <a href=""><img src="../images/offer.png" class="img-fluid" alt="Offer"></a>
            <div class="image-text fw-bold">OFFERS</div>
        </div>
        <div class="image-container">
            <a href=""><img src="../images/dc.png" class="img-fluid" alt="DC"></a>
            <div class="image-text fw-bold">DC</div>
        </div>
    </div>

    <div class="container sale-container mt-5">
        <h3 class="fw-bold">On Sale!</h3>
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
                                    <a href="legodetails.php?legoId=' .$row['legoId']. '" class="nav-link btn cart-btn mt-1 py-2 fw-bold" role="button">Add to Cart</a>
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

    <div class="container offers-container mt-5">
        <h3 class="fw-bold">Offers & Promotions</h3>
        <div class="row">
            <div class="col">
                <div class="card" style="width: 39rem; border-radius: 0; border: none;">
                    <a href="">
                        <img src="../images/offerone.jpg" class="card-img-top" style="border-radius: 0;" alt="...">
                        <div class="card-body text-center px-0 pb-0">
                            <h5 class="card-title fw-bold fs-5 mb-2">Earn Double Points</h5>
                            <small><p>LEGO® Insiders get 2X points on all purchases, 10/10-10/15.</p></small>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col">
                <div class="card" style="width: 39rem; border-radius: 0; border: none;">
                    <a href="">
                        <img src="../images/offertwo.jpg" class="card-img-top" style="border-radius: 0;" alt="...">
                        <div class="card-body text-center px-0 pb-0">
                            <h5 class="card-title fw-bold fs-5 mb-2">Get LEGO® Creator Scary Pirate Island</h5>
                            <small><p>Your gift with LEGO® purchases of $100 or more.*</p></small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container sale-container mt-4 pt-2">
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
                                    <a href="legodetails.php?legoId=' .$row['legoId']. '" class="nav-link btn cart-btn mt-1 py-2 fw-bold" role="button">Add to Cart</a>
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

    <div class="container news-container mt-5">
        <h3 class="fw-bold">Read All About It</h3>
        <div class="row">
            <?php
                $sql = "SELECT * FROM article_data ORDER BY RAND() LIMIT 3";
                $stmt = $conn->query($sql);
                if($stmt->rowCount() > 0){
                    while($row = $stmt->fetch()){
                        echo '<div class="col">
                            <div class="card" style="width: 25.5rem; border-radius: 0; border: none;">
                            <a href="article.php?articleId=' .$row['articleId'].'">
                                <img src="../news-images/' .$row['main-image']. '" class="card-img-top" style="border-radius: 0;" alt="...">
                                <div class="card-body px-0">
                                    <h5 class="card-title fw-bold fs-5 mb-3">' .$row['title']. '</h5>
                                    <p style="text-align: justify;">' .$row['subtext']. '</p>
                                </div>
                            </a>
                            </div>
                        </div>';
                    }
                }else{
                    echo "<div class='container'>No Articles Found.</div>";
                }
            ?>
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