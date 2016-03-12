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

if (isset($_POST['add'])) {
	new_user($_POST['name'], $_POST['hash'], $_POST['mail']);
}

?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Navn: <input type="text" name="user_name"><br>
Husk password skal laves til HASH inden overførsel.<br>
Kodeord: <input type="text" name="hash"><br>
Mail: <input type="text" name="mail"><br>
<input type="submit" name="<?=$display_button_name?>" value="<?=$display_button_value?>" />
</body>
</html>