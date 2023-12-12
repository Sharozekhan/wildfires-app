<?php
require 'config/db_connection.php';
require 'model/forestService.php';
require 'controller/ForestController.php';

$db = Database::getConnection(); // Get the PDO instance
$forestService = new ForestService($db);
$controller = new ForestController($forestService, $db); // Pass the $forestService and $db connection

// Redirect to the landing page in the "view" folder
header("Location: view/landing.php");
exit();
?>
