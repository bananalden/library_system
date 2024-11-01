<!DOCTYPE html>
<html lang="en">
<?php 
require 'backend/adminauthcheck.php';
error_reporting(E_ERROR | E_PARSE);
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
  <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
  <link rel="stylesheet" href="./css folder/studentlist.css">
  
</head>

<body>
<!---- ###### NAVBAR ##### ---->
<div class="sidebar">
      <div class="logo">
        <img src="./image/aclc.jpeg" alt="logo" style="width:200px">
      </div>
      <ul>
        <li><a href="mainpage.php">Home</a></li>
        <li><a href="booklisting.php"><i class="bi bi-journal-bookmark"></i>Book List</a></li>
        <li><a href="recyclebin.php"><i class="bi bi-trash"></i>Trash</a></li>
        <li><a href="userlist.php"><i class="bi bi-person"></i>User List</a></li>
        <li><a href="studentlist.php"><i class="bi bi-mortarboard"></i>Student List</a></li>
        <li><a href="bookborrowinglist.php"><i class="bi bi-book"></i> Borrowing List</a></li>
        <li><a class="log-btn" href="backend/userlogout.php">Log out</a></li>
      </ul>
  </div>
<!---- ###### NAVBAR ##### ---->

<!---- ###### MAIN CONTENT ##### ---->
<div class="content">
  <div class="container">
    <h1>Student List</h1>
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#insertmodal">Insert New Student</button>
  </div>

<div class="container">
<?php include 'backend/alertstudent.php';?>
<table id="myTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Student ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM studentlist";
                  $run_query = mysqli_query($conn, $query);

                  if (mysqli_num_rows($run_query) > 0) {
                    foreach ($run_query as $row) {
                  ?>

                      <tr>
                        <td><?= $row['studentID'] ?></td>
                        <td><?= $row['studentName'] ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn-edit editbtn">EDIT</button>
                            <button type="button" class="btn-delete deletebtn">DELETE</button>
                          </div>
                        </td>
                      </tr>
                  <?php

                    }
                  }
                  ?>
                </tbody>
              </table>
</div>
<div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert User Details Here</h5>
              </div>

              <div class="modal-body">
                <form action="backend/insertstudent.php" method="post">
                  <div class="form-group">
                    <label>User ID</label>
                    <input type="number" name="studentID" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="studentName" class="form-control" required></input>
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
</div>
<!---- ###### MAIN CONTENT ##### ---->

 <!------- #### INSERT STUDENT MODAL #### ------>
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
                <form action="backend/insertstudent.php" method="post">
                  <div class="form-group">
                    <label>User ID</label>
                    <input type="number" name="studentID" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="studentName" class="form-control" required></input>
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
<!------- #### INSERT STUDENT MODAL #### ------>

<!------- #### EDIT STUDENT MODAL #### ------>
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

                <form action="backend/updatestudent.php" method="post">
                  <div class="form-group">
                    <input type="hidden" name="id_update" id="id_update" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="update_name" id="update_name" class="form-control" required></input>
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

<!------- #### EDIT STUDENT MODAL #### ------>


<!------- #### DELETE STUDENT MODAL #### ------>
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
              </div>

              <div class="modal-body">

                <form action="backend/deletestudent.php" method="post">
                  <h4>Do you want to delete this student?</h4>
                  <input type="hidden" name="userid_delete" id="userid_delete">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="deletedata" class="btn btn-danger">Delete Student</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### DELETE STUDENT MODAL #### ------>
</body>
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
</html>