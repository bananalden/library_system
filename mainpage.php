<?php
require 'backend/adminauthcheck.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css folder/mainpage.css">
</head>

<body>
<div class="sidebar">
      <ul>
      <li><a href="#">Home</a></li>
          <li><a href="booklisting.php">Book List</a></li>
          <li><a href="recyclebin.php">Trash</a></li>
          <li><a href="userlist.php">Admin List</a></li>
          <li><a href="studentlist.php">Student List</a></li>
          <li><a href="bookborrowinglist.php">Borrowing List</a></li>
          <li><a href="backend/userlogout.php">Log Out</a></li>
      </ul>
    </div>

    <div class="content">
        <h2>ACLC LIBRARY SYSTEM</h2>
      <div class="image-container">
        <img src="image/library 1.jpeg" alt="library-img" width="200" />
        <p class="p-1">
          "Libraries store the energy that fuels the imagination. They open up
          windows to the world and inspire us to explore and achieve, and
          contribute to improving our quality of life."
          <br />
          <br />
          - Sidney Sheldon
        </p>
      </div>

      <h3>About Us</h3>
      <div class="container">
        <div class="grid">
          <div class="images">
            <img id="img-4" src="./image/books 4.jpeg" alt="image 4" />
            <image id="img-8" src="./image/books 8.jpeg" alt="img 8" />
            <img id="img-7" src="./image/books 7.jpeg" alt="img 7" />
            <img id="img-6" src="./image/books 6.jpeg" alt="img 6" />
          </div>
          <div id="about-us">
            <p>
              Welcome to ACLC Library System
              <br /><br />
              At ACLC Library System, we believe in the power of knowledge and
              the importance of access to information for all. Our library
              system is dedicated to serving our community by providing a
              diverse range of resources, programs, and services that promote
              lifelong learning, literacy, and cultural enrichment.
              <br /><br />
              Our Mission
              <br /><br />
              Our mission is to connect people with the information they need to
              learn, grow, and thrive. We strive to be a welcoming and inclusive
              space where individuals of all ages and backgrounds can explore,
              discover, and engage with the world around them.
            </p>
          </div>
        </div>
      </div>

      <footer class="footer">
      <div class="container-3">
        <p>&copy; 2024 Your ACLC LIBRARY SYSTEM</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<!-- width="200" height="200  class="img-thumbnail"" -->