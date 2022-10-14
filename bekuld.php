<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fbdb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $mass=$_POST['mass'];
    $sql = "INSERT INTO postok (uzenet)
    VALUES ('".$mass."')";
    $conn->query($sql);
    header('Location: index.php');
?>