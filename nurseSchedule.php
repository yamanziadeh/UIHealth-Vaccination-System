<?php 
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$id = $_POST["id"];

if ($_POST["Month"]){
    $Year = 2021;
    $Month = $_POST["Month"];
    $Day = $_POST["Day"];
    $Hour = $_POST["Hour"];

    $timestamp = "$Month/$Day/$Year $Hour:00";
    $time = date('Y-m-d h:i:s', strtotime($timestamp));
    $myQ = "insert into records(`timeSlot`) values('$time')";
    $results = $conn->query($myQ);
    $myQ = "select * from records where timeSlot = '$time'";
    $results = $conn->query($myQ);
    $timeID = $results->fetch_object()->ID;
    $myQ = "insert into nrecords(`nID`, `timeSlotID`) values('$id', '$timeID')";
    $results = $conn->query($myQ);
}

if ($_POST['schID']){
    $schID = $_POST['schID'];
    
    $myQ = "delete from nrecords where nID = '$id' and timeSlotID = '$schID'";
    $results = $conn->query($myQ);

    $myQ = "select * from nrecords join records on nrecords.timeSlotID = records.ID where records.ID = '$schID'";
    $result = $conn->query($myQ);

    if ($result->num_rows == 0){
        $myQ = "delete from records where ID = '$schID'";
        $results = $conn->query($myQ);
    }
}

$conn->close();
header("Location: nurse.php?id=$id");

?>