<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="">

</head>
<body>
    
    <form  action="backend/logcheck.php" method="post">  
        <div class="container-login">  
            <div class="title">
                <h1>LIBRARIAN LOGIN FORM</h1>   
            </div>
            
            <div class="user-details"> 
                <input type="text" placeholder="Enter Username" name="uname" required>
            </div>

            <div class="user-details">  
                <input type="password" placeholder="Enter Password" name="pword" required>
            </div>  
            <button type="submit" name="submit">Login</button>
        </div>

       
    </form>
</body>
</html>