<?php 
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$id = $_POST["id"];

if ($_POST['schID']){
    $schID = $_POST['schID'];
    
    $myQ = "delete from precords where pID = '$id' and timeSlotID = '$schID'";
    $conn->query($myQ);

    $myQ = "update vaccine
    set Availability = Availability+1, OnHold = OnHold-1
    where ID = '1'";

    $conn->query($myQ);
}


$conn->close();
header("Location: patient.php?id=$id");

?>