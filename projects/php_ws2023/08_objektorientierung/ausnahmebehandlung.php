<?php
    
    ini_set("error_reporting", 32767); // Alle Fehler anzeigen

    try 
    {
        if(!isset($a))
            throw new Exception("Couldn't make calculation because \$a is not set.<br />");

        $c = 2 * $a;
        echo "<p>$c</p>";

    } catch (Exception $e)
    {        
        echo "Exception gefangen: " . $e->getMessage() . "<br />\n";
       
    }
    

    $x = 24;

    for($y=4; $y>-3; $y--)
    {
        if($y == 0)
        {
            echo "$x / $y was skipped because \$y equals 0 => would cause an error. <br />\n";
            continue;
        }          

        $z = $x / $y;
        echo "$x / $y = $z<br />";
    }

    
   /** @noinspection PhpUndefinedFunctionInspection */
    if (function_exists("fkt")) 
    {
        fkt();

    } else 
    {
        echo "<br />Die Funktion 'fkt' existiert nicht<br />";
    }
   
    echo "<br />Ende";

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Fehlerbehandlung - PHP</title>
        <meta charset="UTF-8"/>

    </head>
    <body>
        <?php

        ?>
    </body>

</html>	
