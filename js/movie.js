// MOVIE CLASS

class Movie{
    constructor(id, title, price, rating, genre, descr, img){
        this.id = id;
        this.title = title;
        this.price = price;
        this.rating = rating;
        this.genre = genre;
        this.descr = descr;
        this.img = img;
    }
}

// CREATE MOVIES

// movie1 = new Movie(1, "Joker", "3.00", 5, "Drama", "In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime.", "img/joker.jpg");
// movie2 = new Movie(2, "5Gang", "4.00", 3, "Horror", "The story is about friendship and family witch makes it an easy to watch, feel good movie. With a Christmas theme, the movie is a story told by grandpa Selly.", "img/5gang.jpg");
// movie3 = new Movie(3, "1917", "2.50", 4, "Adventure", "April 6th, 1917. As a regiment assembles to wage war deep in enemy territory, two soldiers are assigned to race against time and deliver a message.", "img/1917.jpg");
// movie4 = new Movie(4, "Bill & Ted face the music", "3.50", 2, "Comedy", "Once told they'd save the universe during a time-traveling adventure, 2 would-be rockers from San Dimas, California", "img/bill&ted.jpg");
// movie5 = new Movie(5, "The Death of Mr. Lazarescu", "5.00", 5, "Thriller", "Mr. Lãzãrescu, a dying old man, is shuttled from hospital to hospital by a loyal paramedic as doctors refuse to operate and no one can agree on a diagnosis.", "img/lazarescu.jpg");

// CREATE MOVIE CONTAINER/COMPONENT

function movieComponent(movie){
    return `
    <a href="movie.php?id=${movie.id}" id="movie-box" class="${movie.id}">
        <div id="movie-container">
            <div id="movie">
            
                <img src="${movie.img}" alt="" id="movie-image">
                <p id="price">$${movie.price}.00</p>
            

                <div id="movie-info"> 
                    <p id="rating">Rating: ${movie.rating}</p>
                    <p id="genre">${movie.genre}</p>
                </div>
            </div>

            <div id="movie-description">
                <p id="movie-title">${movie.title}</p>
                <p id="description-text">${movie.descr}</p>
            </div>
        </div>
        <form method="post" action="includes/delete_movie.php" name="delete-form" class="form-delete-movie">
            <input type="submit" name="delete" class="deleteBtn" value="${movie.id}">
        </form>
    </a>`;
}

// ADD THE CREATED MOVIE/COMPONENT TO THE LIST OF MOVIES

function addMovie(movieComponent){
    // var list = document.getElementById("scroll-top");
    var list = document.getElementById("movie-list");
    list.insertAdjacentHTML('afterbegin', movieComponent);
}

// POPULATE MOVIE LIST

var nrOfRows = Number($(".deleteBtn").val()) + 1;
console.log(nrOfRows);


// // CREATE COMPONENT FOR EACH MOVIE IN LIST

// function loadMovies(movieList){
//     for(let i = 1; i < movieList.length; i++)
//         addMovie(movieComponent(movieList[i]));
// }

// LOAD THE MOVIE INTO PAGE

// loadMovies(movieList);

// BUTTON TO ADD MOVIE - MODAL WINDOW

// document.getElementById("submit-add-movie").onclick = function (){

//     // VARIABLES

//     var movie_name = document.getElementById("movie-name").value;
//     var movie_price = document.getElementById("movie-price").value;
//     var movie_rating = document.getElementById("movie-rating").value;
//     var movie_genre = document.getElementById("movie-genre").value;
//     var movie_descr = document.getElementById("movie-descr").value;
//     var movie_img = document.getElementById("movie-img").value;
//     movie_img = movie_img.replace("C:\\fakepath\\", "img/");
    
//     newMovie = new Movie(movieList.length, movie_name, movie_price, movie_rating, movie_genre, movie_descr, movie_img);
//     movieList.push(newMovie);
//     addMovie(movieComponent(newMovie));
//     console.log(newMovie);
// }

// document.getElementById("movie-delete").onclick = function (){
//     var deleteBtn = document.getElementsByClassName("deleteBtn");
    
//     for (let i = 0; i < deleteBtn.length; i++)
//         deleteBtn[i].setAttribute("style", "display: inline");
    

//     // for (let i = 0; i < deleteBtn.length; i++)
//     //     if(deleteBtn[i].style.display == "inline")
//     //         deleteBtn[i].style.display = "none";
// }



$(document).ready(function(){
    var clicksDelete = 0;
    $("#movie-delete").click(function(){
        if(clicksDelete % 2 == 0){
            $(".deleteBtn").show();
            $("#movie-delete-box").show();
        }
        else{
            $(".deleteBtn").hide();
            $("#movie-delete-box").hide();
        }
        clicksDelete ++;
    });


    var clicksUpdate = 0;
    $("#movie-update").click(function(){
        if(clicksUpdate % 2 == 0){
            $(".deleteBtn").show();
            $("#movie-update-box").show();
        }
        else{
            $(".deleteBtn").hide();
            $("#movie-update-box").hide();
        }
        clicksUpdate ++;
    });
  });