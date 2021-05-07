<html>
    <?php
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        if ($username){
            $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

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
                        header("Location: admin.php");
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
                    $myQ = "select * from patient where username='$username' and password='$password'";
                    $results = $conn->query($myQ);
                    if($results->num_rows == 0){
                        print ("Error: False Credentials");
                        exit;
                    } else {
                        $id = $results->fetch_object()->id;
                        header("Location: patient.php?id=".$id);
                    }
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

        <div id="homeDiv">
        <div>
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
            <div class="overflow-auto" style="height: 700px;">
            <div class = "card">
                <div class="card-body">
                    <center><h2 class="card-title">Patient Registration</h2></center>
                    <form action="createPatient.php" method="POST">
                    <div class="mb-3">
                                <label for="FName" class="form-label">First Name:</label>
                                <input type="FName" name="FName" class="form-control" id="FName">
                            </div>
                            <div class="mb-3">
                                <label for="MI" class="form-label">Middle Initial:</label>
                                <input type="MI" name="MI" class="form-control" id="MI">
                            </div>
                            <div class="mb-3">
                                <label for="LName" class="form-label">Last Name:</label>
                                <input type="LName" name="LName" class="form-control" id="LName">
                            </div>
                            <div class="mb-3">
                                <label for="SSN" class="form-label">SSN:</label>
                                <input type="SSN" name="SSN" class="form-control" id="SSN">
                            </div>
                            <div class="mb-3">
                                <label for="Address" class="form-label">Address:</label>
                                <input type="Address" name="Address" class="form-control" id="Address">
                            </div>
                            <div class="mb-3">
                                <label for="Age" class="form-label">Age:</label>
                                <input type="Age" name="Age" class="form-control" id="Age">
                            </div>
                            <div class="mb-3">
                                <label for="Gender" class="form-label">Gender:</label>
                                <input type="Gender" name="Gender" class="form-control" id="Gender">
                            </div>
                            <div class="mb-3">
                                <label for="Race" class="form-label">Race:</label>
                                <input type="Race" name="Race" class="form-control" id="Race">
                            </div>
                            <div class="mb-3">
                                <label for="Occupation" class="form-label">Occupation:</label>
                                <input type="Occupation" name="Occupation" class="form-control" id="Occupation">
                            </div>
                            <div class="mb-3">
                                <label for="medicalHistory" class="form-label">Medical History:</label>
                                <input type="medicalHistory" name="medicalHistory" class="form-control" id="medicalHistory">
                            </div>
                            <div class="mb-3">
                                <label for="phoneNum" class="form-label">Phone Number:</label>
                                <input type="phoneNum" name="phoneNum" class="form-control" id="phoneNum">
                            </div>
                            <div class="mb-3">
                                <label for="Username" class="form-label">Username:</label>
                                <input type="Username" name="Username" class="form-control" id="Username">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password:</label>
                                <input type="password" name="Password" class="form-control" id="Password">
                            </div>
                        
                        <input type="submit" value="Register" class="btn btn-primary">
                    </form>
                </div>
            </div>
            <div>
        </div>
    </body>
</html>