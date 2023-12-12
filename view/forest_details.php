<!DOCTYPE html>
<html>
<head>
    <title>Wildfire Tracking App - Forest Details</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <?php
    if (isset($_GET['forest'])) {
        $forestName = $_GET['forest'];

        require_once '../config/db_connection.php';
        require_once '../model/forestService.php';
        require_once '../controller/ForestController.php';

        $db = Database::getConnection();
        $forestService = new forestService($db);
        $controller = new ForestController($forestService, $db);

        $forestDetails = $controller->showForestDetails($forestName);
        if (!empty($forestDetails)) {
            echo '<h1>Forest Details for ' . htmlspecialchars($forestName) . '</h1>';
            echo '<ul>';
            foreach ($forestDetails as $detail) {
                echo '<li>';
                echo 'FPA ID: ' . htmlspecialchars($detail['FPA_ID']) . '<br>';
                echo 'Fire Name: ' . htmlspecialchars($detail['FIRE_NAME']) . '<br>';
                echo 'Discovery Date: ' . htmlspecialchars($detail['DISCOVERY_DATE']) . '<br>';
                echo 'Cause: ' . htmlspecialchars($detail['STAT_CAUSE_DESCR']);
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No details found for the forest: ' . htmlspecialchars($forestName) . '</p>';
        }
    } else {
        echo '<p>Forest not specified.</p>';
    }
    ?>
    <p><a href="landing.php">Back to Forest List</a></p>
</body>
</html>
