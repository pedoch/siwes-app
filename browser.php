<?php session_start()?>
<html>
    <head>
      <link rel="stylesheet"
              href= "https://fonts.googleapis.com/css?family=Lora">
      <style>
        body {
            font-family: 'Lora';
            height: 100%
            }
        .scroll{
            color:rgb(19, 110, 19);
            text-decoration: none;
        }
        .greet{
            font-size: 35px;
            font-weight: 50;
            color: rgb(19, 110, 19);
        }
        .browse {
            border-collapse: collapse;
            width: 87%;
            text-align: center;
            vertical-align: middle;
            background-color: #bbde92;
            /*color: #353631;*/
            color: black;
            border-color: white;
        }
        th, .num{
            color: white;
            background-color: green;
        }
          </style>
    </head>
    <body>
    <table width=100%>
                    <tr><td width=1%><a href="home.php"><img src="res/img/logo.png" height="20" width="20"></a></td><td>
                    <p align= "left" style="font-size: 19px" style= "font-weight: 70" align="center">Pastures Internship Portal</p>
                    </td><td> </td><td>
                    <div align="right" onmouseout=changeback()>
                        <a class="scroll" onmouseover=changeBrowse()  href=browser.php>Browse Companies &nbsp;</a>
                        <a class="scroll" onmouseover=changeView()  href=view.php> View Submissions &nbsp;</a>  
                        <a class="scroll" onmouseover=changeRev()  href=review.php>Monthly Reviews &nbsp;</a>
                        <a class="scroll" onmouseover=changeback() href=logout.php>Log Out</a>
                    </div></td></tr>
                </table>
    <p align='center' class=greet>Browse Companies</p>
    <form align='center' method='GET'>
        <input type="input" name="comp">
        <input type="submit" name="search" value="Search"> 
    </form>
    <br>
    <form align='center' method='GET'>
      <input type="submit" name="show" value="Show All">
    </form>
    <?php
   include("db-connect.php");
   $value = '';
   $show = '';
   if (isset($_GET['comp'])){
    $value = $_GET['comp'];
   }
   if (isset($_GET['show'])){
     $show = $_GET['show'];
   }
   if ($initial = mysqli_query($conn, "SELECT * FROM companies")) {
    ?>
    <br>
    <?php
    if ($initial->num_rows > 0 && !$value &&!$show) {
        echo "<table class=browse align='center' border=1><tr><th>ID</th><th>Company</th><th>Hiring</th><th>Action</th></tr>";
        // output data of each row
        while($row = $initial->fetch_assoc()) {
          echo "<tr><td class=num align='center' width=5%>".$row["id"]."</td><td>".$row["c_name"]."</td><td width=30%>".$row["hiring"]."</td><td align='center' width=15%><form action='apply.php' method='POST'><input type=hidden name='appid' value=".$row["id"]."> <input type=hidden name='compname' value={$row["c_name"]}> <input type=hidden name='hiring' value=".$row["hiring"]."><input type=submit name=apply value='Apply'></form></td></tr>";
        }
        echo "</table>";    
      }
    }
   if (isset($value)){
   if ($result = mysqli_query($conn, "SELECT * FROM companies WHERE c_name = '{$value}'")) {
    if ($result->num_rows > 0 && $value) {
        echo "<table align='center' border=1><tr><th>ID</th><th>Name</th><th>Hiring</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td><td>".$row["c_name"]."</td><td>".$row["hiring"]."</td><td><form action='apply.php' method='POST'><input type=hidden name='appid' value=".$row["id"]."> <input type=hidden name='compname' value={$row["c_name"]}> <input type=hidden name='hiring' value=".$row["hiring"]."><input type=submit name=apply value='Apply'></form></td></tr>";
        }
        echo "</table>";
      }
    if ($result->num_rows < 1 && $value){
      echo "<p align='center'>No results for {$value}</p>";
    }
    // Free result set
    mysqli_free_result($result);
   }
  }
  if ($show){
    echo "<table align='center' border=1><tr><th>ID</th><th>Name</th><th>Hiring</th></tr>";
        // output data of each row
        while($row = $initial->fetch_assoc()) {
          echo "<tr><td>".$row["id"]."</td><td>".$row["c_name"]."</td><td>".$row["hiring"]."</td><td><form action='apply.php' method='POST'><input type=hidden name='appid' value=".$row["id"]."> <input type=hidden name='compname' value={$row["c_name"]}> <input type=hidden name='hiring' value=".$row["hiring"]."><input type=submit name=apply value='Apply'></form></td></tr>";
        }
        echo "</table>";
  }
    ?>
    </body>
</html>