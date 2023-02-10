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
        include_once 'Query.php';

        $query = new Query();
        $sql = "SELECT * FROM person";
        $rows = $query->execute($sql);
    ?>
	<h1><?php echo $rows[0]['first_name'] . " " . $rows[0]['last_name']; ?></h1>
	<h2>Date of Birth : <?php echo $rows[0]['dob']; ?></h2>
	<h2>State: <?php echo $rows[0]['state']; ?></h2>
	<br>
    <p><?php echo $rows[0]['description']; ?></p>
	<img src="<?php echo $rows[0]['image']; ?>" alt="Black hole">

</body>
</html>