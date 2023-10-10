<?php
    include 'connect.php';
    session_start();

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
                <img src="../images/logo.png" alt="GadgetVerse" width="200" height="50">
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
            <li class="nav-item"><a class="nav-link" href="guide.php">Buy Guides</a></li>
            <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        </ul>
    </div>

    <div class="container mt-5 mb-3">
        <?php
            if(isset($_GET['gadgetId'])){
                $gadgetId = $_GET['gadgetId'];

                $sql = "SELECT * FROM gadget_data WHERE gadgetId=:gadgetId";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':gadgetId', $gadgetId);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            if(count($result)>0){
        ?>
        <?php
            $i=0;
            foreach($result as $row){
        ?>

        <h4><?php echo $row['name'] ?></h4>
        <div class="mt-3">
            <div class="row">
                <div class="col-5">
                    <img src="../phone-images/<?php echo $row['mainImg'] ?>" class="w-100" alt="<?php echo $row['name'] ?>">
                </div>

                <div class="col">
                    <p class="lh-lg" style="text-align: justify;"><?php echo $row['description'] ?></p>

                    <div class="mb-1">
                        Ratings:
                        <i class="fa-solid fa-star" style="color: #000000;"></i>
                        <i class="fa-solid fa-star" style="color: #000000;"></i>
                        <i class="fa-solid fa-star" style="color: #000000;"></i>
                        <i class="fa-solid fa-star" style="color: #000000;"></i>
                        <i class="fa-solid fa-star-half-stroke" style="color: #000000;"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h5><?php echo $row['name'] ?> Overview</h5>
        </div>

        <div class="mt-3">
            <h5>Design</h5>
            <p class="lh-lg" style="text-align: justify;"><?php echo $row['design'] ?></p>

            <div class="text-center">
                <img src="../phone-images/<?php echo $row['designImg'] ?>" class="w-50" alt="<?php echo $row['name'] ?>">
            </div>
        </div>

        <div class="mt-5">
            <h5>Performance</h5>
            <p class="lh-lg" style="text-align: justify;"><?php echo $row['performance'] ?></p>

            <div class="text-center">
                <img src="../phone-images/<?php echo $row['chipImg'] ?>" class="w-50" alt="<?php echo $row['name'] ?>">
            </div>
        </div>

        <div class="mt-5">
            <h5>Cameras</h5>
            <p class="lh-lg" style="text-align: justify;"><?php echo $row['camera'] ?></p>

            <div class="text-center">
                <img src="../phone-images/<?php echo $row['cameraImg'] ?>" class="w-50" alt="<?php echo $row['name'] ?>">
            </div>
        </div>

        <div class="mt-5">
            <h5>Rest of the Specs</h5>
            <p class="lh-lg" style="text-align: justify;"><?php echo $row['other'] ?></p>
        </div>

        <div class="mt-4">
            <h5><?php echo $row['name'] ?> Specifications:</h5>
            
            <div>
                <dl class="row row-gap-2">
                    <dt class="col-sm-2 fw-medium">Body</dt>
                    <dd class="col-sm-9"><?php echo $row['body'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Display</dt>
                    <dd class="col-sm-9"><?php echo $row['display'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Chipset</dt>
                    <dd class="col-sm-9"><?php echo $row['chipset'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Storage</dt>
                    <dd class="col-sm-9"><?php echo $row['storage'] ?></dd>

                    <dt class="col-sm-2 fw-medium">OS</dt>
                    <dd class="col-sm-9"><?php echo $row['os'] ?></dd>

                    <dt class="col-sm-2 fw-medium">SIM</dt>
                    <dd class="col-sm-9"><?php echo $row['sim'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Back Camera</dt>
                    <dd class="col-sm-9 lh-lg"><?php echo $row['bcamera'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Front Camera</dt>
                    <dd class="col-sm-9"><?php echo $row['fcamera'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Security</dt>
                    <dd class="col-sm-9"><?php echo $row['security'] ?></dd>

                    <dt class="col-sm-2 fw-medium">Connectivity</dt>
                    <dd class="col-sm-9"><?php echo $row['connectivity'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Other Features</dt>
                    <dd class="col-sm-9"><?php echo $row['features'] ?></dd>
                  
                    <dt class="col-sm-2 fw-medium">Battery</dt>
                    <dd class="col-sm-9"><?php echo $row['battery'] ?></dd>

                    <dt class="col-sm-2 fw-medium">Price in Nepal</dt>
                    <dd class="col-sm-9"><?php echo $row['price'] ?></dd>
                </dl>
            </div>
        </div>

        <div class="buy-container text-center">
            <button type="button" class="btn text-bg-dark px-4"><i class="fa-solid fa-cart-shopping me-2" style="color: #ffffff; font-size: 0.87rem;"></i><a href="<?php echo $row['buylink'] ?>" target="_blank" style="font-size: 0.87rem;">Buy From Authorized Seller</a></button>
        </div>

        <div class="mt-5">
            <h5><?php echo $row['name'] ?> Price in Nepal & Availability</h5>
            <p class="lh-lg" style="text-align: justify;">
                The latest official iPhone 14 price in Nepal is NPR 138,990 for the 128GB storage and NPR 157,990 for the 256GB variant.
                You can buy it from authorized retailers like Hukut Store, where you’ll also get benefits like a one-year warranty on the phone and one-time breakage insurance for one year.
            </p>

            <div>
                <table class="table table-striped table-bordered w-75">
                    <thead>
                        <tr>
                            <th class="fw-medium w-25 ps-3">iPhone 14 Pro Max</th>
                            <th class="fw-medium w-25 ps-3">Price in Nepal (Official)</th>
                            <th class="fw-medium w-25 ps-3">Market Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="ps-3">128GB</td>
                            <td class="ps-3">NPR 191,990</td>
                            <td class="ps-3">In Stock</td>
                        </tr>
                        <tr>
                            <td class="ps-3">256GB</td>
                            <td class="ps-3">NPR 210,990</td>
                            <td class="ps-3">In Stock</td>
                        </tr>
                        <tr>
                            <td class="ps-3">512GB</td>
                            <td class="ps-3">NPR 247,990</td>
                            <td class="ps-3">In Stock</td>
                        </tr>
                        <tr>
                            <td class="ps-3">1TB</td>
                            <td class="ps-3">NPR 285,990</td>
                            <td class="ps-3">Out Of Stock</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <?php
        $i++;
        }
    ?>

    <?php } ?>

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