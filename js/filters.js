// BUTTON TO SORT MOVIES BY PRICE


document.getElementById("by-price").onclick = function () {
    loadMovies(sortByPrice(movieList));
}

document.getElementById("by-rating").onclick = function () {
    loadMovies(sortByRating(movieList));
}

document.getElementById("by-genre").onclick = function () {
    loadMovies(sortByGenre(movieList));
}


function sortByPrice(userList){
    var len = userList.length;
    for (var i = len-1; i>=0; i--){
      for(var j = 1; j<=i; j++){
        if(userList[j-1].price<userList[j].price){
            var temp = userList[j-1];
            userList[j-1] = userList[j];
            userList[j] = temp;
         }
      }
    }
    return userList;
} 

function sortByRating(userList){
    var len = userList.length;
    for (var i = len-1; i>=0; i--){
      for(var j = 1; j<=i; j++){
        if(userList[j-1].rating<userList[j].rating){
            var temp = userList[j-1];
            userList[j-1] = userList[j];
            userList[j] = temp;
         }
      }
    }
    return userList;
}

function sortByGenre(userList){
    var len = userList.length;
    for (var i = len-1; i>=0; i--){
      for(var j = 1; j<=i; j++){
        if(userList[j-1].genre<userList[j].genre){
            var temp = userList[j-1];
            userList[j-1] = userList[j];
            userList[j] = temp;
         }
      }
    }
    return userList;
} 

 console.log(sortByPrice(movieList)); //[2, 3, 4, 5, 7, 9]
 console.log(sortByRating(movieList)); //[2, 3, 4, 5, 7, 9]
 console.log(sortByGenre(movieList)); //[2, 3, 4, 5, 7, 9]
