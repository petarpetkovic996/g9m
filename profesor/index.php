<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Black holes</title>
</head>
<style>
    h1{text-align: center;}
</style>
<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "tribute";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT first_name, last_name, image, dob, description, state FROM person";
        $result = $conn->query($sql);

        $rows = [];
        while($row = $result->fetch_assoc()) {
            $rows = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'dob' => $row['dob'],
                'image' => $row['image'],
                'description' => $row['description'],
                'state' => $row['state'],
            ];
        }
    ?>
	<h1><?php echo $rows['first_name'] . " " . $rows['last_name']; ?></h1>
	<h2>Date of Birth : <?php echo $rows['dob']; ?></h2>
	<h2>State: <?php echo $rows['state']; ?></h2>
	<br>
    <p><?php echo $rows['description']; ?></p>
	<img src="<?php echo $rows['image']; ?>" alt="Black hole">

</body>
</html>