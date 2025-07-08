<?php
namespace App\Models;

abstract class Model {
    protected $dbManager;
    protected string $dbCollection;

    protected function queryCollection() {
        return $this->dbManager::getDatabase()->selectCollection($this->dbCollection);
    }

    protected function fromArray($data) {
        foreach ($data as $key => $value) {
            if(property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public abstract function Validate();

    protected function toArray() {
        $dataArray = get_object_vars($this);
        return array_filter($dataArray, fn($value, $key) => $key !== 'dbCollection' && !is_object($value), ARRAY_FILTER_USE_BOTH); #temporary implementation until i figure this out or it breaks
    }
}
?>