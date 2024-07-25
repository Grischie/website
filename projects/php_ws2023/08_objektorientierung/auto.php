<?php

class Fahrzeug
{
    public  $hersteller;
    public $farbe;
    public function __construct($farbe, $hersteller)
    {
        $this->farbe=$farbe;
        $this->hersteller = $hersteller;
    }
    public function starten()
    {
        echo "gestartet<br />\n";
    }
    public function stoppen()
    {
        echo "gestoppt<br />\n";
    }
}

class Auto extends Fahrzeug
{
    public $kilometerstand;
    public function __construct($farbe, $hersteller,
        $kilometerstand)
    {
        $this->farbe=$farbe;
        $this->hersteller = $hersteller;
        $this->kilometerstand = $kilometerstand;
    }
    
    public function fahren($kilometer)
    {
        $this->kilometerstand = $this->kilometerstand +
        $kilometer;
        echo "Aktueller Kilometerstand: " . $this->kilometerstand . "<br />\n";
    }
}
$f = new Auto("grau", "XY", 22);
$f->starten();
$f->fahren(30);
$f->stoppen();
?>