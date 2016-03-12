<!DOCTYPE html>
<html lang="da">
<header>
<meta charset="UTF-8">
<title>Ny øl</title>
</header>
<body>
<?php
include_once "includes/functions.php";

if(isset($_POST['add']))
   {
   	// 1: do some error checking here
   	// 2: throw an error or do DB INSERT here
	
   	// 3: set variable that displays "edit" button:
   	$display_button_value = "edit";
   	$display_button_name = "edit";
   	// 4: set a confirmation message:
   	$msg = "Your stuff has been ADDED";
	new_beer($_POST['brewery'], $_POST['beer'], $_POST['type'], $_POST['barcode']);
   }
   // user is editing stuff:
   elseif(isset($_POST['edit']))
   {
   	// 1: do some error checking here
   	// 2: throw an error or do DB UPDATE here
   	// 3: set variable that displays "delete" button:
   	$display_button_valu = "delete";
   	$display_button_name = "delete";
   	// 4: set a confirmation message:
   	$msg = "Your stuff has been EDITED";
   }
   // user is deleting stuff:
   elseif(isset($_POST['delete']))
   {
   	// 1: do some error checking here
   	// 2: throw an error or do DB DELETE here
   	// 3: set variable that displays "add" button:
   	$display_button_valu = "add";
   	$display_button_name = "add";
   	// 4: set a confirmation message:
   	$msg = "Your stuff has been DELETED";
   }
   // user is doing nothing, it's his/her first time (ooer)
   else
   {
   	// 1: set variable that displays "add" button:
   	$display_button_valu = "add";
   	$display_button_name = "add";
   	// 2: set a welcome message:
   	$msg = "Welcome. Please add some stuff in the form below";
   }
?>

<?php beer_header() ?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
Brygger: <input type="text" name="brewery"><br>
Øl navn: <input type="text" name="beer"><br>
Type: <input type="text" name="type"><br>
Stregkode <input type="text" name="barcode"><br>
<input type="submit" name="<?=$display_button_name?>" value="<?=$display_button_value?>" />

</form>


</body>
</html>