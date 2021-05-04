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
        <center><h2>Update Nurse</h2></center>
        <?php
        $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

        $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error) 
        {
            echo "Error: could not connect to the DB";
            exit;
        }
        if ($_POST["FName"]){
            $id = $_POST["id"];
            $FName = $_POST["FName"];
            $MI = $_POST["MI"];
            $LName = $_POST["LName"];
            $Address = $_POST["Address"];
            $Age = $_POST["Age"];
            $Gender = $_POST["Gender"];
            $phoneNum = $_POST["phoneNum"];
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
    
            $myQ = "update nurse
    set FName = '$FName', LName = '$LName', MI = '$MI', Age = '$Age', gender = '$Gender', username = '$Username', password = '$Password' 
    where id='$id'";
    
            $results = $conn->query($myQ);

            header("Location: admin.php");
        }
        

        $id = $_GET['id'];
        $myQ = "select * from nurse where id = '$id'";
        $results = $conn->query($myQ);
        $row = $results->fetch_object();

        print("
        <br>
                <div class = 'card' style='width:500px; margin: auto'>
                    <div class='card-body'>
                    <center><h3 class='card-title'>$row->FName $row->LName</h3></center>
                    <form action='updateNurse.php' method='POST'>
                            <input type='hidden' id='id' name='id' value='$row->id' />
                            <div class='mb-3'>
                                <label for='FName' class='form-label'>First Name:</label>
                                <input type='FName' name='FName' value = '$row->FName' class='form-control' id='FName'>
                            </div>
                            <div class='mb-3'>
                                <input type='MI' name='MI' value = '$row->MI' class='form-control' id='MI'>
                            </div>
                            <div class='mb-3'>
                                <label for='LName' class='form-label'>Last Name:</label>
                                <input type='LName' name='LName' value = '$row->LName' class='form-control' id='LName'>
                            </div>
                            <div class='mb-3'>
                                <label for='Address' class='form-label'>Address:</label>
                                <input type='Address' name='Address'  value = '$row->Address' class='form-control' id='Address' disabled>
                            </div>
                            <div class='mb-3'>
                                <label for='Age' class='form-label'>Age:</label>
                                <input type='Age' name='Age' value = '$row->Age' class='form-control' id='Age'>
                            </div>
                            <div class='mb-3'>
                                <label for='Gender' class='form-label'>Gender:</label>
                                <input type='Gender' name='Gender' value = '$row->gender' class='form-control' id='Gender'>
                            </div>
                            <div class='mb-3'>
                                <label for='phoneNum' class='form-label'>Phone Number:</label>
                                <input type='phoneNum' name='phoneNum' value = '$row->phoneNum' class='form-control' id='phoneNum' disabled>
                            </div>
                            <div class='mb-3'>
                                <label for='Username' class='form-label'>Username:</label>
                                <input type='Username' name='Username' value = '$row->username' class='form-control' id='Username'>
                            </div>
                            <div class='mb-3'>
                                <label for='Password' class='form-label'>Password:</label>
                                <input type='text' name='Password'  value = '$row->password' class='form-control' id='Password'>
                            </div>
                            <input type='submit' value='Update' class='btn btn-primary'>
                    </form>
                    </div>
                </div>
                <br>
           
        ");

        $conn->close();
        ?>
        </body>
                
</html>
