<?php 
include('functions.php');
include('database.php');
//"2024-05-08"

$date = date("Y-m-d");
$curDate = date("Y-m-d");

echo $date . "<br>";
echo $curDate . "<br>";


if ($date <= $curDate){
    echo "date is less";
}
else{
    echo "date is more";
}


?>