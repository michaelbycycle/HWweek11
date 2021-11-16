<html>
<body>
<?php require('mysqlconnection.php'); ?>
<?php
//insert part
// prepare and bind

if(isset($_GET["firstname"]))
{
    $firstname = $_GET["firstname"];
}
if(isset($_GET["lastname"]))
{
    $lastname = $_GET["lastname"];
}
if(isset($_GET["email"]))
{
    $email = $_GET["email"];
}
    

$stmt = $conn->prepare("INSERT INTO users_wade (fname, lname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// phase 1 (hard coded)set parameters and execute
// phase 2 (remove this code and get data from the insertUser pageg)
//$firstname = "Greg";
//$lastname = "Hollenbeck";
//$username = "greg@greg.com";


$stmt->execute();

//Select entries from database
$sql = "SELECT userid, fname, lname, email FROM users_wade";

$result = $conn->query($sql);

$controlthing = "<form action='registrationResults.php'  method='GET'><select name='username'>";

//display results to the page
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    //echo "name: " . $row["fname"]. " lname: " . $row["lname"]. " - email: " . $row["email"]."<br>";
    $controlthing = $controlthing . "<option name='" .  $row["fname"] . "'>" . $row['fname'] . "</option>";

  }
} else {
  echo "0 results";
}

$controlthing = $controlthing . "</select><input type='submit' value ='submit'></form>";
echo($controlthing);

$conn->close();

?>
</body>
</html>