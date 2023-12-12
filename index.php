<?php
require 'config/db_connection.php';
require 'model/forestService.php';
require 'controller/ForestController.php';

$db = Database::getConnection();
$forestService = new forestService($db);
$controller = new ForestController($forestService, $db);

header("Location: view/landing.php");
exit();
?>
