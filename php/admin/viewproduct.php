<?php
    include '../connect.php';

    if(!isset($_SESSION['adminname'])){
        header('location: adminauthentication.php');
    }

    if(isset($_POST['update-product'])){
        $title = $_POST['title'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        $age = $_POST['age'];
        $pieces = $_POST['pieces'];
        $points = $_POST['points'];
        $itemNumber = $_POST['itemNumber'];
        $specifications = $_POST['specifications'];
        $specificationspoint = $_POST['specificationspoint'];
        $titleone = $_POST['titleone'];
        $titletwo = $_POST['titletwo'];
        $titlethree = $_POST['titlethree'];
        $mainimage = $_POST['mainimage'];
        $secondaryimage = $_POST['secondaryimage'];
        $imageone = $_POST['imageone'];
        $imagetwo = $_POST['imagetwo'];
        $imagethree = $_POST['imagethree'];

        if(empty($_POST['title']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['age']) || empty($_POST['pieces']) || empty($_POST['points']) || empty($_POST['itemNumber']) || empty($_POST['specifications']) || empty($_POST['specificationspoint']) || empty($_POST['titleone']) || empty($_POST['titletwo']) || empty($_POST['titlethree']) || empty($_POST['mainimage']) || empty($_POST['secondaryimage']) || empty($_POST['imageone']) || empty($_POST['imagetwo']) || empty($_POST['imagethree'])){
            $success = 0;
        }else{
            $sql = "UPDATE lego_data SET title = '$title', price = '$price', category = '$category', age = '$age', pieces = '$pieces', points = '$points', itemNumber = '$itemNumber', specifications = '$specifications', specificationspoint = '$specificationspoint', titleone = '$titleone', titletwo = '$titletwo', titlethree = '$titlethree', mainimage = '$mainimage', secondaryimage = '$secondaryimage', imageone = '$imageone', imagetwo = '$imagetwo', imagethree = '$imagethree' WHERE itemNumber = '$itemNumber'";
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(':itemNumber', $itemNumber);
            $stmt ->bindParam(':title', $title);
            $stmt ->bindParam(':price', $price);
            $stmt ->bindParam(':category', $category);
            $stmt ->bindParam(':age', $age);
            $stmt ->bindParam(':pieces', $pieces);
            $stmt ->bindParam(':points', $points);
            $stmt ->bindParam(':specifications', $specifications);
            $stmt ->bindParam(':specificationspoint', $specificationspoint);
            $stmt ->bindParam(':titleone', $titleone);
            $stmt ->bindParam(':titletwo', $titletwo);
            $stmt ->bindParam(':titlethree', $titlethree);
            $stmt ->bindParam(':mainimage', $mainimage);
            $stmt ->bindParam(':secondaryimage', $secondaryimage);
            $stmt ->bindParam(':imageone', $imageone);
            $stmt ->bindParam(':imagetwo', $imagetwo);
            $stmt ->bindParam(':imagethree', $imagethree);
            
            if($stmt->execute()){
                $success = 1;
            }
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
    <link rel="apple-touch-icon" sizes="180x180" href="../../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../favicon/favicon-16x16.png">
    <link rel="manifest" href="../../favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/louis-george-cafe" rel="stylesheet">
    <link rel="stylesheet" href="../../css/admin.css">

    <style>
        body{
            background-color: #f2f4f6;
        }
    </style>
</head>
<body>

    <div class="container px-0">
            <div class="row row-gap-2">
                <?php
                    $sql = "SELECT * FROM lego_data ORDER BY RAND()";
                    $stmt = $conn->query($sql);
                    if($stmt->rowCount() > 0){
                        while($row = $stmt->fetch()){
                            echo '<div class="col">
                            <div class="card" style="width: 13.37rem; min-height: 31vh">
                                <a href="legodetails.php?legoId=' .$row['legoId']. '" class="nav-link">
                                    <img src="../../lego-images/' .$row['mainimage']. '" class="card-img-top my-3" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold fs-6">' .$row['title']. '</h5>
                                </a>
                                    
                                    </div>
                                </div>
                                </div>';
                        }
                    }else{
                        echo "<div class='container'><h5 class='fw-bold'>No articles found.</h5></div>";
                    }
                ?>
            </div>
    </div>

    <!-- Product Insertion Success Message -->

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="userSuccessToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" id="successToastHead"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="successToastBody"></div>
    </div>
    </div>

    <script>
        <?php
            if(isset($success) && $success === 1){
                echo 'document.addEventListener("DOMContentLoaded", function(){
                    var successToast = new bootstrap.Toast(document.getElementById("userSuccessToast"));
                    document.getElementById("successToastHead").innerHTML = "Product Insertion Successful";
                    document.getElementById("successToastBody").innerHTML = "The product has been added successfully.";
                    successToast.show();
                });';
            }
        ?>
    </script>

    <script>
        <?php
            if(isset($success) && $success === 0){
                echo 'document.addEventListener("DOMContentLoaded", function(){
                    var successToast = new bootstrap.Toast(document.getElementById("userSuccessToast"));
                    document.getElementById("successToastHead").innerHTML = "Product Insertion Error";
                    document.getElementById("successToastBody").innerHTML = "Fill in the blanks.";
                    successToast.show();
                });';
            }
        ?>
    </script>

    <script>
        if( window.history.replaceState ){
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <script src="../../js/adminscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>