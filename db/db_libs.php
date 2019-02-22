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

function selectAllChats(){
   global $conn, $error;

   $chatList = null;
   if ($conn != null){
       $query = "SELECT message, sent_time FROM chats";
       $statement = $conn->prepare($query);
       $statement->execute();

       $chatList = $statement->fetchAll(PDO::FETCH_ASSOC);
     }else {
       echo "Error (selectAllChats): ".$error->getMessage();
     }

   return $chatList;
 }

// TODO

//echo "TODO";

?>
