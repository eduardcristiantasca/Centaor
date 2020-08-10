<?php

// if (isset($_POST['submit-add-movie'])) {

    require 'dbcinema.php';

    $newFileName = $_POST['movie-name'];
    if (empty($_POST['movie-name'])){
        $newFileName = "gallery";
    }
    else {
        $newFileName = strtolower(str_replace(" ", "-", $newFileName));
    }

    // $data = "dasdas";
    $movie_title = $_POST['movie-name'];
    $movie_price = $_POST['movie-price'];
    $movie_rating = $_POST['movie-rating'];
    $movie_genre = $_POST['movie-genre'];
    $movie_descr = $_POST['movie-descr'];
    $movie_img = $_FILES['movie-img'];

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

    if (in_array($img_actual_ext, $allowed)) {
        if ($img_error === 0) {
            if ($img_size < 2000000) {
                $img_full_name = $newFileName . "." . uniqid("", true) . "." . $img_actual_ext;
                $fileDestination = "../img/" . $img_full_name;
                
                if (empty($movie_title) || empty($movie_price) || empty($movie_rating) || empty($movie_genre) || empty($movie_descr) || empty($movie_img)) {
                    echo "Fill in all fields!";
                    exit();
                }

                else{
                    $sql = "SELECT * FROM movies;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)){
                        echo "SQL statement failed!";
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;
                        
                        $sql = "INSERT INTO movies (movieTitle, moviePrice, movieRating, movieGenre, movieDescr, movieImg, orderMovie) VALUES (?, ?, ?, ?, ?, ?, ?);";
                        if (!mysqli_stmt_prepare($stmt, $sql)){
                            echo "SQL statement failed!";
                        }
                        else{
                            mysqli_stmt_bind_param($stmt, "siissss", $movie_title, $movie_price, $movie_rating, $movie_genre, $movie_descr, $img_full_name, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($img_temp_name, $fileDestination);
                            // header("Location: ../index.php?upload=succes");
                            // echo json_encode(['success' => true]);
                            echo "Movie successfully uploaded!";
                            exit();
                        }
                    }
                }
            }
            else {
                echo "File size is too big!";
                exit();
            }
        }
        else{
            echo "You had an error!";
            exit();
        }
    }
    else{
        echo "You need to upload a proper image type!";
        exit();
    }
// }
?>


