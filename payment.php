<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plaćanje</title>
    <link rel="stylesheet" href="css/design.css">
</head>
<body>
    <center>
        <div class="user-form">
            <h1>Odaberite način plaćanja</h1>
            <div>
                <form method="post">
                    <label for="nacinplacanja">Vrsta plaćanja: </label><br>
                    <select name="nacinplacanja">
                        <option value="nis">Odaberite...</option>
                        <option value="kartica">Kartica</option>
                        <option value="paypal">Paypal</option>
                        <option value="kripto">Kriptovalute</option>
                    </select>
                    <input type="text" name="izvorplacanja" id="form-input" placeholder="Adresa/kartica/izvor plaćanja">
                    <br><button type="submit" id="submit-btn" name="submit">PLATI</button>
                </form>
            </div>
        </div>
    </center>
    <?php
    session_start();
    if(isset($_POST['submit']) && $_POST['nacinplacanja'] != "nis" && !empty($_POST['izvorplacanja'])){
        unset($_SESSION['cart']);
        header("location: bravo.php");
    }
    else if(isset($_POST['submit']) && ($_POST['nacinplacanja'] == "nis" || empty($_POST['izvorplacanja']))){
        echo "<center><br><br><p style='color:tomato'>Ups... Nešto je pošlo po zlu.<br>Molimo pokušajte ponovno.</p></center>";
    }
    ?>
</body>
</html>