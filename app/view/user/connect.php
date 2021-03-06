<section class="connect" id="connect">
    <div class="container">
            <form class="connect-form" action="index.php?action=connect" method="post">
                    <div class="titre">
                        <h2>Se connecter</h2>
                        <br><br>
                    </div>
                    <label for="email"><b class="label-input">Email</b></label>
                    <input class="input-form" type="text" placeholder="Email" name="email" required>

                    <label for="mdp"><b class="label-input">Mot de passe</b></label>
                    <input class="input-form" type="password" placeholder="Mot de passe" name="password" required>

                    <label>
                        <input type="checkbox" checked="checked" name="Souvenir">&nbsp <b class="label-input">Se souvenir de moi</b>
                    </label>

                    <button type="submit" class="label-input">Confirmer</button>
            </form>
    </div>
</section>