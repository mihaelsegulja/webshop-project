<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Košarica</title>
    <link rel="stylesheet" href="css/design.css">
    <script src="https://kit.fontawesome.com/697cb73aed.js" crossorigin="anonymous"></script>
    <?php session_start(); if(!isset($_SESSION['user'])){header("Location: login.php");} ?>
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
        <center>
        <table width=80%>
            <tr>
                <td colspan="2">Proizvod</td>
                <td>Količina</td>
                <td>Jed. cijena</td>
                <td>Cijena</td>
            </tr>
            <?php
            $arr = array();
            $total = 0;
            if(!empty($_SESSION['cart'])){
                foreach($_SESSION['cart'] as $key => $val){
                    $arr[] = $key;
                }
                for($i = 0; $i < count($_SESSION['cart']); $i++){
                    echo "<tr>";
                    echo "<td><img src='" .$_SESSION['cart'][$arr[$i]]['image']. "' width=100px height=100px></td>";
                    echo "<td>" .$_SESSION['cart'][$arr[$i]]['title']. "</td>";
                    echo "<td>" .$_SESSION['cart'][$arr[$i]]['quantity']. "</td>";
                    echo "<td>" .$_SESSION['cart'][$arr[$i]]['price']. "&#8364</td>";
                    echo "<td>" .$_SESSION['cart'][$arr[$i]]['price'] * $_SESSION['cart'][$arr[$i]]['quantity']. "&#8364</td>";
                    $total += $_SESSION['cart'][$arr[$i]]['price'] * $_SESSION['cart'][$arr[$i]]['quantity'];
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='5' style='text-align:right'><hr><br><strong>Konačna cijena: " .$total. "&#8364</strong></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='5' style='text-align:right'>";
                echo "<form method='POST'>";
                echo "<button type='submit' id='submit-btn' name='submit' style='margin:15px'>KUPI</button><br>";
                echo "<button type='submit' id='clear-btn' name='clear' style='margin:10px'><i class='fas fa-trash-alt' style='margin:4px'></i></button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }?>
        </table>
        <?php
        if(empty($_SESSION['cart'])){
            echo "<center><br><br><h2>Prazna košarica.</h2></center>";
        }
        if(isset($_POST['clear'])){
            unset($_SESSION['cart']);
            header("location: cart.php");
        }
        if(isset($_POST['submit'])){
            header("location: payment.php");
        }
        ?>
        </center>
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