<?php
require "../vendor/autoload.php";

use App\Models\TaskModel;

$taskModel = new TaskModel();
$result = $taskModel->create();
$read = $taskModel->read();
foreach($read as $entry) {
    print_r($entry);
};
$delete = $taskModel->delete($result);
print_r($delete);

?>