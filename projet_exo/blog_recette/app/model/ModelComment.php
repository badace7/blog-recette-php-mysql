<?php 
namespace app\model;

use PDO;


class ModelComment extends Dao {


    public function newComment ($commentaire) {

        $id_user = intval($commentaire->getId_utilisateur());
        $id_recette = intval($commentaire->getId_recette());
        $date_commentaire = $commentaire->getDate_commentaire();
        $commentaire = $commentaire->getCommentaire();

        $bddConnect = $this->pdoConnect();

            $requestNewComment = "INSERT INTO commentaires (`commentaire`,`date_commentaire`,`id_utilisateur`,`id_recette`)
                    VALUES (:commentaire, :date_commentaire, :id_utilisateur, :id_recette)";


            $statement = $bddConnect->prepare($requestNewComment);
                $statement->bindParam('commentaire', $commentaire);
                $statement->bindParam('date_commentaire', $date_commentaire);
                $statement->bindParam('id_utilisateur', $id_user);
                $statement->bindParam('id_recette', $id_recette);
                $statement->execute();
    }


    public function getComments ($id_recette):array {

        $bddConnect = $this->pdoConnect();

        $requestGetComments = "SELECT `commentaire`,`date_commentaire`, pseudo_utilisateur, id_commentaire FROM `commentaires` NATURAL JOIN Utilisateur WHERE id_recette=:id";
        
        $statement = $bddConnect->prepare($requestGetComments);
        $statement->bindParam('id', $id_recette);
        $statement->execute();
        
        $statement->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'app\entity\Commentaire');

        return $statement->fetchAll();
    }

    public function delete($id_commentaire) {

        $bddConnect = $this->pdoConnect();

        $requestDeleteComment = "DELETE FROM commentaires WHERE id_commentaire=:id";
        $statement = $bddConnect->prepare($requestDeleteComment);
        $statement->bindParam('id', $id_commentaire);
        $statement->execute();
    }

}