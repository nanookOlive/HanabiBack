<?php

namespace EnsembleCartes;
require_once  __DIR__."/Carte.php";
require_once __DIR__."/HanabiPartie.php";


class Player implements \JsonSerializable{

    private array $main=[];
    private string $pseudo;
    private string $ip;

    //faire le constructieur plus tard 

    // public function __construct(string $pseudo, string $ip){
    //     $this->pseudo=$pseudo;
    //     $this->ip=$ip;
    // }

    public function jsonSerialize(){
        return [
            "pseudo"=>$this->pseudo,
            "ip"=>$this->ip,
            "main"=>$this->main
        ];
    }
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
                $this->addCarte(HanabiPartie::getCarte(),$index);
                
            }
            return $this->main;            
        }else{
            return false;
        }
        
    }

    public function defausse(Carte $carteToDefausse):bool
    {
           
                //on ajoute la carte à la défausse
                HanabiPartie::addToDefausse($carteToDefausse);

                $index= $this->indexCarte($carteToDefausse);
                //on pioche si il reste des cartes dans la pioche
                if(!empty(HanabiPartie::getJeu())){
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
            $this->pioche($this->indexCarte($carte));
            //en piochant 
            HanabiPartie::addPointScore();
        }else{
            $flag=false;
        }
        if(!$flag){
            
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
            "rouge"=>[],
            "bleu"=>[],
            "blanc"=>[],
            "jaune"=>[],
            "vert"=>[]
        ];
        

        foreach($player->getMain() as $carte){
            //$index = $this->indexCarte($carte);

            switch($carte->getValue()){
                case 1 :
                    array_push($valeurs["1"],$carte->getId());
                    break;
                case 2 :
                    array_push($valeurs["2"],$carte->getId());
                    break;
                case 3 :
                    array_push($valeurs["3"],$carte->getId());
                    break;
                case 4:
                    array_push($valeurs["4"],$carte->getId());
                    break;
                case 5:
                    array_push($valeurs["5"],$carte->getId());
                    break;
            }
            switch($carte->getColor()){
                case "rouge" :
                    array_push($couleurs["rouge"],$carte->getId());
                    break;
                case "blanc" :       ////traitement du tableau afin d'obtenir la carte $index est un  $valeur
                    array_push($couleurs["blanc"],$carte->getId());
                    break;
                case "jaune" :
                    array_push($couleurs["jaune"],$carte->getId());
                    break;
                case "bleu":
                    array_push($couleurs["bleu"],$carte->getId());
                    break;
                case "vert":
                    array_push($couleurs["vert"],$carte->getId());
                    break;
            }

        }

       ////traitement du tableau afin d'obtenir la carte $index est un  $valeur

       $indicesString=[];

        foreach($valeurs as $valeur => $index){
            
            if(!empty($index)){
                $tmpStr=(count($index)>1)? "Les cartes " : "La carte ";
                foreach($index as $gugu ){
                    $tmpStr .= $gugu." ";
                }
                $tmpStr.=(count($index)>1)? "sont des $valeur " : "est un $valeur.";

                array_push($indicesString,$tmpStr);
            }
            
        }
        foreach($couleurs as $couleur => $index){
            if(!empty($index)){
                $tmpStr=(count($index)>1)? "Les carte " : "La carte ";

                foreach($index as $gugu ){
                    $tmpStr .= $gugu." ";
                }
                $tmpStr.=(count($index)>1)? "sont $couleur " : "est $couleur.";
                array_push($indicesString,$tmpStr);
            }
            
        }                $tmpStr .= " est $couleur";

       
        //return $indicesValeurs;
        return $indicesString;
        
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
    public function setIp(string $ip){
        $this->ip=$ip;
    }

}