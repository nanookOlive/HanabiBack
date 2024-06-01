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

    public function poseCarte(Carte $carte):bool{

        /**
         * deux conditions 
         * cartevaleur - 1 de pile couleur doit être true 
         * le joeur doit pouvoir poser une carte même si il ne sait pas
         * quelle pile la poser
         */


        $pile = (HanabiPartie::getPile())[$carte->getColor()];
        $flag=true;

    
        for($a=0;$a<$carte->getValue()-1;$a++){
            if($pile[$a]==false){
                $flag=false;
                break;
            }
        }
        if($flag && ($pile[$carte->getValue()-1]==false)){
            HanabiPartie::setPile($carte->getColor(),$carte->getValue());
            //defausser la carte 
            //en pioch
            HanabiPartie::addPointScore();
        }else{
            $flag=false;
        }
        return$flag;

        

    }
    public function donnerIndice(Player $player):array{

        $valeurs=[
            "1"=>[],
            "2"=>[],
            "3"=>[],
            "4"=>[],
            "5"=>[]
        ];
        $couleurs=[
            "red"=>[],
            "blue"=>[],
            "white"=>[],
            "yellow"=>[],
            "green"=>[]
        ];
        

        foreach($player->getMain() as $carte){
            $index = $this->indexCarte($carte);

            switch($carte->getValue()){
                case 1 :
                    array_push($valeurs["1"],$index);
                    break;
                case 2 :
                    array_push($valeurs["2"],$index);
                    break;
                case 3 :
                    array_push($valeurs["3"],$index);
                    break;
                case 4:
                    array_push($valeurs["4"],$index);
                    break;
                case 5:
                    array_push($valeurs["5"],$index);
                    break;
            }
            switch($carte->getColor()){
                case "red" :
                    array_push($couleurs["red"],$index);
                    break;
                case" white" :
                    array_push($couleurs["white"],$index);
                    break;
                case "yellow" :
                    array_push($couleurs["yellow"],$index);
                    break;
                case "blue":
                    array_push($couleurs["blue"],$index);
                    break;
                case "green":
                    array_push($couleurs["green"],$index);
                    break;
            }

        }

        $indicesValeurs=[
            "valeurs"=>$valeurs,
            "couleurs"=>$couleurs
        ];
       
        return $indicesValeurs;
        
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