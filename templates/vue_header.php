<!DOCTYPE html>
<html>
<head>
    <title>Interface</title>



    <!-- Inclusion des css -->
    <link rel="stylesheet" type="text/css" href="./css/flex_css.css">
    <link rel="stylesheet" type="text/css" href="./css/interface.css">
    <link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.structure.min.css">
    <link rel="stylesheet" type="text/css" href="./css/libs/jquery-ui.theme.min.css">
    <!-- Inclusion des js -->
    <script type="text/javascript" src="./js/libs/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="./js/libs/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./js/libs/knockout-3.5.1.js"></script>
    <script type="text/javascript" src="./js/libs/iro.min.js"></script>
    <script type="text/javascript">
        var role_utilisateur = '<?php echo $_SESSION['role_user']; ?>';
    </script>
    <script type="text/javascript" src="./js/interface.js"></script>
    <style>
        #bandeau{
            height: calc(5vw + 5vh);
        }
    </style>
</head>
<body>
<div id="bandeau" class="flex flex_aic flex_sb">
				<div id="utilisateur_connecte">Bonjour <?php echo $_SESSION['prenom_user'].' '.$_SESSION['nom_user'] ?></div>
<div id="mainlogo"></div>
<form action="./connexion.php" method="post">
    <button id="deconnexion" type="submit" name="deconnexion">Se déconnecter</button>
</form>
</div>
