<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <center>
        <div class="user-form">
            <h1>Registrirajte se</h1>
            <div>
                <form method="post">
                    <br><input type="text" id="form-input" name="korime" placeholder="Korisničko ime">
                    <br><input type="text" id="form-input" name="email" placeholder="E-mail">
                    <br><input type="text" id="form-input" name="ime" placeholder="Ime">
                    <br><input type="text" id="form-input" name="prezime" placeholder="Prezime">
                    <br><input type="password" id="form-input" name="lozinka" placeholder="Lozinka">
                    <br><input type="password" id="form-input" name="ponloz" placeholder="Ponovljena lozinka">
                    <br><button type="submit" id="submit-btn" name="submit">REGISTRACIJA</button>
                </form>
            </div>
            <div style="margin:50px">
                <a href="login.php">Imate račun? Prijavite se ovdje.</a>
            </div>
        </div>
    </center>
    <?php
    require('connectToDB.php');
    if(isset($_POST['submit']) && !empty($_POST['korime']) && !empty($_POST['email']) && !empty($_POST['ime']) 
        && !empty($_POST['prezime']) && $_POST['lozinka'] == $_POST['ponloz']){
        
        $username = stripslashes($_REQUEST['korime']);
        $username = mysqli_real_escape_string($mysqli,$username); 
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($mysqli,$email);
        $name = stripslashes($_REQUEST['ime']);
        $name = mysqli_real_escape_string($mysqli,$name);
        $surname = stripslashes($_REQUEST['prezime']);
        $surname = mysqli_real_escape_string($mysqli,$surname);
        $password = stripslashes($_REQUEST['lozinka']);
        $password = mysqli_real_escape_string($mysqli,$password);

        $query = "INSERT INTO `korisnici` (kor_ime, email, lozinka, ime, prezime) VALUES ('$username', '$email', '$password', '$name', '$surname')";
        $result = mysqli_query($mysqli,$query);
        if($result){
            header("location: login.php");
        }
        else{
            echo "<center><br><h2 style='color:tomato'>Ups... Nešto je pošlo po zlu...<br>Molimo pokušajte ponovno.</h2></center>";
        }
    }
    ?>
</body>
</html>