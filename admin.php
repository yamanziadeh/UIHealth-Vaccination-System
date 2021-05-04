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
        <center><h2><b>Welcome Admin!</b></h2></center>
        <div id="admin">
            <div>
                <center><h3>Nurses</h3></center>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

                        $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
                        if($conn->connect_error) 
                        {
                            echo "Error: could not connect to the DB";
                            exit;
                        }
                        $myQ = "select * from nurse";
                        $results = $conn->query($myQ);
                        while($row = $results->fetch_object()){
                            echo "<tr><th>$row->id</th>
                            <td>$row->FName $row->LName</td>
                            </tr>";
                        }

                        $conn->close();
                    ?>
                     </tbody>
                </table>
                <br>
                <div class = "card">
                    <div class="card-body">
                    <center><h4 class="card-title">Add Nurse</h4></center>
                    <form action="createNurse.php" method="POST">
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
                                <label for="phoneNum" class="form-label">Phone Number:</label>
                                <input type="phoneNum" name="phoneNum" class="form-control" id="phoneNum">
                            </div>
                            <div class="mb-3">
                                <label for="Username" class="form-label">Username:</label>
                                <input type="Username" name="Username" class="form-control" id="Username">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password:</label>
                                <input type="text" name="Password" class="form-control" id="Password">
                            </div>
                            <input type="submit" value="Create" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
            <div>
                <div id="forms">
                    <div id="nurseForms">
                        <center><h3>Patients</h3></center>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

                                $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
                                if($conn->connect_error) 
                                {
                                    echo "Error: could not connect to the DB";
                                    exit;
                                }
                                $myQ = "select * from patient";
                                $results = $conn->query($myQ);
                                while($row = $results->fetch_object()){
                                    echo "<tr><th>$row->id</th>
                                    <td>$row->FName $row->LName</td>
                                    </tr>";
                                }

                                $conn->close();
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <div class = "card">
                            <div class="card-body">
                            <center><h4 class="card-title">View Nurse</h4></center>
                            <form action="viewNurse.php" method="POST">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Nurse ID:</label>
                                        <input type="id" name="id" class="form-control" id="id">
                                    </div>
                                    <input type="submit" value="View" class="btn btn-primary">
                            </form>
                            </div>
                        </div>
                        <br>
                        <div class = "card">
                            <div class="card-body">
                            <center><h4 class="card-title">Update Nurse</h4></center>
                            <form action="updateNurse.php" method="GET">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Nurse ID:</label>
                                        <input type="id" name="id" class="form-control" id="id">
                                    </div>
                                    <input type="submit" value="Update" class="btn btn-primary">
                            </form>
                            </div>
                        </div>
                        <br>
                        <div class = "card">
                            <div class="card-body">
                            <center><h4 class="card-title">Delete Nurse</h4></center>
                            <form action="deleteNurse.php" method="POST">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">Nurse ID:</label>
                                        <input type="id" name="id" class="form-control" id="id">
                                    </div>
                                    <input type="submit" value="Delete" class="btn btn-primary">
                            </form>
                            </div>
                        </div>
                        <br>
                        <div class = "card">
                            <div class="card-body">
                                <center><h4 class="card-title">View Patient</h4></center>
                                <form action="viewPatient.php" method="POST">
                                        <div class="mb-3">
                                            <label for="id" class="form-label">Patient ID:</label>
                                            <input type="id" name="id" class="form-control" id="id">
                                        </div>
                                        <input type="submit" value="View Info" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="vaccineForms">
                    <center><h3>Vaccines</h3></center>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col"># of Doses</th>
                        <th scope="col">Availability</th>
                        <th scope="col">On Hold</th>
                        <th scope="col">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

                        $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
                        if($conn->connect_error) 
                        {
                            echo "Error: could not connect to the DB";
                            exit;
                        }
                        $myQ = "select * from vaccine";
                        $results = $conn->query($myQ);
                        while($row = $results->fetch_object()){
                            echo "<tr><th>$row->VName</th>
                            <td>$row->CompName</td>
                            <td>$row->NumDoses</td>
                            <td>$row->Availability</td>
                            <td>$row->OnHold</td>
                            <td>$row->id</td>
                            </tr>";
                        }

                        $conn->close();
                    ?>
                     </tbody>
                </table>
                <br>
                        <div class = "card">
                            <div class="card-body">
                                <center><h4 class="card-title">Add Vaccine</h4></center>
                                <form action="addVaccine.php" method="POST">
                                        <div class="mb-3">
                                            <label for="VName" class="form-label">Vaccine Name:</label>
                                            <input type="VName" name="VName" class="form-control" id="VName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="CName" class="form-label">Company Name:</label>
                                            <input type="CName" name="CName" class="form-control" id="CName">
                                        </div>
                                        <div class="mb-3">
                                            <label for="NumDoses" class="form-label">Number of Doses:</label>
                                            <input type="NumDoses" name="NumDoses" class="form-control" id="NumDoses">
                                        </div>
                                        <input type="submit" value="Add" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class = "card">
                            <div class="card-body">
                                <center><h4 class="card-title">Delete Vaccine</h4></center>
                                <form action="deleteVaccine.php" method="POST">
                                        <div class="mb-3">
                                            <label for="id" class="form-label">Vaccine ID:</label>
                                            <input type="id" name="id" class="form-control" id="id">
                                        </div>
                                        <input type="submit" value="Delete" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
</html>