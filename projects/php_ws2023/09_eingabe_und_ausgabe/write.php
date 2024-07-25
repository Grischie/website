<?php
$fp = @fopen("schreiben_namen.txt", "w");
$namen = array("simon", "grischek", "kilian", "mader");
foreach($namen as $name){
    fput($fp, "$name\n");
}
fclose($fp);

if(file_exists("schreiben_name.txt")){
    $fp = @fopen("schrieben_name.txt", "r");
    if(!$fp)
    exit("Datei konnte nicht geöffnet werden");
    echo "<table border='1'>";
        echo "<tr> <td>Nummer</td> <td>Nachname</td> <td>Vorname</td> </tr>";
        $nr = 0;
        
        while (!feof($fp))
        {
            $vn = fgets($fp, 100);
            $nn = fgets($fp, 100);
            $nr = $nr + 1;
            echo "<tr> <td>$nr</td> <td>$nn</td> <td>$vn</td> </tr>";
        }
        
        echo "</table>";
        fclose($fp);
    
}