<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prijava</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <center>
        <div class="user-form">
            <h1>Prijavite se</h1>
            <div>
                <form method="post">
                    <br><input type="text" id="form-input" name="korime" placeholder="Korisničko ime">
                    <br><input type="password" id="form-input" name="lozinka" placeholder="Lozinka">
                    <br><button type="submit" id="submit-btn" name="submit">PRIJAVA</button>
                </form>
            </div>
            <div style="margin:50px">
                <a href="registration.php">Nemate račun? Registrirajte se ovdje.</a>
            </div>
        </div>
    </center>

    <?php
    session_start();
    require('connectToDB.php');
    if(isset($_POST['submit']) && !empty($_POST['korime']) && !empty($_POST['lozinka'])){
        $username = stripslashes($_REQUEST['korime']);
        $username = mysqli_real_escape_string($mysqli, $username);
        $password = stripslashes($_REQUEST['lozinka']);
        $password = mysqli_real_escape_string($mysqli, $password);

        $query = "SELECT * FROM `korisnici` WHERE kor_ime='$username' and lozinka='$password'";
        $result = mysqli_query($mysqli,$query) or die(mysqli_error($mysqli));
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            setcookie('username', $username, time()+60*60*24);
            $_SESSION['user']['uname'] = $_COOKIE['username'];
            setcookie('password', $password, time()+60*60*24);
            $_SESSION['user']['passwd'] = $_COOKIE['password'];
            header("Location: home.php");
        }
        else{
            echo "<center><br>"
            . "<h2 style='color:tomato'>Korisničko ime ili lozinka su neispravni!!!</h2><br>"
            . "Nemate račun kod nas???<br><a href='registration.php'>Registrirajte se ovdje.</a>"
            . "</center>";
        }
    }
    ?>
</body>
</html>