<?php

include('functions.php');
require('database.php');

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
    } else {


        $sql = "INSERT INTO booklist (isbn, bookname, author, category, yearpublished) VALUES ('$isbn', '$title', '$author', '$category','$yearpublished')";

        if ($conn->query($sql) === TRUE) {
            header('location: ../booklisting.php?error=3');
        } else {
            header('location: ../booklisting.php?error=4');
        }
    }
} else {

    header('location: ../booklisting.php');
}
