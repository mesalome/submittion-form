<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<title>Personal Information</title>
		<link rel="stylesheet" href="css/styles.css" />
	</head>
    <body> 

<?php 

Class Connection {
private  $server = "mysql:host=localhost;dbname=demos";
private  $user = "root";
private  $pass = "root";
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
protected $con;
 
        public function openConnection()
             {
               try
                 {
          $this->con = new PDO($this->server, $this->user,$this->pass,$this->options);
          return $this->con;
                  }
               catch (PDOException $e)
                 {
                     echo "There is some problem in connection: " . $e->getMessage();
                 }
             }
public function closeConnection() {
     $this->con = null;
  }
}
try
{
    if(!$_GET['id']){
        echo 'error';
    } else{
    $id = $_GET['id'];
     $database = new Connection();
     $db = $database->openConnection();
     $sql = "DELETE FROM contacts WHERE `id` = $id" ;
     $affectedrows  = $db->exec($sql);
   if(isset($affectedrows))
    {
       echo "<h2>Record has been successfully deleted</h2>";
    }          
}
}
 catch (PDOException $e)
{
   echo "There is some problem in connection: " . $e->getMessage();
}
?>

<div><label><a href="http://localhost:8888/submittion-form/data.php" class="back">Back to Data Table</a></label></div>
<div><label><a href="http://localhost:8888/submittion-form/index.html" class="back">Back to Submittion Page</a></label></div>

</body>
</html>