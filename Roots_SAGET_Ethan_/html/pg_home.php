<?php
session_start(); // Assurez-vous que la session est démarrée si vous utilisez $_SESSION

try {
    $pdo = new PDO('mysql:host=localhost;dbname=projet_axe_roots;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

$get = $pdo->prepare('SELECT * FROM formulaire_inscription');
$get->execute();
$results = $get->fetchAll();

$pseudo = '';
if (isset($_SESSION['id'])) {
    foreach ($results as $user) {
        if ($user['id'] == $_SESSION['id']) {
            $pseudo = $user['pseudo'];
            break;
        }
    }
}
if ($_POST) {
    if (isset($_POST['message'])) {
        $postText = addslashes($_POST['message']);
        $pdo->exec("INSERT INTO poste(post_text, date_heure_message) VALUES ('$postText', NOW())");
    }

    if (isset($_POST['delete_poste'])) {
        $idPost = $_POST["delete_poste"];
        $stmt = $pdo->prepare("DELETE FROM poste WHERE id_poste = :id_poste");
        $stmt->execute(['id_poste' => $idPost]);
    }
}
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
<header id="header">
    <div class="banner">
        <div class="banner-name">
            <i class="icon-banner-name fa-solid fa-house"></i>
            <h2 class="h2-banner-name">Home</h2>
        </div>

        <div class="logo">
            <img src="../image/Logo réseau social .png" alt="" class="img_logo">
        </div>
        <div class="button">
            <a href="./index.php" class="btn-test">Log Out</a>
            <a href="./inscription.php" class="btn-test">Sign In</a>
        </div>

    </div>

</header>

<div class="sidebar">
    <h2 class="navbar-h2"><?php echo $pseudo;  ?></h2>
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

<main class="container">
    <div class="post_roots">
        <hr>
        <form class="post_element" method="post">
            <textarea class="post_message" name="message" placeholder="Votre message roots..."></textarea>
            <br><br>
            <input class="post_button" type="submit" value="Poster">
        </form>
    </div>
    <?php
$stmt = $pdo->query('SELECT * FROM poste');
while ($postText = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $o=$pdo->query('SELECT pseudo FROM formulaire_inscription');
    echo $_SESSION['pseudo']. ' :' . '<br>';
    echo $postText['post_text'] . '<br><br>' . '<hr>';
    // Bouton pour supprimer un poste de la base de données :
    echo '<form method="post">';
    echo '<input type="hidden" name="delete_poste" value="' . $postText['id_poste'] . '">';
    echo '<input type="submit" value="Supprimer">';
    echo '</form>';
    echo '<br>';
}

    ?>
</main>

<script>
    // ... Le reste de votre code JavaScript ...
</script>

<script src="../js/index.js"></script>
<script src="../js/composant/sidebar.js"></script>
</body>
</html>
