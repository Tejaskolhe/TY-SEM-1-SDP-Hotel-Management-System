<?php      
    require "connection.php";
    if(isset($_POST['submit']))
    $username = mysqli_real_escape_string($link, trim($_POST['user']));  
    $password = mysqli_real_escape_string($link, trim($_POST['pass']));  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        // $username = mysqli_real_escape_string($link, $username);  
        // $password = mysqli_real_escape_string($link, $password);  
      
        $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";  
        $result = mysqli_query($link, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);  
          
        if($result){  
            echo "<h1><center> Login successful </center></h1>";  
            echo $count;
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  