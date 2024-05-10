<?php 
include('functions.php');

$myisbn = "9780747548478";
$digitforISBN = 13;

if (!is_numeric($myisbn)){
    echo "Not Numeric";
}

else {
    echo "Is Numeric";
}


?>