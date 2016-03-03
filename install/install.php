<!-- Installation script. 

- create tables
- insert data
- update config.php to match your installation.

-->

<?php
include "../functions.php";

#Read configuration.

#Connect to db.db.
connect_db($status, $conn);
if ($status != 1)
    die($status);

#Execute create_tables.sql.
?>
