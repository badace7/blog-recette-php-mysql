<section class="gestion" id="gestion">
    <div class="container">
        <div class="user-content">
            <div class="titre">
                <h2>Gestion des utilisateurs</h2>
            </div>
                <br>
                <br>
            <div class="table-container">
                <table class="table-recette">
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                        <th>Gestion</th>
                    </tr>
                    <tr>
                        <?php foreach ($allUser as $user) {
                            if ($user->getId_utilisateur() != 1) {
                            echo '
                            <tr>
                                <td>'.$user->getPseudo_utilisateur().'</td>
                                <td>'.$user->getEmail_utilisateur().'</td>
                                <td><a href="index.php?action=deleteUser&id='.$user->getId_utilisateur().'" style="text-decoration:none; color:red;">Supprimer</a></td>
                            </tr>
                            ';
                            }
                        } ?>
                    </tr>
                </table>
                    <div style="margin-bottom:10.9rem;"></div>
            </div>