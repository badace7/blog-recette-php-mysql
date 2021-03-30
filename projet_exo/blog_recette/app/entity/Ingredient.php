<?php
namespace app\entity;




class Ingredient {

    private $id_ingredients;
    private $ingredients;

    function __construct($ingredients='')
    {
        $this->id_ingredients = 0;
        $this->ingredients = $ingredients;
    }


    /**
     * Get the value of id_ingredients
     */ 
    public function getId_ingredients()
    {
        return $this->id_ingredients;
    }

    /**
     * Set the value of id_ingredients
     *
     * @return  self
     */ 
    public function setId_ingredients($id_ingredients)
    {
        $this->id_ingredients = $id_ingredients;

        return $this;
    }

    /**
     * Get the value of ingredients
     */ 
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set the value of ingredients
     *
     * @return  self
     */ 
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }
}