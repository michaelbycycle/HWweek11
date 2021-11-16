

<?php require('mysqlconnection.php'); ?>

<?php
if(isset($_GET["userID"]))
{
    $userid = $_GET["userID"];
}

$stmt = $conn->prepare("UPDATE users_wade set fname = ? WHERE userID = ?");
$stmt->bind_param("si", $firstname, $userid);

$firstname = "Reggie";
$usserid = 6;


$stmt->execute();

echo("Success")

<?php header("Location: http://localhost/phpdemo/xxxxxx.php"); ?>

?>