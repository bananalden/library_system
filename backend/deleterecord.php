<?php 

require ('database.php');
include ('functions.php');

if (isset($_POST['deleterecord'])){
    $refBorrowID = $_POST["refID"];
    $isbn = $_POST["recordisbn"];
    $sql = "DELETE FROM bookborrowlist WHERE refID = $refBorrowID";

    if(!existingBook($conn, $isbn)){
        session_start();
        $_SESSION['alert'] = 1;
        header('Location: ../bookborrowinglist.php?error=nobook');
    }

    else{
        
        if($conn->query($sql) == TRUE){
            session_start();
            $_SESSION['alert'] = 7;
            header('location:../bookborrowinglist.php');
            exit();
    }

    }


    

}

else{
    header('Location:../bookborrowinglist.php');
}
?>