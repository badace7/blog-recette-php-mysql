<section class="parametre">
    <div class="container">
        <div class="titre">
                <h2>Profil</h2>
                <br><br>
                <p></p>
        </div>
        <form class="formulaire-profil" action="index.php?action=profil" method="post">
        
        <div>
            <label for="nom"><b class="label-input">Nom</b></label>
            <input class="input-profil" type="text" placeholder="<?= $nom ?>" name="nom" >
        </div>
        <div>
        <label for="prenom"><b class="label-input">Prénom</b></label>
        <input class="input-profil" type="text" placeholder="<?= $prenom ?>" name="prenom">
        </div>
        <div>
        <label for="pseudo"><b class="label-input">Pseudo</b></label>
        <input class="input-profil" type="text" placeholder="<?= $pseudo ?>" name="pseudo">
        </div>
        <div>
        <label for="email"><b class="label-input">Email</b></label>
        <input class="input-profil" type="email" pattern="^((?!\.)[\w_.]*[^.])(@\w+)(\.\w+(\.\w+)?[^.\W])$" placeholder="<?= $email ?>" name="email">
        </div>
        <div>
        <label for="psw"><b class="label-input">Mot de passe</b></label>
        <input class="input-profil" id="password" type="password" placeholder="Mot de passe" name="password">
        </div>
        <div>
        <label for="psw-confirm"><b class="label-input">Confirmer Mot de passe</b></label>
        <input class="input-profil" id="passwordConfirm" type="password" placeholder="Confirmer Mot de passe" name="psw-confirm" >
        </div>
        <br>
        <input name="affiche" id="affichePassword" onclick="inputCheck()" type="checkbox"><label for="affiche">&nbsp;&nbsp;&nbsp;Afficher le mot de passe</label>

            <button type="submit" name="submit" class="label-input">Modifier</button>
        </form>
    </div>
</section>