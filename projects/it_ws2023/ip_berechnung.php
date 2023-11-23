<!DOCTYPE html>
<html>
<head>
    <title>IP-Adressberechnung</title>
</head>
<body>
    <h1>IP-Adressberechnung</h1>
    <form method="post">
        IP-Adresse und Subnetzmaske (000.000.000.000/00):
        <input type="text" name="ipWithMask">
        <input type="submit" value="Berechnen">
    </form>

    <?php
    if (isset($_POST['ipWithMask'])) {
        $ipWithMask = $_POST['ipWithMask'];

        function calculateNetworkInfo($ipWithMask) {
            list($ip, $subnetMask) = explode('/', $ipWithMask);
            $ipBinary = ip2long($ip);
            $ipBinary = str_pad(decbin($ipBinary), 32, '0', STR_PAD_LEFT);

            $subnetMask = intval($subnetMask);
            $hostBits = 32 - $subnetMask;

            $numHosts = pow(2, $hostBits) - 2; 

            $subnetMaskBinary = str_pad(str_repeat('1', $subnetMask) . str_repeat('0', 32 - $subnetMask), 32, '0', STR_PAD_RIGHT);

            $networkBinary = $ipBinary & $subnetMaskBinary;
            $networkAddress = long2ip(bindec($networkBinary));

            return [
				'Input' => $ipWithMask,
                'Network Address' => $networkAddress,
                'Subnet Mask' => long2ip(bindec($subnetMaskBinary)),
                'Number of Hosts' => $numHosts,
            ];
        }

        $networkInfo = calculateNetworkInfo($ipWithMask);

        echo "<h2>Berechnete Informationen:</h2>";
        echo "<ul>";
        foreach ($networkInfo as $key => $value) {
            echo "<li>$key: $value</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
