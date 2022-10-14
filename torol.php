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
    
    $mass=$_POST['del'];
    $sql = "DELETE FROM postok WHERE uzenet=\"".$mass."\"";
    $conn->query($sql);
    header('Location: index.php');
?>