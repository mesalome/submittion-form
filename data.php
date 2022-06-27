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
?>
<div><label id="back_to_submittion"><a href="http://localhost:8888/submittion-form/index.html" class="back">Back to Submittion Page</a></label></div>
<?php
try
{
    $database = new Connection();
    $db = $database->openConnection();
    $sql = "SELECT * FROM `contacts`;";
   
    ?>

    <table class="table">
    <tr>
        <th>#id</th>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
<?php 
foreach ($db->query($sql) as $row) {?>
<tr>
    <td><?php echo $row['id'];?></td>
    <td><?php echo $row['usname'];?></td>
    <td><?php echo $row['surname'];?></td>
    <td><?php echo $row['email'];?></td>
    <td><a href="delete.php?id=<?php echo $row['id']?>" class="delete">Delete</a> </td>
</tr>
<?php } ?>
</table>
<?php
}
catch (PDOException $e)
{
    echo "There is some problem in connection: " . $e->getMessage();
}
?>

</body>
</html>