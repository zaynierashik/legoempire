<?php
    session_start();
    include '../connect.php';

    if(!isset($_SESSION['username'])){
        header('location: ../homepage.php');
    }

    $status = $_GET['status'];
    $amount = $_GET['amount'];
    $userId = $_SESSION['userId'];

    $stmt = $conn->prepare("DELETE FROM cart_data WHERE userId = :userId");
    $stmt ->bindParam(':userId', $userId);
    $stmt->execute();
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
    <link rel="stylesheet" href="../../css/user.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Payment Status
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Payment Status: <?php echo $status; ?></h5>
                        <p class="card-text">Amount: <?php echo $amount; ?></p>
                        <a href="userpage.php" class="btn btn-primary">Go to Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>