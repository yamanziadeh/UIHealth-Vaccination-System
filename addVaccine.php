<?php
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$VName = $_POST["VName"];
$CName = $_POST["CName"];
$NumDoses = $_POST["NumDoses"];

$myQ1 = "select * from vaccine where VName = '$VName'";
$results = $conn->query($myQ1);

if ($results->num_rows > 0){
    $myQ2 = "select NumDoses, Availability from vaccine where VName = '$VName'";
    $results = $conn->query($myQ2);
    $row = $results->fetch_object();
    $currNumDoses = $row->NumDoses + $NumDoses;
    $currAva = $row->Availability + $NumDoses;

    $myQ3 = "update vaccine set NumDoses = '$currNumDoses', Availability = '$currAva' where VName = '$VName'";
    $results = $conn->query($myQ3);
} else {
    $myQ2 = "insert into vaccine (`VName`, `CompName`, `NumDoses`,`Availability`, `OnHold`) 
    values ('$VName', '$CName', '$NumDoses', '$NumDoses', '0')";
    $results = $conn->query($myQ2);
}

$conn->close();

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
