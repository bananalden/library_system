<?php 
require 'backend/adminauthcheck.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Return</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./css folder/borrowlist.css">
</head>

<body>
  <!-- =================NAVBAR SECTION ================-->
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container">
      <a href="mainpage.php" class="title navbar-brand">ACLC Library System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a href="mainpage.php" class="nav-link">Home Page</a>
          </li>
          <li class="nav-item">
            <a href="booklisting.php" class="nav-link">Book list</a>
          </li>
          <li class="nav-item">
            <a href="userlist.php" class="nav-link">User List</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link  active">Borrowing List</a>
          </li>
        </ul>
        <a class="nav-item mr-3 nav-link p-3 text-light" href="backend/userlogout.php" style="background-color: #e85c29">Logout</a>
  </nav>
  </div>
  </div>
  </nav>
  <!-- =================NAVBAR SECTION END================-->
  <section class="bg-light text-dark p-5 text-left">
    <div class="container">
      <div class="d-flex">
        <div>
          <!-- ========== Search Form Start ========== -->
          <h1>Borrowing History</h1>
          <div>
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#insertmodal">Enter new Book</button>
          </div>
          <!-- ========== Search Form End ========== -->




          <!-- ========== Table Section Start ========== -->
          <div class="column">
            <div class="container">


              <table id="myTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Reference ID</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Date Borrowed</th>
                    <th scope="col">Date Due</th>
                    <th scope="col">Date Returned</th>
                    <th scope="col">ACTION</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM bookborrowlist";
                  $run_query = mysqli_query($conn, $query);

                  if (mysqli_num_rows($run_query) > 0) {
                    foreach ($run_query as $row) {
                  ?>

                      <tr>
                        <td><?= $row['refID'] ?></td>
                        <td><?= $row['bookID'] ?></td>
                        <td><?= $row['booktitle'] ?></td>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['studentName'] ?></td>
                        <td><?= $row['dateborrowed'] ?></td>
                        <td><?= $row['datedue'] ?></td>
                        <td><?= $row['datereturned'] ?></td>
                        <td>
                        <button type="button" class="btn btn-success editbtn">RETURN BOOK</button>
                        </td>
                      </tr>
                  <?php

                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- ========== Table Section End ========== -->


        </div>
        <!-- ########################### INSERT BOOK MODAL START ##################################-->
        <div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Borrowing Book Form</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="backend/borrowdata.php" method="post">
                  <div class="form-group">
                    <label>ISBN</label>
                    <input type="number" name="isbn" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Student ID</label>
                    <input type="text" name="studentID" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Student Name</label>
                    <input type="text" name="studentName" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Due Date</label>
                    <input type="date" name="dueDate" class="form-control" required></input>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insertborrowdata" class="btn btn-primary">Borrow Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### INSERT BOOK MODAL END ##################################-->

        <!-- ########################### EDIT BOOK MODAL START ##################################-->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Return Book Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <form action="backend/returnbook.php" method="post">
                  <div class="form-group">
                  <input type="hidden" name="ref_id" id="ref_id" class="form-control"></input>
                    <input type="hidden" name="isbn_return" id="isbn_return" class="form-control" required></input>
                    
                  </div>
                <h5>Would you like to return the book now?</h5>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="returnbook" class="btn btn-primary">Return Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### EDIT BOOK MODAL END ##################################-->

        <!-- ########################### DELETE BOOK MODAL START ##################################-->
        <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <form action="backend/deletebook.php" method="post">
                  <h4>Do you want to delete this book?</h4>
                  <input type="hidden" name="isbn_delete" id="isbn_delete">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="deletedata" class="btn btn-danger">Delete Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### DELETE BOOK MODAL END ##################################-->
      </div>
    </div>
  </section>
  <!-- ######   SCRIPTS HERE     -######-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.editbtn').on('click', function() {

        $('#editmodal').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#ref_id').val(data[0]);
        $('#isbn_return').val(data[1]);
        $('#author_update').val(data[2]);
        $('#category_update').val(data[3]);
        $('#yearpublished_update').val(data[4])

      })


    });
  </script>

  <script>
    $(document).ready(function() {
      $('.deletebtn').on('click', function() {

        $('#deletemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#isbn_delete').val(data[0]);

      })


    });
  </script>
  </script>
  <script typ="text/javascript" src="backend/booklisting.js"></script>
</body>

</html>