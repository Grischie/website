<?php

class Fahrzeug2{
    public $hersteller, $farbe;
    public function __construct($hersteller, $farbe){
        $this->hersteller = $hersteller;
        $this->farbe = $farbe;
    }
    public function start(){
        echo "start $this->farbe  $this->hersteller";
    }
    public function stop(){
        echo "stop $this->farbe  $this->hersteller";
    }
}
$f1 = new Fahrzeug("audi, gelb");
$f1->start();