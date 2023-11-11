<?php
    session_start();
    include 'connect.php';

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
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/site.webmanifest">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.cdnfonts.com/css/louis-george-cafe" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" href="adminpage.php">
                    <img src="../images/logo.png" alt="The Lego Empire" width="175">
                </a>
        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="cart.php" class="nav-link pe-1">
                            <i class="fa-solid fa-user" style="color: #000000; font-size: 1.1rem;"></i>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        <div class="mt-3">
            <div class="account-content p-3">
                <h4 class="fw-bold">Admin Panel</h4>

                <div class="row">
                    <div class="col-3">
                        <div class="list-group" id="list-tab" role="tablist">
                            <a href="?section=dashboard" class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold active" id="list-dashboard-list" data-bs-toggle="list" role="tab" aria-controls="list-dashboard">Dashboard</a>
                            <a href="#list-profile" class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold" id="list-profile-list" data-bs-toggle="list" role="tab" aria-controls="list-profile">Products</a>
                            <a href="#list-password" class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold" id="list-password-list" data-bs-toggle="list" role="tab" aria-controls="list-password">Placed Orders</a>
                            <a href="#list-billing" class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold" id="list-billing-list" data-bs-toggle="list" role="tab" aria-controls="list-billing">Authorized Access</a>
                            <a href="#list-order" class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold" id="list-order-list" data-bs-toggle="list" role="tab" aria-controls="list-order">Edit Profile</a>
                            <a class="list-group-item list-group-item-action border-0 rounded-1 mb-1 fw-bold" data-bs-toggle="modal" data-bs-target="#logoutConfirmationModal" style="cursor: pointer;">Logout</a>
                        </div>
                    </div>
                    <div class="col border-start border-2 ps-4">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
                                <div>  
                                </div>
                            </div>
                        </div>
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
        if( window.history.replaceState ){
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <script src="../js/adminscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>