<?php 
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$id = $_POST["id"];
$vID = $_POST["vID"];
$pID = $_POST["pID"];
$schID = $_POST["schID"];

$myQ1 = "select VName from vaccine where id='$vID'";
$myQ2 = "select timeSlot from records where id='$schID'";

$vName = $conn->query($myQ1)->fetch_object()->VName;
$time = $conn->query($myQ1)->fetch_object()->VName;

$conn->close();
header("Location: nurse.php?id=$id");

?>