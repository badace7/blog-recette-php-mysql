<section class="ajoutRecette" id="ajoutRecette">
    <div class="container">
        <div class="titre">
            <h2>Ajouter une recette</h2>
            <br><br>
        </div>

        <form class="recette-form" action="index.php?action=ajout_recette" enctype="multipart/form-data" method="post">
            <div>
                <label for="titre-recette"><b class="label-input">Selectionnez un type de recette</b></label>
                <select class="input-ingredient"  name="type-recette" placeholder="type" >
                    <option value="sucrée">Sucrée</option>
                    <option value="salée">Salée</option>
                </select>
            </div>

            <div >
                <label for="titre-recette"><b class="label-input">Titre de la recette</b></label>
                <input class="input-ingredient" type="text" name="titre-recette" placeholder="titre" >
            </div>

            <div >
                <label for="titre-recette"><b class="label-input">Résumé</b></label>
                <textarea class="input-ingredient" type="text" name="resume-recette" placeholder="résumé" ></textarea>
            </div>
           

            <div >
                <label for="image-recette"><b class="label-input">Image</b></label>
                <input class="input-ingredient" type="file" name="image-recette" placeholder="image" >
            </div>
           
            <div >
                <label for="titre-recette"><b class="label-input">Préparation</b></label>
                <input class="input-ingredient" min="0" max="240" type="number" name="preparation-recette" placeholder="préparation" >
            </div>


            <div >
                <label for="titre-recette"><b class="label-input">Cuisson</b></label>
                <input class="input-ingredient" type="number"  min="0" max="240" name="cuisson-recette" placeholder="cuisson" >
            </div>

            <div>
                <label for="titre-recette"><b class="label-input">Temps total</b></label>
                <input class="input-ingredient" type="number"  min="0" max="240" name="tempstotal-recette" placeholder="temps total" >
            </div>

            <div id="input-ingredient">
                <label for="ingredient"><b class="label-input">Ingrédient</b></label>
                <input class="input-ingredient" type="text" name="ingredient[]" placeholder="ingrédient" >
            </div>
            <a name="ajout" onclick="ajouterIngredient()" class="label-input" id="addIngredient"><i class="fas fa-plus"></i></a>
            <a name="retrait" onclick="retirerIngredient()" class="label-input" id="removeIngredient" style="background-color:rgba(104, 17, 17, 0.6);"><i class="fas fa-minus"></i></a>
            
            
            <br><br><br>


            <div id="input-ustensile">
                <label for="ustensile"><b class="label-input">Ustensile</b></label>
                <input class="input-ingredient" type="text" name="ustensile[]" placeholder="ustensile">
            </div>
            <a name="ajout" onclick="ajouterUstensile()" class="label-input" id="addUstensile"><i class="fas fa-plus"></i></a>
            <a name="retrait" onclick="retirerUstensile()" class="label-input" id="removeUstensile" style="background-color:rgba(104, 17, 17, 0.6);"><i class="fas fa-minus"></i></a>

            <br><br><br>

            <div id="input-ingredient">
                <label for="titre-recette"><b class="label-input">Conseils</b></label>
                <textarea class="input-ingredient textareaConseil" type="text" name="conseil-recette" placeholder="conseils" ></textarea>
            </div>
            
            <button type="submit" class="recipe-button">Valider</button>

        </form>

    </div>
</section>
 