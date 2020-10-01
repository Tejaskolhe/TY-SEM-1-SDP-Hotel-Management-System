<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Internal Styling-->
    <link rel="stylesheet" href="css/login.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    <title>Login - The Avenue user</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">THE AVENUE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bookings.html">BOOKINGS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.html">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">ABOUT US</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="login.php">LOGIN</a>
                </li>
                <li>
                    <a href="signup.php" class="btn btn-success btn-md active" role="button" aria-pressed="true">Sign
                        Up</a>
                </li>
            </ul>
            
    </nav>
    <?php      
    require "connection.php";
    if(isset($_POST['submit'])) {
        $username = mysqli_real_escape_string($link, trim($_POST['user']));  
        $password = mysqli_real_escape_string($link, trim($_POST['password']));  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  

        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";  
        $result = mysqli_query($link, $sql);  
        // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);  
          
        if($count==1){  
            echo "<div class='container'><div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>LOGIN SUCCESSFULL</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div>"; 
        }  
        else{  
            echo "<div class='container'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>LOGIN FAILED</strong>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
          </div></div>";  
        } 
    }    
?>  
    <div class="container">
        <img class="mb-4" src="images/logo.jpg" alt="logo" width="150px">
    </div>
    <div class="container">
        <form class="form-signin" name="f1" action = "<?php $_SERVER['PHP_SELF']?>" method = "POST">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" name="user" class="form-control" placeholder="Email address" required=""
                autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

            <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
            <a href="signup.html"><u>Create account</u></a>
        </form>
    </div>



    <div class="container">
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <div class="container">
                <ul class="list-inline">
                    <li class="list-inline-item align-center"><a href="about.html">About</a></li>
                </ul>
                <p class="mb-1">© 2020 The Avenue</p>
            </div>
        </footer>
    </div>

   
</body>

</html>