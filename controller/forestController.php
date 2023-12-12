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

}

?>
