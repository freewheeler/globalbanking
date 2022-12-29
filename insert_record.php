<!DOCTYPE html> <html>
<head>
<title>Slavernij invoer resultaten</title> </head>
<body>
<h1>Slavernij invoer resultaten</h1>

  
<?php

// create short variable names

$begindatum=$_POST['begindatum'];
$einddatum=$_POST['einddatum'];
$waarheen=$_POST['werkadres'];
$naam=$_POST['naam'];
$email=$_POST['email'];
$extra=$_POST['extra'];

@$db = new mysqli('localhost', 'root', 'root', 'slavernij');
if (mysqli_connect_errno()) {
echo "<p>Error: Could not connect to database.<br/>
Please try again later.</p>";
exit;
} else {
    echo 'connected to liften DB, ready to query slaven table'; 
}

$query = "INSERT INTO slaven VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($query);
$stmt->bind_param('ssssss', $begindatum, $einddatum, $werkadres, $naam, $email, $extra);
$stmt->execute();

if ($stmt->affected_rows > 0) {
echo "<p>lift inserted into the database.</p>";
} else {
echo "<p>An error has occurred.<br/>
The item was not added.</p>";
 }
$db->close();
?>
</body>
</html>
