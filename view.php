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
        th{
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
      <p align='center' class=greet>Submissions</p>
    <?php
      include("db-connect.php");
      $value = '';  
      $sql = "SELECT * FROM submissions WHERE username = '{$_SESSION["username"]}'";
      if (isset($_GET['comp'])){
       $value = $_GET['comp'];
      }
      if ($result = mysqli_query($conn, $sql)) {
       ?>
       <br>
       <?php
       if ($result->num_rows > 0) {
        echo "<table class=browse align='center' border=1><tr><th>Company</th><th>Application Status</th><th>View Application</th></tr>";
         while($row = $result->fetch_assoc()){
          echo "<tr><td>".$row["company"]."</td><td>".$row["stat"]."</td><td><a href='applications/{$row["username"]}{$row["company"]}.pdf'>Download</a></td></tr>";
          }
         } else {
           echo "<p>You haven't submitted an application yet.</p><a href=browser.php>Browse some companies</a>";
         }
       // Free result set
       mysqli_free_result($result);
        }else {
          echo "<p>You haven't submitted an application yet.</p><a href=browser.php>Browse some companies</a>";
        }
       ?>
    </body>
</html>