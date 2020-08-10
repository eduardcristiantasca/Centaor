$(document).ready(function() {

    $("#form-add-movie").on('submit', function(e) {

        e.preventDefault();
        $.ajax({
            url: "includes/add_movie1.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
                
                $("#form-add-movie-message").html(data);

                if(data == "Movie successfully uploaded!"){
                    var movie_img = $("#movie-img").val();
                    movie_img = movie_img.replace("C:\\fakepath\\", "img/");
                    newMovie = new Movie(Number(nrOfRows), $("#movie-name").val(), $("#movie-price").val(), $("#movie-rating").val(), $("#movie-genre").val(), $("#movie-descr").val(), movie_img);
                    addMovie(movieComponent(newMovie));
                    nrOfRows ++;
                }
            }
        });
    });

    $("#form-update-movie").on('submit', function(e) {

        e.preventDefault();
        $.ajax({
            url: "includes/update_movie.php",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                console.log(data);
                
                $("#form-update-movie-message").html(data);

                if(data == "Movie successfully updated!"){
                    console.log(data);
                    // var movie_img = $("#movie-img").val();
                    // movie_img = movie_img.replace("C:\\fakepath\\", "img/");
                    // newMovie = new Movie(Number(nrOfRows), $("#movie-name").val(), $("#movie-price").val(), $("#movie-rating").val(), $("#movie-genre").val(), $("#movie-descr").val(), movie_img);
                    // // addMovie(movieComponent(newMovie));
                    // nrOfRows ++;
                }
            }
        });
    });

    // $(document).ready(function() {
        $("#movie-delete-box").submit(function(event) {
            
            event.preventDefault();
            var idMovie = $("#delete-input").val();
            var delete_submit = $("#delete-submit").val();

            console.log(idMovie);
            $("."+idMovie).remove();
            
            $(".delete-message").load("includes/delete_movie.php", {
                idMovie: idMovie,
                delete_submit: delete_submit
                });
            });
            
        // });

});

