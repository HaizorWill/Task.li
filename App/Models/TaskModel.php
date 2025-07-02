<?php
namespace App\Models;

use App\Database\Manager;
use App\Models\Model;
use MongoDB;

class TaskModel extends Model {
    protected string $id;
    protected string $name;
    protected string $description;
    protected int $status;
    protected $created_at;
    
    public function __construct() {
        $this->dbManager = Manager::getInstance();
        $this->dbCollection = 'tasks';
    }

    public function create() {
        $cursor = $this->queryCollection()->insertOne();
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