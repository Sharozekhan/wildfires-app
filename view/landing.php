<!DOCTYPE html>
<html>
<head>
    <title>Wildfire Tracking App - Forests</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <h1>List of Forests</h1>

    <ul>
        <?php
        require_once '../config/db_connection.php';
        require_once '../model/forestService.php';
        require_once '../controller/ForestController.php';

        $db = Database::getConnection();
        $forestService = new ForestService($db);
        $controller = new ForestController($forestService, $db);

        $forests = $controller->listForests();

        foreach ($forests as $forest) {
            echo '<li><a href="forest_details.php?forest=' . urlencode($forest['NWCG_REPORTING_UNIT_NAME']) . '">' . htmlspecialchars($forest['NWCG_REPORTING_UNIT_NAME']) . '</a></li>';
        }
        ?>
    </ul>
</body>
</html>
