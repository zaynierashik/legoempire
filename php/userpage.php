<?php
    include 'connect.php';
    session_start();

    if(!isset($_SESSION['username'])){
        header("location: homepage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgetVerse</title>
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>

    <div class="container">
    <!-- Navbar -->
    
    <nav class="navbar navbar-expand-lg logonavbar">
        <div class="container">
            <a class="navbar-brand" href="userpage.php">
                <img src="../images/logo.png" alt="GagdgetVerse" width="200" height="50">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="usernavbar navbar-nav ms-auto">
                    <li class="nav-item">
                        <form action="datasearch.php" method="POST" id="search" class="d-flex" role="search">
                            <input type="search" name="search" class="form-control d-flex search-bar" placeholder="Search colleges, courses . . ." aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item">
                        <a href="account.php?userId=<?php echo $_SESSION['userId']; ?>" class="nav-link" aria-current="page"><i class="fa-solid fa-user" style="color: #000000;"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"><?php echo $_SESSION['username']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link logout-nav" aria-current="page">logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-3 homenavbar">
        <ul class="nav nav-underline">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="userpage.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="mobile.php">Mobile Price</a></li>
            <li class="nav-item"><a class="nav-link" href="laptop.php">Laptop Price</a></li>
            <li class="nav-item"><a class="nav-link" href="guide.php">Buy Guides</a></li>
            <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        </ul>
    </div>

    <div class="container pt-3">
        <div class="row">
            <div class="col pe-0">
                <a href="https://nagmani.com.np/" target="_blank"><img src="../images/zenbook.gif" class="zenbook" alt="Ad Banner"></a>
            </div>
            <div class="col pe-0">
                <a href="https://nagmani.com.np/" target="_blank"><img src="../images/asusdeals.gif" class="asusdeals" alt="Ad Banner"></a>
            </div>
        </div>
    </div>

    <div class="vl"></div>
    <div class="container latest-container mt-5 mb-3">
        <h4>LATEST RELEASES</h4>
        <div class="row row-gap-3">
            <?php
                $sql = "SELECT * FROM gadget_data WHERE releaseDate >= '2023-09-15' ORDER BY releaseDate ASC";
                $stmt = $conn->query($sql);
                if($stmt->rowCount() > 0){
                    while($row = $stmt->fetch()){
                        echo '<div class="col">
                            <div class="card" style="width: 14.7rem;">
                            <a href="gadgetdetails.php?gadgetId=' .$row['gadgetId']. '" class="card-link">
                                <img src="../phone-images/' .$row['mainImg']. '" class="card-img-top" alt="' .$row['name']. '">
                                <div class="card-body">
                                    <h6 class="card-title">' .$row['name']. '</h6>
                                    <p class="card-text">Starting from NPR ' .$row['basePrice']. '</p>
                                </div>
                            </a>
                            </div>
                        </div>';
                    }
                }else{
                    echo "<div class='container'>No Gadgets Found.</div>";
                }
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h4>REVIEWS</h4>
                <div class="col review-container">
                    <div class="row row-gap-3">
                    <?php
                        $sql = "SELECT review_data.*, gadget_data.* FROM review_data INNER JOIN gadget_data ON review_data.gadgetId = gadget_data.gadgetId ORDER BY RAND() LIMIT 2";
                        $stmt = $conn->query($sql);
                        if($stmt->rowCount() > 0){
                            while($row = $stmt->fetch()){
                                echo '<div class="col">
                                    <div class="card" style="width: 27rem; border: none;">
                                    <a href="reviewdetails.php?reviewId=' .$row['gadgetId']. '" class="card-link">
                                        <img src="../phone-images/' .$row['reviewImg']. '" class="card-img-top" alt="' .$row['name']. '">
                                        <div class="card-body ps-0 pb-0 pe-0">
                                            <h6 class="card-title">' .$row['name']. ' Review: ' .$row['reviewTitle']. '</h6>
                                            <div class="mb-1" style="font-size: 0.87rem;">
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
                                            </div>
                                            <p class="card-text text-body-secondary" style="font-size: 0.85rem; text-align: justify">' .$row['shortReview']. '</p>
                                        </div>
                                    </a>
                                    </div>
                                </div>';
                            }
                        }else{
                            echo "<div class='container'>No Reviews Found.</div>";
                        }
                    ?>
    
                    <?php
                        $sql = "SELECT review_data.*, gadget_data.* FROM review_data INNER JOIN gadget_data ON review_data.gadgetId = gadget_data.gadgetId ORDER BY RAND() LIMIT 3";
                        $stmt = $conn->query($sql);
                        if($stmt->rowCount() > 0){
                            while($row = $stmt->fetch()){
                                echo '<div class="col">
                                    <div class="card" style="width: 16.87rem; border: none;">
                                    <a href="reviewdetails.php?gadgetId=' .$row['reviewId']. '" class="card-link">
                                        <img src="../phone-images/' .$row['reviewImg']. '" class="card-img-top" alt="' .$row['name']. '">
                                        <div class="card-body ps-0 pb-0">
                                            <h6 class="card-title">' .$row['name']. ' Review: Fan of the BASS!</h6>
                                            <div class="mb-1" style="font-size: 0.87rem;">
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star" style="color: #000000;"></i>
                                                <i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>';
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>

            <div class="col-3">
                <h4 class="text-bg-dark text-center">BEST GADGET DEALS</h4>
                <div class="deal-container">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link">
                                        <div class="row g-0">
                                            <div class="col-md-4 mt-3">
                                                <img src="../images/strixscar15.png" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">ASUS ROG Strix Scar 15</h6>
                                                    <p class="card-text" style="font-size: 0.85rem;">RYZEN 9 5900HX | 1TB NVMe SSD | 32GB RAM | Nvidia RTX 3070 8GB GDDR6 | 15.6 FHD IPS 300 Hz</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="vl" style="height: 0.15vh; width: 19.5vw;"></div>
    
                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link">
                                        <div class="row g-0">
                                            <div class="col-md-4 mt-3">
                                                <img src="../images/strixscar15.png" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">ASUS ROG Strix Scar 15</h6>
                                                    <p class="card-text" style="font-size: 0.85rem;">RYZEN 9 5900HX | 1TB NVMe SSD | 32GB RAM | Nvidia RTX 3070 8GB GDDR6 | 15.6 FHD IPS 300 Hz</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="vl" style="height: 0.25vh; width: 19.5vw;"></div>
    
                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link">
                                        <div class="row g-0">
                                            <div class="col-md-4 mt-3">
                                                <img src="../images/strixscar15.png" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">ASUS ROG Strix Scar 15</h6>
                                                    <p class="card-text" style="font-size: 0.85rem;">RYZEN 9 5900HX | 1TB NVMe SSD | 32GB RAM | Nvidia RTX 3070 8GB GDDR6 | 15.6 FHD IPS 300 Hz</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
    
                                <div class="vl" style="height: 0.15vh; width: 19.5vw;"></div>
    
                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link">
                                        <div class="row g-0">
                                            <div class="col-md-4 mt-3">
                                                <img src="../images/strixscar15.png" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="card-title">ASUS ROG Strix Scar 15</h6>
                                                    <p class="card-text" style="font-size: 0.85rem;">RYZEN 9 5900HX | 1TB NVMe SSD | 32GB RAM | Nvidia RTX 3070 8GB GDDR6 | 15.6 FHD IPS 300 Hz</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <!-- <div class="container brand-container mt-5">
        <h4 class="text-center">BRANDS</h4>
        <div class="text-center mt-3">
            <a href="https://www.apple.com/" target="_blank"><img src="../images/applelogo.png" alt="Apple" width="65vw" style="margin-right: 75px;"></a>
            <a href="https://www.asus.com/" target="_blank"><img src="../images/asuslogo.png" alt="Asus" width="200vw" style="margin-right: 75px;"></a>
            <a href="https://www.msi.com/index.php" target="_blank"><img src="../images/msilogo.png" alt="MSI" width="160vw" style="margin-right: 75px;"></a>
            <a href="https://www.acer.com/us-en" target="_blank"><img src="../images/acerlogo.png" alt="Acer" width="175vw" style="margin-right: 75px;"></a>
            <a href="https://www.hp.com/us-en/home.php" target="_blank"><img src="../images/hplogo.png" alt="HP" width="75vw"></a><br><br>
            <a href="https://www.mi.com/np/" target="_blank"><img src="../images/xiaomi.png" alt="Xiaomi" width="73vw" style="margin-right: 75px;"></a>
            <a href="https://www.samsung.com/us/" target="_blank"><img src="../images/samsung.png" alt="Samsung" width="175vw" style="margin-right: 75px;"></a>
            <a href="https://intl.nothing.tech/" target="_blank"><img src="../images/nothinglogo.png" alt="Nothing" width="175vw" style="margin-right: 75px;"></a>
            <a href="https://www.oneplus.com/us" target="_blank"><img src="../images/onepluslogo.png" alt="OnePlus" width="73vw"></a>
        </div>
    </div> -->

    <!-- Footer -->

    <div class="container mt-3" style="height: 6vh;">
        <div class="text-bg-dark w-100 h-100 d-inline-block ps-3 pt-3">
            <div class="row" style="font-size: 0.77rem;">
                <div class="col-7">
                    <p>© GadgetVerse, All rights reserved 2023.</p>
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
            <i class="fa-solid fa-angle-up text-bg-dark" style="color: #ffffff; padding: 13px; font-size: larger;"></i>
        </a>
    </div>

    <script src="../js/userscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>