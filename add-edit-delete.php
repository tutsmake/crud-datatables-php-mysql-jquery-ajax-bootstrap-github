<?php

// Database connection info 
  $host='localhost';
  $username='root';
  $password='';
  $dbname = "demos";
  $conn=mysqli_connect($host,$username,$password,"$dbname");


if ($_POST['mode'] === 'add') {
     
     $name = $_POST['name'];
     $email = $_POST['email'];
     
     mysqli_query($conn, "INSERT INTO users (name,email)
     VALUES ('$name','$email')");

     echo json_encode(true);
}  

if ($_POST['mode'] === 'edit') {
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE id='" . $_POST['id'] . "'");
    $row= mysqli_fetch_array($result);

     echo json_encode($row);
}   

if ($_POST['mode'] === 'update') {

    mysqli_query($conn,"UPDATE users set  name='" . $_POST['name'] . "', email='" . $_POST['email'] . "' WHERE id='" . $_POST['id'] . "'");
    echo json_encode(true);
}  

if ($_POST['mode'] === 'delete') {

     mysqli_query($conn, "DELETE FROM users WHERE id='" . $_POST["id"] . "'");
     echo json_encode(true);
}  

?>