<section class="recette" id="recette">
    <div class="container">
        <div class="recette-content">
            <div class="titre">
                <h2><?= $recette->getTitre_recette()?></h2>
            </div>
            <div>
                <img src="app/images/<?= $recette->getImage_recette() ?>" alt="">
            </div>

            <div class="table-container">
                <table class="table-recette">
                    <tr>
                        <th>Temps de préparation</th>
                    </tr>
                    <tr>
                        <td>Préparation : <?= $recette->getTemps_preparation() ?></td>
                    </tr>
                    <tr>
                        <td>Cuisson : <?= $recette->getTemps_cuisson() ?></td>
                    </tr>
                    <tr>
                        <td>Temps total : <?= $recette->getTemps_total() ?></td>
                    </tr>';
                    <tr>
                        <th>Ingrédients</th>
                    </tr>
                    <?php 
                     
                    foreach ($ingredients as $ingredient) {
                        echo '
                   <tr>
                       <td>'.$ingredient->getIngredients().'</td>
                   </tr>';
                     }
                    echo '<tr>
                            <th>Ustensiles</th>
                        </tr>'; 
                        foreach ($ustensiles as $ustensile) {
                            echo '
                       <tr>
                           <td>'.$ustensile->getUstensile().'</td>
                       </tr>';
                    }
                    ?>
                </table>
            </div>


            <div class="conseils-content">
                <div class="conseils-text">
                    <div>
                        <h2>Conseils</h2>
                    </div>
                    <p><?= $recette->getConseil() ?></p>
                </div>
            </div>


            <div class="comment-content">
                <div class="comment-form">
                    <div>
                        <h2>Votre commentaire</h2>
                    </div>
                    <?php if (!$connected) {
                        echo '
                    <div class="none-comment">Vous devez être connecté pour rédiger un commentaire</div>
                    ';
                    } ?>
                    <br>
                    <div>
                        <form action="index.php?action=comment&id=<?=$recette->getId_recette()?>" method="post">
                            <Textarea style="width:100%; height:7rem;" name="commentaire" required></Textarea>
                            <input class="button-comment" type="submit" value="Commenter">
                        </form>
                    </div>
                </div>
                <br>
                <div>
                    <h2>Commentaires <?= count($commentaires) ?></h2>
                </div>
                <?php foreach ($commentaires as $commentaire) {
                    echo
                
                ' <div class="comment-post">
                    <div class="postby-date">
                        <div>'.$commentaire->getPseudo_utilisateur().'</div><div class="space"></div>
                        <div style="position:absolute; right:30rem;">Le '.$commentaire->getDate_commentaire().'</div>
                    </div>
                    <div class="comment">
                        <p>'.$commentaire->getCommentaire().'</p>
                    </div>
                </div>';
                if($role == 'ROLE_ADMIN'){
                    echo '<a style="margin-left:5.5rem; text-decoration:none; color:red;" href="index.php?action=deleteComment&id='.$commentaire->getId_commentaire().'&id2='.$recette->getId_recette().'">Supprimer</a>';
                }

                } ?>
            </div>
        </div>
    </div>
</section>