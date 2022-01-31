<?php
use App\Connection;
use App\Table\PostTable;
use App\Table\CategoryTable;
use App\Auth;

Auth::check();

$pdo = Connection::getPDO();
$table = new CategoryTable($pdo);
$table->delete($params['id']);
header('location:'.$router->url('admin_categories'). '?delete=1');

?>

<h1>Suppression de <?= $params['id'] ?></h1>