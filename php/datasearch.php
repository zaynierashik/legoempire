<?php
    session_start();
    include 'connect.php';

    if(isset($_POST['search'])){
        $title = strtolower($_POST['search']);
        $itemNumber = $_POST['search'];
    }
    
    if($title != null || $itemNumber != null){
        $stmt = $conn->prepare("SELECT * FROM lego_data WHERE lower(title) LIKE :title || itemNumber LIKE :itemNumber");
        $stmt ->bindParam(':title', $titleLike);
        $stmt ->bindParam(':itemNumber', $itemNumberLike);
        $titleLike = '%' .$title. '%';
        $itemNumberLike = '%' .$itemNumber. '%';
        $stmt ->execute();
        $value = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $status = 1; 

        $getLego = array(); 
        foreach($value as $item){
            $getLego[] = $item['legoId'];
            $count++;
        }
    }else{
        $status = 0;
    }

    if(empty($getLego)){
?>
        <div style="margin-top: 10vh; font-size: 1.7rem; margin-left: 6.5vw; font-family: Poppins, sans-serif;">No results found.</div>
        <div style="margin-top: 1.5vh; font-size: 1.1rem; margin-left: 6.5vw; font-family: Poppins, sans-serif;">Redirecting to the homepage . . .</div>

<?php 
    }else{
        $queryString = http_build_query($getLego);
        header("location: userpage.php?count=$count&status=$status&$queryString");
    }    
?>

    <script>
        setTimeout(function(){
            window.location.href = "userpage.php";
        }, 2000);
    </script>