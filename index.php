<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Chat System</title>
    <link rel="stylesheet" href="style.css">   
    </head>

<body>

<div id="container">
    <div id="chat_box">
    <div id="chat"></div>
        <?php
            include 'db.php';
            $query = "SELECT * FROM chat ORDER BY id DESC";
            $run = $con->query($query);
        
            while($row = $run->fetch_array()) :
        ?>
        <div id="chat_data">
            <span style="color: green"><?php echo $row['name']; ?> </span>
            <span style="color: brown"><?php echo $row['msg']; ?></span>
            <span style="float: right"><?php echo date('H:i', strtotime($row['date'])); ?></span>
        </div>
        <?php endwhile;?>
    </div>
    <form method="post" action="index.php">
    <input type="text" name="name" placeholder="enter name"/>
    <textarea name="msg" placeholder="enter message"></textarea>
    <input type="submit" name="submit" value="Send"/>
    </form>
    <?php
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $msg = $_POST['msg'];
        $query = "INSERT INTO chat (name,msg) values ('$name', '$msg')";
        
        $run = $con->query($query);
    
    }
    
    ?>
    
    
</div>

</body>
</html>