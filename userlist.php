<?php 
require 'backend/adminauthcheck.php';
error_reporting(E_ERROR | E_PARSE);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./css folder/userlist.css">
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
            <a href="#" class="nav-link active">User List</a>
          </li>
          <li class="nav-item">
            <a href="bookborrowinglist.php" class="nav-link">Borrowing List</a>
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
          <?php include 'backend/alertcheckuser.php';?>
          <h1>Admin User List</h1>
          <div>
            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#insertmodal">Insert New Admin</button>
          </div>
          <!-- ========== Search Form End ========== -->

          <!-- ========== Table Section Start ========== -->
          <div class="column">
            <div class="container">


              <table id="myTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Admin ID</th>
                    <th scope="col">Admin Name</th>
                    <th scope="col">Admin Username</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM admin";
                  $run_query = mysqli_query($conn, $query);

                  if (mysqli_num_rows($run_query) > 0) {
                    foreach ($run_query as $row) {
                  ?>

                      <tr>
                        <td><?= $row['adminID'] ?></td>
                        <td><?= $row['adminName'] ?></td>
                        <td><?= $row['username'] ?></td>
                        <td>
                          <button type="button" class="btn btn-success editbtn">EDIT</button>
                          <button type="button" class="btn btn-danger deletebtn">DELETE</button>
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
        <!-- ########################### INSERT USER MODAL START ##################################-->
        <div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert User Details Here</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="backend/insertuser.php" method="post">
                  <div class="form-group">
                    <label>User ID</label>
                    <input type="number" name="userID" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required></input>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insertuser" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### INSERT USER MODAL END ##################################-->

        <!-- ########################### EDIT USER MODAL START ##################################-->
        <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <form action="backend/updateuser.php" method="post">
                  <div class="form-group">
                    <input type="hidden" name="id_update" id="id_update" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="update_name" id="update_name" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="update_username" id="update_username" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password_update" id="passwordupdate" class="form-control" required></input>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Save Edit</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### EDIT USER MODAL END ##################################-->

        <!-- ########################### DELETE USER MODAL START ##################################-->
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

                <form action="backend/deleteuser.php" method="post">
                  <h4>Do you want to delete this user?</h4>
                  <input type="hidden" name="userid_delete" id="userid_delete">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="deletedata" class="btn btn-danger">Delete User</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- ########################### DELETE USER MODAL END ##################################-->
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

        $('#id_update').val(data[0]);
        $('#update_name').val(data[1]);
        $('#update_username').val(data[2]);


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

        $('#userid_delete').val(data[0]);

      })


    });
  </script>
  </script>
  <script typ="text/javascript" src="backend/booklisting.js"></script>
</body>

</html>