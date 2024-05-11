<?php 
include('functions.php');
include('database.php');

$username = "admin";

if(existingUsername($conn, $username)){
    echo "Username exists";
}

else{
    echo "Username does not exist";
}



?>