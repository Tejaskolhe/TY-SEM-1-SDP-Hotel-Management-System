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
      <link rel="stylesheet" href="css/signup.css">
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
      <!-- icons -->
      <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

      <title>Create Account - The Avenue User account</title>
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
                        <li class="nav-item">
                              <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                  </ul>
      </nav>
      
      <?php

require "connection.php";
$errors = array();
if(isset($_POST['submit'])) {
    $fname = mysqli_real_escape_string($link, trim($_POST['fname']));
    $lname = mysqli_real_escape_string($link, trim($_POST['lname']));
    $username = mysqli_real_escape_string($link, trim($_POST['user']));  
    $password = mysqli_real_escape_string($link, trim($_POST['password']));  
    $cpassword = mysqli_real_escape_string($link, trim($_POST['cpassword']));

     //to prevent from mysqli injection  
    $fname = stripcslashes($fname);
    $lname = stripcslashes($lname);
    $username = stripcslashes($username);  
    $password = stripcslashes($password);  
    $cpassword = stripcslashes($cpassword);

    //To check if password and confirm password match
    if ($password !== $cpassword) {
        die('Password and Confirm password should match!');   
     }
    
    // first check the database to make sure 
    // a user does not already exist with the same user email
     $user_check_query = "SELECT * FROM login WHERE username='$username' LIMIT 1";
     $result = mysqli_query($link, $user_check_query);
     $user = mysqli_fetch_assoc($result);
     
    if ($user) { // if user exists
       if ($user['username'] === $username) {
         array_push($errors, "E-mail already exists");
         echo "<div class='container'><div class='alert alert-danger alert-dismissible fade show' role='alert'>
         <strong>E-mail</strong> already exists! Try other E-mail.
         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
           <span aria-hidden='true'>&times;</span>
         </button>
       </div></div>";
       }
    }

    if (count($errors) == 0) {
        
        $query = "INSERT INTO login (first_name,last_name,username,password) 
                  VALUES('$fname','$lname','$username','$password')";
        if(mysqli_query($link, $query));
        echo "<div class='container'><div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Account Created</strong>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div></div>";
    }
  }
?>
      <div class="container">
            <img class="mb-4" src="images/logo.jpg" alt="" width="15%" height="15%">
      </div>
      <div class="container">
            <form class="form-signup" action = "<?php $_SERVER['PHP_SELF']?>" method = "POST">
                  <h1 class="h3 mb-3 font-weight-normal heading">Create Account</h1>
                  <div class="row">
                        <div class="col-md-6 mb-3">
                              <label for="firstName">First name</label>
                              <input type="text" class="form-control" name="fname" id="firstName" placeholder="" value=""
                                    required="">
                              <div class="invalid-feedback">
                                    Valid first name is required.
                              </div>
                        </div>
                        <div class="col-md-6 mb-3">
                              <label for="lastName">Last name</label>
                              <input type="text" class="form-control" name="lname" id="lastName" placeholder="" value="" required="">
                              <div class="invalid-feedback">
                                    Valid last name is required.
                              </div>
                        </div>
                  </div>
                  <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="user" id="email" placeholder="you@example.com" required="">
                        <div class="invalid-feedback">
                              Please enter a valid email address.
                        </div>
                  </div>
                  <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="" required="">
                        <div class="invalid-feedback">
                              Please enter a valid password.
                        </div>
                  </div>
                  <div class="mb-3">
                        <label for="email">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" id="conf-password" placeholder="" required="">
                        <div class="invalid-feedback">
                              Password didn't match.
                        </div>
                  </div>
                  <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required="">
                        <label class="form-check-label" for="exampleCheck1">By creating an account, you agree to our
                              Terms & conditions.</label>
                  </div>
                  <button type="submit" name="submit" class="btn btn-success btn-block">Create Account</button>
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