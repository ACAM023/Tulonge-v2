<?PHP

/**
 *	@author 	[First] [Last] <[email]>
 *	@version	1.0
 */


/*	Requires necesssary scripts  */
require_once (__DIR__.'/db_connection.php');


/**
 *	Defines chats related functions
 */

function selectAllChats($limit){
   global $conn, $error;

   $chatList = null;
   if ($conn != null){
       $query = "SELECT message, sent_time FROM chats LIMIT :lim";
       $statement = $conn->prepare($query);
       $statement->bindValue(':lim', 	$limit, 	PDO::PARAM_INT);
       $statement->execute();

       $chatList = $statement->fetchAll(PDO::FETCH_ASSOC);
     }/*else {
       echo "Error (selectAllChats): ".$error->getMessage();
     */}

   return $chatList;
 }


 function addToChats($limit){
   global $conn, $error;

   $chatAdd = null;
   if ($conn != null){
       $query = "INSERT  INTO chats (message, sent_time)";
       $statement = $conn->prepare($query);
       $statement->bindValue(':lim', 	$limit, 	PDO::PARAM_INT);
       $statement->execute();

       $chatAdd = $statement->fetchAll(PDO::FETCH_ASSOC);
     }

     return $chatAdd;
 }

// TODO

//echo "TODO";

?>
