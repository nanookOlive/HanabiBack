<?php

namespace EnsembleCartes;
require_once  __DIR__."/Carte.php";
require_once __DIR__."/HanabiPartie.php";


class Player{

    private array $main=[];
    private string $pseudo;
    private string $ip;

    //faire le constructieur plus tard 

    // public function __construct(string $pseudo, string $ip){
    //     $this->pseudo=$pseudo;
    //     $this->ip=$ip;
    // }

    public function addCarte(Carte $carte, int $index=0){

        if(count($this->main)<= MAXCARTES){
            if($index==0){
                array_push($this->main,$carte);
            }else{
                $this->main[$index]=$carte;
            }
            
        }
        
    }

    public function pioche($index):array|false
    {
        if(count($this->main)<=MAXCARTES ){
            for($a=0;$a<PIOCHE;$a++){
                $this->addCarte(Jeu::getCarte(),$index);
                
            }
            return $this->main;            
        }else{
            return false;
        }
        
    }

    public function defausse(Carte $carteToDefausse):bool
    {
           
                HanabiPartie::addToDefausse($carteToDefausse);
                $index= $this->indexCarte($carteToDefausse);
                //on pioche si il reste des cartes dans la pioche
                if(!empty(Jeu::getPioche())){
                    $this->pioche($index);
                    return true;
                }else{
                    return false;
                }
               
          //  }
    }

    public function indexCarte(Carte $carteNeedle):?int{

        $index=null;
        for($a=0;$a<count($this->main);$a++){
            if(($this->main[$a])->getValue() == $carteNeedle->getValue() && ($this->main[$a])->getColor()==$carteNeedle->getColor()){
                $index=$a;
            }
        }
        return $index;
    }

    public function donnerIndice(Player $player){

        $valeurs=[
            "1"=>[],
            "2"=>[],
            "3"=>[],
            "4"=>[],
            "5"=>[]
        ];

        foreach($player->getMain() as $carte){

            switch($carte->getValue()){
                case 1 :
                    array_push($valeurs["1"],$carte);
                    break;
                case 2 :
                    array_push($valeurs["2"],$carte);
                    break;
                case 3 :
                    array_push($valeurs["3"],$carte);
                    break;
                case 4:
                    array_push($valeur["4"],$carte);
                case 5:
                    array_push($valeur["5"],$carte);
                    break;
            }
        }

        $indicesValeurs=[];
       
        
    }

////////////////////////////////////getters/////////////////////////////////////////////
    public function getNbCartesInMain():Int
    {
        return count($this->main);
    }
    public function getMain():array 
    {
        return $this->main;
    }
    public function getPseudo():string
    {
        return $this->pseudo;
    }
    public function getIp():string
    {
        return $this->ip;
    }
    public function setPseudo(string $pseudo){
        $this->pseudo=$pseudo;
    }

}