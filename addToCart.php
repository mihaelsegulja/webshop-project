<?php
if(isset($_GET['action']) && $_GET['action'] == 'add'){
    $id = intval($_GET['id']);
    if(isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    }
    else{
        $query = "SELECT * FROM proizvodi WHERE id = $id";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $rows = mysqli_num_rows($result);
        if($rows == 1){
            $row = mysqli_fetch_array($result);
            $_SESSION['cart'][$row['id']] = array('image' => $row['slika'], 'title' => $row['naslov'], 'quantity' => 1, 'price' => $row['cijena']);
        }
    }
}
?>