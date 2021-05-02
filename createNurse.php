<?php
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$FName = $_POST["FName"];
$MI = $_POST["MI"];
$LName = $_POST["LName"];
$Address = $_POST["Address"];
$Age = $_POST["Age"];
$Gender = $_POST["Gender"];
$phoneNum = $_POST["phoneNum"];
$Username = $_POST["Username"];
$Password = $_POST["Password"];

$myQ = "insert into nurse (`FName`, `LName`, `MI`, `Address`, `Age`, `gender`, `phoneNum`, `username`, `password`) values ('$FName', '$LName', '$MI', '$Address', '$Age', '$Gender', '$phoneNum', '$Username', '$Password')";

$results = $conn->query($myQ);

$conn->close();

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
