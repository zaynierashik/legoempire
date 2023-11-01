<?php
    session_start();
    include 'connect.php';

    if(isset($_GET['legoId'])){
        $legoId = $_GET['legoId'];
    }

    if(isset($_POST['order-submit'])){
        $userId = $_SESSION['userId'];
        $legoId = $_POST['legoId'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $sql = "SELECT legoId FROM cart_data WHERE userId = :userId AND legoId = :legoId";
        $stmt = $conn->prepare($sql);
        $stmt ->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt ->bindParam(':legoId', $legoId, PDO::PARAM_INT);
        $stmt ->execute();

        if($stmt->rowCount() > 0){
            echo "<script>alert('Product already exists in the cart!')</script>";
        }else{
            $stmt = $conn->prepare("INSERT INTO cart_data (userId, legoId, title, price, quantity) VALUES (:userId, :legoId, :title, :price, :quantity)");
            $stmt ->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt ->bindParam(':legoId', $legoId, PDO::PARAM_INT);
            $stmt ->bindParam(':title', $title, PDO::PARAM_STR);
            $stmt ->bindParam(':price', $price, PDO::PARAM_STR);
            $stmt ->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            $stmt ->execute();

            echo "<script>alert('Item added to cart!')</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="../css/user.css">
</head>
<body>
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

    <?php
        $sql = "SELECT * FROM lego_data WHERE legoId = :legoId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':legoId', $legoId, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>

    <nav class="container" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="homepage.php" class="nav-link">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title'] ?></li>
        </ol>
    </nav>

    <div class="vl"></div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-8">
            <div id="carouselExample" class="carousel slide carousel-dark">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../lego-images/<?php echo $row['main-image'] ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="../lego-images/<?php echo $row['secondary-image'] ?>" class="d-block w-100" alt="...">
                    </div>
                    <!-- <div class="carousel-item">
                        <img src="../lego-images/<?php echo $row['image-two'] ?>" class="d-block w-100" alt="...">
                    </div> -->
                </div>
    
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            </div>

            <div class="col-4">
                <form action="" method="POST">
                    <div>
                        <input type="hidden" name="legoId" id="legoId" value="<?php echo $row['legoId'] ?>">
                        <input type="hidden" name="title" id="title" value="<?php echo $row['title'] ?>">
                        <h5 class="fw-bold pt-2" name="title"><?php echo $row['title'] ?></h5>
                        <div style="font-size: 0.87rem;">
                            <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                            <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                            <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                            <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                            <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                        </div>
                        <input type="hidden" name="price" id="price" value="<?php echo $row['price'] ?>">
                        <h5 class="fw-bold mt-3" name="price">$<?php echo $row['price'] ?></h5>
                        <p class="fw-bold text-success"><?php echo $row['stock'] ?></p>
                    </div>

                    <div class="quantity-btn">
                        <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"><i class="fa fa-minus"></i></div>
                        <input class="number-field fw-bold" type="number" name="quantity" id="number" value="1">
                        <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value"><i class="fa fa-plus"></i></div>
                    </div>

                    <div>
                        <button class="nav-link btn cart-btn mt-1 py-2 fw-bold w-100" name="order-submit">Add to Cart</button>
                    </div>
                </form>

                <div class="border mt-3 py-3">
                    <img src="../lego-images/<?php echo $row['main-image'] ?>" class="w-25" alt="">
                    <small class="fw-bold">Gift with LEGO® purchases of $100 or more*</small>
                </div>

                <div class="warning mt-2">
                    <p class="fw-bold mb-0">WARNING:<br>CHOKING HAZARD.</p>
                    <p>Toy contains small parts and a small ball. Not for children under 3 years.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="vl mt-3"></div>

    <div class="container basic-container mt-4 mb-3 text-center">
        <div>
            <h1><?php echo $row['age'] ?>+</h1>
            <div class="fw-bold">Ages</div>
        </div>
        <div>
            <h1><?php echo $row['pieces'] ?></h1>
            <div class="fw-bold">Pieces</div>
        </div>
        <div>
            <h1><?php echo $row['points'] ?></h1>
            <div class="fw-bold">Insiders Points</div>
        </div>
        <div>
            <h1>#<?php echo $row['item-number'] ?></h1>
            <div class="fw-bold">Item</div>
        </div>
    </div>

    <div class="container about-container mt-5">
        <div class="feature-container border-bottom-0">
            <a class="nav-link p-0 w-100" data-bs-toggle="collapse" href="#collapseFeature" aria-expanded="false" aria-controls="collapseFeature">
            <div class="row">
                <div class="col">
                    <h4>Features</h4>
                </div>
                <div class="col-1 text-center d-flex justify-content-end pt-2">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            </a>

            <div class="collapse" id="collapseFeature">
            <div class="card card-body border-0 p-0 pt-3">
                <div class="row text-center">
                    <div class="col">
                        <div class="card border-0" style="width: 24.5rem;">
                            <img src="../lego-images/<?php echo $row['image-one'] ?>" alt="...">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?php echo $row['title-one'] ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-0" style="width: 24.5rem;">
                            <img src="../lego-images/<?php echo $row['image-two'] ?>" alt="...">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?php echo $row['title-two'] ?></h6>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-0" style="width: 24.5rem;">
                            <img src="../lego-images/<?php echo $row['image-three'] ?>" alt="...">
                            <div class="card-body">
                                <h6 class="card-title fw-bold"><?php echo $row['title-three'] ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        
        <div class="specification-container border-bottom-0">
            <a class="nav-link p-0 w-100" data-bs-toggle="collapse" href="#collapseSpecification" aria-expanded="false" aria-controls="collapseSpecification">
            <div class="row">
                <div class="col">
                    <h4>Specifications</h4>
                </div>
                <div class="col-1 text-center d-flex justify-content-end pt-2">
                    <i class="fa fa-plus" id="icon-toggle"></i>
                </div>
            </div>
            </a>

            <div class="collapse" id="collapseSpecification">
            <div class="card card-body border-0 p-0 pt-3">
                <div style="text-align: justify;">
                    <?php echo $row['specifications'] ?>

                    <div>
                        <?php
                            $specificationspoints = explode("\n", $row['specifications-point']);
                            echo "<ul class='mt-3'>";
                            foreach($specificationspoints as $point){
                                echo "<li class='mt-2'>$point</li>";
                            }
                            echo "</ul>";
                        ?>
                    </div>
                </div>
            </div>
            </div>
        </div>

        <div class="review-container">
            <a class="nav-link p-0 w-100" data-bs-toggle="collapse" href="#collapseReview" aria-expanded="false" aria-controls="collapseReview">
            <div class="row">
                <div class="col">
                    <h4>Customer Reviews</h4>
                </div>
                <div class="col-1 text-center d-flex justify-content-end pt-2">
                    <i class="fa fa-plus" id="icon-toggle"></i>
                </div>
            </div>
            </a>

            <div class="collapse" id="collapseReview">
            <div class="card card-body border-0 p-0 pt-3">
                <h5>Overall Rating</h5>
                <div style="font-size: 0.87rem;">
                    <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                    <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                    <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                    <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                    <i class="fa-solid fa-star" style="color: #ffb234;"></i>
                </div>

                <div class="rating-container mt-5">
                    <h5>Your Review</h5>
                    <form action="" method="POST" class="form">
                        <div class="d-grid">
                            <button type="submit" class="border-0 rating-btn fw-bold text-center pb-2 pt-2" name="rating-submit" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php } ?>

    <!-- Footer -->

    <div class="container mt-5" style="height: 6vh; background-color: black; color: white;">
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
        function increaseValue(){
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;

            if(value < 15){
                value++;
            }
            document.getElementById('number').value = value;
        }

        function decreaseValue(){
            var value = parseInt(document.getElementById('number').value, 10);
            value = isNaN(value) ? 0 : value;

            if(value > 1){
                value--;
            }
            document.getElementById('number').value = value;
        }
    </script>
    
    <script>
        $(document).ready(function (){
            $(".nav-link").on("click", function (){
                var icon = $(this).find("i");

                if(icon.hasClass("fa-plus")){
                    icon.removeClass("fa-plus").addClass("fa-minus");
                    icon.css("transition", "transform 1s");
                }else{
                    icon.removeClass("fa-minus").addClass("fa-plus");
                    icon.css("transition", "transform 1s");
                }
            });
        });
    </script>

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