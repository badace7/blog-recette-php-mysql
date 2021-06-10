<?php 
namespace app\model;

use PDO;


class ModelComment extends Model {

    // Permet d'insérer un nouveau commentaire dans la base donnée
    public function newComment ($commentaire):void {


        $id_user = intval($commentaire->getId_utilisateur());
        $id_recette = intval($commentaire->getId_recette());
        $date_commentaire = $commentaire->getDate_commentaire();
        $commentaire = $commentaire->getCommentaire();

        // var_dump($id_user, $id_recette, $date_commentaire, $commentaire);
        // die();


        // Retourne la connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

            // Requête permettant d'insérer un commentaire dans la base de donnée
            $requestNewComment = "INSERT INTO commentaires (`commentaire`,`date_commentaire`,`id_utilisateur`,`id_recette`)
                    VALUES (:commentaire, :date_commentaire, :id_utilisateur, :id_recette)";

            // Prépare la requête et l'éxecute
            $statement = $bddConnect->prepare($requestNewComment);
                $statement->bindParam('commentaire', $commentaire);
                $statement->bindParam('date_commentaire', $date_commentaire);
                $statement->bindParam('id_utilisateur', $id_user);
                $statement->bindParam('id_recette', $id_recette);
                $statement->execute();
    }

    // Récupère un tableau contenant des objets commentaire
    public function getComments ($id_recette):array {

        // Retourne la connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête permettant de récupérer des commentaires
        $requestGetComments = "SELECT `commentaire`,`date_commentaire`, pseudo_utilisateur, id_commentaire FROM `commentaires` NATURAL JOIN Utilisateur WHERE id_recette=:id";
        
        // Prépare la requête et l'éxecute
        $statement = $bddConnect->prepare($requestGetComments);
        $statement->bindParam('id', $id_recette);
        $statement->execute();
        
        // Permet de définir les données retourné sous forme d'objet
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Commentaire');

        return $statement->fetchAll();
    }

    // Supprime un commentaire
    public function delete($id_commentaire):void {

        // Retourne la connexion à la base de donnée
        $bddConnect = $this->pdoConnect();

        // Requête de suppression de commentaire en fonction de l'id du commentaire
        $requestDeleteComment = "DELETE FROM commentaires WHERE id_commentaire=:id";
        $statement = $bddConnect->prepare($requestDeleteComment);
        $statement->bindParam('id', $id_commentaire);
        $statement->execute();
    }

}