<?php

// This is a public script that uses the private scripts to load all users


require_once(__DIR__.'/../db/db_libs.php');

// Grab the limit from the GET request if available
$limit = 10;
if (isset($_GET['limit'])) $limit = htmlentities($_GET['limit']);

$response = array('status' => 'error');

// Request the messages from the DB

try{
        $response['messages'] = selectAllChats($limit);;
        $response['status'] = 'success';
} catch(Exception $ex){
        $response['error'] = $ex->getMessage();
}

// Send a response to the front-end
header('Access-Control-Allow-Origin: *.alvinlabs.pro');
echo (json_encode($response));

?>

