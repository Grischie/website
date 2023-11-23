<?php
class Fahrzeug {
	public $farbe;
	public $hersteller;
	public function __construct($farbe, $hersteller) {
		$this->farbe = $farbe;
		$this->hersteller = $hersteller;
	}
	public function start() {
		echo "Das Auto vom Hersteller $this->hersteller mit der Frabe $this->farbe wird gestartet. <br/> ";
	}
	public function stop() {
		echo "Das Auto vom Hersteller $this->hersteller mit der Frabe $this->farbe wird gestoppt. <br/> ";
	}
}
$a1 = new Fahrzeug("blau","Benz");
$a2 = new Fahrzeug("rot","VW");

$a1->start();
$a2->stop();
?>
