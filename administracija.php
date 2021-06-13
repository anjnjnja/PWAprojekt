<?php
session_start();
if(isset($_SESSION['$username'])) {
    $uspjesnaPrijava = true;
    $imeKorisnika = $_SESSION['$username'];
    $levelKorisnika = $_SESSION['$level'];
    $admin = $levelKorisnika == 1;
} else {
    $uspjesnaPrijava = false;
};

include 'connect.php';
// Putanja do direktorija sa slikama
define('UPLPATH', 'img/');
// Provjera da li je korisnik došao s login forme
if (isset($_POST['gumb']) ) {
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona
    $prijavaImeKorisnika = $_POST['korisnickoIme'];
    $prijavaLozinkaKorisnika = $_POST['lozinka'];
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {

        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    } 



    mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika, $levelKorisnika);
    mysqli_stmt_fetch($stmt);

    //echo $prijavaImeKorisnika.' '.$prijavaLozinkaKorisnika;
    //Provjera lozinke
    
    if (password_verify($_POST['lozinka'], $lozinkaKorisnika) && mysqli_stmt_num_rows($stmt) > 0) {
        $uspjesnaPrijava = true;

        // Provjera da li je admin
        if($levelKorisnika == 1) {
            $admin = true;
        }
        else {
            $admin = false;
        }
        //postavljanje session varijabli
        $_SESSION['$username'] = $imeKorisnika;
        $_SESSION['$level'] = $levelKorisnika;
    } else {
        $uspjesnaPrijava = false;
        //echo 'Pogresna lozinika.';
    }
}
?>

<?php
 // Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je

if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1) {
    $query = "SELECT * FROM clanci";
    $result = mysqli_query($dbc, $query);
    while($row = mysqli_fetch_array($result)) {

        echo '<!DOCTYPE html>
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
            </header>';


            $query = "SELECT * FROM clanci";
            $result = mysqli_query($dbc, $query);
            while($row = mysqli_fetch_array($result)) {
        echo '<div id="glavni">
            <form name="unos" enctype="multipart/form-data" method="POST" action="administracijaskripta.php" >
    
                <label for="naslov">Naslov vijesti: </label>
                <input type="text" name="naslov" id="naslov" value="'.$row['naslov'].'"/>
                <span id="porukaNaslov" class="error"></span>
    
                <br><br>
                <label for="sazetak">Kratki sažetak vijesti: </label>
                <br>
                <textarea rows="6" cols="50" name="sazetak" id="sazetak">'.$row['sazetak'].'</textarea>
                <span id="porukaSazetak" class="error"></span>
        
                <br><br>
                <label for="vijest">Tekst vijesti: </label>
                <br>
                <textarea rows="16" cols="50" name="vijest" id="vijest">'.$row['tekst'].'</textarea>
                <span id="porukaVijest" class="error"></span>
        
                <br><br>
                <label for="kategorija">Kategorija vijesti: </label>
                <select id="kategorija" name="kategorija" value="'.$row['kategorija'].'">
                    <option value="politika">Politika</option>
                    <option value="sport">Sport</option>
                </select>
                
                <br><br>
                <label for="unosSlike">Slika:</label>
                <input type="file" class="input-text" id="unosSlike"
                value="'.$row['slika'].'" name="unosSlike"/> <br><img src="'.$row['slika'].'" width=100px>
    
    
              <!--  <br><br>
                <label for="izbor">Želite li prikazati obavijest na stranici?</label>
                <input type="radio" name="izbor" id="izbor" value="da"> Da
                <input type="radio" name="izbor" id="izbor" value="ne"> Ne
                -->
                
                <br><br>
                <label for="archive">Spremiti u arhivu:</label>';
                if($row['arhiva'] == 0) {
                    echo '<input type="checkbox" name="archive" id="archive"/>
                   Arhiviraj?';
                    } else {
                    echo '<input type="checkbox" name="archive" id="archive"
                checked/> Arhiviraj?';
                    }
            
                echo '
                <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
    
                <br><br>
                <button type="reset" value="Poništi">Poništi</button>
                <button type="submit" name="update" value="Prihvati">Izmjeni</button>
                <button type="submit" name="delete" value="Izbriši">Izbriši</button>
            </form>
    
        </div>'; 
    }
        
//forma za administraciju
}
// Pokaži poruku da je korisnik uspješno prijavljen, ali nije administrator
} else if (($uspjesnaPrijava == true && $admin == false) || (isset($_SESSION['$username']) && $_SESSION['$level'] == 0)) {

echo '<!DOCTYPE html>
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
        <h3>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali
        niste administrator.</h3>
    </div>

</body>';

} else if ($uspjesnaPrijava == false) {

    ?>

<!- Forma za prijavu -->

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
        <form name="unos" enctype="multipart/form-data" method="POST">

            <label for="korisnickoIme">Korisničko ime: </label>
            <input type="text" name="korisnickoIme" id="korisnickoIme"/>

            <br><br>
            <label for="lozinka">Lozinka: </label>
            <input type="text" name="lozinka" id="lozinka"/>

            <br><br>
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" id="gumb" name="gumb">Prijava</button>
        
            <br><br>
            <a href="registracija.php">Registriraj se!</a>
        </form>

    </div>
</html>


<script type="text/javascript">

//javascript validacija forme

</script>

<?php
}
?>
<!- Brisanje i promijena arhiviranosti -->


    <footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
    </footer>
</body>
}