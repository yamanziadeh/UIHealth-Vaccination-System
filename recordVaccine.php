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
$myQ2 = "select * from records where id='$schID'";

$vName = $conn->query($myQ1)->fetch_object()->VName;

$time = $conn->query($myQ2)->fetch_object()->timeSlot;

$myQ = "insert into history (`nID`, `pID`, `vName`, `timeSlot`) values ('$id', '$pID', '$vName', '$time')";

$conn->query($myQ);

$myQ = "update vaccine
set NumDoses = NumDoses-1, OnHold = OnHold-1
where ID = '$vID'";

$conn->query($myQ);

$myQ = "update patient
set vTaken = '$vName', currDose = currDose+1
where id = '$pID'";

$conn->query($myQ);

$myQ = "delete from precords where pID = '$pID'";
$conn->query($myQ);

$conn->close();
header("Location: nurse.php?id=$id");
?>