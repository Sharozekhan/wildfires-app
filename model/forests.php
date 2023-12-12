<?php
// Located in /model/ForestService.php
class ForestService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getForests() {
        $sql = "SELECT DISTINCT NWCG_REPORTING_UNIT_NAME FROM Fires";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
