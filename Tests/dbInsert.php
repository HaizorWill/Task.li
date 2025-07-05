<?php
require "../vendor/autoload.php";

use App\Models\TaskModel;

$data = ['name' => 'name', 'description' => 'description'];
$taskModel = new TaskModel();
$result = $taskModel->fromArray($data);
#validate
$result = $taskModel->toArray($taskModel);

$taskModel->create($result);

$read = $taskModel->read();
$result = $taskModel->fromArray($read);
#validate
$result = $taskModel->toArray($taskModel);

var_dump($result);
// $result = $taskModel->serializeModel($entry);

// echo '<br>' . '<br>';
// foreach($read as $entry) {
//     $result = $taskModel->toArray($entry);
//     var_dump($result);
// };
#$delete = $taskModel->delete($result);
#print_r($delete);

?>