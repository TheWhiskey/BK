<DOCTYPE! html>
<html lang="da">
<head>
<meta charset="utf8">
<title></title>
<?php include_once "includes/functions.php"; ?>
</head>
<body>

<?php beer_header(); ?>

<?php
$result = user_ratings();

foreach ($result as $row) {
	echo $row['username']." - ".$row['brewery']." - ".$row['name']." - ".$row['rating']."<br>";
	
}
?>
</body>
<html>
