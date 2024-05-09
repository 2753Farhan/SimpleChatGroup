<?php
    session_start();
 if(isset($_SESSION["username"]) && isset($_SESSION["phoneNo"]))
 {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shuvro's Chatroom</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Shuvro's Chatroom</h1>
    <div class="chat">
        <h2>Welcome to chatroom <span><?= $_SESSION["username"]?></span></h2>
        <div class="msg">
        </div>
        <div class="input_msg">
            <input type="text" placeholder="Write message here" id="input_msg">
            <button onclick="update()">Send</button>
        </div>
    </div>
</body>
<script src="js/script.js"></script>
</html>

<?php
  }else{
    header("location: login.php");
  }
?>