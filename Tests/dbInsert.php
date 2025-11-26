<?php
require_once "../App/Database/Manager.php";
require "../vendor/autoload.php";
use App\Database\Manager;

$dbManager = Manager::getInstance();
$connect = $dbManager::getDatabase()->selectCollection('tasklist');
$insert = $connect->insertOne(array('name' => 'name'));
$insert = $insert->getInsertedId();
$findOne = $connect->findOne(['_id' => new MongoDB\BSON\ObjectId($insert)]);
foreach($findOne as $entry) {
    echo '<br>' . $entry . '<br>';
};
$delete = $connect->deleteOne(['_id' => new MongoDB\BSON\ObjectId($insert)])->getDeletedCount();
echo $delete;

?>