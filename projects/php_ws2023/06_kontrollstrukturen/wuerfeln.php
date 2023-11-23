<?php
    class Spieler
    {
        public $name;
        public $punktzahl = 0;

        public $wurfhistorie = array();

        public function __construct($name)
        {
            $this->name = $name;
            $this->punktzahl = 0;
        }

        public function wuerfeln()
        {
            $wurf = rand(1, 6);
            $this->punktzahl += $wurf;
            $this->wurfhistorie[] = $wurf;
        }

        public function getAugensumme()
        {
            return $this->punktzahl;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getInfo()
        {
            echo "<p>Spieler " . $this->name . " hat (bisher) die Summe: " . $this->punktzahl . " gewürfelt.</p>";
        }
    }
?>

<?php

    session_start(); // Starte die PHP-Session

    if (!isset($_SESSION['spieler1'])) {

        $_SESSION['spieler1'] = new Spieler("Simon");
    }
    if (!isset($_SESSION['spieler2'])) {

        $_SESSION['spieler2'] = new Spieler("Sarah");
    }
    if (!isset($_SESSION['counter'])) {
        $_SESSION['counter'] = 0;
    }



    // Überprüfe, ob das Formular gesendet wurde
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST["rtd"]))
        {
            if($_SESSION['counter'] % 2 == 0)
            {
               $_SESSION['spieler1']->wuerfeln();

               if($_SESSION['spieler1']->getAugensumme() >= 25)
               {
                   echo "<p>Spieler " . $_SESSION['spieler1']->getName() . " hat gewonnen </p>";
               }
            }
            else
            {
                $_SESSION['spieler2']->wuerfeln();

                if($_SESSION['spieler2']->getAugensumme() >= 25)
                {
                    echo "<p>Spieler " . $_SESSION['spieler2']->getName() . " hat gewonnen.</p>";
                }
            }

            $_SESSION['counter']++;
        }
        elseif (isset($_POST["destroy"]))
        {
            $_SESSION['spieler1']->wurfhistorie = array();
            $_SESSION['spieler2']->wurfhistorie = array();

            $_SESSION['spieler1']->punktzahl=0;
            $_SESSION['spieler2']->punktzahl=0;
            $_SESSION['counter'] = 0;
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Würfelspiel</title>
</head>
<body>

    <?php
        $spieler1 = $_SESSION['spieler1'];
        $spieler2 = $_SESSION['spieler2'];
    ?>

    <form method="post">
        <input type="submit" name="rtd" value="Würfeln" <?php if ($spieler1->getAugensumme() >=25 || $spieler2->getAugensumme() >=25){ ?> disabled <?php } ?>>
        <input type="submit" name="destroy" value="Reset">
    </form>

    <table border="1">
        <tr>
            <th>Spieler</th>
            <th>Wurfhistorie</th>
        </tr>

        <?php

           for($i=0; $i < count($spieler1->wurfhistorie); $i++)
            {
                echo "<tr>";
                echo "<td>";
                echo $spieler1->getName();
                echo "</td>";
                echo "<td>";
                if(isset($spieler1->wurfhistorie[$i]))
                {
                    echo $spieler1->wurfhistorie[$i];
                }
                echo "</td>";
                echo "</tr>";

                echo "<tr>";

                echo "<td>";
                echo $spieler2->getName();
                echo "</td>";

                echo "<td>";
                if(isset($spieler2->wurfhistorie[$i]))
                {
                    echo $spieler2->wurfhistorie[$i];
                }
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
