<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proizvodi</title>
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
    <div class="content">
        <center>
        <div class="column left">
            <form method="get">
                <label for="sortiraj">Sortiraj prema: </label><br>
                <select name="sortiraj">
                    <option value="">Odaberite...</option>
                    <option value="abc_asc">Naslovu(A-Z)</option>
                    <option value="abc_desc">Naslovu(Z-A)</option>
                    <option value="price_asc">Cijeni(manja-veća)</option>
                    <option value="price_desc">Cijeni(veća-manja)</option>
                </select>
                <br><button type="submit" id="submit-btn" name="submit">FILTRIRAJ</button>
            </form>
        </div>
        <div class="column right">
            <?php 
                $query = "SELECT * FROM `proizvodi`";
                if(isset($_GET['submit'])){
                    if(isset($_GET['sortiraj'])){
                        switch($_GET['sortiraj']){
                            case "abc_asc"   : $query .= " ORDER BY naslov ASC"; break;
                            case "abc_desc"  : $query .= " ORDER BY naslov DESC"; break;
                            case "price_asc" : $query .= " ORDER BY cijena ASC"; break;
                            case "price_desc": $query .= " ORDER BY cijena DESC"; break;
                            default : $query;
                        }
                    }
                }
                $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
                $rows = mysqli_num_rows($result);
                if ($result) {
                    if ($rows != 0) {
                        echo '<table width=90%>';
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td><a href='product-page.php?id=" .$row['id']. "'><img src=" .$row['slika'].' id="product-img" >' . "</a></td>";
                            echo "<td style='font-size:large'><a style='text-decoration:none;color:black' href='product-page.php?id=" .$row['id']."'>" .$row['naslov']. "</a></td>";
                            echo "<td><a href='products.php?action=add&id=" .$row['id']. "'><button id='submit-btn'>+<i class='fas fa-shopping-cart' style='margin:4px'></i></button></a></td>";
                            echo "<td style='font-size:large'><strong>" .$row['cijena']. "&#8364 </strong></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_free_result($result);
                    }
                }
            ?>
        </div>
        <center>
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