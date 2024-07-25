<?php 
    // TEIL 3
    $test = "ss";
    str_replace("ss", "ß", $test); 

    strpos("ss", $test);
    
    $muster = "";
    preg_match($muster, $test);

    function addiere(){
        $anzahl = func_num_args();
        for($i = 0; $i < $anzahl; $i++) {
            echo func_get_arg($i) . " ";
            $sum = $sum + func_get_arg($i);
        }
    }
    addiere(1,35,213,21);
    
    $dopple = function($zahl){return $zahl*2;}
    $liste_test = array(2,31,4);
    $ergebnis = array_map($dopple, $liste_test);
    print_r($ergebnis);


    function random(){
        for($i = 0; $i < 10; i ++){
            yield rand(1,10);
        }
    }
    foreach (random() as $x){
        echo "$x ";
    }

    asort($ergebnis);

    // TEIL 4

    class Person {
        public static $anzahl = 0;
        public $name;

        public function __construct($name){
            $this->name = $name;
        }
        function neu (){
            echo "";
        }
    }

    $p1 = new Person();
    $p2 = clone $p1;
    Person::neu();
    Person::$anzahl;
    parent::__construct();

    try{
        print_r($ergebnis);
    } catch (Exception $e){
        echo "Exception gefangen: ". $e ->getMessage();
    }

    $con = mysql_connect("","root","pw","Person");
    $res = mysql_query($con, "Select * From Person");
    while($data = mysql_fetch_assoc($res)){
        echo "$data['name']";
    }
    mysql_close($con);
    ?>
