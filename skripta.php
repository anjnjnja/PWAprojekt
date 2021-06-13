<?php

include 'connect.php';

if (isset($_POST['naslov']) && isset($_POST['sazetak']) && isset($_POST['vijest'])){
    
    $naslov=$_POST['naslov'];
    $sazetak=$_POST['sazetak'];
    $vijest=$_POST['vijest'];
    $kategorija=$_POST['kategorija'];
    $datum=date('d.m.Y.');

    //$datum=date(Y-m-d H:i:s);
// $unosSlike=$_POST['unosSlike'];

    
    if(isset($_POST['archive'])) {
        $arhiva = 1;
    } else {
        $arhiva = 0;
    }

    $uploaddir = 'img/';
    $uploadfile = $uploaddir . basename($_FILES['unosSlike']['name']);

    if (!move_uploaded_file($_FILES['unosSlike']['tmp_name'], $uploadfile)) {
        echo "File is not valid.";
    }; 

    $query = "INSERT INTO clanci (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES ('$datum', '$naslov', '$sazetak', 
                '$vijest', '$uploadfile', '$kategorija', '$arhiva')";
    
    $result = mysqli_query($dbc, $query) or die('Error querying database.');

    mysqli_close($dbc);

}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
</head>
<body id="crvenotijelo">
    <header>
        <div id="navigacijadiv">
            
        <nav id="navigacija">
            <a id="mopo" href="#"><img src="home.png"></a>
            <a class="navlink" href="projektindex.php">HOME</a>
            <a class="navlink" href="kategorija.php?kategorija=politika">POLITIKA</a>
            <a class="navlink" href="kategorija.php?kategorija=sport">SPORT</a>
            <a class="navlink" href="unos.html">UNOS</a>
            <a class="navlink" href="administracija.php">ADMINISTRACIJA</a>
        </nav>
        </div>
    </header>

    <div id="glavni">
        <h2>
            <?php echo $naslov ?>
        </h2>

        <div id="datum"> 
           <p>Kategorija: <?php echo $kategorija ?></p> 
        </div>

        <img class="slika" src="<?php echo $uploadfile?>">

        <p class="clanak">
            <?php echo $vijest ?>
        </p>

    </div>

    <footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
    </footer>
</body>
</html>
