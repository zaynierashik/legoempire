<?php
    include '../connect.php';

    if(!isset($_SESSION['adminname'])){
        header('location: adminauthentication.php');
    }

    if(isset($_POST['register-product'])){
        $itemNumber = $_POST['itemNumber'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $age = $_POST['age'];
        $pieces = $_POST['pieces'];
        $points = $_POST['points'];
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

        $sql = "INSERT INTO product (itemNumber, category, title, price, age, pieces, points, specifications, specificationspoint, titleone, image2title, image3title, mainimage, secondaryimage) VALUES ('$itemnumber', '$category', '$name', '$price', '$age', '$legopieces', '$legopoints', '$specifications', '$specificationspoint', '$image1title', '$image2title', '$image3title', '$mainimage', '$secondaryimage')";
        $result = mysqli_query($conn, $sql);

        if($result){
            echo "<script>alert('Product Added Successfully!')</script>";
        }else{
            echo "<script>alert('Product Not Added!')</script>";
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

    <div class=" product-register-container">
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
                            <label class="fw-bold" for="main-image">Main Image</label>
                            <input type="file" class="form-control mb-3" id="main-image" name="main-image" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <label class="fw-bold" for="secondary-image">Secondary Image</label>
                            <input type="file" class="form-control mb-3" id="secondary-image" name="secondary-image" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                </div>
                
                <div class="input-wrapper">
                    <textarea class="form-control mb-3" name="specifications" id="specifications" rows="3" placeholder="Specifications" required></textarea>
                </div>
                <div class="input-wrapper">
                    <textarea class="form-control mb-3" name="specifications-point" id="specifications-point" rows="5" placeholder="Specifications Point" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="input-wrapper">
                            <input type="file" class="form-control" id="image-one" name="image-one" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="title-one" id="title-one" placeholder="Image 1 Title" required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        <div class="input-wrapper">
                            <input type="file" class="form-control" id="image-two" name="image-two" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="title-two" id="title-two" placeholder="Image 2 Title" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <div class="input-wrapper">
                            <input type="file" class="form-control" id="image-three" name="image-three" accept="image/png, image/jpeg"/>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="title-three" id="title-three" placeholder="Image 3 Title" required>
                        </div>
                    </div>
                </div>

                

                <div class="d-grid">
                    <button type="submit" class="btn pt-1" name="register-product" id="register-product" value="Register" style="border: none; background-color: black; color: white;">Add Product</button>
                </div>
            </form>
        </div>
    </div>

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