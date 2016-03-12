<DOCTYPE! HTML>
<html lang="da">
<head>
<meta charset="UTF8">
<title></title>
</head>
<body>
<?php
include_once "includes/functions.php";

$display_button_name = "add";
$display_button_value = "add";

if (isset($_POST['add'])) 
{
	rate($_POST['user_id'], $_POST['beer_id'], $_POST['rating']);
}

?>


<?php beer_header(); ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">

<!-- Bruger: <input type="number" name="user_id"><br> -->

<?php
	

	$result = get_users();
    echo "<select name='user_id'>";
    foreach ($result as $row) {

                  unset($id, $name);
                  $id = $row['id'];
                  $name = $row['username']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
	}
    echo "</select><br>";

	$result = get_beer();
    echo "<select name='beer_id'>";
    foreach ($result as $row) {

                  unset($id, $name, $brewery);
                  $id = $row['id'];
                  $name = $row['name']; 
				  $brewery = $row['brewery'];
                  echo '<option value="'.$id.'">'.$brewery.' - '.$name.'</option>';
	}
    echo "</select><br>";
?>
Point: <input type="number" name="rating"><br>
<input type="submit" name="<?=$display_button_name?>" value="<?=$display_button_value?>" />
</body>
</html>