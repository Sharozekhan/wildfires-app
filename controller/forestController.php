<?php

class ForestController {
    private $forestService;
    private $db;

    public function __construct(forestService $forestService, $db) {
        $this->forestService = $forestService;
        $this->db = $db;
    }

    public function listForests() {
        return $this->forestService->getForests();
    }

    public function showForestDetails($forestName) {
        return $this->forestService->getForestDetails($forestName);
    }

    public function searchForests($searchQuery) {
        return $this->forestService->searchForests($searchQuery);
    }
}

?>

