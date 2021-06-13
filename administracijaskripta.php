<?php 

    include 'connect.php';

    if(isset($_POST['delete'])){
        $id=$_POST['id'];
        $query = "DELETE FROM clanci WHERE id=$id";
        $result = mysqli_query($dbc, $query);
        $poruka = "Vijest je obrisana!";
    };

    define('UPLPATH', 'img/');
    if(isset($_POST['update'])){
        
        $picture = $_FILES['unosSlike']['name'];
        $title=$_POST['naslov'];
        $about=$_POST['sazetak'];
        $content=$_POST['vijest'];
        $category=$_POST['kategorija'];
        $poruka = "Vijest je izmijenjena!";

        if(isset($_POST['archive'])){
                $archive=1;
        } else{
            $archive=0;
        }


    $id=$_POST['id'];
    
    //ako je slika učitana spremamo polje slika, ako nije onda se ne sprema

    if (is_uploaded_file($_FILES['unosSlike']['tmp_name'])) {
        $target_dir = $picture;
        move_uploaded_file($_FILES["unosSlike"]["tmp_name"], $target_dir);
        
        $query = "UPDATE clanci SET naslov='$title', sazetak='$about', tekst='$content',
                slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
     } else {
        $query = "UPDATE clanci SET naslov='$title', sazetak='$about', tekst='$content', kategorija='$category', arhiva='$archive' WHERE id=$id ";
     };
    
    
    
    $result = mysqli_query($dbc, $query);
    }

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
        <h2>'.$poruka.'</h2>
    </div>

    <footer id="podnozje">
        <h4 id="copyright" >Copyright 2021. Anja Penić</h4>
    </footer>
</body>
</html>';

?>