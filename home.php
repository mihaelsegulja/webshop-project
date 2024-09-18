<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Početna</title>
    <link rel="stylesheet" href="css/design.css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="https://kit.fontawesome.com/697cb73aed.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/slider.js"></script>
    <?php session_start() ?>
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
        <div class="slider-container">
            <center>
            <div class="slider">
                <div class="slider__item">
                    <img src="images/slider-images/img1.jpg" alt="">
                    <span class="slider__caption">Trebate novi softver??? Istekla Vam je licenca za korištenje softvera???</span>
                </div>
                <div class="slider__item">
                    <img src="images/slider-images/img2.jpg" alt="">
                    <span class="slider__caption">Dosta Vam je plaćanja preskupih licenca???</span>
                </div>
                <div class="slider__item">
                    <img src="images/slider-images/img3.jpg" alt="">
                    <span class="slider__caption">E, onda ste na pravome mjestu!!!</span>
                </div>
            </div>
            </center>
            <div class="slider__switch slider__switch--prev" data-ikslider-dir="prev">
                <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.89 17.418c.27.272.27.71 0 .98s-.7.27-.968 0l-7.83-7.91c-.268-.27-.268-.706 0-.978l7.83-7.908c.268-.27.7-.27.97 0s.267.71 0 .98L6.75 10l7.14 7.418z"/></svg></span>
            </div>
            <div class="slider__switch slider__switch--next" data-ikslider-dir="next">
                <span><svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20"><path d="M13.25 10L6.11 2.58c-.27-.27-.27-.707 0-.98.267-.27.7-.27.968 0l7.83 7.91c.268.27.268.708 0 .978l-7.83 7.908c-.268.27-.7.27-.97 0s-.267-.707 0-.98L13.25 10z"/></svg></span>
            </div>
        </div>
    </div>
    <script>window.jQuery || document.write('<script src="./lib/jquery-1.11.1.min.js"><\/script>')</script>
    <script>
        $(".slider-container").ikSlider({speed: 500});
        $(".slider-container").on('changeSlide.ikSlider', function (evt){ console.log(evt.currentSlide); });
    </script>
    <footer>
        <ul id="hor-ul">
            <li id="hor-li"><a id="footer-a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" rel="noopener noreferrer">O nama</a></li>
            <li id="hor-li"><a id="footer-a" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" rel="noopener noreferrer">FAQ</a></li>
            <li id="hor-li" style="float:inline-end"><a id="footer-a">Kontakt: fakemail@fakedomain.fake</a></li>
        </ul>
    </footer>
</body>
</html>