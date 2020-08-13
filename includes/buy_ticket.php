<?php
    session_start();
    require "dbcinema.php";

    if(isset($_POST['submit-buy-movie'])){
        $total = $_POST['quantity-price'];
        $movieId = $_POST['movieId'];
        $userId = $_POST['userId'];
        $title = $_POST['movieTitle'];
        $dateBuy = $_POST['dateBuy'];
        $quantity = $_POST['quantity'];
        
        $sql = "INSERT INTO cart (userId, movieId, movieTitle, totalPrice, dateBuy, quantity) 
                VALUES ('$userId', '$movieId', '$title', '$total', '$dateBuy', '$quantity')";
        $result = $conn->query($sql); 

        if($result){
            $nrCrt = 1;
            $to = $_SESSION['email'];
            $sub = "Your bought tickets for: " .$title;
            $msq = "This are your tickets: \r\n";

            while($quantity != 0){
                $code = md5($dateBuy + $quantity);
                $msg .= "Ticket ".$nrCrt.": " .$code."\r\n";
                $quantity --;
                $nrCrt ++;
            }
            $msg .= "Thank you for choosing Centaor!";
            mail($to,$sub,$msg);
            header("Location: ../index.php?");
        }
    }
    
?>