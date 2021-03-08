<?php
namespace app\entity;



class User {

    private $id_utilisateur;
    private $email_utilisateur;
    private $password_utilisateur;
    private $pseudo_utilisateur;
    private $nom_utilisateur;
    private $prenom_utilisateur;
    private $role_utilisateur;

   

    /**
     * Get the value of id_utilisateur
     */ 
    public function getId_utilisateur()
    {
        return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     *
     * @return  self
     */ 
    public function setId_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;

        return $this;
    }

    /**
     * Get the value of email_utilisateur
     */ 
    public function getEmail_utilisateur()
    {
        return $this->email_utilisateur;
    }

    /**
     * Set the value of email_utilisateur
     *
     * @return  self
     */ 
    public function setEmail_utilisateur($email_utilisateur)
    {
        $this->email_utilisateur = $email_utilisateur;

        return $this;
    }

    /**
     * Get the value of password_utilisateur
     */ 
    public function getPassword_utilisateur()
    {
        return $this->password_utilisateur;
    }

    /**
     * Set the value of password_utilisateur
     *
     * @return  self
     */ 
    public function setPassword_utilisateur($password_utilisateur)
    {
        $this->password_utilisateur = $password_utilisateur;

        return $this;
    }

    /**
     * Get the value of pseudo_utilisateur
     */ 
    public function getPseudo_utilisateur()
    {
        return $this->pseudo_utilisateur;
    }

    /**
     * Set the value of pseudo_utilisateur
     *
     * @return  self
     */ 
    public function setPseudo_utilisateur($pseudo_utilisateur)
    {
        $this->pseudo_utilisateur = $pseudo_utilisateur;

        return $this;
    }

    /**
     * Get the value of nom_utilisateur
     */ 
    public function getNom_utilisateur()
    {
        return $this->nom_utilisateur;
    }

    /**
     * Set the value of nom_utilisateur
     *
     * @return  self
     */ 
    public function setNom_utilisateur($nom_utilisateur)
    {
        $this->nom_utilisateur = $nom_utilisateur;

        return $this;
    }

    /**
     * Get the value of prenom_utilisateur
     */ 
    public function getPrenom_utilisateur()
    {
        return $this->prenom_utilisateur;
    }

    /**
     * Set the value of prenom_utilisateur
     *
     * @return  self
     */ 
    public function setPrenom_utilisateur($prenom_utilisateur)
    {
        $this->prenom_utilisateur = $prenom_utilisateur;

        return $this;
    }

    /**
     * Get the value of role_utilisateur
     */ 
    public function getRole_utilisateur()
    {
        return $this->role_utilisateur;
    }

    /**
     * Set the value of role_utilisateur
     *
     * @return  self
     */ 
    public function setRole_utilisateur($role_utilisateur)
    {
        $this->role_utilisateur = $role_utilisateur;

        return $this;
    }
}