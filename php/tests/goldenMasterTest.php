<?php

// 1. Démarrer la capture de sortie
ob_start();

// 2. Inclure le legacy et exécuter run()
include __DIR__ . "/../legacy/orderReportLegacy.php";
run();  // lance la fonction principale

// 3. Récupérer tout ce qui a été affiché
$output = ob_get_clean();

// 4. Chemin du report dans legacy/expected
$reportPath = __DIR__ . "/../legacy/expected/report.txt";

// 5. Écrire la sortie dans report.txt
file_put_contents($reportPath, $output);

// 6. Notification
echo "Golden Master capture générée dans legacy/expected/report.txt\n";
