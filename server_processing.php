<?php include_once 'config.php';

// DB table to use
$table = 'users';
 
// Table's primary key
$primaryKey = 'id';
 
$columns = array(
    array( 'db' => 'username', 'dt' => 0 ),
    array( 'db' => 'input',  'dt' => 1 ),
    array( 'db' => 'fib',   'dt' => 2 )
);
 
// SQL server connection information
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASS,
    'db'   => DB_NAME,
    'host' => DB_HOST
);
 
require( 'ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);