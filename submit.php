<?php
$host = "localhost";
$db = "demos";
$username = "root";
$password= "root";
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try{
    $conn = new PDO ($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
}
$response = array ('success'=> false);
if(isset($_POST['usname']) && $_POST['usname']!=''&& isset($_POST['surname']) && $_POST['surname']!='' &&isset($_POST['email']) && $_POST['email']!=''){
    $sql = "INSERT INTO contacts(usname, surname, email) VALUES ('".addslashes($_POST['usname'])."', '".addslashes($_POST['surname'])."', '".addslashes($_POST['email'])."')";
    if($conn->query($sql)){
        $response['success'] = true;
    }
}
echo json_encode($response);
