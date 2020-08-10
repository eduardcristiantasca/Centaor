<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="icon" href="data:;base64,iVBORw0KGgo=">
    <link rel="shortcut icon" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="./js/ajax_register.js"></script>
    <script src="./js/ajax_login.js"></script>
    <script src="./js/ajax_movies.js"></script>
    
    <title>Centaor</title>
</head>
<body>
    <header>
        <!-- LEFT CONTAINER -->

        <div id="data">
            <!-- TITLE -->

            <h2>CENTAOR</h2>

            <!-- SELECT LOGIN / REGISTER -->
            
            <div id="box-login-register">
                <p id="login">Login</p>
                <span>-</span>
                <p id="register">Register</p>
            </div>

            <!-- LOGIN FORM -->

            <?php
                    if(isset($_SESSION['userId'])){
                        echo '
                        <form action="includes/logout.php"  method="post" id="form-logout" class="move-form">
                            <button id="logout" name="logout" id="logout" type="submit" >Logout</button>
                        </form>';
                    }
            ?>

            <form action="includes/logout.php" method="post" id="form-logout" class="move-form hide">
                <button id="logout" name="logout" id="logout" type="submit" >Logout</button>
            </form>';

            <form action="includes/login1.php"  method="post" id="form-login" class="move-form">
             
                
                <label for="email-login"><b>User:</b></label>
                <input type="text" placeholder="Enter email or username ..." name="email-username" id="email" >
                
                <label for="password">
                <b>Password:</b></label>
                <input type="password" placeholder="Enter password ..." name="password" id="password" >
                <button id="submit-login" name="login-submit" type="submit" >Login</button>
                <p class="form-message-login"></p>
            </form>
          

            <!-- NEWSLETTER FORM -->

            <div id="form-newsletter" class="move-form">
                <input type="text" placeholder="Enter Email" name="news" id="news" required>   
                <button type="submit">Subscribe</button>
            </div>
    
            <!-- REGISTER FORM -->


            <form id="form-register" class="move-form" action="includes/register1.php"  method="post">
                
                <label for="name-register"><b>Username: </b><span id="invalid-name">must contain letters and spaces</span></label>
                <input type="text" placeholder="Enter Name ..." name="name-register" id="name-register" >

                <label for="email-register"><b>Email: </b><span id="invalid-email">invalid email</span><span id="email-exist">already exists</span></label>
                <input type="text" placeholder="Enter Email ..." name="email-register" id="email-register" >
                
                <label for="password-register">
                <b>Password: </b><span id="invalid-password">invalid password</span></label>
                <input type="password" placeholder="Enter Password ..." name="password-register" id="password-register" >

                <label for="password-register-confirm">
                    <b>Confirm Password: </b><span id="invalid-password-confirm">passwords do not match</span></label>
                    <input type="password" placeholder="Confirm Password ..." name="password-register-confirm" id="password-register-confirm" >
                <button id="submit-register" name="register-submit" type="submit">Register</button>
                <p class="form-message"></p>
            </form>


            <!-- ADMIN CRUD FORM -->
            <div id="form-admin" class="move-form">
                <button type="submit" id="movie-add">Add Movie</button>
                <button type="submit" id="movie-update">Update Movie</button>
                <button type="submit" id="movie-delete">Delete Movie</button>
                <form method="post" action="includes/delete_movie.php"  name="movie-delete-box" id="movie-delete-box">
                    <input type="text" name="delete-input" id="delete-input" placeholder="Enter ID of the movie">
                    <input type="submit" value="Delete By ID" id="delete-submit" name="delete-submit">
                </form>
            </div>


            <!-- MODAL ADD MOVIE -->
            <!-- <form id="form-add-movie" class="modal" action="includes/add_movie1.php"  method="post" enctype="multipart/form-data"> -->
            <form id="form-add-movie" class="modal" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Complete the form below in order to add a movie</p>
                        <p class="close">&times;</p>
                    </div>
                    <div class="modal-form-container">
                        <div class="modal-form">
                            <label for="movie-name"><b>Name:</b></label>
                            <input type="text" placeholder="Enter the name of the movie" name="movie-name" id="movie-name" >

                            <label for="movie-price"><b>Price:</b></label>
                            <input type="text" placeholder="Enter the price of the movie" name="movie-price" id="movie-price" >

                            <label for="movie-rating"><b>Rating:</b></label>
                            <input type="text" placeholder="Enter the rating of the movie" name="movie-rating" id="movie-rating" >

                            <label for="movie-genre"><b>Genre:</b></label>
                            <input type="text" placeholder="Enter the genre of the movie" name="movie-genre" id="movie-genre" >

                        </div>

                        <div class="modal-form">
                            <label for="movie-descr"><b>Description:</b></label>
                            <textarea id="movie-descr" name="movie-descr" rows="7" cols="40" placeholder="Enter the description of the movie"></textarea>
                            
                            <label for="movie-img"><b>Image:</b></label>
                            <input type="file" placeholder="Enter the image of the movie" name="movie-img" id="movie-img" >   
                        </div>

                    </div>
                    <button id="submit-add-movie" name="submit-add-movie" type="submit">Add Movie</button>
                    <p id="form-add-movie-message" style="color: red"></p>
                </div>
    
            </form>

            <form id="form-update-movie" class="modal" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <p>Complete the form below in order to update a movie</p>
                        <p class="close-update">&times;</p>
                    </div>
                    <div class="modal-form-container">
                        <div class="modal-form">
                            <label for="movie-name-update"><b>Name:</b></label>
                            <input type="text" placeholder="Enter the name of the movie" name="movie-name-update" id="movie-name-update" >

                            <label for="movie-price-update"><b>Price:</b></label>
                            <input type="text" placeholder="Enter the price of the movie" name="movie-price-update" id="movie-price-update" >

                            <label for="movie-rating-update"><b>Rating:</b></label>
                            <input type="text" placeholder="Enter the rating of the movie" name="movie-rating-update" id="movie-rating-update" >

                            <label for="movie-genre-update"><b>Genre:</b></label>
                            <input type="text" placeholder="Enter the genre of the movie" name="movie-genre-update" id="movie-genre-update" >

                        </div>

                        <div class="modal-form">
                            <label for="movie-descr-update"><b>Description:</b></label>
                            <textarea id="movie-descr-update" name="movie-descr-update" rows="7" cols="40" placeholder="Enter the description of the movie"></textarea>
                            
                            <label for="movie-img-update"><b>Image:</b></label>
                            <input type="file" placeholder="Enter the image of the movie" name="movie-img-update" id="movie-img-update" >   

                            <label for="movie-id-update"><b>ID:</b></label>
                            <input type="text" placeholder="Enter the genre of the movie" name="movie-id-update" id="movie-id-update" >
                        </div>

                    </div>
                    <button id="submit-update-movie" name="submit-update-movie" type="submit">Update Movie</button>
                    <p id="form-update-movie-message" style="color: rgba(0, 0, 128, 0.500);"></p>
                </div>
    
            </form>
        </div>

        <!-- Trigger/Open The Modal -->

        
    </header>

    <!-- RIGHT CONTAINER -->

    <main id="list">

        <!-- SEARCH BAR + FILTER -->

        <div id="search-bar" name="search-link">

            <!-- SEARCH INPUT -->

            <span id="search-text">
                <input type="text" id="search" autocomplete="off" placeholder="Search Movie">
            </span> 
            
            <!-- FILTER -->

            <span id="filter">

                <!-- PRICE FILTER -->

                <span id="by-price" class="by-anim">
                    <span id="descendent-order" class="order-icon"></span>
                    <span class="by">Price</span>
                    <span id="ascendent-order" class="order-icon"></span>
                </span>

                <!-- RATING FILTER -->

                <span  id="by-rating" class="by-anim">
                    <span id="descendent-order" class="order-icon"></span>
                    <span id="by-rating" class="by">Rating</span>
                    <span id="ascendent-order" class="order-icon"></span>
                </span>

                <!-- GENRE FILTER -->

                <span  id="by-genre" class="by-anim">
                    <span id="descendent-order" class="order-icon"></span>
                    <span id="by-genre" class="by">Genre</span>
                    <span id="ascendent-order" class="order-icon"></span>
                </span>
            </span>
        </div>
        
        <!-- MOVIE LIST -->
        <div id="movie-list">
        <p class="delete-message"></p>
        <?php
            require './includes/dbcinema.php';
            
            $sql = "SELECT * FROM movies ORDER BY idMovie DESC";

            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                echo "SQL statement failed!";
            }
            else{
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)){
                   
                    echo '
                <a href="movie.php?id='.$row["idMovie"].'&title='.$row["movieTitle"].'" id="movie-box" class="'.$row["idMovie"].'">
                    <div id="movie-container">
                    <div id="movie">
                        <img src="img/'.$row["movieImg"].'" alt="" id="movie-image">
                        <p id="price">$'.$row["moviePrice"].'.00</p>
        
                        <div id="movie-info"> 
                            <p id="rating">Rating: '.$row["movieRating"].'</p>
                            <p id="genre">'.$row["movieGenre"].'</p>
                        </div>
                    </div>
                    <div id="movie-description">
                        <p id="movie-title">'.$row["movieTitle"].'</p>
                        <p id="description-text">'.$row["movieDescr"].'</p>
                    </div>
                </div>
                
                    <input type="submit" name="delete" class="deleteBtn" value="'.$row["idMovie"].'">
               
                </a>';
                
                }
            }            
        ?>
        </div>


        <!-- SCROLL TOP ICON -->

        <div id="scroll-top" >
            <div id="to-top" onclick='window.scrollTo({top: 0, behavior: "smooth"});'></div>
            <div id="shadow"></div>
        </div>

        <!-- FOOTER -->

        <footer>
            <ul>
                <li><a href="about.html" target="_blank">About</a></li>
                <li><a href="contact.html" target="_blank">Contact</a></li>
                <li><a href="support.html" target="_blank">Support</a></li>
            </ul>
            <p id="copy">&copy Tasca Eduard Cristian</p>
        </footer>
    </main>

    <!-- JAVASCRIPT -->

    <script src="./js/movie.js"></script>
    <!-- <script src="./js/filters.js"></script> -->
    <script src="./js/user.js"></script>
    <script src="./js/register.js"></script>
    <script src="./js/login.js"></script>

    <script>
        // Get the modal
        var modal = document.getElementById("form-add-movie");
        
        // Get the button that opens the modal
        var btn = document.getElementById("movie-add");
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "flex";
          document.getElementById("list").style.zIndex = "-1";
        }
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
          document.getElementById("list").style.zIndex = "0";
        }
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
            document.getElementById("list").style.zIndex = "0";
          }
        }
        
        var modal_update = document.getElementById("form-update-movie");
            
            // Get the button that opens the modal
            var btn_update = document.getElementById("movie-update");
            
            // Get the <span> element that closes the modal
            var span_update = document.getElementsByClassName("close-update")[0];
            
            // When the user clicks the button, open the modal 
            btn_update.onclick = function() {
            modal_update.style.display = "flex";
            document.getElementById("list").style.zIndex = "-1";
            }
            
            // When the user clicks on <span> (x), close the modal
            span_update.onclick = function() {
            modal_update.style.display = "none";
            document.getElementById("list").style.zIndex = "0";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal_update) {
                    modal_update.style.display = "none";
                    document.getElementById("list").style.zIndex = "0";
                }
            }
    </script>

    <script>
            // Get the modal

            
        </script>
    
    <script>
    // $("#email, #password").css("border-bottom","1px solid black");

    
    var adminCheck = "<?php echo $_SESSION['username']; ?>";
    console.log(adminCheck);
    if(adminCheck == "admin"){
        var form_login = document.getElementById("form-login");
        var form_newsletter = document.getElementById("form-newsletter");
        var form_admin = document.getElementById("form-admin");
        
        // SHOW THE ADMIN CRUD FORM / HIDE OTHER

        form_login.classList.add("form-login-show");
        form_newsletter.classList.add("newsletter-show");
        form_admin.style.display = "flex";
        
    }

    // if (errorEmpty == true || errorUserMail == true || errorPass == true){
    //     $("#email, #password").css("border-bottom", "1px solid red");
    // }

    // if (errorEmpty == false && errorUserMail == false && errorPass == false){
    //     $("#email, #password").val("");
    // }

</script>
</body>
</html>