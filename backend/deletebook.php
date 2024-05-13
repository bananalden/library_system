<?php 

require('database.php');

if(isset($_POST['deletedata'])){

    $isbn = $_POST['isbn_delete'];

    $sql = "DELETE FROM booklist WHERE isbn = '$isbn'";

    if($conn->query($sql) == TRUE){
        session_start();
        $_SESSION['alert'] = 3;
        header('location: ../booklisting.php?delete=0');
    }

    else{
        header('location: ../booklisting.php?delete=1');
    }

}
else{
    header('location: ../booklisting.php');
}


?>