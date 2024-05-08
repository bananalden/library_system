<?php 
require('database.php');

if(isset($_POST["insertdata"]))
{

    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $isbn = $_POST["isbn"];

    if(filter_var($isbn, FILTER_VALIDATE_INT) !== false){

        echo "Valid Integer";
        header('Location: booklisting.php');

    }

    else
    {
        echo "Invaid integer";
        header('Location: booklisting.php');
    }

}


?>