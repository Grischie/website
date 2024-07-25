<?php
 if(!file_exists("u_schreiben.txt"))
 exit("Datei konnte nicht gefunden werden");

$fpdata = @fopen("u_schreiben.txt","r");
$fpa = @fopen("u_schreiben_a.txt","w");
$fpb = @fopen("u_schreiben_b.txt","w");
if(!($fpdata && $fpa && $fpb))
exit("Eine der Dateien konnte nicht geöffnet werden");

/* Z�hler initialisieren */
$gz = 0;
$az = 0;
$bz = 0;

while (!feof($fpdata))
{
$gz = $gz + 1;
$nr = fgets($fpdata, 100);
$vn = fgets($fpdata, 100);
$nn = fgets($fpdata, 100);

/* in erste Ausgabedatei */
if ($nr<1000)
{
  $az = $az + 1;
  fputs ($fpa, $nr.$vn.$nn);
}

/* in zweite Ausgabedatei */
else
{
  $bz = $bz + 1;
  fputs ($fpb, "$nr$vn$nn");   //alternative �bergabe als ""
}
}

/* alle Dateien schlie�en */
fclose($fpdata);
fclose($fpa);
fclose($fpb);

/* Kontrolle */
echo "Es wurden $gz Datensätze gefunden<br />";
echo "davon wurden $az Datensätze in die Datei u_schreiben_a.txt geschrieben<br />";
echo "und $bz Datensätze in die Datei u_schreiben_b.txt geschrieben";
?>