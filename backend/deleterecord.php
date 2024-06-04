<?php 

require ('database.php');

if (isset($_POST['deleterecord'])){
    $refBorrowID = $_POST["refID"];
    $sql = "DELETE FROM bookborrowlist WHERE refID = $refBorrowID";

    if($conn->query($sql) == TRUE){
        session_start();
        $_SESSION['alert'] = 7;
        header('location:../bookborrowinglist.php');
        exit();
    }


    

}

else{
    header('Location:../bookborrowinglist.php');
}
?>