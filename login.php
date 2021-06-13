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
        <form name="unos" enctype="multipart/form-data" method="POST" action="skripta.php" >

            <label for="korisnickoIme">Korisničko ime: </label>
            <input type="text" name="korisnickoIme" id="korisnickoIme"/>

            <br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="text" name="lozinka" id="lozinka"/>

            <br><br>
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" id="gumb">Prijava</button>
        
            <br><br>
            <a href="registracija.php">Registriraj se!</a>
        </form>

    </div>

    <?php

        include 'connect.php';

        if (isset($_POST['korisnickoIme']) && (isset($_POST['lozinka']){
            $user=$_POST['korisnickoIme'];
            $pass=$_POST['lozinka'];
        };

        $sql = "SELECT korisnicko_ime, razina FROM korisnik WHERE korisnicko_ime=? AND lozinka=?";

        /* Inicijalizira statement objekt nad konekcijom */
        $stmt=mysqli_stmt_init($dbc);
        /* Povezuje parametre statement objekt s upitom */
        if (mysqli_stmt_prepare($stmt, $sql)){
            /* Povezuje parametre i njihove tipove s statement objektom */
            mysqli_stmt_bind_param($stmt,'ss',$user,$pass);
            /* Izvršava pripremljeni upit i pohranjuje rezultate */
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        /* Povezuje atribute iz rezultata s varijablama */
        mysqli_stmt_bind_result($stmt, $username, $razina);
        /* Dohvaća redak iz rezultata, i posprema vrijednosti atributa u varijable
        navedene funkcijom mysqli_stmt_bind_result() */
        mysqli_stmt_fetch($stmt);

        if (mysqli_stmt_num_rows($stmt)>0) {
            echo ('Uspjesan login')
        } else {
            $poruka = 'Nepostojeći korisnik! <a href="registracija.php">Link na registraciju.</a> ';
        };

        if($razina == 0) {
            $poruka = $username.' nemate dovoljna prava za pristup ovoj stranici.';
            echo '
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
        <h3>'.$poruka.'</h3>
    </div>

    <footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
    </footer>
</body>
</html>';
        };

    ?>
</body>
</html>