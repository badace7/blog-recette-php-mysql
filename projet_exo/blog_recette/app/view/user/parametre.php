<section class="parametre">
    <div class="container">
        <div class="titre">
                <h2>Paramètre</h2>
                <br><br>
                <p></p>
        </div>
        <a href="index.php?action=profil"><div class="parametre-button">Profil</div></a>
        <?php if($role == "ROLE_ADMIN") {
            echo '<a href="index.php?action=gestion-user"><div class="parametre-button">Gestion des comptes</div></a>';
        }
        ?>
        <div style ="margin-bottom: 10rem;"></div>
    </div>
</section>