<html>
    <?php
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        if ($username){
            $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

            // Step 1: connect to DB
            $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
            if($conn->connect_error) 
            {
                echo "Error: could not connect to the DB";
                exit;
            }
            
            
            switch ($role) {
                case 'admin':
                    $myQ = "select * from admin where username='$username' and password='$password'";
                    $results = $conn->query($myQ);
                    if($results->num_rows == 0){
                        print ("Error: False Credentials");
                        exit;
                    } else {
                        $id = $results->fetch_object()->id;
                        header("Location: admin.php?id=".$id);
                    }
                    break;
                case 'nurse':
                    $myQ = "select * from nurse where username='$username' and password='$password'";
                    $results = $conn->query($myQ);
                    if($results->num_rows == 0){
                        print ("Error: False Credentials");
                        exit;
                    } else {
                        $id = $results->fetch_object()->id;
                        header("Location: nurse.php?id=".$id);
                    }
                    break;
                case 'patient':
                    # code...
                    break;
            }
            
            // Step 3: Terminate connection
            $conn->close();
        }
    ?>
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
        <div style="margin:auto;width:400px">
            <div class = "card">
                <div class="card-body">
                <center><h2 class="card-title">Login</h2></center>
                <form action="home.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" name="username" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                        <select class="form-select" name="role" id="role">
                            <option selected>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="nurse">Nurse</option>
                            <option value="patient">Patient</option>
                        </select>
                        </div>
                        
                        <input type="submit" value="Login" class="btn btn-primary">
                </form>
                </div>
            </div>
        </div>
    </body>
</html>