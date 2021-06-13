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

    <?php

        include 'connect.php';

        $id = $_GET['id'];

        $query = "SELECT * FROM clanci WHERE id= '$id'";

        $result = mysqli_query($dbc, $query);

        while($row = mysqli_fetch_array($result)) {
            $kategorija = $row['kategorija'];
            $vijest = $row['tekst'];
            $naslov = $row['naslov'];
            $uploadfile = $row['slika'];
        };
        ?>    

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