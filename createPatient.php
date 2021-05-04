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
$SSN = $_POST["SSN"];
$Address = $_POST["Address"];
$Age = $_POST["Age"];
$Gender = $_POST["Gender"];
$Race = $_POST["Race"];
$Occupation = $_POST["Occupation"];
$medicalHistory = $_POST["medicalHistory"];
$phoneNum = $_POST["phoneNum"];
$Username = $_POST["Username"];
$Password = $_POST["Password"];

$myQ = "insert into patient (`SSN`,`FName`, `LName`, `MI`, `medicalHistory`, `address`, `age`, `gender`, `race`, `occupation`, `phoneNum`, `username`, `password`) 
         values ('$SSN', '$FName', '$LName', '$MI', '$medicalHistory', '$Address', '$Age', '$Gender', '$Race', '$Occupation', '$phoneNum', '$Username', '$Password')";

$results = $conn->query($myQ);

$conn->close();

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>
