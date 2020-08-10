<?php

if (isset($_POST['submit-add-movie'])) {

    require 'dbcinema.php';


    $movie_title = $_POST['movie_name'];
    $movie_price = $_POST['movie_price'];
    $movie_rating = $_POST['movie_rating'];
    $movie_genre = $_POST['movie_genre'];
    $movie_descr = $_POST['movie_descr'];
    // $movie_img = $_POST['movie_img'];
    $movie_img = $_FILES['movie_img']['tmp_name'];
  
    $errorEmpty = false;
    $errorMovieName = false;
    $errorMoviePrice = false;
    $errorMovieRating = false;
    $errorMovieGenre = false;
    $errorMovieDescr = false;
    $errorMovieImg = false;
    
    if (empty($movie_title) || empty($movie_price) || empty($movie_rating) || empty($movie_genre) || empty($movie_descr) || empty($movie_img)) {
        echo "<span class=\"error-color\">*Fill in all fields!</span>";
        $errorEmpty = true;
    }

    else if (empty($movie_title)) {
        $errorMovieName = true;
    }

    else if (empty($movie_price)) {
        $errorMoviePrice = true;
    }

    else if (empty($movie_rating)) {
        $errorMovieRating = true;
    }

    else if (empty($movie_genre)) {
        $errorMovieGenre = true;
    }

    else if (empty($movie_descr)) {
        $errorMovieDescr = true;
    }

    else if (empty($movie_img)) {
        $errorMovieImg = true;
    }

    else {
        $sql = "INSERT INTO movies (movieTitle, moviePrice, movieRating, movieGenre, movieDescr, movieImg) VALUES ('$movie_title', '$movie_price', '$movie_rating', '$movie_genre', '$movie_descr', '$img')";
        mysqli_query($conn, $sql);
       
        
    }

    // else {
    //     $sql = "SELECT userName FROM users WHERE userName=?";
    //     $stmt = mysqli_stmt_init($connn);
    //     if (!mysqli_stmt_prepare($stmt, $sql)) {
    //         header("Location: ../index.php?error=sqlerror");
    //         exit();
    //     }
    //     else{
    //         mysqli_stmt_bind_param($stmt, "s", $username);
    //         mysqli_stmt_execute($stmt);
    //         mysqli_stmt_store_result($stmt);
    //         $resultCheck = mysqli_stmt_num_rows($stmt);
    //         if ($resultCheck > 0) {
    //             echo "<span class=\"error-color\">*User taken!</span>";
    //             $errorUserTaken = true;
    //         }

    //         else{
    //             $sql = "INSERT INTO users (userName, userEmail, userPwd) VALUES (?, ?, ?)";
    //             $stmt = mysqli_stmt_init($connn);
    //             if (!mysqli_stmt_prepare($stmt, $sql)) {
    //                 header("Location: ../index.php?error=sqlerror");
    //                 exit();
    //             }
    //             else{
    //                 $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    //                 mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
    //                 mysqli_stmt_execute($stmt);
    //                 echo "<span>Register succes!</span>";
    //             }
    //         }
    //     }
    // }
    // // mysqli_stmt_close($stmt);
    // mysqli_close($connn);

}
else{
    echo "There was an error!";
}

?>

<script>
    $("#movie-name, #movie-price, #movie-genre, #movie-rating, #movie-descr").css("border-bottom","1px solid black");
    $("#movie_img").css("border-bottom","none");

    var errorEmpty = "<?php echo $errorEmpty; ?>";
    var errorMovieName = "<?php echo $errorMovieName; ?>";
    var errorMoviePrice = "<?php echo $errorMoviePrice; ?>";
    var errorMovieRating = "<?php echo $errorMovieRating; ?>";
    var errorMovieGenre = "<?php echo $errorMovieGenre; ?>";
    var errorMovieDescr = "<?php echo $errorMovieDescr; ?>";
    var errorMovieImg = "<?php echo $errorMovieImg; ?>";

    // if (errorEmpty == true){
    //     $("#movie-name, #movie-price, #movie-genre, #movie-rating, #movie-descr, #movie_img").css("border-bottom", "1px solid red");
    // }

    if (errorMovieName == true){
        $("#movie-name").css("border-bottom", "1px solid red");
    }
    
    if (errorMoviePrice == true){
        $("#movie-price").css("border-bottom", "1px solid red");
    }

    if (errorMovieRating == true){
        $("#movie-rating").css("border-bottom", "1px solid red");
    }

    if (errorMovieGenre == true){
        $("#movie-genre").css("border-bottom", "1px solid red");
    }

    if (errorMovieDescr == true){
        $("#movie-descr").css("border-bottom", "1px solid red");
    }

    if (errorMovieImg == true){
        $("#movie_img").css("border-bottom", "1px solid red");
    }


    // if (errorEmpty == false || errorUserMail == false || errorPass == false){
    //     $("#email, #password").val("");
    // }

</script>
