<?PHP

/**
 *	@author 	Francis Sowani (Frathoso) <frathoso@gmail.com>
 *	@version	1.0
 */


/**
 *	Defines a new connection to the database
 */

$conn = null;			// Will be the database connection handle
$error = null;			// Will store any errors for the connection
$isConnected = false;	// Will set this to true when connection is successful

// Load database configurations
$configs = parse_ini_file (__DIR__.'/db_config.ini', false);


$settings = array (
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
		PDO::ATTR_PERSISTENT => false,
	);

$dataSource = 'mysql:host='.$configs['HOSTNAME'].';dbname='.$configs['DATABASE'].';charset=utf8';

try {
	$conn = new PDO ($dataSource, $configs['USERNAME'], $configs['PASSWORD'], $settings);

	$isConnected = true;
	
} catch (PDOException $ex){
	$conn = null;
	$error = $ex;
	$isConnected = false;
}

if ($isConnected){
	echo "Database connection successful";
}else{
	echo "Database connection failed: ".$error->getMessage()."\n";
}

?>
