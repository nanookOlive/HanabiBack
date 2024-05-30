<?php

namespace EnsembleCartes;
/**
 * il est parfaitement envisageable de faire
 * sans l'objet carte 
 */
class Carte{

    public function __construct(
        private $color,
        private $value
    ){}

    public function getColor():String
    {
        return $this->color;
    }
    public function getValue():Int
    {
        return $this->value;
    }
    public function setColor(String $color)
    {
        $this->color=$color;
    }
    public function setValue(String $value){
        $this->value=$value;
    }


}