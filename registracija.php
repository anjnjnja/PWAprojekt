<?php
    include 'connect.php';

    if ((isset($_POST['gumb']) && (isset($_POST['ime'])) && (isset($_POST['prezime'])) && (isset($_POST['korisnickoIme'])) && (isset($_POST['lozinka'])))) {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $username = $_POST['korisnickoIme'];
        $lozinka = $_POST['lozinka'];
        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        $razina = 0;
        $registriranKorisnik = '';
    
                //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
        $stmt = mysqli_stmt_init($dbc);

        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
        }
        if(mysqli_stmt_num_rows($stmt) > 0){
            $msg='Korisničko ime već postoji!';
        } else {
            // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection

            $sql = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";

            $stmt = mysqli_stmt_init($dbc);

            if (mysqli_stmt_prepare($stmt, $sql)) {
                mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,
                $hashed_password, $razina);
                mysqli_stmt_execute($stmt);
                $registriranKorisnik = true;
            }
        }
        mysqli_close($dbc);

        if($registriranKorisnik) {
            header('Location: /administracija.php');
            exit;

        };

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
        <form name="unos" enctype="multipart/form-data" method="POST" action="registracija.php" >

            <label for="korisnickoIme">Korisničko ime: </label><br>
            <input type="text" name="korisnickoIme" id="korisnickoIme"/>
            <span id="porukaKorisnickoIme" class="error"></span>

            <br><br>
            <label for="ime">Ime: </label><br>
            <input type="text" name="ime" id="ime"/>
            <span id="porukaIme" class="error"></span>

            <br><br>
            <label for="prezime">Prezime: </label><br>
            <input type="text" name="prezime" id="prezime"/>
            <span id="porukaPrezime" class="error"></span>

            <br><br>
            <label for="lozinka">Lozinka: </label><br>
            <input type="password" name="lozinka" id="lozinka"/>
            <span id="porukaLozinka" class="error"></span>

            <br><br>
            <label for="lozinka2">Ponovljena lozinka: </label><br>
            <input type="password" name="lozinka2" id="lozinka2"/>
            <span id="porukaLozinka2" class="error"></span>


            <br><br>
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" name="gumb" id="gumb">Prijava</button>
        
        </form>

    </div>
    <script type="text/javascript">
        document.getElementById("gumb").onclick = function(event) {

        var slanjeForme = true;

        // Ime korisnika mora biti uneseno
        var poljeIme = document.getElementById("ime");
        var ime = document.getElementById("ime").value;
        if (ime.length == 0) {
            slanjeForme = false;
            poljeIme.style.border="1px dashed red";
            document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
        } else {
            poljeIme.style.border="1px solid green";
            document.getElementById("porukaIme").innerHTML="";
        }

        // Prezime korisnika mora biti uneseno
        var poljePrezime = document.getElementById("prezime");
        var prezime = document.getElementById("prezime").value;
        if (prezime.length == 0) {
            slanjeForme = false;
            poljePrezime.style.border="1px dashed red";
            document.getElementById("porukaPrezime").innerHTML="<br>Unesite Prezime!<br>";
        } else {
            poljePrezime.style.border="1px solid green";
            document.getElementById("porukaPrezime").innerHTML="";
        }

        // Korisničko ime mora biti uneseno
        var poljeUsername = document.getElementById("korisnickoIme");
        var username = document.getElementById("korisnickoIme").value;
        if (username.length == 0) {
            slanjeForme = false;
            poljeUsername.style.border="1px dashed red";
            document.getElementById("porukaKorisnickoIme").innerHTML="<br>Unesite korisničko ime!<br>";
        } else {
            poljeUsername.style.border="1px solid green";
            document.getElementById("porukaKorisnickoIme").innerHTML="";
        }

        // Provjera podudaranja lozinki
        var poljePass = document.getElementById("lozinka");
        var pass = document.getElementById("lozinka").value;
        var poljePassRep = document.getElementById("lozinka2");
        var passRep = document.getElementById("lozinka2").value;
        if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
            slanjeForme = false;
            poljePass.style.border="1px dashed red";
            poljePassRep.style.border="1px dashed red";
            document.getElementById("porukaLozinka").innerHTML="<br>Lozinke nisu iste!<br>";

            document.getElementById("porukaLozinka2").innerHTML="<br>Lozinke nisu iste!<br>";
        } else {
            poljePass.style.border="1px solid green";
            poljePassRep.style.border="1px solid green";
            document.getElementById("porukaLozinka").innerHTML="";
            document.getElementById("porukaLozinka2").innerHTML="";
        }

        if (slanjeForme != true) {
            event.preventDefault();
        }


    };

 </script>

<footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
</footer>


