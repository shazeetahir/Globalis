
<?php 

// Test Shahzaib TAHIR

function foo($input)
{
    // Trier les plages par début croissant
    usort($input, function ($a, $b) {
        return $a[0] - $b[0];
    });

    $result = [];
    $currentRange = $input[0];

    foreach ($input as $range) {
        if ($range[0] <= $currentRange[1]) {
            // Fusionner les plages chevauchantes
            $currentRange[1] = max($currentRange[1], $range[1]);
        } else {
            // Aucun chevauchement, ajouter la plage actuelle
            $result[] = $currentRange;
            $currentRange = $range;
        }
    }

    // Ajouter la dernière plage fusionnée
    $result[] = $currentRange;

    return $result;
}

// Exemples d'appel
$result1 = foo([[0, 3], [6, 10]]);
$result2 = foo([[0, 5], [3, 10]]);
$result3 = foo([[0, 5], [2, 4]]);
$result4 = foo([[7, 8], [3, 6], [2, 4]]);
$result5 = foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]);

// Afficher les résultats
print_r($result1);
print_r($result2);
print_r($result3);
print_r($result4);
print_r($result5);

?>

