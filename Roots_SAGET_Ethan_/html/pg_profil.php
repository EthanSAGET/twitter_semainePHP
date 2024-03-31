

<?php
session_start();
try {
  $pdo= new PDO('mysql:host=localhost;dbname=projet_axe_roots;charset=utf8','root','');
} catch(Exception $e) {
  die('Erreur :'.$e->getMessage());
}

if (!isset($_SESSION['id'])) {
  header('Location: pg_profil.php'); 
  exit;
}
$aptzz = $pdo->prepare('SELECT * FROM formulaire_inscription WHERE id = ?');
$aptzz->execute(array($_SESSION['id']));
$user = $aptzz->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@200;300&family=Rubik:wght@700&family=Secular+One&display=swap');
    </style>

<style>
        body {
    margin: 0;
    padding: 0;
}

.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #222;
}

.links {
    list-style: none;
    padding: 20px;
    margin: 0;
}

.links li {
    margin-bottom: 15px;
}

.links a {
    text-decoration: none;
    color: #fff;
    font-size: 18px;
}

.content {
    margin-left: 250px;
    padding: 20px;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: static;
        background-color: transparent;
    }

    .content {
        margin-left: 0;
    }
}

    </style>

    <script src="https://kit.fontawesome.com/c7e32d1c78.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/c7e32d1c78.css" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<body>
<?php
    //Je me connecte à la BDD : 
    $pdo = new PDO('mysql:host=localhost;dbname=projet_axe_roots','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8'));
    //Je vérrifie :
        //var_dump($pdo);
        //vérification bonne !
    ?>
    <header id="header">
        <div class="banner">
            <div class="banner-name">
                <i class="icon-banner-name fa-solid fa-house"></i>
                <h2 class="h2-banner-name">Profil</h2>
            </div>
           
            <div class="logo">
                <img src="../image/Logo réseau social .png" alt="" class="img_logo">
            </div>
            <div class="button">
                <a href="" class="btn-test">Log In</a> 
                <a href="" class="btn-test">Sign In</a> 
            </div>
        
            <div class="searchbar">
                <input class="barre" type="Rechercher" placeholder="Search Roots">
                <i class=" icon-barre fa-solid fa-magnifying-glass"></i>
            </div>

        </div>

    </header>

    <div class="sidebar">
    <h2 class="navbar-h2"><?php echo $user['pseudo'];  ?></h2>
    <p class="navbar-p">ID Utilisateur</p>
    <ul class="links">
        <li><a href="./pg_home.php">
        <i class="fa-solid fa-house navbar-image"></i>
            Home</a></li>
        <li><a href="./pg_profil.php">
        <i class="navbar-icon fa-solid fa-user"></i>
            Profil</a></li>
        <li><a href="#">
        <i class=" icon-barre fa-solid fa-magnifying-glass"></i>
            Recherche</a></li>
    </ul>
</div>


    <div class="container">
        <button id="openModalBtn">Ouvrir la modal</button>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span id="closeModalBtn" class="close">&times;</span>
                <h2>Information personnel</h2>
                <ul>
                    <li>
                        <p>Pseudo : <?php echo $user['pseudo'];?></p>
                    </li>
                    <li>
                        <p>Email : <?php  echo $user['user_mail'];?></p>
                    </li>
                    <li>
                    <p>Membre depuis : <?php echo $user['date_formulaire'];?></p>
                    </li>
                </ul>
            <script>
                //script pour le bouton flottant modal : 
            document.getElementById("openModalBtn").addEventListener("click", function() {
                document.getElementById("modal").style.display = "block";
            });
            document.getElementById("closeModalBtn").addEventListener("click", function() {
                document.getElementById("modal").style.display = "none";
            });
            </script>
            </div>
        </div>
    </div>

    <button class="modal_btn modal-trigger">Open</button>


<script src="../js/index.js"></script>
</body>