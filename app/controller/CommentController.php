<?php
namespace app\controller;

use app\entity\Commentaire;
use app\model\ModelComment;




class CommentController extends Controller {


    // Ajoute un commentaire
    public function addComment($id_recette):void {

        $user = (isset($_SESSION['user'])) ? unserialize($_SESSION['user']) : null;
        $role = ($user == null) ? 'visitor' : $user->getRole_utilisateur();

        // Récupère les donnée de l'utilisateur connecté
        $user = unserialize($_SESSION['user']);
        
        // Récupère l'id de l'utilisateur connecté 
        $id_user = $user->getId_utilisateur();

        // Récupère le commentaire 
        $text = filter_input(INPUT_POST, 'commentaire', FILTER_SANITIZE_SPECIAL_CHARS);

        $model = new ModelComment();

        // Crée un objet commentaire
        $commentaire = new Commentaire($text , $id_user, $id_recette);

        // Ajoute un nouveau commentaire dans la base de donnée
        $model->newComment($commentaire);

        // Rédirection vers la page de la recette
        header('Location: index.php?action=recette&id='.$id_recette);
        exit();
    }

    // Supprime le commentaire concernant une recette
    public function deleteComment($id_commentaire, $id_recette):void {

        $user = (isset($_SESSION['user'])) ? unserialize($_SESSION['user']) : null;
        $role = ($user == null) ? 'visitor' : $user->getRole_utilisateur();

        if ($role != 'ROLE_ADMIN') {

            header('Location: index.php?action=recette&id='.$id_recette);
            exit();

        }

        $id_commentaire = intval($id_commentaire);


        $model = new ModelComment();

        // Supprime le commentaire grace à l'id
        $model->delete($id_commentaire);

        // Redirection vers la page de la recette
        header('Location: index.php?action=recette&id='.$id_recette);
        exit();
    }
}

