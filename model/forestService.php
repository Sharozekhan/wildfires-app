<?php

class forestService {
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

    public function getForestDetails($forestName) {
        $sql = "SELECT FPA_ID, FIRE_NAME, DISCOVERY_DATE, STAT_CAUSE_DESCR FROM Fires WHERE NWCG_REPORTING_UNIT_NAME = :forestName";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':forestName', $forestName, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

