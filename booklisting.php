<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="./css folder/booklisting.css">
  
</head>

<body style="background-color: #f0ece2;">
<!---- ###### NAVBAR ##### ---->
<div class="side-navbar">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
</div>
<!---- ###### NAVBAR ##### ---->

<!---- ##### MAIN CONTENT ####---->
<div class="content">
<div>
  <h1>Book Listing</h1>
</div>

<div class="row">
  <div class="col">
  <div class="table-container">
    <h4>Available Books</h4>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertmodal">Enter new Book</button>
  <table id="myTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Year Published</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require('backend/database.php');
                  $query = "SELECT * FROM booklist";
                  $run_query = mysqli_query($conn, $query);

                  if (mysqli_num_rows($run_query) > 0) {
                    foreach ($run_query as $row) {
                  ?>

                      <tr>
                        <td><?= $row['isbn'] ?></td>
                        <td><?= $row['bookname'] ?></td>
                        <td><?= $row['author'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['yearpublished'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                          <button type="button" class="btn btn-success editbtn">EDIT BOOK</button>
                          <button type="button" class="btn btn-danger deletebtn">BOOK MISSING</button>
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
  <div class="col">
  <div class="table-container">
  <h4>Recycle Bin</h4>
  <table id="recycleTable" class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Year Published</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $query = "SELECT * FROM recyclebin";
                  $run_query = mysqli_query($conn, $query);

                  if (mysqli_num_rows($run_query) > 0) {
                    foreach ($run_query as $row) {
                  ?>

                      <tr>
                        <td><?= $row['isbn'] ?></td>
                        <td><?= $row['bookname'] ?></td>
                        <td><?= $row['author'] ?></td>
                        <td><?= $row['category'] ?></td>
                        <td><?= $row['yearpublished'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                          <button type="button" class="btn btn-danger foundbtn">FIND BOOK</button>
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
</div>
</div>
<!---- ##### MAIN CONTENT ####---->

<!------- #### INSERT BOOK MODAL #### ------>
<div class="modal fade" id="insertmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Book Details Here</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <form action="backend/insertbook.php" method="post">
                  <div class="form-group">
                    <label>ISBN</label>
                    <input type="number" name="isbn" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" class="form-control">
                      <option value="Fiction">Fiction</option>
                      <option value="Non-Fiction">Non-Fiction</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Year Published</label>
                    <input type="number" name="yearpublished" class="form-control" required></input>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### INSERT BOOK MODAL #### ------>

<!------- #### EDIT BOOK MODAL #### ------>
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Book Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <form action="backend/updatebook.php" method="post">
                  <div class="form-group">
                    <input type="hidden" name="isbn" id="isbn_update" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" id="title_update" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Author</label>
                    <input type="text" name="author" id="author_update" class="form-control" required></input>
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <select name="category" id="category_update" class="form-control">
                      <option value="Fiction">Fiction</option>
                      <option value="Non-Fiction">Non-Fiction</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Year Published</label>
                    <input type="text" name="yearpublished" id="yearpublished_update" class="form-control" required></input>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Edit Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### EDIT BOOK MODAL #### ------>

<!------- #### MISSING BOOK MODAL #### ------>
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
                  <h4>Do you want to file this book as missing?</h4>
                  <input type="hidden" name="isbn_delete" id="isbn_delete">
                  <input type="hidden" name="missing_title" id="missing_title">
                  <input type="hidden" name="missing_author" id="missing_author">
                  <input type="hidden" name="missing_category" id="missing_category">
                  <input type="hidden" name="missing_year" id="missing_year">
                  <input type="hidden" name="missing_status" id="missing_status">
                  


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="deletedata" class="btn btn-danger">Delete Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### MISSING BOOK MODAL #### ------>

<!------- #### FOUND BOOK MODAL #### ------>
<div class="modal fade" id="foundbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">

                <form action="backend/bookfound.php" method="post">
                  <h4>Set book as found?</h4>
                  <input type="hidden" name="found_isbn" id="found_isbn">
                  <input type="hidden" name="found_title" id="found_title">
                  <input type="hidden" name="found_author" id="found_author">
                  <input type="hidden" name="found_category" id="found_category">
                  <input type="hidden" name="found_year" id="found_year">
                  <input type="hidden" name="found_status" id="found_status">
                  


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" name="bookfound" class="btn btn-danger">Delete Book</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!------- #### FOUND BOOK MODAL #### ------>

<!------- ##### SCRIPTS HERE ##### ------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();
      $('#recycleTable').DataTable();
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

        $('#isbn_update').val(data[0]);
        $('#title_update').val(data[1]);
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
        $('#missing_title').val(data[1]);
        $('#missing_author').val(data[2]);
        $('#missing_category').val(data[3])
        $('#missing_year').val(data[4]);
        $('#missing_status').val(data[5]);
      })


    });
  </script>
  <script>
    $(document).ready(function() {
      $('.foundbtn').on('click', function() {

        $('#foundbtn').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
          return $(this).text();
        })

        console.log(data);

        $('#found_isbn').val(data[0]);
        $('#found_title').val(data[1]);
        $('#found_author').val(data[2]);
        $('#found_category').val(data[3])
        $('#found_year').val(data[4]);
        $('#found_status').val(data[5]);
      })


    });
  </script>

</body>
</html>