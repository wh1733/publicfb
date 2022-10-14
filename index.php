<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <link rel="stylesheet" href="Index format.css">
    <title>Public</title>
</head>
<body>

<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fbdb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        $conn->query("CREATE DATABASE IF NOT EXISTS fbdb");
    }
    

    $sql = "SELECT * FROM postok";
    $result = $conn->query($sql);
    if (empty($result)){
        $sql = "CREATE TABLE postok (uzenet text(100))";
        $conn->query($sql);
    }
    
    $uzenetek[]=Array($result->num_rows > 0);
    if ($result->num_rows > 0) {

        $i=0;
        while($row = $result->fetch_assoc()) {
            $uzenetek[$i]=$row['uzenet'];
            $i++;
        }
    }
    $conn->close();
?>

<div class="button">

    <form class="b2" action="bekuld.php" method="post">
        <input class="b3" type="text" name="mass"<br>
        <input class="b1" type="submit" value="Beküld">
    </form>

    <form class="b2" action="index.php" method="post">
        <input class="b1" type="submit" value="Frissít">
    </form>
    <br>
    <table>
        <?php
            for ($x = 0; $x <= count($uzenetek)-1; $x++) {

        ?>
                <br>
                <form class="b2" action="torol.php" method="post">
                    <?php echo $uzenetek[$x];?><br>
                    <input type="text" name="del" type="hidden" value="<?php echo $uzenetek[$x];?>">
                    <input class="b1" type="submit" value="Töröl">
                </form>
                <br>
            <?php } ?>
    </table>
</div>
    
</body>
</html>