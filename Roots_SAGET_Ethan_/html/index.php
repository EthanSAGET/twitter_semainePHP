<?php
try{
    $pdo = new PDO('mysql:host=localhost;dbname=projet_axe_roots;charset=utf8','root','');
}catch(Exception $e){
    die('Erreur :'.$e->getMessage());
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $get = $pdo->prepare('SELECT * FROM formulaire_inscription WHERE pseudo = :pseudo');
    $get->execute(['pseudo' => $pseudo]);
    $result = $get->fetch();

    if (!$result) {
        $error_message = "Identifiant ou mot de passe incorrecte.";
    } else {
        $isPasswordCorrect = password_verify($mdp, $result['mdp']);
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $result['id'];
            $_SESSION['pseudo'] = $pseudo;
            header('Location: pg_home.php');
            exit;
        } else {
            $error_message = "";
        }
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
    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px; 
        }

        .logo img {
            max-width: 200px; 
            max-height: 150px; 
        }

        .inscription{
            text-align: center;
            font-size: 17px;
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>

<body>

<header id="header">
    <div class="logo">
        <img src="../image/Logo réseau social .png" alt="" class="img_logo">
    </div>
</header>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="index.php" method="post">
                <h1 class="text-center">Roots</h1>
                <h2 class="text-center">Connexion</h2>
                <div class="form-group">
                    <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
                </div>
                <div class="form-group text-center">
                    <input type="submit" class="btn btn-primary" value="Se connecter" name="submit"><a href="./pg_home.php"></a>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 inscription">
            <p>Tu n'as pas de compte ? : <a href="./inscription.php">Inscrit-toi</a></p>
        </div>
    </div>
</div>

<!-- Ajout de Bootstrap JS et jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
