<?php   
   $dbhost = 'sql104.epizy.com';
   $dbuser = 'epiz_28296413';
   $dbpass = '9NPT3kI68V';
   
   $conn= mysqli_connect("$dbhost","$dbuser","$dbpass") or die ("could not connect to mysql");
   mysqli_select_db($conn, "epiz_28296413_bluefrog");
?>