<?php

if (isset($_POST['delete_submit'])){
    require 'dbcinema.php';

    $idMovie = $_POST['idMovie'];
    $succes = false;
    $sql = "DELETE FROM movies WHERE idMovie='$idMovie'";

    if ($conn->query($sql) === TRUE) {
    //    header("Location: ../index.php");
        $succes = true;
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

}

else{
    echo "There was an error!";
}

?>

