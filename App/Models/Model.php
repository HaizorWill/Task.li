<?php
namespace App\Models;

abstract class Model {
    protected $dbManager;
    protected string $dbCollection;

    protected function queryCollection() {
        return $this->dbManager::getDatabase()->selectCollection($this->dbCollection);
    }
}
?>