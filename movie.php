<?php
    date_default_timezone_set('Europe/Bucharest');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/movie.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="./js/utilities.js"></script>
    <?php
        $title = $_GET['title'];
        echo '<title>Buy Ticket: '.$title.'</title>';
    ?>
    
</head>
<body>
    <div id="middle">
        <a href="index.php"><h2>CENTAOR</h2></a>
        <?php
            
            require './includes/dbcinema.php';
            require './includes/comments.php';
            
            $idMovie = $_GET['id'];
            $moviePrice = 0;
            $sql = "SELECT * FROM movies WHERE idMovie='$idMovie'";

            $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "SQL statement failed!";
                }
                else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while ($row = mysqli_fetch_assoc($result)){
                        $moviePrice = $row["moviePrice"];
                        echo '
                        <header>
                            <div id="details">
                                <h4 class="movie-detail movie-title">'.$row["movieTitle"].'</h4>
                                <hr>
                                <p class="movie-detail">Price: $'.$row["moviePrice"].'.00</p>
                                <hr>
                                <p class="movie-detail">Rating: '.$row["movieRating"].'</p>
                                <hr>
                                <p class="movie-detail">Genre: '.$row["movieGenre"].'</p>
                                <hr>
                                <p class="movie-detail">Description:</p>
                                <p class="movie-detail descr">'.$row["movieDescr"].'</p>
                            
                            </div>
                            <img src="img/'.$row["movieImg"].'">
                        </header>
                        ';
                    }
                }    

            if(isset($_SESSION['username'])){
                $username = $_SESSION['username'];
                echo '
                    

                    <form id="buy-ticket-form" action="includes/buy_ticket.php"  method="post">
                        
                        <div id="quantity-price-text">
                        <label id="quantity-text" for="quantity"><b>Quantity:</b></label>
                            <div class="quantity">
                                <input type="number" id="quantity" name="quantity" min="1" max="9" step="1" value="1">  
                            </div>
                            <span id="total-price">Total Price: <input type="text" id="quantity-price" name="quantity-price" value="'.$moviePrice.'"  >.00$</span>
                        </div>
                        <input type="hidden" name="movieId" value="'.$idMovie.'">
                        <input type="hidden" name="userId" value="'.$_SESSION['userId'].'">
                        <input type="hidden" name="movieTitle" value="'.$title.'">
                        <input type="hidden" name="dateBuy" value="'.date('Y-m-d H:i:s').'">
                        <label for="full-name"><b>Full Name:</b></label>
                        <input type="text" placeholder="Enter full name" name="full-name" id="full-name" >
            
                        <label for="card-number"><b>Credit Card Number:</b></label>
                        <input type="text" placeholder="Enter the credit card number" name="card-number" id="card-number" >
            
                        <label for="security-card-number"><b>Credit Card Security Number:</b></label>
                        <input type="text" placeholder="Enter the credit card security number" name="security-card-number" id="security-card-number" >
                        <div id="terms-cond">
                            <input type="checkbox" name="terms" id="terms">
                            <span id="terms">In order to buy the ticket you have to agree with our <span class="red-text">Terms and Conditions</span>.</span>
                        </div>
                        <button id="submit-buy-movie" name="submit-buy-movie" type="submit">Buy Ticket</button>
                    </form>';
                  
                    echo '
                    <form id="comment-form" action="'.setComments($conn).'" method="post">
                        <input type="hidden" name="username" value="'.$_SESSION['userId'].'">
                        <input type="hidden" name="movieId" value="'.$idMovie.'">
                        <input type="hidden" name="movieTitle" value="'.$title.'">
                        <input type="hidden" name="date" value="'.date('Y-m-d H:i:s').'">
                        <textarea class="comment-text-form" name="comment" id="" cols="30" rows="5" placeholder="Enter your comment about your experience at our cinema ..."></textarea>
                        <button id="submit-comment" name="submit-comment" type="submit">Comment</button>
                    </form>';
            }
            else{
                echo '<p class="info-buy">You have to be logged in in order to buy ticket or to comment<p>';
            }
            
            getComments($conn, $idMovie);
        ?>
        
        <footer>
            <ul>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="support.html">Support</a></li>
            </ul>
            <p id="copy">&copy Tasca Eduard Cristian</p>
        </footer>
    </div>
</body>
</html>