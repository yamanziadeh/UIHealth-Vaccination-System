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
        if ($_POST["schID"]){
            $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

            $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
            if($conn->connect_error) 
            {
                echo "Error: could not connect to the DB";
                exit;
            }
            $id = $_POST["id"];
            $time = $_POST["schID"];
            $vID = $_POST["vID"];

            $schID = $conn->query("select ID from records where timeSlot='$time'")->fetch_object()->ID;

            $myQ = "insert into precords(`pID`, `timeSlotID`, `vID`) values ('$id','$schID','$vID')";
            
            $result = $conn->query($myQ);   
           
            $myQ = "update vaccine
            set Availability = Availability-1, OnHold = OnHold+1
            where ID = '$vID'";

            $conn->query($myQ);

            $conn->close();
            header("Location: patient.php?id=$id");
        }
    ?>
        <div id="header" class="nav">
            <img class="mx-auto" src="logo.png" alt="">
        </div>
        <center><h2>Welcome Patient!</h2></center>
        <br>
        <div style="display:grid; grid-template-columns: 500px auto; margin: auto; width: 1300px;column-gap:50px">
            <div id="patient" style="width: 500px; margin:auto;">
                <div class = "card">
                    <div class="card-body" style="padding-top: 35px;">
                        <form action="viewPatient.php" method="POST" style="display:inline-block;">
                                <input type="id" name="id" class="form-control" value="<?php echo $_GET["id"] ?>" id="id" hidden>
                                <input type="submit" value="View Info" class="btn btn-primary">
                        </form>
                        <form action="updatePatient.php" method="GET" style="display:inline-block;">
                                <input type="id" name="id" class="form-control" value="<?php echo $_GET["id"] ?>" id="id" hidden>
                                <input type="submit" value="Update Info" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">
                        <center><h4 class="card-title">Schedule</h4></center>
                        <form action="patient.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <div class="mb-3">
                                <label for="vID" class="form-label">Vaccine ID:</label>
                                <input type="vID" name="vID" class="form-control" id="vID">
                            </div>
                            <div class="mb-3">
                            <select class="form-select" name="schID" id="schID">
                                <option selected>Available Time Slots</option>
                                <?php 
                                    $dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

                                    $conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
                                    if($conn->connect_error) 
                                    {
                                        echo "Error: could not connect to the DB";
                                        exit;
                                    }

                                    $myQ = "select records.timeSlot, records.ID, count(nID) as nurseCount from records join nrecords on records.ID = nrecords.timeSlotID GROUP BY records.timeSlot";
                                    
                                    $result = $conn->query($myQ);

                                    while ($row = $result->fetch_object()){
                                        $patientCount = $conn->query("select patientCount from (select records.ID, count(pID) as patientCount from records join precords on records.ID = precords.timeSlotID GROUP BY records.timeSlot) as misc where ID='$row->ID'");
                                        $patientCount = $patientCount->fetch_object()->patientCount;
                                        if ($row->patientCount < 100 && $row->patientCount < $row->nurseCount*10){
                                            echo "<option value='$row->timeSlot'>$row->timeSlot</option>";
                                        }
                                    }
                                ?>
                            </select>
                            </div>
                            <input type="submit" value="Schedule" class="btn btn-primary">
                        </form>
                    </div>
                </div>
                <br>
                <div class = "card">
                    <div class="card-body">
                    <center><h4 class="card-title">Cancel Schedule</h4></center>
                    <form action="cancelPatientSch.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                            <div class="mb-3">
                                <label for="schID" class="form-label">Time slot ID:</label>
                                <input type="schID" name="schID" class="form-control" id="schID">
                            </div>
                            <input type="submit" value="Cancel" class="btn btn-primary">
                    </form>
                    </div>
                </div>
            </div>
        <div>
        <center><h3>Vaccines</h3></center>
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
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
                            <td>$row->id</td>
                            </tr>";
                        }

                        $conn->close();
                    ?>
                     </tbody>
                </table>
                <br>
                <center><h4>My Schedule</h4></center>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Time Slot</th>
                                <th scope="col">Vaccine ID</th>
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
                                $myQ = "select * from records join precords where precords.timeSlotID = records.ID and pID = $id";
                                $results = $conn->query($myQ);
                                while($row = $results->fetch_object()){
                                    echo "<tr><th>$row->ID</th>
                                    <td>$row->timeSlot</td>
                                    <td>$row->vID</td>
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