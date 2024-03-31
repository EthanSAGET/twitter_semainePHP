
<?php
session_start();

//On se connecte à la base de donnée avec try catch
try {
    $pdo = new PDO('mysql:host=localhost;dbname=projet_axe_roots;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

// On ajoute un utilisateur
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['mdp'])) {

    $pseudo = $_POST['pseudo'];
    $user_mail = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT); //hachure du mot de passe avant de stocker dans le serveur

    // On insère les données
    $requete = $pdo->prepare('INSERT INTO formulaire_inscription(pseudo, user_mail, mdp, date_formulaire) VALUES(?,?,?,NOW())');
    $requete->execute(array($pseudo, $user_mail, $mdp));
    header('Location: ./index.php');
    exit;
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
                <form action="inscription.php" method="post">
                    <h1 class="text-center">Roots</h1>
                    <h2 class="text-center">Formulaire d'inscription</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email"  placeholder="Votre adresse mail">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" class="btn btn-primary" value="S'inscrire">
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 inscription">
                <p>Tu as déjà un compte ? : <a href="./index.php">Connecte-toi</a></p>
            </div>
        </div>
    </div>

    
    <!-- Ajout de Bootstrap JS et jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
