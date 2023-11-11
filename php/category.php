<?php
    session_start();
    include 'connect.php';

    if(!isset($_SESSION['username'])){
        header('location: homepage.php');
    }
    
    if(isset($_GET['category'])){
        $category = $_GET['category'];
    
        $sql = "SELECT * FROM lego_data WHERE category = :category";
        $stmt = $conn->prepare($sql);
        $stmt ->bindParam(':category', $category);
        $stmt ->execute();
        $legos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item me-3">
                            <form action="datasearch.php" method="POST" id="search" role="search">
                                <input type="search" name="search" class="form-control" placeholder="Search..." aria-label="Search">
                            </form>
                        </li>
                        <li class="nav-item me-1">
                            <a href="account.php" class="nav-link"><i class="fa-solid fa-user" style="color: #000000; font-size: 1.1rem;"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link pe-0">
                                <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size: 1.1rem;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
            if(isset($category) && !empty($legos)):
        ?>
            <div class="container sale-container mt-5 mb-5">
                <h4 class="fw-bold">Category: <?php echo $category ?></h4>
                    <div class="container">
                    <div class="row row-gap-4">
                    <?php
                        foreach($legos as $lego):
                    ?>
                        <div class="col">
                        <div class="card" style="width: 18.37rem;">
                            <a href="legodetails.php?legoId=<?php echo $lego['legoId'] ?>" class="nav-link">
                                <img src="../lego-images/<?php echo $lego['main-image'] ?>" class="card-img-top my-3" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold fs-6"><?php echo $lego['title'] ?></h5>
                            </a>
                                    <div>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                        <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                                    </div>
                                    <p class="card-text mt-1"><span class="text-decoration-line-through">$7.00</span> <span class="fw-bold">$<?php echo $lego['price'] ?></span></p>
                                    <a href="legodetails.php?legoId=<?php echo $lego['legoId'] ?>" class="nav-link btn cart-btn mt-1 py-2 fw-bold" role="button">Add to Cart</a>
                                </div>
                        </div>
                        </div>
                        
                    <?php endforeach; ?>
                    </div>
    
        <?php else: ?>
        <div class="container mt-5 mb-5">
            <h5 class="fw-bold">No products found in this category.</h5>
        </div>
    <?php endif; ?>

        <!-- Footer -->

        <!-- <div class="container mt-3 rounded" style="height: 6vh; background-color: black; color: white;">
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
        </div> -->

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