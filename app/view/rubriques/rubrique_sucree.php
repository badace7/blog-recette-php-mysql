<!-- début  -->
<section class="rubrique" id="rubrique">
        <div class="container">
            <div class="titre">
                <h2>Recettes sucrées</h2>
                <?php if($role == 'ROLE_ADMIN') {
                    echo '<a href="index.php?action=ajout_recette"class="buttonAdd">Ajouter une recette</a>';
                }?>
            </div>
            <div class="rubrique-content">
            <?php
                foreach ($recettes as $recette) {

                    echo '
                    <div class="rubrique-item">
                        <div class="rubrique-img">
                            <img src="app/images/'.$recette->getImage_recette().'" alt="">';
                            if($role == 'ROLE_ADMIN') { echo'<span class="icon-close"><a style="text-decoration: none;" href="index.php?action=delete&id='.$recette->getId_recette().'&type=rubrique_sucree"><i class="fas fa-times"></i></a></span>'; }  
                            echo '<span class="icon-heart">
                                <i class="far fa-heart"></i>
                            </span>
                        </div>
                        <div class="rubrique-text">
                            <span>'.$recette->getDate_publication().'</span>
                            <h2>'.$recette->getTitre_recette().'</h2>
                            <p>'.$recette->getResume().'</p>
                            <a href="index.php?action=recette&id='.$recette->getId_recette().'">Lire</a>';
                            if($role == 'ROLE_ADMIN') {echo'<a href="index.php?action=recette&id='.$recette->getId_recette().'" class="buttonModifier">Modifier</a>';}
                        echo '</div>
                    </div>';
                    
                }?>
                </div>
            </div>
        </div>
    </section>