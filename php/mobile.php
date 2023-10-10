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
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="mobile.php">Mobile Price</a></li>
            <li class="nav-item"><a class="nav-link" href="laptop.php">Laptop Price</a></li>
            <li class="nav-item"><a class="nav-link" href="guide.php">Buy Guides</a></li>
            <li class="nav-item"><a class="nav-link" href="review.php">Reviews</a></li>
        </ul>
    </div>

    <!-- <div class="vl"></div> -->

    <div class="container mt-5 mb-3">
        <h4>MOBILE PRICE IN NEPAL</h4>
        <p class="lh-lg" style="text-align: justify;">This is the mobile price in Nepal section where you will find the latest price of all the smartphones available in Nepal officially (2023).
            In Nepal, smartphones are mostly sold via offline retail shops. Only 10% account for online sales. With Alibaba-owned Daraz and newcomers like Hukut making their presence in Nepal, mobile brands are launching a few models exclusively on online platforms.
            However, offline sales still rule with over 90% market share. But, with significant internet penetration here in Nepal, we can predict online mobile sales will be going to surge in years to come.</p>
    </div>

    <div class="container gadget-container mt-4">
        <h4 class="">iPhones</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">iPhone Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>

            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='Apple' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>

        <h4 class=" mt-5">Samsung</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">Samsung Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>

            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='Samsung' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>

        <h4 class=" mt-5">Xiaomi</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">Xiaomi Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>
            
            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='Xiaomi' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>

        <div class="container ms-2">
            <div class="container">
                <a href="https://nagmani.com.np/" target="_blank"><img src="../images/asusdeals.gif" alt="Ad Banner" style="width: 78.6vw;"></a>
            </div>
        </div>

        <h4 class=" mt-5">POCO</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">POCO Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>
            
            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='POCO' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>

        <h4 class=" mt-5">Oneplus</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">Oneplus Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>
            
            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='Oneplus' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>

        <h4 class=" mt-5">Nothing</h4>
        <table class="table table-striped table-bordered mx-auto mt-3" style="width: 95%;">
            <thead>
                <tr class="fw-semibold">
                    <td class="ps-3">Nothing Models</td>
                    <td class="ps-3">Price</td>
                </tr>
            </thead>
            
            <?php
                $sql = "SELECT * FROM gadget_data WHERE brand='Nothing' AND type='Mobile' ORDER BY name ASC";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if(count($result)>0){
            ?>
            <?php
                $i=0;
                foreach($result as $row){
            ?>
            <tbody>
                <tr>
                    <td class="ps-3"><a href="gadgetdetails.php?gadgetId=<?php echo $row['gadgetId'] ?>"><?php echo $row['name'] ?></a></td>
                    <td class="ps-3">Rs. 106,990</td>
                </tr>
            </tbody>
            <?php
                $i++;
                }
            ?>
            <?php } ?>
        </table>
    </div>
    
    
    <!-- Footer -->

    <div class="container mt-3" style="height: 6vh;">
        <div class="text-bg-dark w-100 h-100 d-inline-block ps-3 pt-3">
            <div class="row" style="font-size: 0.77rem;">
                <div class="col-7"><p>© GadgetVerse, All rights reserved 2023.</p></div>
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