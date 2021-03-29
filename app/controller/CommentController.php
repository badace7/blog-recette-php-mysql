<?php
namespace app\controller;

use app\entity\Commentaire;
use app\model\ModelComment;




class CommentController extends Controller {

    public function addComment($id_recette) {

        $user = unserialize($_SESSION['user']);
        $id_user = $user->getId_utilisateur();

        $text = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_SPECIAL_CHARS);

        $model = new ModelComment();
        $commentaire = new Commentaire($text , $id_user, $id_recette);

        $model->newComment($commentaire);

        header('Location: index.php?action=recette&id='.$id_recette);
    }


    public function deleteComment($id_commentaire, $id_recette) {

        $id_commentaire = intval($id_commentaire);


        $model = new ModelComment();
        $model->delete($id_commentaire);

        header('Location: index.php?action=recette&id='.$id_recette);
    }
}

