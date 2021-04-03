<?php   
   $dbhost = 'sql4.freemysqlhosting.net';
   $dbuser = 'sql4403087';
   $dbpass = 'BkBHn8Pbly';
   
   $conn= mysqli_connect("$dbhost","$dbuser","$dbpass") or die ("could not connect to mysql");
   mysqli_select_db($conn, "sql4403087");
?>