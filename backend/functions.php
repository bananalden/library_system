<?php

function validateNumberDigits($number, $minDigits)
{
    $numberStr = (string) $number; // Convert number to string
    return strlen($numberStr) == $minDigits; // Check if the length of the string is at least $minDigits
}
function validateDateWithinCurrentYear($dateString)
{
    $inputDate = strtotime($dateString); // Convert input date string to a Unix timestamp
    if ($inputDate === false) {
        return false; // Invalid date format
    }

    $currentYear = date('Y'); // Get the current year
    $inputYear = date('Y', $inputDate); // Get the year from the input date

    return $inputYear <= $currentYear; // Check if the input year is less than or equal to the current year
}

function createUser($conn, $userID, $name, $username, $hashedPwd)
{
    $sql = "INSERT INTO admin (adminID, adminName, username, password) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {

        header("Location: ../userlist.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ssss", $userID, $name, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    //NOTE TO PERSON WRITING THIS CODE: SEND REGISTRATION BACK TO ADMIN PAGE
    header("Location:../userlist.php?error=none");
    exit();
}

function existingUsername($conn, $username)
{

    $sql = "SELECT * FROM admin WHERE username='$username';";

    $queryResult = $conn->query($sql);

    if ($queryResult->num_rows > 0) {
        
        return true;
    } else {
        
        return false;
    }
}

function grabAssocPassword ($conn, $username){

    $sql = "SELECT * FROM admin WHERE username='$username'";

    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $hashPass = $row['password'];

        return $hashPass;
    }

    else{
        return NULL;
    }

}