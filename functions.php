<!--  -->

<!-- Connect to db -->
<?php
function connect_db($status, $conn) {
    # Attemt connect. Return success or fail. Catch exceptions.


    // Create connection
    $conn = new mysqli(servername(), username(), password());

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        return $conn->connect_error;
    } 
        echo "Connected successfully";
    return 1;
}

function print_error($msg) {
    # Print error msg for user with this function.
}

function read_config_file() {
    
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
?>
<!-- Read Configuration -->