<?php
// Located in /model/forestService.php
class forestService {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getForests() {
        try {
            $sql = "SELECT DISTINCT NWCG_REPORTING_UNIT_NAME FROM Fires";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

    public function getForestDetails($forestName) {
        try {
            $sql = "SELECT FPA_ID, FIRE_NAME, DISCOVERY_DATE, STAT_CAUSE_DESCR FROM Fires WHERE NWCG_REPORTING_UNIT_NAME = :forestName";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':forestName', $forestName, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }

    public function searchForests($searchQuery) {
        try {
            $sql = "SELECT DISTINCT NWCG_REPORTING_UNIT_NAME FROM Fires WHERE NWCG_REPORTING_UNIT_NAME LIKE :searchQuery";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle the error
            error_log("Database error: " . $e->getMessage());
            return [];
        }
    }
}
?>

