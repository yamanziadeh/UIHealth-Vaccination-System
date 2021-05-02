<?php
$dbhost = "localhost";$dbuser = "root";$dbpwd = "root";$dbname = "Project";

$conn = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn->connect_error) 
{
    echo "Error: could not connect to the DB";
    exit;
}

$id = $_POST['id'];
$myQ = "delete from nurse where id = '$id'";
$results = $conn->query($myQ);
$conn->close();

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>