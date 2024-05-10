<?php


require('database.php');
include('functions.php');


if (isset($_POST["insertdata"])) {
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $category = $_POST["category"];
    $yearpublished = $_POST["yearpublished"];
    $digitforISBN = 13;
    $digitforYear = 4;
    $curYear = date('Y');



    if (!validateNumberDigits($isbn, $digitforISBN)) {
        header('location: ../booklisting.php?error=0');
        exit();
    } else if (!validateNumberDigits($yearpublished, $digitforYear)) {
        header('location: ../booklisting.php?error=1');
        exit();
    }
    
    
    else {


        $sql = "INSERT INTO booklist (isbn, bookname, author, category, yearpublished, status) VALUES ('$isbn', '$title', '$author', '$category','$yearpublished', 'ONSITE')";

        if ($conn->query($sql) === TRUE) {
            header('location: ../booklisting.php?error=5');
        } else {
            header('location: ../booklisting.php?error=6');
        }
    }
} else {

    header('location: ../booklisting.php');
}
