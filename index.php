<?php
    session_start();
    $connection = mysqli_connect("localhost","root","","collection") or die($connection);
    if(isset($_POST['submit'])){
        session_start();
        $username = $_POST["username"];
        $email = $_POST['email'];
        $password = $_POST['passwordOne'];
        $passwordTwo = $_POST['passwordTwo'];
        
        if($password == $passwordTwo){
            $password = md5($password);
            $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$password')";
            mysqli_query($connection,$sql);

            $_SESSION['message'] = 'you are logged in';
            $_SESSION['username'] = $username;

            header("Location: home.php");
        }
        else{
            $_SESSION['message'] = 'not matched';
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <div class="head">
            <h2>Registration Page</h2>
        </div>
        <form action="index.php" method="POST">
                <div class="data-field">
                    <div class="user-name">
                        <label for="username"></label>
                        <input type="text" name="username" placeholder="User name">
                    </div>
                    <div class="email">
                        <label for="email"></label>
                        <input type="text" name="email" placeholder="Email">
                    </div>
                    <div class="password-one">
                        <label for="passwordOne"></label>
                        <input type="text" name="passwordOne" placeholder="Password">
                    </div>
                    <div class="password-two">
                        <label for="passwordTwo"></label>
                        <input type="text" name="passwordTwo" placeholder="Confirm Password">
                    </div>
                    <div class="submit">
                            <label for="submit"></label>
                            <button type="submit" name="submit">registration</button>
                    </div>
                </div>
        </form>
    </body>
</html>