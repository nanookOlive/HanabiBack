<?php

namespace EnsembleCartes;
require_once  __DIR__."/Carte.php";


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

    public function pioche():array|false
    {
        if(count($this->main)<=MAXCARTES){
            for($a=0;$a<PIOCHE;$a++){
                $this->addCarte(Jeu::getCarte());
                
            }
            return $this->main;            
        }else{
            return false;
        }
        
    }

    public function defausse(Carte $carteToDefausse):array|false
    {
        //on retire la carte 

      
            if($this->indexCarte($carteToDefausse) == null){
                return false;
            }else{
                unset($this->main[$this->indexCarte($carteToDefausse)]);
                //resize array
                $tmpMain=[];
                foreach($this->main as $carte){
                    if($carte != null){
                        array_push($tmpMain,$carte);
                    }
                }
                $this->main=$tmpMain;//pas sur valeur ou référence ? gestion mémoire 
    
                //on pioche 
                $this->pioche();
                //on renvoie la main
                return $this->main;
            }
            
        
        
    }

    public function indexCarte(Carte $carteNeedle):?int{

        $index=null;
        for($a=0;$a<count($this->main);$a++){
            if($this->main[$a] == $carteNeedle){
                $index=$a;
            }
        }
        return $index;
    }

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

}