<html>
    <head>
        <title>UIHealth | Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <style>
        <?php include "style.css" ?>
        </style>
    </head>
    <body>
        <div id="header" class="nav">
            <img class="mx-auto" src="logo.png" alt="">
        </div>
        <center><h2>Nurse Information</h2></center>
        <?php
        $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

        $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error) 
        {
            echo "Error: could not connect to the DB";
            exit;
        }

        $id = $_POST['id'];
        $myQ = "select * from nurse where id = '$id'";
        $results = $conn->query($myQ);
        $row = $results->fetch_object();
        print("<br><div id='nurseInfo' class = 'card'>
                    <div class='card-body'>
                    <center><h3 class='card-title'>$row->FName $row->LName</h3></center>");
        print("<div id='nurseInfo'>");
        print("<b>Name:</b> $row->FName $row->MI $row->LName <br>");
        print("<b>Address:</b> $row->address <br>");
        print("<b>Age:</b> $row->age <br>");
        print("<b>Gender:</b> $row->gender <br>");
        print("<b>Phone Number:</b> $row->phoneNum <br>");
        print("<b>Username:</b> $row->username <br>");
        print("<b>Password:</b> $row->password <br>");
        print("</div></div>");
        $conn->close();
        ?>
    </body>
</html>
