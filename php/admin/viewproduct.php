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

        if(empty($_POST['title']) || empty($_POST['price']) || empty($_POST['category']) || empty($_POST['age']) || empty($_POST['pieces']) || empty($_POST['points']) || empty($_POST['itemNumber']) || empty($_POST['specifications']) || empty($_POST['specificationspoint'])){
            $success = 0;
        }else{
            $sql = "UPDATE lego_data SET title = '$title', price = '$price', category = '$category', age = '$age', pieces = '$pieces', points = '$points', itemNumber = '$itemNumber', specifications = '$specifications', specificationspoint = '$specificationspoint'";
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

    <!-- Details Edit Form -->

    <div class="product-edit-container">
        <form action="" method="POST" class="form">
            <div class="row">
                <div class="col-md-2">
                    <div class="input-wrapper">
                        <input type="number" class="form-control mb-3" name="itemNumber" id="itemNumber" placeholder="Item Number" required>
                    </div>
                </div>
                <div class="col-md-3 ps-0">
                    <div class="input-wrapper">
                        <input type="text" class="form-control mb-3" name="category" id="category" placeholder="Category" required>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="text" class="form-control mb-3" name="title" id="title" placeholder="Product Name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-wrapper">
                        <input type="number" class="form-control mb-3" name="price" id="price" placeholder="Price" required>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="number" class="form-control mb-3" name="age" id="age" placeholder="Appropiate Age" required>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="number" class="form-control mb-3" name="pieces" id="pieces" placeholder="Lego Pieces" required>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="number" class="form-control mb-3" name="points" id="points" placeholder="Lego Points" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="input-wrapper">
                        <label class="fw-bold" for="mainimage">Main Image</label>
                        <input type="file" class="form-control mb-3" id="mainimage" name="mainimage" accept="image/png, image/jpeg" required/>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <label class="fw-bold" for="secondaryimage">Secondary Image</label>
                        <input type="file" class="form-control mb-3" id="secondaryimage" name="secondaryimage" accept="image/png, image/jpeg" required/>
                    </div>
                </div>
            </div>
                
            <div class="input-wrapper">
                <textarea class="form-control mb-3" name="specifications" id="specifications" rows="3" placeholder="Specifications" required></textarea>
            </div>
            <div class="input-wrapper">
                <textarea class="form-control mb-3" name="specificationspoint" id="specificationspoint" rows="5" placeholder="Specifications Point" required></textarea>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="input-wrapper">
                        <input type="file" class="form-control" id="imageone" name="imageone" accept="image/png, image/jpeg" required/>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="text" class="form-control mb-3" name="titleone" id="titleone" placeholder="Image 1 Title" required>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-5">
                    <div class="input-wrapper">
                        <input type="file" class="form-control" id="imagetwo" name="imagetwo" accept="image/png, image/jpeg" required/>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="text" class="form-control mb-3" name="titletwo" id="titletwo" placeholder="Image 2 Title" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="input-wrapper">
                        <input type="file" class="form-control" id="imagethree" name="imagethree" accept="image/png, image/jpeg" required/>
                    </div>
                </div>
                <div class="col ps-0">
                    <div class="input-wrapper">
                        <input type="text" class="form-control mb-3" name="titlethree" id="titlethree" placeholder="Image 3 Title" required>
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn pt-1" name="update-product" id="update-product" value="Update" style="border: none; background-color: black; color: white;">Update Product</button>
            </div>
        </form>
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