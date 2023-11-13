<?php
    include '../connect.php';

    if(!isset($_SESSION['adminname'])){
        header('location: adminauthentication.php');
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
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Item Number" required>
                        </div>
                    </div>
                    <div class="col-md-3 ps-0">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Category" required>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Product Name" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Price" required>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Appropiate Age" required>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Lego Pieces" required>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Lego Points" required>
                        </div>
                    </div>
                </div>
                
                <div class="input-wrapper">
                    <textarea class="form-control mb-3" id="message" rows="5" placeholder="Specifications" required></textarea>
                </div>
                <div class="input-wrapper">
                    <textarea class="form-control mb-3" id="message" rows="5" placeholder="Specifications Point" required></textarea>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Item Number" required>
                        </div>
                    </div>
                    <div class="col-md-3 ps-0">
                        <div class="input-wrapper">
                            <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Category" required>
                        </div>
                    </div>
                    <div class="col ps-0">
                        <div class="input-wrapper">
                            <input type="text" class="form-control mb-3" name="name" id="name" placeholder="Product Name" required>
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn pt-1" name="register-submit" id="register-submit" value="Register" style="border: none; background-color: black; color: white;">Add Product</button>
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