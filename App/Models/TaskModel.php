<?php
namespace App\Models;

use App\Database\Manager;
use App\Models\Model;
use MongoDB;

class TaskModel extends Model {
    private string $id;
    private string $name;
    private string $description;
    private string $status;
    private $created_at;
    
    public function __construct() {
        $this->dbManager = Manager::getInstance();
        $this->dbCollection = 'tasks';
    }

    public function create() {
        $cursor = $this->queryCollection()->insertOne(array('name' => 'name'));
        return $cursor->getInsertedId();
    }

    public function read($query = []) {
        $cursor = $this->queryCollection()->find($query);
        return $cursor;
    }

    public function update() {

    }

    public function delete($query) {
        $result = $this->queryCollection()->deleteOne(['_id' => new MongoDB\BSON\ObjectId($query)]);
        return $result->getDeletedCount();
    }
}

?>