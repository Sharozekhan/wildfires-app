<!DOCTYPE html>
<html>
<head>
    <title>Wildfire Tracking App - Forests</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <h1>List of Forests</h1>
    
    <!-- Search Form -->
    <form method="GET">
        <label for="forestName">Search for a Forest:</label>
        <input type="text" id="forestName" name="forestName" placeholder="Enter forest name">
        <button type="submit">Search</button>
    </form>
    
    <ul>
        <?php
        require_once '../config/db_connection.php';
        require_once '../model/forestService.php';
        require_once '../controller/ForestController.php';

        $db = Database::getConnection();
        $forestService = new forestService($db);
        $controller = new ForestController($forestService, $db);

        if (isset($_GET['forestName']) && !empty(trim($_GET['forestName']))) {
            $searchQuery = trim($_GET['forestName']);
            $forests = $controller->searchForests($searchQuery);
        } else {
            $forests = $controller->listForests();
        }

        foreach ($forests as $forest) {
            echo '<li><a href="forest_details.php?forest=' . urlencode($forest['NWCG_REPORTING_UNIT_NAME']) . '">' . htmlspecialchars($forest['NWCG_REPORTING_UNIT_NAME']) . '</a></li>';
        }
        ?>
    </ul>
</body>
</html>

