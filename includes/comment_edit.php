<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit comment</title>
</head>
<body>
    
    <?php
        require 'dbcinema.php';
        require 'comments.php';

        $commentId = $_POST['commentId'];
        $movieId = $_POST['movieId'];
        $movieTitle = $_POST['movieTitle'];
        $username = $_POST['username'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        echo '
        <form id="comment-form" action="'.editComments($conn).'" method="post">
            <input type="hidden" name="commentId" value="'.$commentId.'">
            <input type="hidden" name="movieId" value="'.$movieId.'">
            <input type="hidden" name="movieTitle" value="'.$movieTitle.'">
            <input type="hidden" name="username" value="'.$username.'">
            <input type="hidden" name="date" value="'.$date.'">
            <textarea class="comment-text-form" name="comment" id="" cols="30" rows="5" placeholder="Enter your comment about your experience at our cinema ...">'.$comment.'</textarea>
            <button id="submit-comment" name="edit-comment" type="submit">Edit</button>
        </form>';
        
    ?>

</body>
</html>