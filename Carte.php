<?php

namespace EnsembleCartes;
/**
 * il est parfaitement envisageable de faire
 * sans l'objet carte 
 */
class Carte implements \JsonSerializable, \Serializable{

    public function __construct(
        private $id,
        private $color,
        private $value
    ){}

    public function jsonSerialize(){
        return [
            "id"=>$this->id,
            "color"=>$this->color,
            "value"=>$this->value

        ];
    }
    public function serialize(){
        return serialize(
            [
                "id"=>$this->id,
                "color"=>$this->color,
                "value"=>$this->value
            ]
            );
    }

    public function unserialize(string $data){
        $unData = unserialize($data);
        $this->id=$unData["id"];
        $this->color=$unData["color"];
        $this->value=$unData["value"];
    }

    public function getId():int{
        return $this->id;
    }
    public function getColor():String
    {
        return $this->color;
    }
    public function getValue():Int
    {
        return $this->value;
    }
    public function setId(int $id){
        $this->id=$id;
    }
    public function setColor(String $color)
    {
        $this->color=$color;
    }
    public function setValue(String $value){
        $this->value=$value;
    }


}