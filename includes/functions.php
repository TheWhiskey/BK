<!--  -->

<!-- Connect to db -->
<?php 

function connect_db() {
    # Attemt connect. Return success or fail. Catch exceptions.


    // Create connection	
    //$conn = new mysqli(servername(), username(), password());
	$servername = servername();
	$username = username();
	$password = password();
	$dbname = dbname();
	
	//IMPROVE. Perhaps add check to see if we are already connected. Php db ping probably.
	
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
		exit();
	}
    
    return $conn;
}

function user_ratings() {
	
	$conn = connect_db();
	
	$sql = "select user.username, user_beer.rating, beer.brewery, beer.name from user_beer,beer,user where user_beer.beer_id = beer.id AND user.id = user_beer.user_id";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->fetchAll();
	return $result;
}

function beer_header() {
	echo "<a href='./new.php'>New beer</a><br>";
	echo "<a href='./rate.php'>Rate a beer</a><br>";
	echo "<a href='./ratings.php'>Ratings</a><br>";
	echo "<br>";
	
}

function get_beer() {
	$conn = connect_db();
	
	$stmt = $conn->prepare("select brewery, name, beer_type, barcode, id from beer");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	return $result;
}

function get_users() {
	
	$conn = connect_db();
	
	$stmt = $conn->prepare("select id, username from user");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	return $result;
}

function print_error($msg) {
    # Print error msg for user with this function.
}

function read_config_file() {
    
}

function dbname() {
	return "gretter_beer";
}

function password() {
    return "pescadosg1";
}
function username() {
    return "gretter";
}
function servername() {
    return "mysql4.gigahost.dk:3306";
}

function rate($user_id, $beer_id, $rating) {
	
	$conn = connect_db();
	
	$stmt = $conn->prepare("INSERT INTO user_beer (user_id, beer_id, rating) VALUES (:user_id, :beer_id, :rating)");
	$stmt->bindParam(':user_id', $user_id); 
	$stmt->bindParam(':beer_id', $beer_id); 
	$stmt->bindParam(':rating', $rating);
	$stmt->execute();
	
}

function new_user($name, $hash, $mail){
	$conn = connect_db();
	
	//IMPROVE.
	$hash = "test";
	$mail = "mail@mail.mail";
	$name = "John Doe";
	
	$stmt = $conn->prepare("INSERT INTO user (pw) VALUES (:password_hash)");
	$stmt->bindParam(':password_hash', $hash);	
	$stmt->execute();
}

function new_beer($brewery, $name, $type, $barcode) 
{	
	$conn = connect_db();
	
	$stmt = $conn->prepare("INSERT INTO beer (brewery, name, beer_type, barcode) VALUES (:brewery, :name, :beer_type, :barcode)");
	$stmt->bindParam(':brewery', $brewery);	$stmt->bindParam(':name', $name);	$stmt->bindParam(':beer_type', $type);
	$stmt->bindParam(':barcode', $barcode);	// insert one row	
	$stmt->execute();
}
?>
<!-- Read Configuration -->