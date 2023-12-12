<!DOCTYPE html>
<html>
<head>
    <title>Wildfire Tracking App - Forests</title>
</head>
<body>
    <h1>List of Forests</h1>
    
    <ul>
        <?php
        // Include necessary files and instantiate the controller
        require_once '../config/db_connection.php'; 
        require_once '../model/ForestService.php'; 
        require_once '../controller/ForestController.php'; 

        $db = Database::getConnection(); // Get the PDO instance
        $forestService = new ForestService($db);
        $controller = new ForestController($forestService, $db); // Pass both $forestService and $db

        // Fetch and display the list of forests
        $forests = $controller->listForests();

        foreach ($forests as $forest) {
            echo '<li>' . htmlspecialchars($forest['NWCG_REPORTING_UNIT_NAME']) . '</li>';
        }
        ?>
    </ul>
</body>
</html>
