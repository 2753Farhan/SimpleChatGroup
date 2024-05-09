<?php
    include "db.php";
    session_start();
    if(isset($_POST['name'])&&isset($_POST['phone'])){
        $name=$_POST["name"];
        $phone=$_POST["phone"];

        $q="SELECT * FROM `users` WHERE name='$name' && phone='$phone'";
        if($rq=mysqli_query($db,$q)){
            if(mysqli_num_rows($rq)==1){
                echo "login";
                $_SESSION["username"] = $name;
                $_SESSION["phoneNo"] = $phone;
                header("location: index.php");


            }else{
                $q="SELECT * FROM `users` WHERE phone='$phone'"; 
                if($rq=mysqli_query($db,$q)){
                    if(mysqli_num_rows($rq)==1){
                        echo "<script>alert('Phone number already exists')</script>";
                    }       
                    else{
                        $q= "INSERT INTO `users`( `name`, `phone`) VALUES ('$name','$phone')";
                        if($rq=mysqli_query($db,$q)){
                            $q="SELECT * FROM `users` WHERE name='$name' && phone='$phone'";
                            if($rq=mysqli_query($db,$q)){
                                if(mysqli_num_rows($rq)==1){
                                    echo "Login and Registration success";
                                    $_SESSION["username"] = $name;
                                    $_SESSION["phoneNo"] = $phone;
                                    header("location: index.php");
                                }       
                             
                            }
                      
                        }

                    }
                }

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shuvro's Chatroom</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <h1>Chatroom</h1>
    <div class="login">
        <h2>Login</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam cumque corporis fuga dolorum laudantium vel
            facilis at aperiam amet in nulla nam enim, nostrum est laborum, sunt, earum expedita. Voluptatibus.</p>
        <form action="" method="post">
            <h3>Username</h3>
            <input type="text" placeholder="Short Name" name="name">

            <h3>Mobile No:</h3>
            <input type="number" placeholder="with country code" min="1111111" max="9999999" name="phone">

            <button>Login/Register</button>
        </form>
    </div>
</body>

</html>

