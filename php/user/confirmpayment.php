<?php
    session_start();
    include '../connect.php';

    if(isset($_SESSION['userId'])){
        $userId = $_SESSION['userId'];
    }

    if(isset($_GET['invoiceNumber'])){
        $invoiceNumber = $_GET['invoiceNumber'];
    }

    if(isset($_POST['confirm-payment'])){
        $invoiceNumber = $_POST['invoiceNumber'];
        $referenceNumber = $_POST['referenceNumber'];
        $status = "Paid";

        if(empty($_POST['invoiceNumber']) || empty($_POST['referenceNumber'])){
            $confirm = 1;
        }else{
            $stmt = $conn->prepare("SELECT * FROM order_data WHERE invoiceNumber = :invoiceNumber");
            $stmt ->bindParam(':invoiceNumber', $invoiceNumber);
            $stmt ->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt = $conn->prepare("UPDATE order_data SET invoiceNumber = :invoiceNumber, referenceNumber = :referenceNumber, status = :status WHERE invoiceNumber = :invoiceNumber");
            $stmt ->bindParam(':invoiceNumber', $invoiceNumber);
            $stmt ->bindParam(':referenceNumber', $referenceNumber);
            $stmt ->bindParam(':status', $status);
            
            if($stmt->execute()){
                $confirm = 0;
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
    <link rel="stylesheet" href="../../css/user.css">
</head>
<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg sticky-top">
            <div class="container">
                <a class="navbar-brand" href="homepage.php">
                    <img src="../../images/logo.png" alt="The Lego Empire" width="175">
                </a>
        
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="cart.php" class="nav-link pe-1">
                                <i class="fa-solid fa-cart-shopping" style="color: #000000; font-size: 1.1rem;"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="mt-3">
            <div class="account-content p-3">
                <h4 class="fw-bold">Payment Invoice</h4>

                <div class="update-content-container mt-3" id="update">
                <?php
                    $stmt = $conn->prepare("SELECT * FROM order_data WHERE userId = :userId AND invoiceNumber = :invoiceNumber");
                    $stmt ->bindParam(':userId', $userId);
                    $stmt ->bindParam(':invoiceNumber', $invoiceNumber);
                    $stmt ->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if($result[0]['status'] === "Paid"){
                ?>
                        <form action="" method="POST" class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="invoiceNumber" class="form-label fw-bold">Invoice Number</label>
                                        <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber" value="<?php echo $result[0]['invoiceNumber']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="referenceNumber" class="form-label fw-bold">Transaction/Reference Number</label>
                                        <input type="text" class="form-control" name="referenceNumber" id="referenceNumber" value="<?php echo $result[0]['referenceNumber']; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold">Paid Amount</label>
                                <input type="text" class="form-control" name="price" id="price" value="$<?php echo $result[0]['price']; ?>" readonly>
                            </div>
                        </form>

                <?php
                    }else if($result[0]['status'] === "Pending"){
                ?>
                        <form action="" method="POST" class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="invoiceNumber" class="form-label fw-bold">Invoice Number</label>
                                        <input type="text" class="form-control" name="invoiceNumber" id="invoiceNumber" value="<?php echo $result[0]['invoiceNumber']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4">
                                        <label for="referenceNumber" class="form-label fw-bold">Transaction/Reference Number</label>
                                        <input type="text" class="form-control" name="referenceNumber" id="referenceNumber">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label fw-bold">Paid Amount</label>
                                <input type="text" class="form-control" name="price" id="price" value="$">
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn pt-1 px-5 fw-bold" name="confirm-payment" id="confirm-payment" value="Confirm Payment" style="border: none; background-color: black; color: white;">Confirm Payment</button>
                            </div>
                        </form>
                <?php } ?>
                
                </div>
            </div>
        </div>
    </div>

    <div class="text-end fixed-top-container" id="top-container">
        <a href="" id="scroll-to-top">
            <i class="fa-solid fa-angle-up" style="background-color: black; color: #ffffff; padding: 13px; font-size: larger;"></i>
        </a>
    </div>

    <!-- Success Message -->

    <div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="userSuccessToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" id="successToastHead"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="successToastBody"></div>
    </div>
    </div>

    <!-- Error Message -->

    <div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div id="userErrorToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto" id="errorToastHead"></strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="errorToastBody"></div>
    </div>
    </div>

    <script>
        <?php
            if(isset($confirm) && $confirm === 0){
                echo 'document.addEventListener("DOMContentLoaded", function(){
                    var successToast = new bootstrap.Toast(document.getElementById("userSuccessToast"));
                    document.getElementById("successToastHead").innerHTML = "Payment Successful";
                    document.getElementById("successToastBody").innerHTML = "Your payment has been paid.";
                    successToast.show();

                    setTimeout(function(){
                        window.location.href = "account.php";
                    }, 3000);
                });';
            }
        ?>
    </script>

    <script>
        <?php
            if(isset($confirm) && $confirm === 1){
                echo 'document.addEventListener("DOMContentLoaded", function(){
                    var errorToast = new bootstrap.Toast(document.getElementById("userErrorToast"));
                    document.getElementById("errorToastHead").innerHTML = "Payment Error";
                    document.getElementById("errorToastBody").innerHTML = "Fill up all the fields.";
                    errorToast.show();
                });';
            }
        ?>
    </script>

    <script>
        if( window.history.replaceState ){
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
    
    <script src="../../js/userscript.js"></script>
    <script src="https://kit.fontawesome.com/296ff2fa8f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>
</html>