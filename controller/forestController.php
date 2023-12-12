<?php

class ForestController {
    private $forestService;
    private $db;

    public function __construct($forestService, $db) {
        $this->forestService = $forestService;
        $this->db = $db;
    }

    public function listForests() {
        $forests = $this->forestService->getForests();
        return $forests;
    }

    public function searchForests($searchQuery) {
        $sql = "SELECT DISTINCT NWCG_REPORTING_UNIT_NAME FROM Fires WHERE NWCG_REPORTING_UNIT_NAME LIKE :searchQuery";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':searchQuery', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
