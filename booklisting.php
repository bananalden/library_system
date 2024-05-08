<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
</head>

<body>
    <!-- =================NAVBAR SECTION ================-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container">
            <a href="mainpage.php" class="navbar-brand">ACLC Library System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="mainpage.php" class="nav-link">Home Page</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Book list</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">User List</a>
                    </li>
                </ul>
                <a class="nav-item mr-3 nav-link p-3 text-light" href="#" style="background-color: #e85c29">Logout</a>
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
                    <h1>Book Listings</h1>
                    
                    <!-- ========== Search Form End ========== -->

                    <!-- Modal -->



                    <!-- ========== Table Section Start ========== -->
                    <div class="col-md-12 p-20">
                        <div class="container">
                        
                           
                            <table id="myTable" class="table table-bordered">
                            <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Year Published</th>
                                    </tr>
                            </thead>
                                <tbody>
                                <?php 
                            require('backend/database.php'); 
                            $query = "SELECT * FROM booklist";
                            $run_query = mysqli_query($conn, $query);

                            if(mysqli_num_rows($run_query) > 0)
                            {
                                foreach($run_query as $row)
                                {
                                    ?>

                                    <tr>
                                        <th scope="row"><?=$row['isbn'] ?></th>
                                        <td><?=$row['bookname'] ?></td>
                                        <td><?=$row['author'] ?></td>
                                        <td><?=$row['category'] ?></td>
                                        <td><?=$row['yearpublished'] ?></td>
                                    </tr>
                    <?php

                                }
                            }
                            
                            else
                            {

                            }
                                  ?> 
                                </tbody> 
                            </table>
                        </div>
                    </div>
                    <!-- ========== Table Section End ========== -->

                </div>

            </div>
        </div>
    </section>
    <!-- ######   SCRIPTS HERE     -######-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  });
</script>
</body>

</html>