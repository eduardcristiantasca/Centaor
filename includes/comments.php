<?php
    
    function setComments($conn) {
        if(isset($_POST['submit-comment'])){
            $username = $_POST['username'];
            $movieId = $_POST['movieId'];
            $movieTitle = $_POST['movieTitle'];
            $date = $_POST['date'];
            $comment = $_POST['comment'];
            

            $sql = "INSERT INTO comments (userId, movieId, movieTitle, date, comment) 
                    VALUES ('$username', '$movieId', '$movieTitle', '$date', '$comment')";
            $result = $conn->query($sql);
        }
    }

    function deleteComments($conn){
        if(isset($_POST['delete-comment'])){
            $commentId = $_POST['commentId'];
            $movieId = $_POST['movieId'];
            $movieTitle = $_POST['movieTitle'];
        
            $sql = "DELETE FROM comments WHERE commentId = '$commentId'";
            $result = $conn->query($sql);
            header("Location: movie.php?id=$movieId&title=$movieTitle");
        }
    }

    function editComments($conn) {
        if(isset($_POST['edit-comment'])){
            $commentId = $_POST['commentId'];
            $movieId = $_POST['movieId'];
            $movieTitle = $_POST['movieTitle'];
            $username = $_POST['username'];
            $date = $_POST['date'];
            $comment = $_POST['comment'];
            

            $sql = "UPDATE comments SET comment = '$comment' WHERE commentId = '$commentId'";
            $result = $conn->query($sql);
            header("Location: ../movie.php?id=$movieId&title=$movieTitle");
        }
    }

    function getComments($conn, $movieId){
        $sql = "SELECT * FROM comments WHERE movieID = '$movieId' ORDER BY commentId DESC";
        $result = $conn->query($sql);    
        while($row = $result->fetch_assoc()){
            $id = $row['userId'];
            $sql2 = "SELECT * FROM users WHERE idUser='$id'";
            $result2 = $conn->query($sql2); 
            if($row2 = $result2->fetch_assoc())
                echo '
                    <div class="comment-box">
                        <div class="comment-header">
                            <p class="comment-username"><span class="username-itself">'.$row2['userName'].' - </span>'.$row['date'].'</p>';
                            if(isset($_SESSION['userId']))
                                if($_SESSION['userId'] == $row2['idUser'])
                                    echo '
                                        <form class="comment-control" method="POST" action="./includes/comment_edit.php">
                                            <input type="hidden" name="commentId" value="'.$row['commentId'].'">
                                            <input type="hidden" name="movieId" value="'.$row['movieId'].'">
                                            <input type="hidden" name="movieTitle" value="'.$row['movieTitle'].'">
                                            <input type="hidden" name="username" value="'.$row['userId'].'">
                                            <input type="hidden" name="date" value="'.$row['date'].'">
                                            <input type="hidden" name="comment" value="'.$row['comment'].'">
                                            <button type="submit" class="comment-button">Edit</button>
                                        </form>
                                        <form class="comment-control" method="POST" action="'.deleteComments($conn).'">
                                            <input type="hidden" name="commentId" value="'.$row['commentId'].'">
                                            <input type="hidden" name="movieId" value="'.$row['movieId'].'">
                                            <input type="hidden" name="movieTitle" value="'.$row['movieTitle'].'">
                                            <button type="submit" name="delete-comment" class="comment-button red-back">Delete</button>
                                        </form>';
                                            
                    echo '
                        </div>
                            <p class="comment-user">'.nl2br($row['comment']).'</p>
                    </div>';
        }
    }


