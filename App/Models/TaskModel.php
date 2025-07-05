<?php
namespace App\Models;

use App\Database\Manager;
use App\Models\Model;
use MongoDB;

class TaskModel extends Model {
    protected string $_id;
    protected string $name;
    protected string $description;
    protected int $status;
    protected $created_at;
    
    public function __construct() {
        $this->dbManager = Manager::getInstance();
        $this->dbCollection = 'tasks';
    }

    public function create(array|object $query) {
        $cursor = $this->queryCollection()->insertOne($query);
        return $cursor->getInsertedId();
    }

    public function read(array|object $query = []) {
        $cursor = $this->queryCollection()->find($query);
        return $cursor;
    }

    public function update() {

    }

    public function delete(string $query) {
        $result = $this->queryCollection()->deleteOne(['_id' => new MongoDB\BSON\ObjectId($query)]);
        return $result->getDeletedCount();
    }
}

?>