<?php 

include('functions.php');
require('database.php');

if(isset($_POST['returnbook'])){

    $refID = $_POST["ref_id"];
    $isbn = $_POST["isbn_return"];

    if(grabBookStatus($conn, $isbn) == 'ONSITE'){
        header('location:../bookborrowinglist.php?error=bookonsite');
    }

    else{
        $sql_datereturn = "UPDATE bookborrowlist SET datereturned = CURDATE() WHERE refID = '$refID'";
        $sql_booklistreturn = "UPDATE booklist SET status='ONSITE' WHERE isbn = '$isbn'";

        if ($conn->query($sql_datereturn) === TRUE)
        {
            if($conn->query($sql_booklistreturn) === TRUE){
                header('Location: ../bookborrowinglist.php?error=none');
            }
        }
        else{
            header('Location:../bookborrowinglist.php?error=databaseissue');
        }
    }

}
else{
    header('location:../bookborrowinglist.php');
}

?>