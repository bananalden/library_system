<?php 

require('database.php');

if(isset($_POST['deletedata'])){

    $userID = $_POST['userid_delete'];

    $sql = "DELETE FROM admin WHERE adminID = '$userID';";

    if($conn->query($sql) == TRUE){
        header('location: ../userlist.php?delete=0');
    }

    else{
        header('location: ../userlist.php?delete=1');
    }

}
else{
    header('location: ../userlist.php');
}


?>