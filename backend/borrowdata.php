<?php 

include ('functions.php');
require ('database.php');

if (isset($_POST["insertborrowdata"])){
    $isbn = $_POST["isbn"];
    $booktitle = $_POST["title"];
    $studentID = $_POST["studentID"];
    $studentName = $_POST["studentName"];
    $dueDate = $_POST["dueDate"];
    $curDate = date("Y-m-d");

    if(!existingBook($conn, $isbn)){
        header('Location: ../bookborrowinglist.php?error=nobook');
    }
    else if(grabBookStatus($conn, $isbn) == 'AWAY'){
        header('Location: ../bookborrowinglist.php?error=bookaway');
    }
    else if($dueDate <= $curDate){
        header('Location: ../bookborrowinglist.php?error=duedateinvalid');
    }

    else{
        $sql_insert = "INSERT INTO bookborrowlist (bookID, booktitle, studentID, studentName, dateborrowed, datedue) VALUES ('$isbn', '$booktitle','$studentID','$studentName', CURDATE(), '$dueDate');";
        $sql_update ="UPDATE booklist SET status='AWAY' WHERE isbn='$isbn';";

        if ($conn->query($sql_insert) === TRUE)
        {
            if($conn->query($sql_update) === TRUE){
                header('Location:../bookborrowinglist.php?error=none');
            }
        }

        else{
            header('Location:../bookborrowinglist.php?error=databaseissue');
        }

    }

}


?>