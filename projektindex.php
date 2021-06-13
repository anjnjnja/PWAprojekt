<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
</head>
<body>
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
        define('UPLPATH', 'img/');
    
    ?>
    <div id="main">
        <div class="politika">
            <div class="podcrta">
                <h2 class="naslov2">POLITIKA</h2>
            </div>
            <?php
                $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='politika' ORDER BY id DESC LIMIT 3 ";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<article class="reiseartikl">';
                    echo '<img class ="slika" src="'.$row['slika'].'">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<h3 class="naslov">';
                    echo  $row['naslov'];
                    echo '</a></h3>';
                    echo '</article>';
 }?>
            
        </div>

        <div class="sport">
            <div class="podcrta">
                <h2 class="naslov2">SPORT</h2>
            </div>
            <?php
                $query = "SELECT * FROM clanci WHERE arhiva=0 AND kategorija='sport' ORDER BY id DESC LIMIT 3";
                $result = mysqli_query($dbc, $query);
                $i=0;
                while($row = mysqli_fetch_array($result)) {
                    echo '<article class="reiseartikl">';
                    echo '<img class ="slika" src="'.$row['slika'].'">';
                    echo '<a href="clanak.php?id='.$row['id'].'">';
                    echo '<h3 class="naslov">';
                    echo  $row['naslov'];
                    echo '</a></h3>';
                    echo '</article>';
 }?>
        </div>

        <div class="brisanje"></div>
    </div>

    <footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
    </footer>
</body>
</html>