<html>
    <head>
        <title>UIHealth | Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <style>
        <?php include "style.css" ?>
        </style>
    </head>
    <body>
    
    <?php

    if ($_POST["id"] && !$_POST["Month"]){
        $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

        $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
        if($conn->connect_error) 
        {
            echo "Error: could not connect to the DB";
            exit;
        }
        $id = $_POST["id"];

        $address = $_POST["Address"];
        $phoneNum = $_POST["phoneNum"];

        $myQ = "update nurse
    set address = '$address', phoneNum = '$phoneNum' 
    where id='$id'";
    
            $results = $conn->query($myQ);
            $conn->close();
            header("Location: nurse.php?id=$id");
            
    };
    ?>
        <div id="header" class="nav">
            <img class="mx-auto" src="logo.png" alt="">
        </div>
        <center><h2>Welcome Nurse!</h2></center>
        <br>
        <div id="nurse" style="width: 1500px; margin:auto; display:grid; grid-template-columns: auto auto; column-gap: 50px;">
            <div>
                <div class = "card">
                    <div class="card-body" style="padding-top: 35px;">
                        <form action="viewNurse.php" method="POST" style="display:inline-block;">
                                <input type="id" name="id" class="form-control" value="<?php echo $_GET["id"] ?>" id="id" hidden>
                                <input type="submit" value="View Info" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <br>
                <div class = "card">
                <div class="card-body">
                    <center><h4 class="card-title">Schedule</h4></center>
                    <form action="nurseSchedule.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                        <div class="mb-3">
                        <select class="form-select" name="Month" id="Month">
                            <option selected>Month</option>
                            <?php for ($i = 0; $i < 12; $i++){
                                $a = $i + 1;
                                echo "<option value='$a'>$a</option>";
                            }?>
                        </select>
                        <select class="form-select" name="Day" id="Day">
                            <option selected>Day</option>
                            <?php for ($i = 0; $i < 31; $i++){
                                 $a = $i + 1;
                                 echo "<option value='$a'>$a</option>";
                            }?>
                        </select>
                        <select class="form-select" name="Hour" id="Hour">
                            <option selected>Hour</option>
                            <?php for ($i = 0; $i < 24; $i++){
                                echo "<option value='$i'>$i</option>";
                            }?>
                        </select>
                        </div>
                        
                        <input type="submit" value="Schedule" class="btn btn-primary">
                    </form>
                </div>
                </div>
                <br>
                <div class = "card">
                    <div class="card-body">
                    <center><h4 class="card-title">Delete Schedule</h4></center>
                    <form action="nurseSchedule.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <div class="mb-3">
                                <label for="schID" class="form-label">Time slot ID:</label>
                                <input type="schID" name="schID" class="form-control" id="schID">
                            </div>
                            <input type="submit" value="Delete" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            <br>
                <div class = "card">
                    <div class="card-body">
                        <center><h4 class="card-title">Record Vaccination</h4></center>
                        <form action="recordVaccine.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                                <div class="mb-3">
                                    <label for="pID" class="form-label">Patient ID:</label>
                                    <input type="pID" name="pID" class="form-control" id="pID">
                                </div>
                                <div class="mb-3">
                                    <label for="vID" class="form-label">Vaccine ID:</label>
                                    <input type="vID" name="vID" class="form-control" id="vID">
                                </div>
                                <div class="mb-3">
                                    <label for="schID" class="form-label">Time slot ID:</label>
                                    <input type="schID" name="schID" class="form-control" id="schID">
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <br>
                <div class = "card">
                    <div class="card-body">
                        <center><h4 class="card-title">Update Information</h4></center>
                        <form action="nurse.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <div class="mb-3">
                                <label for="Address" class="form-label">Address:</label>
                                <?php
                                $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

                                $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
                                if($conn->connect_error) 
                                {
                                    echo "Error: could not connect to the DB";
                                    exit;
                                }
                                $id = $_GET["id"];
                                $myQ = "select * from nurse where id=$id";
                                $results = $conn->query($myQ);
                                $row = $results->fetch_object();

                                $address = $row->address;
                                $phoneNum = $row->phoneNum;
                                

                                print("
                                <input type='Address' name='Address' class='form-control' value='$address' id='Address'>

                            </div>
                            <div class='mb-3'>
                                <label for='phoneNum' class='form-label'>Phone Number:</label>
                                <input type='phoneNum' name='phoneNum' class='form-control' value='$phoneNum' id='phoneNum'>");
                                $conn->close();
                                ?>
                            </div>
                            <input type="submit" value="Update" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <br>
            </div>
            <div>
            <center><h3>Schedule</h3></center>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Time Slot</th>
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
                                $id = $_GET["id"];
                                $myQ = "select * from records join nrecords where nrecords.timeSlotID = records.ID and nID = $id";
                                $results = $conn->query($myQ);
                                while($row = $results->fetch_object()){
                                    echo "<tr><th>$row->ID</th>
                                    <td>$row->timeSlot</td>
                                    </tr>";
                                }

                                $conn->close();
                            ?>
                            </tbody>
                        </table>
                        <br>
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
            </div>
        </div>
    </body>
</html>
