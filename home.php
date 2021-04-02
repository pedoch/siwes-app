<?php session_start()?>
<html>
    <head>
        <title>Home</title>
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
        table {
            border-collapse: collapse;
        }
        </style>
    </head>
    <body>
        <div>
            <div>
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
            </div>
            <?="<p align='center' class=greet>Welcome, {$_SESSION['fname']}</p>";?>
            <div style="margin: 0px;"class=functions>
            <table style ="padding: 0px;"align="center">
            <tr><td><img height="60%" id="pic" src="res/img/home.gif"></td></tr>
            <tr><td align="center"><p id="text" style="color: black;">Welcome to the Pastures Internship Portal. Select one of the functions above to get started</p></td></tr>
            </table>
            </div>
        </div>
        <script>
                function changeView(){
                    document.getElementById("pic").src="res/img/submit.gif"
                    document.getElementById("text").innerHTML="View internship application submissions you have made to companies"
                }
                function changeBrowse(){
                    document.getElementById("pic").src="res/img/browse.gif"
                    document.getElementById("text").innerHTML="Find a company to hire you as an intern"
                }
                function changeRev(url){
                    document.getElementById("pic").src="res/img/review.gif"
                    document.getElementById("text").innerHTML="Update your monthly review"
                }
                function changeback(){
                    document.getElementById("pic").src="res/img/home.gif"
                    document.getElementById("text").innerHTML="Welcome to the Pastures Internship Portal. Select one of the functions above to get started"
                }
        </script>
    </body>     
</html>