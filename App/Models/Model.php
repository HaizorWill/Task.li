<?php
namespace App\Models;

abstract class Model {
    protected $dbManager;
    protected string $dbCollection;

    protected function queryCollection() {
        return $this->dbManager::getDatabase()->selectCollection($this->dbCollection);
    }

    public function fromArray($data) {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    // public abstract function Validate();

    public function toArray($data) {
        $dataArray = [];
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $dataArray[$key] = $value;
            }
        }
        return $dataArray;
    }
}
?>