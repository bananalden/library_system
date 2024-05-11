<?php 
require 'backend/adminauthcheck.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
        <a href="mainpage.php" class="navbar-brand">ACLC Library System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active">Home Page</a>
                </li>
                <li class="nav-item">
                    <a href="booklisting.php" class="nav-link">Book list</a>
                </li>
                <li class="nav-item">
                    <a href="userlist.php" class="nav-link">User List</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Borrowing List</a>
                </li>
            </ul>
            <a class="nav-item mr-3 nav-link p-3 text-light" href="backend/userlogout.php" style="background-color: #e85c29">Logout</a>
    </nav>
        </div>
        </div> 
    </nav>
    <section class="bg-light text-dark p-5 text-left">
        <div class="container">
           <div class="container">
                <div class="row">
                    <div class="col">
                        A
                    </div>
                    <div class="col">
                        A
                    </div>
                </div>
           </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>