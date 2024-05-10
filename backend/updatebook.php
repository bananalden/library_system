<?php

include('functions.php');
require('database.php');

if (isset($_POST["updatedata"])) {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $yearpublished = $_POST["yearpublished"];
    $digitforISBN = 13;
    $digitforYear = 4;
    $curYear = date('Y');



    if(!is_numeric($isbn)){
        header('location: ../booklisting.php?error=3');
    }
    else if (!is_numeric($yearpublished)){
        header('location: ../booklisting.php?error=4'); 
    }
    else if (!validateNumberDigits($isbn, $digitforISBN)){
        header('location: ../booklisting.php?error=0'); 
    }
    else if (!validateNumberDigits($yearpublished, $digitforYear)){
        header('location: ../booklisting.php?error=1'); 
    }
    else{
            header('location: ../booklisting.php?edit=0');
    }
} 


else {

    header('location: ../booklisting.php');
}
