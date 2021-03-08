<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eat'n dream</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="app/css/style.css">
</head>

<body>

    <!-- début header-->
    <header>
        <nav class="navbar">
            <div class="container">
                <a href="index.php?action=home" class="navbar-logo">Eat'n dream</a>
                <a href="#" onclick="burgerMenu()" class="burger-icon">
                        <i class="fas fa-bars"></i>
                    </a>
                <div  class="navbar-link">
                    <a href="index.php?action=home">accueil</a>
                    <a href="index.php?action=rubrique_sucree">sucrées</a>
                    <a href="index.php?action=rubrique_salee">salées</a>
                    <a href="index.php?action=apropos">à propos</a>
                    <?php if($connected){  
                        echo '<script>hide = true;</script><a id="button-inscription" style="display:none;" href="index.php?action=inscription">s\'inscrire</a><a id="param" href="#">paramètre</a><a id="button-connexion" style="display:none;" href="index.php?action=deconnect">se deconnecter</a>';
                    } else {
                        echo '<script>hide = false;</script><a id="button-connexion"  href="index.php?action=connect">se connecter</a>
                         <a id="button-inscription" href="index.php?action=inscription">s\'inscrire</a><a style="display:none;"id="param" href="#">paramètre</a>';
                    }
                    ?>
                </div>
                <div class="button-co">
                <?php
                if(!$connected){
                 echo '<a href="index.php?action=connect">se connecter</a><p style="color:#fff;">&nbsp;/&nbsp;</p>
                        <a href="index.php?action=inscription">s\'inscrire</a>';
                } else {
                    echo '<span style="color:white; font-size:1.1rem;"><strong>Hello '.$user['pseudo_utilisateur'].'&nbsp;</strong></span><a href="#">paramètre</a><p style="color:#fff;">&nbsp;/&nbsp;</p><a href="index.php?action=deconnect">se deconnecter</a><p style="color:#fff;">';
                }
                ?>
                </div>
            </div>
        </nav>

        <?php 
        if($view == 'accueil') {
              include 'banner.php';
        } 

        ?>
    </header>
    <br><br>
    <!-- fin header-->
    
    <!-- début vue -->
    <section>

        <?php include $view.'.php'; ?>
    
    </section>
    <!-- fin vue -->

    <!-- footer -->
    <footer>
        <div class="social">
            <a href="#">
                <i class="fab fa-facebook-f"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
            </a>
        </div>
        <span>Eat'n dream</span>
    </footer>
    <!-- fin footer -->

<script type="text/javascript" src="app/js/script.js"></script>
</body>

</html>