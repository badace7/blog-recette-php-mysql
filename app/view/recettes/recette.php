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
                    <div class="none-comment">Vous devez être connecté pour rédiger un commentaire</div>
                    <div>
                        <form action="post">
                            <!-- TextArea, input à faire -->
                        </form>
                    </div>
                </div>
                <div>
                    <h2>Commentaires n</h2>
                </div>
                <div class="comment-post">
                    <div class="postby-date">
                        <div>Pseudo 1</div><div class="space"></div>
                        <div>date / time</div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, incidunt nesciunt quibusdam amet laudantium voluptatem?</p>
                    </div>
                </div>
                <div class="comment-post">
                    <div class="postby-date">
                        <div>Pseudo 2</div><div class="space"></div>
                        <div>date / time</div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, incidunt nesciunt quibusdam amet laudantium voluptatem?</p>
                    </div>
                </div>
                <div class="comment-post">
                    <div class="postby-date">
                        <div>Pseudo 3</div><div class="space"></div>
                        <div>date / time</div>
                    </div>
                    <div class="comment">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ad, incidunt nesciunt quibusdam amet laudantium voluptatem?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>