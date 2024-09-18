<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvod</title>
    <link rel="stylesheet" href="css/design.css">
    <script src="https://kit.fontawesome.com/697cb73aed.js" crossorigin="anonymous"></script>
    <?php session_start(); require('connectToDB.php'); require('addToCart.php') ?>
</head>
<body>
    <div class="navbar">
        <ul id="hor-ul">
            <li id="hor-li"><img src="images/logo.png" width="49px" height="38px" style="border-radius:15px"></li>
            <li id="hor-li"><a id="nav-a" href="home.php"><i class="fas fa-home" style="margin:4px"></i>POČETNA</a></li>
            <li id="hor-li"><a id="nav-a" href="products.php"><i class="fas fa-tags" style="margin:4px"></i>PROIZVODI</a></li>
            <li id="hor-li" style="float:right">
                <div class="dropdown">
                    <a id="nav-a"><i class="fas fa-angle-down" style="margin:4px"></i>RAČUN</a>
                    <?php if(isset($_SESSION['user'])){ ?>
                    <div class="dropdown-content">
                        <p style="margin:8px">Bok, <?php echo $_COOKIE['username']; ?></p>
                        <a id="drop-a" href="logout.php">ODJAVA</a>
                    </div>
                    <?php } else{ ?>
                    <div class="dropdown-content">
                        <a id="drop-a" href="login.php">PRIJAVA</a>
                        <a id="drop-a" href="registration.php">REGISTRACIJA</a>
                    </div>
                    <?php } ?>
                </div>
            </li>
            <li id="hor-li" style="float:right"><a id="nav-a" href="cart.php"><i class="fas fa-shopping-cart" style="margin:4px"></i>KOŠARICA</a></li>
        </ul>
    </div>
    <div class="content" style="background-color: #e9e9e9">
        <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM proizvodi WHERE id = $id";
            $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
            $rows = mysqli_num_rows($result);
            if($rows == 1){
                while($row = mysqli_fetch_array($result)){
                    echo "<table width=90%>";
                    echo "<tr>";
                    echo "<td rowspan='2'><img id='product-img-large' src='" .$row['slika']. "'></td>";
                    echo "<td><h1>" .$row['naslov']. "</h1></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td style='font-size:large'><strong>" .$row['cijena']. 
                    "&#8364 </strong><a href='product-page.php?action=add&id=" .$row['id']. "'><button id='submit-btn'>+<i class='fas fa-shopping-cart' style='margin:4px'></i></button></a></td>";
                    echo "<td></td></tr>";
                    echo "</table><br>";
                    echo "<table width=25%>";
                    echo "<tr><b>Opis proizvoda:</b></tr>";
                    echo "<tr><td>Naziv proizvoda: </td><td>" .$row['naziv']. "</td></tr>";
                    echo "<tr><td>Proizvođač: </td><td>" .$row['proizvodjac']. "</td></tr>";
                    echo "</table>";
                }
            }
        ?>
    </div>
    <footer>
        <ul id="hor-ul">
            <li id="hor-li"><a id="footer-a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" rel="noopener noreferrer">O nama</a></li>
            <li id="hor-li"><a id="footer-a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" rel="noopener noreferrer">FAQ</a></li>
            <li id="hor-li" style="float:inline-end"><a id="footer-a">Kontakt: fakemail@fakedomain.fake</a></li>
        </ul>
    </footer>
</body>
</html>