<?php

// if (isset($_POST['submit-add-movie'])) {

    require 'dbcinema.php';

    // $newFileName = $_POST['movie-name'];
    // if (empty($_POST['movie-name'])){
    //     $newFileName = "gallery";
    // }
    // else {
    //     $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    // }

    // $data = "dasdas";
    $movie_id = $_POST['movie-id-update'];
    $movie_title = $_POST['movie-name-update'];
    $movie_price = $_POST['movie-price-update'];
    $movie_rating = $_POST['movie-rating-update'];
    $movie_genre = $_POST['movie-genre-update'];
    $movie_descr = $_POST['movie-descr-update'];
    $movie_img = $_FILES['movie-img-update'];
    $succes = 0;

    $img_name = $movie_img["name"];
    $img_type = $movie_img["type"];
    $img_temp_name = $movie_img["tmp_name"];
    $img_error = $movie_img["error"];
    $img_size = $movie_img["size"];

    $img_ext = explode(".", $img_name);
    $img_actual_ext = strtolower(end($img_ext));
    
    $allowed = array("jpg", "jpeg", "png");

    // $errorEmpty = false;
    // $errorMovieName = false;
    // $errorMoviePrice = false;
    // $errorMovieRating = false;
    // $errorMovieGenre = false;
    // $errorMovieDescr = false;
    // $errorMovieImg = false;
    
    // $return_data = array();

    if(empty($movie_id == TRUE)){
        echo "You must select an ID";
        exit();
    }

    if(empty($movie_title == FALSE)){
        $sql = "UPDATE movies SET movieTitle='$movie_title' WHERE idMovie='$movie_id'"; 
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }

    if(empty($movie_price == FALSE)){
        $sql = "UPDATE movies SET moviePrice='$movie_price' WHERE idMovie='$movie_id'"; 
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }

    if(empty($movie_rating == FALSE)){
        $sql = "UPDATE movies SET movieRating='$movie_rating' WHERE idMovie='$movie_id'"; 
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }

    if(empty($movie_genre == FALSE)){
        $sql = "UPDATE movies SET movieGenre='$movie_genre' WHERE idMovie='$movie_id'"; 
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }

    if(empty($movie_descr == FALSE)){
        $sql = "UPDATE movies SET movieDescr='$movie_descr' WHERE idMovie='$movie_id'"; 
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }

    if(empty($img_name == FALSE)){
        $newFileName = $_POST['movie-name-update'];
        if (empty($_POST['movie-name-update'])){
            $newFileName = "gallery";
        }
        else {
            $newFileName = strtolower(str_replace(" ", "-", $newFileName));
        }

        $img_full_name = $newFileName . "." . uniqid("", true) . "." . $img_actual_ext;
        $fileDestination = "../img/" . $img_full_name;
        $sql = "UPDATE movies SET movieImg='$img_full_name' WHERE idMovie='$movie_id'"; 
        move_uploaded_file($img_temp_name, $fileDestination);
        if(mysqli_query($conn, $sql)){ 
            $succes++; 
        } else { 
            echo "ERROR: Could not able to execute $sql. "  
                                    . mysqli_error($conn); 
        }  
        
    }
    
    if($succes == 0){
        echo "Fill at least one field!";
    }

    else{
        echo "Movie successfully updated!";
    }
    mysqli_close($conn); 
    // if(empty($movie_title == FALSE)){
    //     $sql = "UPDATE movies SET movieTitle='$movie_title' WHERE idMovie='$movie_id'"; 
    //     if(mysqli_query($conn, $sql)){ 
    //         $succes++; 
    //     } else { 
    //         echo "ERROR: Could not able to execute $sql. "  
    //                                 . mysqli_error($conn); 
    //     }  
    //     mysqli_close($conn); 
    // }
// }
?>


