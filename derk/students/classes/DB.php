 <?php
require_once ('cfg.php');
define("DEBUG",true);
class DB {
	
  public static function echoSQlParms($query,$params){
    echo "<br><br>-- DB.php Output of  function query ---";
	echo "<br>----------------------------------------------<br>";
	echo "<br> <b>QUERY =>". $query."</b><br><br>";
	echo "<br><pre>".print_r($params, true) . "</pre>";
    echo "<br><br>------ End  ------<br>";
 }
 
  public static function echoResults($data,$statement){ 
       	echo "<br><pre>".print_r($data, true) . "</pre>"; 
        echo "<b>Number of Items</b> = ".$statement->rowCount();
        echo self::GetlastInsertId();
		echo "<br> END Output of  function query <br>";
        echo "---------------------------------<br><br>"; 
  }

  
  
 public static function  GetlastInsertId(){
	$id = self::connect()->lastInsertId(); 
 	return $id;
 } 
 
 
 private static function connect() {
  try { 
	$hostdb = 'mysql:host='. DB_HOST  .';';
    $hostdb = $hostdb . 'dbname=' . DB_NAME.';charset=utf8';
    $pdo = new PDO( $hostdb, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
	}
  catch (PDOException $e){
    	exit ("<br><b>Error! in function connect():<br> </b>".$e->getMessage());
	    	
	}
 
 }//connect

 public static function query($query, $params = array()) {
  
 
  try { 
   $statement = self::connect()->prepare($query);
  
	if(DEBUG){
          self::echoSQlParms($query,$params);//echo query and parmetrs
	}  
	$statement->execute($params);
    if (strtolower(explode(' ', $query)[0]) == 'select') {
        $data = $statement->fetchAll();
	    if(DEBUG){
			self::echoResults($data,$statement);
       	} 
        return $data;
     }
	}//try 
	catch (PDOException $e){
	  exit ("<br><br><b>Error in function query: </b><br>".$e->getMessage());
	}
  }
}//class DB


 
?> 
 