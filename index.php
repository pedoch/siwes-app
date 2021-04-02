<html>

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Log in</title>
</head>

<body>
<?php
  include("db-connect.php");
   ?>
  <div class="lain">
    <p class="sign" align="center">Log in</p>
    <form class="form1" method="POST">
      <input class="un " type="text" name="email" align="center" placeholder="Email">
      <input class="pass" type="password" name="password" align="center" placeholder="Password">
      <input class="submit" type="submit" align="center" value="Log in">
      <p class="forgot" align="center"><a href="#">Forgot Password?</p>
      <p class="signup" align ="center"><a href="signup.php">Don't have an account? Sign up</p>
    </div>
     <?php
     if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($conn,$_POST['email']);
        $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
        
        $sql = "SELECT * FROM users WHERE username = '{$myusername}' and pass = '{$mypassword}'";
        $result = mysqli_query($conn,$sql);
        if (!empty($result) && $result->num_rows > 0) { 
          while($row = $result->fetch_assoc()) {
            $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
      
        if($count) {
          session_start();
          $_SESSION['username'] = $myusername;
          $_SESSION['fname'] = $row['fname'];
           
           header("location: home.php");
        }else {
           $error = "Your Login Name or Password is invalid";
           echo "<p style='font-color: red'>{$error}</p>";
        }
     }
    }
  }
  ?>
</body>

</html>