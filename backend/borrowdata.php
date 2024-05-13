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
        session_start();
        $_SESSION['alert'] = 1;
        header('Location: ../bookborrowinglist.php?error=nobook');
    }
    else if(grabBookStatus($conn, $isbn) == 'AWAY'){
        session_start();
        $_SESSION['alert'] = 4;
        header('Location: ../bookborrowinglist.php?error=bookaway');
    }
    else if($dueDate <= $curDate){
        session_start();
        $_SESSION['alert'] = 3;
        header('Location: ../bookborrowinglist.php?error=duedateinvalid');
    }

    else{
        $sql_insert = "INSERT INTO bookborrowlist (bookID, booktitle, studentID, studentName, dateborrowed, datedue) VALUES ('$isbn', '$booktitle','$studentID','$studentName', CURDATE(), '$dueDate');";
        $sql_update ="UPDATE booklist SET status='AWAY' WHERE isbn='$isbn';";

        if ($conn->query($sql_insert) === TRUE)
        {
            if($conn->query($sql_update) === TRUE){
                session_start();
                $_SESSION['alert'] = 5;
                header('Location:../bookborrowinglist.php?error=none');
            }
        }

        else{
            header('Location:../bookborrowinglist.php?error=databaseissue');
        }

    }

}


?>