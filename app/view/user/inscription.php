<section class="inscription" id="inscription">
    <div class="container">
        <div class="titre">
            <h2>S'inscrire</h2>
            <br><br>
        </div>
        <form class="inscription-form" action="index.php?action=inscription" method="post">
        
        <label for="nom"><b class="label-input">Nom</b></label>
        <input class="input-inscription" type="text" placeholder="Nom" name="nom" required>

        <label for="prenom"><b class="label-input">Prénom</b></label>
        <input class="input-inscription" type="text" placeholder="Prénom" name="prenom" required>

        <label for="pseudo"><b class="label-input">Pseudo</b></label>
        <input class="input-inscription" type="text" placeholder="Pseudo" name="pseudo" required>
        
        <label for="email"><b class="label-input">Email</b></label>
        <input class="input-inscription" type="email" pattern="^((?!\.)[\w_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$" placeholder="Email" name="email" required>

        <label for="psw"><b class="label-input">Mot de passe</b></label>
        <input class="input-inscription" id="password" type="password" placeholder="Mot de passe" name="password" required>

        <label for="psw-confirm"><b class="label-input">Confirmer Mot de passe</b></label>
        <input class="input-inscription" id="passwordConfirm" type="password" placeholder="Confirmer Mot de passe" name="psw-confirm" required>
        <br>
        <input name="affiche" id="affichePassword" onclick="inputCheck()" type="checkbox"><label for="affiche">&nbsp;&nbsp;&nbsp;Afficher le mot de passe</label>

            <button type="submit" name="submit" class="label-input">S'inscrire</button>
        </form>
    </div>
</section>
 