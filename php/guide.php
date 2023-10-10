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
                <img src="../images/logo.png" alt="hamrocollege" width="200" height="50">
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
            <li class="nav-item"><a class="nav-link" href="userpage.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="mobile.php">Mobile Price</a></li>
            <li class="nav-item"><a class="nav-link" href="laptop.php">Laptop Price</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="guide.php">Buy Guides</a></li>
            <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        </ul>
    </div>

    <div class="container mt-5">
        <h4>BUY GUIDES</h4>
        <div class="col review-container">
            <div class="row row-gap-3">
                <div class="col">
                    <div class="card" style="width: 25.47rem; border: none;">
                        <a href="gadgetdetails.php" class="card-link" target="_blank">
                            <img src="../images/twentyfive.jpg" class="card-img-top" alt="Asus ROG Zephyrus M16">
                            <div class="card-body ps-0 pb-0">
                                <h6 class="card-title">Best Mobile Phones Under Rs. 25,000 in Nepal</h6>
                                <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 25,000 in Nepal. Right now, there are a lot of...</p>
                            </div>
                        </a>
                    </div>
                </div>                    
            
                <div class="col">
                    <div class="card" style="width: 25.47rem; border: none;">
                        <a href="gadgetdetails.php" class="card-link" target="_blank">
                            <img src="../images/thirty.jpg" class="card-img-top" alt="Asus ROG Zephyrus M16">
                            <div class="card-body ps-0 pb-0">
                                <h6 class="card-title">Best Mobile Phones Under Rs. 30,000 in Nepal</h6>
                                <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 30,000 in Nepal. Right now, there are a lot of...</p>
                            </div>
                        </a>
                    </div>
                </div> 
    
                <div class="col">
                    <div class="card" style="width: 25.47rem; border: none;">
                        <a href="gadgetdetails.php" class="card-link" target="_blank">
                            <img src="../images/fifty.jpg" class="card-img-top" alt="Asus ROG Zephyrus M16">
                            <div class="card-body ps-0 pb-0">
                                <h6 class="card-title">Best Mobile Phones Under Rs. 50,000 in Nepal</h6>
                                <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 50,000 in Nepal. Right now, there are a lot of...</p>
                            </div>
                        </a>
                    </div>
                </div> 

                <div class="mt-3 ps-4">
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="card p-0 mb-1" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link" target="_blank">
                                        <div class="row g-0">
                                            <div class="col-md-3 mt-3">
                                                <img src="../images/twentyfive.jpg" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8 ms-3">
                                                <div class="card-body">
                                                    <h6 class="card-title fs-4 mt-3">Best Mobile Phones Under Rs. 25,000 in Nepal</h6>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;"><span class="fw-semibold">Rashik Chauhan</span> - September 20, 2023</p>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 25,000 in Nepal. Right now, there are a lot of...</p>
                                                </div>
                                            </div>
                                        </div>
                                     </a>
                                </div>
                
                                <div class="card p-0 mb-1" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link" target="_blank">
                                        <div class="row g-0">
                                            <div class="col-md-3 mt-3">
                                                <img src="../images/thirty.jpg" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8 ms-3">
                                                <div class="card-body">
                                                    <h6 class="card-title fs-4 mt-3">Best Mobile Phones Under Rs. 30,000 in Nepal</h6>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;"><span class="fw-semibold">Rashik Chauhan</span> - September 20, 2023</p>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 30,000 in Nepal. Right now, there are a lot of...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                
                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link" target="_blank">
                                        <div class="row g-0">
                                            <div class="col-md-3 mt-3">
                                                <img src="../images/fifty.jpg" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8 ms-3">
                                                <div class="card-body">
                                                    <h6 class="card-title fs-4 mt-3">Best Mobile Phones Under Rs. 50,000 in Nepal</h6>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;"><span class="fw-semibold">Rashik Chauhan</span> - September 20, 2023</p>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;">In this article, we'll be taking a look at the best phones under NPR 50,000 in Nepal. Right now, there are a lot of...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link" target="_blank">
                                        <div class="row g-0">
                                            <div class="col-md-3 mt-3">
                                                <img src="../images/earbudfive.jpg" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8 ms-3">
                                                <div class="card-body">
                                                    <h6 class="card-title fs-4 mt-3">Best Wireless Earbuds At Every Price Range In Nepal</h6>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;"><span class="fw-semibold">Rashik Chauhan</span> - September 20, 2023</p>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;">With the gradual demise of wired earphones, the wireless earbuds industry is gaining more traction than ever. Customers have so many options to choose...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="card p-0" style="border: none;">
                                    <a href="gadgetdetails.php" class="card-link" target="_blank">
                                        <div class="row g-0">
                                            <div class="col-md-3 mt-3">
                                                <img src="../images/earbudfive.jpg" class="img-fluid" alt="ASUS ROG Strix Scar 15">
                                            </div>
                                            <div class="col-md-8 ms-3">
                                                <div class="card-body">
                                                    <h6 class="card-title fs-4 mt-3">Best Budget TWS Earbuds Under Rs. 5000 in Nepal</h6>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;"><span class="fw-semibold">Rashik Chauhan</span> - September 20, 2023</p>
                                                    <p class="card-text text-body-secondary" style="font-size: 0.85rem;">Here, we will be looking at the best budget TWS earbuds under NPR 5000 in Nepal. Wireless earbuds are all the rage these days....</p>
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