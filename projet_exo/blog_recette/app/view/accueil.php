

    <!-- début accueil -->
    <section class="accueil" id="accueil">

        <div class="container">
            <div class="titre">
                <h2>Dernières publications</h2>
                <br><br>
                <p></p>
            </div>

            <div class="accueil-content">
            <?php 
                foreach ($lastRecipe as $lastRecipe) {
                    
                echo '
                    <!-- publication -->
                    <div class="accueil-item">
                        <a href="index.php?action=recette&id='.$lastRecipe->getId_recette().'"><div class="accueil-img">
                        <img loading="lazy" src="app/images/'.$lastRecipe->getImage_recette().'" alt=""></img>
                            <span>
                                <i class="far fa-heart">
                                </i>
                            </span>
                            <span>'.$lastRecipe->getTitre_recette().'</span>
                        </div></a>
                        <div class="accueil-titre">
                            <a href="index.php?action=recette&id='.$lastRecipe->getId_recette().'">'.$lastRecipe->getTitre_recette().'</a>
                        </div>
                    </div>';
                }
            ?>
            </div>

        </div>
    </section>
    <!-- fin accueil -->

